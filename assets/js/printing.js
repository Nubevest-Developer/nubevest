/* ==========================================================================
   Nubevest /print-signage — price calculator, quote request and FAQ.
   The server (printing/api/price.php) is authoritative for validation and
   pricing; this file only builds the form from the public catalogue, shows
   results and posts quote requests to the existing contact handler.
   ========================================================================== */
(() => {
  'use strict';

  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const esc = (s) => String(s).replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
  const scrollToEl = (el) => el && el.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'start' });
  // main.js also scrolls on #hash links; run ours after it so ours wins.
  const later = (fn) => window.setTimeout(fn, 0);

  initAccordion();

  const form = $('#np-config');
  const catalogEl = $('#np-catalog');
  if (!form || !catalogEl) return;

  const CATALOG = JSON.parse(catalogEl.textContent || '{}');
  const CFG = window.NP_CONFIG || {};
  const ARTWORK = { 'print-ready': 'I have print-ready artwork', 'design-help': 'I need design help', unsure: 'Not sure yet' };

  const el = {
    product: $('#np-product'),
    options: $('#np-options'),
    qty: $('#np-qty'),
    stepOptions: $('[data-step="options"]', form),
    stepDetails: $('[data-step="details"]', form),
    tbc: $('#np-tbc-hint'),
    errSum: $('#np-errsum'),
    calcBtn: $('#np-calc-btn'),
    postcode: $('#np-postcode'),
    postcodeOpt: $('#np-postcode-opt'),
    postcodeHint: $('#np-postcode-hint'),
    card: $('#np-summary'),
    title: $('#np-summary-title'),
    list: $('#np-summary-list'),
    idle: $('#np-summary-idle'),
    result: $('#np-result'),
    quote: $('#np-quote'),
    quoteForm: $('#np-quote-form'),
    quoteTitle: $('#np-quote-title'),
    quoteLead: $('#np-quote-lead'),
    quoteSummary: $('#np-quote-summary'),
    quoteAlert: $('#np-quote-alert'),
    quoteBtn: $('#np-quote-btn'),
    quoteDone: $('#np-quote-done'),
    notes: $('#q-notes'),
    notesOpt: $('#q-notes-opt'),
    needed: $('#q-needed'),
  };

  const STATIC_ERR = { product: 'np-product-err', artwork: 'np-artwork-err', postcode: 'np-postcode-err' };
  let serverSummary = null;   // summary rows from the last successful server evaluation
  let pricedResult = null;    // last price, if any
  let notesRequired = false;

  /* ------------------------------------------------------------------ */
  /*  Field builders                                                     */
  /* ------------------------------------------------------------------ */
  const hasUnverified = (group) => Object.values(group || {}).some((o) => !o.verified);
  const tbcTag = (group) => (hasUnverified(group) ? ' <span class="np-label__tbc">to be confirmed</span>' : '');
  const errP = (name) => `<p class="np-err" id="np-f-${name}-err"></p>`;

  // Select (or a static value when there's only one choice).
  function choiceField(name, label, group, { required = false, full = false, placeholder = 'Recommend for me' } = {}) {
    const entries = Object.entries(group || {});
    if (!entries.length) return '';
    const id = `np-f-${name}`;
    const cls = `np-field${full ? ' np-field--full' : ''}`;
    if (entries.length === 1) {
      const [value, o] = entries[0];
      return `<div class="${cls}"><p class="np-label" id="${id}-label">${esc(label)}${tbcTag(group)}</p>
        <p class="np-static" aria-labelledby="${id}-label">${esc(o.label)}</p>
        <input type="hidden" name="${name}" value="${esc(value)}">${errP(name)}</div>`;
    }
    const first = required ? `<option value="">Choose ${esc(label.toLowerCase())}</option>` : `<option value="">${esc(placeholder)}</option>`;
    const options = entries.map(([v, o]) => `<option value="${esc(v)}">${esc(o.label)}</option>`).join('');
    return `<div class="${cls}"><label class="np-label" for="${id}">${esc(label)}${tbcTag(group)}</label>
      <div class="np-select"><select id="${id}" name="${name}" ${required ? 'required' : ''} aria-describedby="np-f-${name}-err">${first}${options}</select></div>
      ${errP(name)}</div>`;
  }

  // Radio chips (or a static value when there's only one choice).
  function chipField(name, label, group, { full = true, multi = false } = {}) {
    const entries = Object.entries(group || {});
    if (!entries.length) return '';
    if (entries.length === 1 && !multi) return choiceField(name, label, group, { full });
    const type = multi ? 'checkbox' : 'radio';
    const chips = entries.map(([v, o]) =>
      `<label class="np-chip${multi ? ' np-chip--check' : ''}"><input type="${type}" name="${name}" value="${esc(v)}"><span>${esc(o.label)}</span></label>`
    ).join('');
    return `<fieldset class="np-field${full ? ' np-field--full' : ''}"><legend class="np-label">${esc(label)}${tbcTag(group)}${multi ? ' <span class="np-label__opt">(choose any)</span>' : ''}</legend>
      <div class="np-chips" ${multi ? '' : 'role="radiogroup"'} aria-describedby="np-f-${name}-err">${chips}</div>${errP(name)}</fieldset>`;
  }

  function dimsField(type) {
    const l = type.limits;
    const n = (x) => Number(x).toLocaleString('en-AU');
    return `<div class="np-field np-field--full">
      <p class="np-label" id="np-dims-label">Size (width × height)</p>
      <div class="np-dims" role="group" aria-labelledby="np-dims-label">
        <div><label class="np-sr" for="np-f-width">Width in millimetres</label>
          <div class="np-unit"><input class="np-input" id="np-f-width" name="width" type="number" inputmode="numeric" min="${l.min_w}" max="${l.max_w}" step="1" placeholder="Width" aria-describedby="np-dims-hint np-f-width-err"></div>
          ${errP('width')}</div>
        <span class="np-dims__x" aria-hidden="true">×</span>
        <div><label class="np-sr" for="np-f-height">Height in millimetres</label>
          <div class="np-unit"><input class="np-input" id="np-f-height" name="height" type="number" inputmode="numeric" min="${l.min_h}" max="${l.max_h}" step="1" placeholder="Height" aria-describedby="np-dims-hint np-f-height-err"></div>
          ${errP('height')}</div>
      </div>
      <p class="np-hint" id="np-dims-hint">Width ${n(l.min_w)}–${n(l.max_w)} mm, height ${n(l.min_h)}–${n(l.max_h)} mm. Larger sizes: call 1300 959 514.</p>
    </div>`;
  }

  /* ------------------------------------------------------------------ */
  /*  Rendering                                                          */
  /* ------------------------------------------------------------------ */
  function currentProduct() {
    return CATALOG[el.product.value] || null;
  }

  function renderProduct() {
    const p = currentProduct();
    el.options.innerHTML = '';
    el.qty.innerHTML = '';
    el.stepOptions.hidden = !p;
    el.stepDetails.hidden = !p;
    if (!p) return;

    let html = '';
    if (p.kind === 'paper') {
      html += choiceField('size', 'Size', p.sizes, { required: true });
      html += choiceField('stock', 'Paper stock', p.stocks);
      html += choiceField('finish', 'Finish', p.finishes);
      html += chipField('sides', 'Printing sides', p.sides);
    } else if (p.kind === 'banner') {
      const types = Object.fromEntries(Object.entries(p.types).map(([k, t]) => [k, { label: t.label + (t.phase > 1 ? ' (on request)' : ''), verified: true }]));
      html += chipField('type', 'Banner or sign type', types);
      html += '<div id="np-type-options" class="np-options np-field--full"></div>';
    } else if (p.kind === 'merch') {
      html += choiceField('item', 'Item', p.items, { required: true, full: true });
      html += `<p class="np-hint np-field--full" style="margin-top:-6px">Promotional products are quoted to your brief. Tell us colours, decoration and sizes in your request.</p>`;
    } else if (p.kind === 'package') {
      html += `<div class="np-field np-field--full"><p class="np-label">Includes</p><p class="np-static">${p.includes.map(esc).join(' · ')}</p>
        <p class="np-hint">Tell us quantities for each item in your quote request. Package pricing comes from approved product prices only.</p></div>`;
    }
    el.options.innerHTML = html;
    renderQuantity(p);

    const large = p.kind === 'banner';
    el.postcodeOpt.textContent = large ? '' : '(optional)';
    el.postcodeHint.textContent = large ? 'Required for large items so we can quote freight.' : 'Used to quote delivery to your area.';
    el.postcode.required = large;
    updateTbcHint();
  }

  function renderBannerType() {
    const p = currentProduct();
    const box = $('#np-type-options');
    if (!p || p.kind !== 'banner' || !box) return;
    const typeId = (form.querySelector('input[name="type"]:checked') || {}).value;
    const t = p.types[typeId];
    if (!t) { box.innerHTML = ''; updateTbcHint(); return; }

    let html = t.size_mode === 'preset' ? choiceField('size', 'Size', t.sizes, { required: true }) : dimsField(t);
    html += choiceField('material', 'Material', t.materials);
    html += choiceField('thickness', 'Thickness', t.thickness);
    html += choiceField('stand', 'Stand', t.stands);
    html += chipField('sides', 'Printing sides', t.sides, { full: false });
    html += chipField('finishing', 'Finishing', t.finishing, { multi: true });
    box.innerHTML = html;
    updateTbcHint();
  }

  function renderQuantity(p) {
    if (p.kind === 'package') { el.qty.innerHTML = ''; el.qty.hidden = true; return; }
    el.qty.hidden = false;
    const moq = p.moq ? `<p class="np-hint">Minimum order: ${Number(p.moq).toLocaleString('en-AU')}.</p>` : '';
    // isOther: the field sits under the preset chips and opens on "Other".
    const custom = (isOther) => `<div class="np-field np-field--narrow" id="np-qty-custom"${isOther ? ' hidden style="margin-top:12px"' : ''}>
        <label class="np-label" for="np-f-quantity_custom">${isOther ? 'Other quantity' : 'Quantity'}</label>
        <input class="np-input" id="np-f-quantity_custom" name="quantity_custom" type="number" inputmode="numeric" min="1" max="100000" step="1" placeholder="e.g. 750" aria-describedby="np-f-quantity_custom-err">
        ${errP('quantity_custom')}</div>`;

    if (!p.quantities.length) {
      el.qty.innerHTML = custom(false) + moq;
      return;
    }
    const chips = p.quantities.map((q) => `<label class="np-chip"><input type="radio" name="quantity" value="${q}"><span>${Number(q).toLocaleString('en-AU')}</span></label>`).join('')
      + '<label class="np-chip"><input type="radio" name="quantity" value="custom"><span>Other</span></label>';
    el.qty.innerHTML = `<fieldset class="np-field" style="margin:0"><legend class="np-label">Quantity</legend>
      <div class="np-chips" role="radiogroup" aria-describedby="np-f-quantity-err">${chips}</div>${errP('quantity')}</fieldset>${custom(true)}${moq}`;
  }

  function updateTbcHint() {
    el.tbc.hidden = !$$('.np-label__tbc', form).length;
  }

  /* ------------------------------------------------------------------ */
  /*  Collect + summarise                                                */
  /* ------------------------------------------------------------------ */
  const FIELDS = ['type', 'size', 'width', 'height', 'material', 'stock', 'finish', 'thickness', 'stand', 'sides', 'item', 'quantity', 'quantity_custom', 'artwork', 'postcode'];

  function collect() {
    const fd = new FormData(form);
    const d = { product: fd.get('product') || '' };
    FIELDS.forEach((k) => {
      const v = fd.get(k);
      if (v !== null && String(v).trim() !== '') d[k] = String(v).trim();
    });
    d.finishing = fd.getAll('finishing');
    const p = CATALOG[d.product];
    if (p && p.kind !== 'package' && !p.quantities.length) d.quantity = 'custom';
    return d;
  }

  function clientSummary(d) {
    const p = CATALOG[d.product];
    if (!p) return [];
    const rows = [['Product', p.name]];
    const add = (label, group, v) => { if (group && v && group[v]) rows.push([label, group[v].label]); };
    if (p.kind === 'paper') {
      add('Size', p.sizes, d.size); add('Paper stock', p.stocks, d.stock); add('Finish', p.finishes, d.finish); add('Printing sides', p.sides, d.sides);
    } else if (p.kind === 'banner') {
      const t = p.types[d.type];
      if (t) {
        rows.push(['Type', t.label]);
        if (t.size_mode === 'preset') add('Size', t.sizes, d.size);
        else if (d.width && d.height) rows.push(['Size', `${Number(d.width).toLocaleString('en-AU')} × ${Number(d.height).toLocaleString('en-AU')} mm`]);
        add('Material', t.materials, d.material); add('Thickness', t.thickness, d.thickness); add('Stand', t.stands, d.stand); add('Printing sides', t.sides, d.sides);
        const fin = (d.finishing || []).map((f) => t.finishing && t.finishing[f] && t.finishing[f].label).filter(Boolean);
        if (fin.length) rows.push(['Finishing', fin.join(', ')]);
      }
    } else if (p.kind === 'merch') {
      add('Item', p.items, d.item);
    } else if (p.kind === 'package') {
      rows.push(['Includes', p.includes.join(', ')]);
    }
    const qty = d.quantity === 'custom' ? d.quantity_custom : d.quantity;
    if (qty) rows.push(['Quantity', Number(qty).toLocaleString('en-AU')]);
    if (ARTWORK[d.artwork]) rows.push(['Artwork', ARTWORK[d.artwork]]);
    if (d.postcode) rows.push(['Delivery postcode', d.postcode]);
    return rows;
  }

  const rowsHtml = (rows) => rows.map(([k, v]) => `<div><dt>${esc(k)}</dt><dd>${esc(v)}</dd></div>`).join('');

  function updateSummary() {
    const d = collect();
    const p = CATALOG[d.product];
    el.title.textContent = p ? p.name : 'Choose a product to start';
    el.idle.hidden = !!p;
    el.list.innerHTML = rowsHtml(serverSummary || clientSummary(d));
    $$('[data-pick]', form).forEach((b) => b.setAttribute('aria-pressed', String(b.dataset.pick === d.product)));
  }

  form.addEventListener('click', (e) => {
    const b = e.target.closest('[data-pick]');
    if (!b) return;
    el.product.value = b.dataset.pick;
    el.product.dispatchEvent(new Event('change', { bubbles: true }));
  });

  /* ------------------------------------------------------------------ */
  /*  Errors                                                             */
  /* ------------------------------------------------------------------ */
  function errEl(name) {
    return document.getElementById(STATIC_ERR[name] || `np-f-${name}-err`);
  }

  function clearErrors(scope = form) {
    $$('.np-err', scope).forEach((p) => { p.textContent = ''; });
    $$('.is-invalid', scope).forEach((n) => n.classList.remove('is-invalid'));
    $$('[aria-invalid="true"]', scope).forEach((n) => n.removeAttribute('aria-invalid'));
    if (scope === form) { el.errSum.hidden = true; el.errSum.innerHTML = ''; }
  }

  function clearFieldError(name) {
    const p = errEl(name);
    if (!p) return;
    p.textContent = '';
    const wrap = p.closest('.np-field');
    if (wrap) wrap.classList.remove('is-invalid');
    $$(`[name="${name}"]`, form).forEach((i) => i.removeAttribute('aria-invalid'));
  }

  function focusTarget(name) {
    return form.querySelector(`[name="${name}"]:not([type="hidden"])`) || (name === 'product' ? el.product : null);
  }

  function showErrors(errors) {
    const items = [];
    Object.entries(errors).forEach(([name, msg]) => {
      if (name === '_') { items.push(`<li>${esc(msg)}</li>`); return; }
      const p = errEl(name);
      if (p) {
        p.textContent = msg;
        const wrap = p.closest('.np-field');
        if (wrap) wrap.classList.add('is-invalid');
      }
      $$(`[name="${name}"]`, form).forEach((i) => i.setAttribute('aria-invalid', 'true'));
      const t = focusTarget(name);
      items.push(t && t.id ? `<li><a href="#${t.id}" data-focus="${esc(name)}">${esc(msg)}</a></li>` : `<li>${esc(msg)}</li>`);
    });
    el.errSum.innerHTML = `<strong>Check ${items.length === 1 ? 'this option' : 'these options'}:</strong><ul>${items.join('')}</ul>`;
    el.errSum.hidden = false;
    el.errSum.focus({ preventScroll: true });
    el.errSum.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'center' });
  }

  el.errSum.addEventListener('click', (e) => {
    const a = e.target.closest('a[data-focus]');
    if (!a) return;
    e.preventDefault();
    const t = focusTarget(a.dataset.focus);
    if (t) { t.focus(); t.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'center' }); }
  });

  /* ------------------------------------------------------------------ */
  /*  Results                                                            */
  /* ------------------------------------------------------------------ */
  function setResult(state, html = '') {
    el.card.dataset.state = state;
    el.result.innerHTML = html;
  }

  function resetResult() {
    serverSummary = null;
    pricedResult = null;
    setResult('idle');
  }

  function setLoading(btn, on) {
    btn.classList.toggle('is-loading', on);
    btn.setAttribute('aria-busy', on ? 'true' : 'false');
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    clearErrors();
    const d = collect();
    if (!d.product) { showErrors({ product: 'Choose a product.' }); return; }

    setLoading(el.calcBtn, true);
    setResult('loading', '<div class="np-skeleton np-skeleton--lg"></div><div class="np-skeleton"></div><div class="np-skeleton" style="width:70%"></div>');
    try {
      const res = await fetch(CFG.priceEndpoint, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
        body: JSON.stringify(d),
      });
      const body = await res.json();

      if (body.status === 'error') {
        resetResult();
        setResult('invalid', `<span class="np-result__badge np-result__badge--error">Check your options</span>
          <p class="np-result__text">Some options need attention before we can price this.</p>`);
        showErrors(body.errors || { _: 'Check your options and try again.' });
      } else if (body.status === 'priced') {
        serverSummary = body.summary;
        pricedResult = body.price;
        setResult('priced', `<span class="np-result__badge np-result__badge--price">Price available</span>
          <p class="np-result__amount">$${esc(body.price.total_inc_gst)}</p>
          <dl class="np-ticket__list np-result__lines">
            <div><dt>Printing</dt><dd>$${esc(body.price.total_inc_gst)} ${esc(body.price.currency)}</dd></div>
            <div><dt>GST included</dt><dd>$${esc(body.price.gst)}</dd></div>
            <div><dt>Delivery</dt><dd>Calculated for your postcode</dd></div>
          </dl>
          <p class="np-result__text">${esc(body.price.note)}</p>
          <button type="button" class="btn btn--primary np-btn np-btn--block" data-quote-continue>Continue with this price</button>`);
      } else if (body.status === 'quote_required') {
        serverSummary = body.summary;
        setResult('quote', `<span class="np-result__badge np-result__badge--quote">Tailored quote</span>
          <p class="np-result__text">${esc(body.message)}</p>
          <p class="np-result__text">Add your details below and we’ll reply with a quote.</p>`);
        openQuote({ lead: body.message + ' Add your details and we’ll reply with a quote. There’s no obligation to order.' });
      } else {
        throw new Error('Unexpected response');
      }
      updateSummary();
    } catch (err) {
      serverSummary = null;
      setResult('error', `<span class="np-result__badge np-result__badge--error">Couldn’t calculate</span>
        <p class="np-result__text">We couldn’t reach the price calculator. Check your connection and try again, or request a quote and we’ll price it for you.</p>
        <button type="button" class="btn btn--secondary np-btn np-btn--block" data-quote-open>Request a Custom Quote</button>`);
      updateSummary();
    } finally {
      setLoading(el.calcBtn, false);
    }
  });

  el.result.addEventListener('click', (e) => {
    if (e.target.closest('[data-quote-continue]')) {
      openQuote({ lead: 'Add your details and we’ll confirm your order with you. Online checkout isn’t available yet.' });
    }
  });

  /* ------------------------------------------------------------------ */
  /*  Live updates                                                       */
  /* ------------------------------------------------------------------ */
  function onChange(e) {
    const t = e.target;
    if (t === el.product) {
      renderProduct();
      clearErrors();
    } else if (t.name === 'type') {
      renderBannerType();
    } else if (t.name === 'quantity') {
      const box = $('#np-qty-custom');
      if (box) {
        box.hidden = t.value !== 'custom';
        if (!box.hidden && e.type === 'change') $('#np-f-quantity_custom').focus();
      }
    }
    if (t.name) clearFieldError(t.name);
    if (t.name === 'width' || t.name === 'height') { clearFieldError('width'); clearFieldError('height'); }
    if (el.card.dataset.state !== 'idle' && el.card.dataset.state !== 'loading') resetResult();
    else serverSummary = null;
    updateSummary();
    if (!el.quote.hidden && el.quoteForm && !el.quoteForm.hidden) syncQuoteSummary();
  }
  form.addEventListener('change', onChange);
  form.addEventListener('input', (e) => {
    if (e.target === el.postcode) el.postcode.value = el.postcode.value.replace(/\D/g, '').slice(0, 4);
    if (e.target.matches('input[type="number"], input[type="text"]')) onChange(e);
  });

  /* ------------------------------------------------------------------ */
  /*  Pre-select from product, category and package links               */
  /* ------------------------------------------------------------------ */
  function applyPreset(cfg) {
    if (!cfg || !CATALOG[cfg.product]) return;
    el.product.value = cfg.product;
    renderProduct();
    if (cfg.type) {
      const r = form.querySelector(`input[name="type"][value="${CSS.escape(cfg.type)}"]`);
      if (r) { r.checked = true; renderBannerType(); }
    }
    if (cfg.size) {
      const s = form.querySelector('select[name="size"]');
      if (s) s.value = cfg.size;
    }
    clearErrors();
    resetResult();
    updateSummary();
  }

  function firstOpenControl() {
    return $$('select, input:not([type="hidden"])', form).find((c) => {
      if (c.closest('[hidden]') || c === el.product) return false;
      if (c.type === 'radio') return !form.querySelector(`input[name="${c.name}"]:checked`);
      return c.tagName === 'SELECT' ? c.value === '' && c.required : false;
    });
  }

  $$('[data-configure]').forEach((a) => {
    a.addEventListener('click', (e) => {
      e.preventDefault();
      let cfg;
      try { cfg = JSON.parse(a.dataset.configure); } catch (_) { return; }
      applyPreset(cfg);
      later(() => {
        scrollToEl($('#price-calculator'));
        window.setTimeout(() => { const c = firstOpenControl() || el.product; c.focus({ preventScroll: true }); }, reduced ? 0 : 600);
      });
    });
  });

  /* ------------------------------------------------------------------ */
  /*  Quote request                                                      */
  /* ------------------------------------------------------------------ */
  let recaptchaLoading = null;
  function loadRecaptcha(key) {
    if (!key) return Promise.resolve(null);
    if (window.grecaptcha && window.grecaptcha.execute) return Promise.resolve(window.grecaptcha);
    if (!recaptchaLoading) {
      recaptchaLoading = new Promise((resolve, reject) => {
        const s = document.createElement('script');
        s.src = `https://www.google.com/recaptcha/api.js?render=${encodeURIComponent(key)}`;
        s.async = true;
        s.onload = () => window.grecaptcha.ready(() => resolve(window.grecaptcha));
        s.onerror = () => { recaptchaLoading = null; reject(new Error('reCAPTCHA failed to load')); };
        document.head.appendChild(s);
      });
    }
    return recaptchaLoading;
  }

  function syncQuoteSummary() {
    const rows = serverSummary || clientSummary(collect());
    el.quoteSummary.innerHTML = rowsHtml(rows);
    notesRequired = rows.length === 0;
    el.notes.required = notesRequired;
    el.notesOpt.textContent = notesRequired ? '' : '(optional)';
    el.notes.placeholder = notesRequired
      ? 'What would you like printed? Include product, size, quantity and when you need it.'
      : 'Event name, colours, quantities for each item, artwork questions…';
  }

  function openQuote({ lead } = {}) {
    el.quoteForm.hidden = false;
    el.quoteDone.hidden = true;
    el.quote.hidden = false;
    el.quote.classList.add('is-open');
    el.quoteLead.textContent = lead || (currentProduct()
      ? 'We’ll review your selection and reply with a tailored quote. There’s no obligation to order.'
      : 'Tell us what you need and we’ll reply with a tailored quote. There’s no obligation to order.');
    syncQuoteSummary();
    loadRecaptcha(el.quoteForm.dataset.recaptchaKey).catch(() => {});
    later(() => {
      scrollToEl(el.quote);
      window.setTimeout(() => el.quoteTitle.focus({ preventScroll: true }), reduced ? 0 : 500);
    });
  }

  $$('[data-quote-open]').forEach((a) => a.addEventListener('click', (e) => { e.preventDefault(); openQuote(); }));
  el.result.addEventListener('click', (e) => { if (e.target.closest('[data-quote-open]')) openQuote(); });

  function quoteError(name, msg) {
    const p = document.getElementById(`q-${name}-err`);
    if (p) p.textContent = msg;
    const input = document.getElementById(`q-${name}`);
    if (input) { input.setAttribute('aria-invalid', 'true'); input.classList.add('is-invalid'); }
    return input;
  }

  function buildMessage() {
    const rows = serverSummary || clientSummary(collect());
    const lines = ['[Printing quote request — nubevest.com.au/print-signage]', ''];
    if (rows.length) {
      lines.push('Selection:');
      rows.forEach(([k, v]) => lines.push(`- ${k}: ${v}`));
    } else {
      lines.push('Selection: none — see notes.');
    }
    if (pricedResult) lines.push('', `Price shown online: $${pricedResult.total_inc_gst} inc. GST`);
    if (el.needed.value) lines.push('', `Needed by: ${el.needed.value}`);
    const notes = el.notes.value.trim();
    if (notes) lines.push('', 'Notes:', notes);
    return lines.join('\n');
  }

  el.quoteForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const f = el.quoteForm;
    const field = (n) => f.elements.namedItem(n);
    clearErrors(f);
    el.quoteAlert.hidden = true;

    const invalid = [];
    if (!field('name').value.trim()) invalid.push(quoteError('name', 'Enter your name.'));
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field('email').value.trim())) invalid.push(quoteError('email', 'Enter a valid email address, like name@business.com.au.'));
    if (notesRequired && !el.notes.value.trim()) invalid.push(quoteError('notes', 'Tell us what you’d like printed.'));
    if (!field('consent').checked) invalid.push(quoteError('consent', 'Tick the box so we can respond to your request.'));
    if (invalid.length) { invalid[0].focus(); return; }

    field('message').value = buildMessage();
    setLoading(el.quoteBtn, true);

    try {
      const key = f.dataset.recaptchaKey;
      if (key) {
        try {
          const g = await loadRecaptcha(key);
          field('g-recaptcha-response').value = await g.execute(key, { action: f.dataset.recaptchaAction || 'contact_submit' });
        } catch (_) {
          throw Object.assign(new Error(), { userMessage: 'The security check didn’t load. Refresh the page and try again, or call 1300 959 514.' });
        }
      }
      const res = await fetch(f.getAttribute('action'), { method: 'POST', body: new FormData(f), headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      const data = await res.json().catch(() => ({ ok: false }));
      if (!res.ok || !data.ok) {
        throw Object.assign(new Error(), { userMessage: data.error || 'We couldn’t send your request. Try again, or call us on 1300 959 514.' });
      }
      f.hidden = true;
      el.quoteDone.hidden = false;
      el.quoteDone.focus();
    } catch (err) {
      el.quoteAlert.textContent = err.userMessage || 'We couldn’t send your request. Check your connection and try again, or call us on 1300 959 514.';
      el.quoteAlert.hidden = false;
      el.quoteAlert.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'center' });
    } finally {
      setLoading(el.quoteBtn, false);
    }
  });

  el.quoteForm.addEventListener('input', (e) => {
    const id = e.target.id;
    if (!id || !id.startsWith('q-')) return;
    const p = document.getElementById(`${id}-err`);
    if (p) p.textContent = '';
    e.target.removeAttribute('aria-invalid');
    e.target.classList.remove('is-invalid');
  });

  $('#np-quote-again').addEventListener('click', () => {
    el.quoteForm.reset();
    el.quoteForm.hidden = false;
    el.quoteDone.hidden = true;
    el.quote.hidden = true;
    form.reset();
    renderProduct();
    resetResult();
    updateSummary();
    scrollToEl($('#price-calculator'));
    el.product.focus({ preventScroll: true });
  });

  /* ------------------------------------------------------------------ */
  /*  FAQ accordion (multiple panels may be open)                        */
  /* ------------------------------------------------------------------ */
  function initAccordion() {
    $$('[data-accordion] .np-acc__btn').forEach((btn) => {
      const panel = document.getElementById(btn.getAttribute('aria-controls'));
      if (!panel) return;
      btn.addEventListener('click', () => {
        const open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open));
        if (reduced) { panel.hidden = open; return; }
        if (open) {
          panel.style.height = `${panel.scrollHeight}px`;
          requestAnimationFrame(() => { panel.style.height = '0px'; });
          panel.addEventListener('transitionend', function end() {
            panel.hidden = true; panel.style.height = '';
            panel.removeEventListener('transitionend', end);
          });
        } else {
          panel.hidden = false;
          panel.style.height = '0px';
          requestAnimationFrame(() => { panel.style.height = `${panel.scrollHeight}px`; });
          panel.addEventListener('transitionend', function end() {
            panel.style.height = '';
            panel.removeEventListener('transitionend', end);
          });
        }
      });
    });
  }

  // Initial state (e.g. after a back/forward navigation restores the select).
  if (el.product.value) renderProduct();
  updateSummary();
})();
