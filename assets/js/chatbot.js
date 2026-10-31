/**
 * Nubi — Nubevest AI chatbot (front-end).
 * POSTs to /api/chat.php, session-based history is server-side.
 */
(function () {
  const BASE = (typeof window.NV_BASE === 'string') ? window.NV_BASE : '';
  const ENDPOINT = BASE + '/api/chat.php';

  const html = `
    <button class="nvbot__launcher" type="button" aria-label="Open Nubevest AI assistant">
      <span class="nvbot__launcher-ico">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
          <path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/>
        </svg>
      </span>
      <span>Chat with Nubi</span>
      <span class="nvbot__launcher-dot" aria-hidden="true"></span>
    </button>

    <div class="nvbot__panel" role="dialog" aria-label="Nubevest AI assistant">
      <div class="nvbot__head">
        <div class="nvbot__avatar" aria-hidden="true">N</div>
        <div class="nvbot__title">
          <span class="nvbot__title-t">Nubi · Nubevest AI</span>
          <span class="nvbot__title-s">Online now</span>
        </div>
        <button class="nvbot__reset" type="button" aria-label="Reset chat" title="Reset chat">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 4v6h6M20 20v-6h-6M20 10a8 8 0 0 0-14.9-3M4 14a8 8 0 0 0 14.9 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <button class="nvbot__close" type="button" aria-label="Close chat">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        </button>
      </div>

      <div class="nvbot__body" id="nvbotBody"></div>

      <div class="nvbot__quick" id="nvbotQuick">
        <button type="button" data-q="What services do you offer?">Our services</button>
        <button type="button" data-q="Tell me about Plannor for NDIS providers.">Plannor / NDIS</button>
        <button type="button" data-q="I need a website — how do we start?">Build a website</button>
        <button type="button" data-q="How can I book a Business Systems Review?">Book a review</button>
      </div>

      <form class="nvbot__form" id="nvbotForm" autocomplete="off">
        <textarea class="nvbot__input" id="nvbotInput" rows="1" placeholder="Ask about services, Plannor, pricing..." maxlength="2000"></textarea>
        <button class="nvbot__send" type="submit" aria-label="Send">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 12l16-8-6 8 6 8-16-8z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
        </button>
      </form>
      <div class="nvbot__foot">Powered by AI · Responses may not be perfect</div>
    </div>
  `;

  const root = document.createElement('div');
  root.className = 'nvbot';
  root.innerHTML = html;
  document.body.appendChild(root);

  const launcher = root.querySelector('.nvbot__launcher');
  const closeBtn = root.querySelector('.nvbot__close');
  const resetBtn = root.querySelector('.nvbot__reset');
  const body     = root.querySelector('#nvbotBody');
  const form     = root.querySelector('#nvbotForm');
  const input    = root.querySelector('#nvbotInput');
  const sendBtn  = form.querySelector('.nvbot__send');
  const quick    = root.querySelector('#nvbotQuick');

  const GREETING = "Hi! I'm Nubi, Nubevest's AI assistant. Ask me about our services, brands like Plannor and Go Meta CRM, or how to start a project — I'll point you the right way.";
  const STORE_KEY = 'nvbot_history_v1';

  function open() { root.classList.add('is-open'); setTimeout(() => input.focus(), 100); }
  function close() { root.classList.remove('is-open'); }
  launcher.addEventListener('click', open);
  closeBtn.addEventListener('click', close);

  function addMsg(who, text) {
    const wrap = document.createElement('div');
    wrap.className = 'nvbot-msg nvbot-msg--' + who;
    const b = document.createElement('div');
    b.className = 'nvbot-msg__bubble';
    b.textContent = text;
    wrap.appendChild(b);
    body.appendChild(wrap);
    body.scrollTop = body.scrollHeight;
    return wrap;
  }

  function addTyping() {
    const wrap = document.createElement('div');
    wrap.className = 'nvbot-msg nvbot-msg--bot nvbot-msg--typing';
    wrap.innerHTML = '<div class="nvbot-msg__bubble" style="padding:0"><div class="nvbot-typing"><span></span><span></span><span></span></div></div>';
    body.appendChild(wrap);
    body.scrollTop = body.scrollHeight;
    return wrap;
  }

  function saveLocal() {
    try {
      const msgs = [...body.querySelectorAll('.nvbot-msg:not(.nvbot-msg--typing)')].map(m => ({
        who: m.classList.contains('nvbot-msg--user') ? 'user' : 'bot',
        text: m.querySelector('.nvbot-msg__bubble')?.textContent || ''
      }));
      localStorage.setItem(STORE_KEY, JSON.stringify(msgs));
    } catch (e) {}
  }

  function loadLocal() {
    try {
      const raw = localStorage.getItem(STORE_KEY);
      if (!raw) return false;
      const msgs = JSON.parse(raw);
      if (!Array.isArray(msgs) || !msgs.length) return false;
      msgs.forEach(m => addMsg(m.who, m.text));
      return true;
    } catch (e) { return false; }
  }

  async function send(text) {
    if (!text.trim()) return;
    addMsg('user', text);
    saveLocal();
    input.value = '';
    input.style.height = 'auto';
    sendBtn.disabled = true;
    quick.style.display = 'none';
    const typing = addTyping();

    try {
      const res = await fetch(ENDPOINT, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message: text }),
        credentials: 'same-origin'
      });
      const data = await res.json();
      typing.remove();
      if (!res.ok || data.error) {
        addMsg('bot', data.error || 'Something went wrong. Please try again or call 1300 959 514.');
      } else {
        addMsg('bot', data.reply || '');
      }
      saveLocal();
    } catch (e) {
      typing.remove();
      addMsg('bot', 'Network issue — please try again, or reach us at 1300 959 514.');
    } finally {
      sendBtn.disabled = false;
      input.focus();
    }
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    send(input.value);
  });

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); form.requestSubmit(); }
  });
  input.addEventListener('input', () => {
    input.style.height = 'auto';
    input.style.height = Math.min(input.scrollHeight, 100) + 'px';
  });

  quick.addEventListener('click', (e) => {
    const btn = e.target.closest('button[data-q]');
    if (!btn) return;
    send(btn.dataset.q);
  });

  resetBtn.addEventListener('click', async () => {
    try { localStorage.removeItem(STORE_KEY); } catch (e) {}
    body.innerHTML = '';
    quick.style.display = 'flex';
    addMsg('bot', GREETING);
    await fetch(ENDPOINT, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message: 'reset', reset: true }),
      credentials: 'same-origin'
    }).catch(() => {});
  });

  // Initial greeting
  if (!loadLocal()) {
    addMsg('bot', GREETING);
  } else {
    quick.style.display = 'none';
  }
})();
