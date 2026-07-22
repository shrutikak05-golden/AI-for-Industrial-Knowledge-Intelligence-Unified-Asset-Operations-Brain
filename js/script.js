/* ==========================================================
   Strata — shared JS
   Theme toggle, mobile sidebar, toasts, modal helpers.
   Include this on every page BEFORE any page-specific script.
   ========================================================== */

/* ---------- tiny storage wrapper (falls back gracefully) ---------- */
const store = {
  get(key, fallback) {
    try { const v = localStorage.getItem(key); return v === null ? fallback : v; }
    catch (e) { return fallback; }
  },
  set(key, value) {
    try { localStorage.setItem(key, value); } catch (e) { /* ignore */ }
  }
};

/* ---------- theme ---------- */
function initTheme() {
  const saved = store.get('strata-theme', 'light');
  document.documentElement.setAttribute('data-theme', saved);
  document.querySelectorAll('.theme-toggle').forEach((btn) => {
    btn.addEventListener('click', toggleTheme);
  });
  syncThemeOptionUI(saved);
}

function toggleTheme() {
  const current = document.documentElement.getAttribute('data-theme') || 'light';
  const next = current === 'dark' ? 'light' : 'dark';
  document.documentElement.setAttribute('data-theme', next);
  store.set('strata-theme', next);
  syncThemeOptionUI(next);
}

function setTheme(mode) {
  document.documentElement.setAttribute('data-theme', mode);
  store.set('strata-theme', mode);
  syncThemeOptionUI(mode);
}

function syncThemeOptionUI(mode) {
  document.querySelectorAll('.theme-option').forEach((el) => {
    el.classList.toggle('selected', el.dataset.theme === mode);
  });
}

/* ---------- mobile sidebar ---------- */
function initSidebar() {
  const sidebar = document.querySelector('.sidebar');
  const overlay = document.querySelector('.sidebar-overlay');
  const openBtns = document.querySelectorAll('[data-open-sidebar]');
  const closeBtns = document.querySelectorAll('[data-close-sidebar]');
  if (!sidebar) return;

  const open = () => { sidebar.classList.add('open'); overlay?.classList.add('open'); };
  const close = () => { sidebar.classList.remove('open'); overlay?.classList.remove('open'); };

  openBtns.forEach((b) => b.addEventListener('click', open));
  closeBtns.forEach((b) => b.addEventListener('click', close));
  overlay?.addEventListener('click', close);
}

/* ---------- chat mobile sidebar (separate class name) ---------- */
function initChatSidebar() {
  const sidebar = document.querySelector('.chat-sidebar');
  const openBtns = document.querySelectorAll('[data-open-chat-sidebar]');
  if (!sidebar) return;
  openBtns.forEach((b) => b.addEventListener('click', () => sidebar.classList.toggle('open')));
}

/* ---------- toast ---------- */
function ensureToastContainer() {
  let c = document.querySelector('.toast-container');
  if (!c) {
    c = document.createElement('div');
    c.className = 'toast-container';
    document.body.appendChild(c);
  }
  return c;
}

function showToast(message, type = 'success') {
  const container = ensureToastContainer();
  const toast = document.createElement('div');
  toast.className = `toast ${type}`;
  const icon = type === 'error'
    ? '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M18 6L6 18M6 6l12 12"/></svg>'
    : '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>';
  toast.innerHTML = `<span class="t-icon">${icon}</span><span>${message}</span>`;
  container.appendChild(toast);
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transition = 'opacity .2s ease';
    setTimeout(() => toast.remove(), 200);
  }, 3000);
}

/* ---------- modal helpers ---------- */
function openModal(id) { document.getElementById(id)?.classList.add('open'); }
function closeModal(id) { document.getElementById(id)?.classList.remove('open'); }

/* ---------- fade-in on scroll (very light) ---------- */
function initFadeIn() {
  const items = document.querySelectorAll('.fade-in-up');
  if (!('IntersectionObserver' in window) || items.length === 0) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.animationPlayState = 'running';
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  items.forEach((el) => io.observe(el));
}

/* ---------- user menu dropdown (topbar avatar) ---------- */
function initUserMenu() {
  const trigger = document.querySelector('[data-user-menu-trigger]');
  const menu = document.querySelector('[data-user-menu]');
  if (!trigger || !menu) return;
  trigger.addEventListener('click', (e) => {
    e.stopPropagation();
    menu.classList.toggle('open');
  });
  document.addEventListener('click', () => menu.classList.remove('open'));
}

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  initSidebar();
  initChatSidebar();
  initFadeIn();
  initUserMenu();

  // close any open modal when clicking its overlay
  document.querySelectorAll('.modal-overlay').forEach((overlay) => {
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) overlay.classList.remove('open');
    });
  });
});
