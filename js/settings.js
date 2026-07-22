/* ==========================================================
   Strata — settings page logic: tabs + toggle switches
   ========================================================== */

document.querySelectorAll('.tab-btn').forEach((btn) => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.tab-btn').forEach((b) => b.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach((p) => p.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById(`tab-${btn.dataset.tab}`).classList.add('active');
  });
});

document.querySelectorAll('[data-toggle]').forEach((sw) => {
  sw.addEventListener('click', () => sw.classList.toggle('on'));
});

// keep the theme-option cards in sync with the current theme on load
document.addEventListener('DOMContentLoaded', () => {
  const current = document.documentElement.getAttribute('data-theme') || 'light';
  document.querySelectorAll('.theme-option').forEach((el) => {
    el.classList.toggle('selected', el.dataset.theme === current);
  });
});
