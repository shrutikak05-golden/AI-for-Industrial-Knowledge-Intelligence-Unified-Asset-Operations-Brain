<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset password — Strata</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-wrap">
  <div class="auth-panel">
    <a href="index.php" class="logo"><span class="logo-mark">S</span> Strata</a>

    <div class="auth-form-wrap">
      <a href="login.php" class="btn btn-ghost btn-sm" style="padding-left:0;margin-bottom:18px;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Back to log in
      </a>

      <div id="request-view">
        <h1>Reset your password</h1>
        <p class="sub">We'll email you a link to reset it.</p>
        <form class="auth-form" id="forgot-form">
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" value="shreyas.patil@example.com" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Send reset link</button>
        </form>
      </div>

      <div id="sent-view" style="display:none;text-align:center;padding:20px 0;">
        <div style="width:48px;height:48px;border-radius:50%;background:var(--success-light);color:var(--success);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
        </div>
        <h2 style="font-size:18px;">Check your inbox</h2>
        <p class="sub" style="margin-top:8px;">We sent a reset link to shreyas.patil@example.com.</p>
        <a href="login.php" class="btn btn-outline btn-block" style="margin-top:22px;">Back to log in</a>
      </div>
    </div>

    <div class="auth-bottom-bar">
      <span>© 2026 Strata</span>
      <button class="theme-toggle" aria-label="Toggle theme">
        <svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
        <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/></svg>
      </button>
    </div>
  </div>

  <div class="auth-side">
    <div class="auth-side-content">
      <div class="auth-side-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
      </div>
      <p class="quote">"Access control that doesn't get in the way of a technician mid-shift."</p>
      <p class="attr">— IT Security, Vale Energy</p>
    </div>
  </div>
</div>

<script src="js/script.js"></script>
<script>
  document.getElementById('forgot-form').addEventListener('submit', function (e) {
    e.preventDefault();
    document.getElementById('request-view').style.display = 'none';
    document.getElementById('sent-view').style.display = 'block';
  });
</script>
</body>
</html>
