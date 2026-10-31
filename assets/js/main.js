/* ===== NUBEVEST MAIN JS ===== */

document.addEventListener('DOMContentLoaded', () => {
  initHeader();
  initMobileMenu();
  initScrollReveal();
  initAccordions();
  initCookieBanner();
  initFormValidation();
  initFilters();
  initSmoothScroll();
  initHeroNodes();
});

/* Header scroll effect */
function initHeader() {
  const header = document.querySelector('.header');
  if (!header) return;
  const onScroll = () => {
    header.classList.toggle('scrolled', window.scrollY > 50);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

/* Mobile menu */
function initMobileMenu() {
  const toggle = document.querySelector('.mobile-toggle');
  const menu = document.querySelector('.mobile-menu');
  if (!toggle || !menu) return;

  toggle.addEventListener('click', () => {
    const isOpen = menu.classList.contains('active');
    toggle.classList.toggle('active');
    menu.classList.toggle('active');
    document.body.style.overflow = isOpen ? '' : 'hidden';
    toggle.setAttribute('aria-expanded', !isOpen);
  });

  const submenuToggles = menu.querySelectorAll('[data-submenu]');
  submenuToggles.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const sub = btn.nextElementSibling;
      if (sub) sub.classList.toggle('open');
    });
  });

  menu.querySelectorAll('a:not([data-submenu])').forEach(link => {
    link.addEventListener('click', () => {
      menu.classList.remove('active');
      toggle.classList.remove('active');
      document.body.style.overflow = '';
    });
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && menu.classList.contains('active')) {
      menu.classList.remove('active');
      toggle.classList.remove('active');
      document.body.style.overflow = '';
      toggle.focus();
    }
  });

  /* Safety: if window resizes past mobile breakpoint while menu is open,
     close menu and release body scroll lock */
  const releaseLock = () => {
    if (window.innerWidth > 968) {
      if (menu.classList.contains('active')) {
        menu.classList.remove('active');
        toggle.classList.remove('active');
      }
      if (document.body.style.overflow === 'hidden') {
        document.body.style.overflow = '';
      }
    }
  };
  window.addEventListener('resize', releaseLock, { passive: true });
  releaseLock(); /* run once on load in case a prior session left it locked */
}

/* Scroll reveal animations */
function initScrollReveal() {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prefersReduced) {
    document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale').forEach(el => {
      el.classList.add('visible');
    });
    return;
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0, rootMargin: '0px 0px -50px 0px' });

  document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale').forEach(el => {
    observer.observe(el);
  });

  // Stagger children
  document.querySelectorAll('.stagger').forEach(parent => {
    Array.from(parent.children).forEach((child, i) => {
      child.style.setProperty('--i', i);
    });
  });
}

/* Accordion / FAQ */
function initAccordions() {
  document.querySelectorAll('.accordion__trigger').forEach(trigger => {
    trigger.addEventListener('click', () => {
      const item = trigger.closest('.accordion__item');
      const content = item.querySelector('.accordion__content');
      const isActive = item.classList.contains('active');

      // Close siblings
      item.closest('.accordion').querySelectorAll('.accordion__item.active').forEach(sibling => {
        if (sibling !== item) {
          sibling.classList.remove('active');
          sibling.querySelector('.accordion__content').style.maxHeight = '0';
        }
      });

      item.classList.toggle('active');
      content.style.maxHeight = isActive ? '0' : content.scrollHeight + 'px';
      trigger.setAttribute('aria-expanded', !isActive);
    });
  });
}

/* Cookie banner */
function initCookieBanner() {
  const banner = document.querySelector('.cookie-banner');
  if (!banner) return;
  if (localStorage.getItem('nubevest_cookies')) return;

  setTimeout(() => banner.classList.add('visible'), 2000);

  banner.querySelectorAll('[data-cookie]').forEach(btn => {
    btn.addEventListener('click', () => {
      const choice = btn.dataset.cookie;
      localStorage.setItem('nubevest_cookies', choice);
      banner.classList.remove('visible');
    });
  });
}

/* Form validation */
function initFormValidation() {
  const form = document.querySelector('.contact-form');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let valid = true;

    form.querySelectorAll('[required]').forEach(field => {
      const group = field.closest('.form-group');
      const error = group ? group.querySelector('.form-error') : null;

      if (!field.value.trim()) {
        valid = false;
        field.style.borderColor = 'var(--red)';
        if (error) { error.textContent = 'This field is required.'; error.style.display = 'block'; }
      } else if (field.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value)) {
        valid = false;
        field.style.borderColor = 'var(--red)';
        if (error) { error.textContent = 'Enter a valid email address.'; error.style.display = 'block'; }
      } else {
        field.style.borderColor = '';
        if (error) error.style.display = 'none';
      }
    });

    const consent = form.querySelector('#consent');
    if (consent && !consent.checked) {
      valid = false;
      const err = consent.closest('.form-group')?.querySelector('.form-error');
      if (err) { err.textContent = 'Please accept the Privacy Policy to continue.'; err.style.display = 'block'; }
    }

    if (valid) {
      const successEl = form.querySelector('.form-success');
      const fieldsEl = form.querySelector('.form-fields');
      if (successEl && fieldsEl) {
        fieldsEl.style.display = 'none';
        successEl.style.display = 'block';
      }
    }
  });

  form.querySelectorAll('input, textarea, select').forEach(field => {
    field.addEventListener('input', () => {
      field.style.borderColor = '';
      const error = field.closest('.form-group')?.querySelector('.form-error');
      if (error) error.style.display = 'none';
    });
  });
}

/* Portfolio filters */
function initFilters() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const items = document.querySelectorAll('[data-category]');
  const emptyState = document.querySelector('.empty-state');

  if (!filterBtns.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const cat = btn.dataset.filter;
      let shown = 0;

      items.forEach(item => {
        if (cat === 'all' || item.dataset.category === cat) {
          item.style.display = '';
          shown++;
        } else {
          item.style.display = 'none';
        }
      });

      if (emptyState) emptyState.style.display = shown === 0 ? 'block' : 'none';
    });
  });
}

/* Smooth scroll */
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const target = document.querySelector(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
}

/* Hero animated nodes */
function initHeroNodes() {
  const container = document.querySelector('.hero-nodes');
  if (!container) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const nodes = [
    { x: 20, y: 15, size: 'lg', color: 'blue' },
    { x: 55, y: 10, size: '', color: 'cyan' },
    { x: 80, y: 20, size: '', color: 'blue' },
    { x: 35, y: 35, size: 'lg', color: 'violet' },
    { x: 65, y: 40, size: '', color: 'blue' },
    { x: 90, y: 35, size: 'lg', color: 'cyan' },
    { x: 15, y: 55, size: '', color: 'blue' },
    { x: 45, y: 60, size: 'lg', color: 'blue' },
    { x: 75, y: 55, size: '', color: 'violet' },
    { x: 25, y: 75, size: '', color: 'cyan' },
    { x: 55, y: 80, size: 'lg', color: 'blue' },
    { x: 85, y: 75, size: '', color: 'blue' },
  ];

  const connections = [
    [0, 1], [1, 2], [0, 3], [3, 4], [4, 5],
    [3, 6], [6, 7], [7, 8], [7, 4],
    [6, 9], [9, 10], [10, 11], [8, 11],
  ];

  nodes.forEach((n, i) => {
    const el = document.createElement('div');
    el.className = `node ${n.size ? 'node--' + n.size : ''} ${n.color !== 'blue' ? 'node--' + n.color : ''}`;
    el.style.left = n.x + '%';
    el.style.top = n.y + '%';
    el.style.animationDelay = (i * 0.3) + 's';
    container.appendChild(el);
  });

  connections.forEach(([from, to]) => {
    const line = document.createElement('div');
    line.className = 'node-line';
    const x1 = nodes[from].x, y1 = nodes[from].y;
    const x2 = nodes[to].x, y2 = nodes[to].y;
    const dx = x2 - x1, dy = y2 - y1;
    const length = Math.sqrt(dx * dx + dy * dy);
    const angle = Math.atan2(dy, dx) * 180 / Math.PI;
    line.style.left = x1 + '%';
    line.style.top = y1 + '%';
    line.style.width = length + '%';
    line.style.transform = `rotate(${angle}deg)`;
    line.style.animationDelay = Math.random() * 2 + 's';
    container.appendChild(line);
  });
}
