<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log in — Strata</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-wrap">

  <div class="auth-panel">

    <a href="index.php" class="logo">
      <span class="logo-mark">S</span> Strata
    </a>

    <div class="auth-form-wrap">

      <h1>Log in to Strata</h1>
      <p class="sub">Access your plant's knowledge base.</p>

      <form class="auth-form" id="login-form" action="auth/loginProcess.php" method="POST">

        <div class="field">

          <label for="email">Email</label>

          <div class="input-wrap">

            <span class="field-icon">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16v16H4z" opacity="0"/>
                <path d="M22 6l-10 7L2 6"/>
                <path d="M2 6h20v12H2z"/>
              </svg>
            </span>

            <input
              type="email"
              id="email"
              name="email"
              placeholder="Enter your email"
              required>

          </div>

        </div>

        <div class="field">

          <label for="password">Password</label>

          <div class="input-wrap">

            <span class="field-icon">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="10" rx="2"/>
                <path d="M7 11V7a5 5 0 0110 0v4"/>
              </svg>
            </span>

            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              required>

          </div>

        </div>

        <div class="between-row">
          <a href="forgot-password.php">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-primary btn-block" id="login-btn">
          Log in
        </button>

      </form>

      <p class="auth-footer-link">
        Don't have an account?
        <a href="signup.php">Sign up</a>
      </p>

    </div>

    <div class="auth-bottom-bar">

      <span>© 2026 Strata</span>

      <button class="theme-toggle" aria-label="Toggle theme">

        <svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <circle cx="12" cy="12" r="4"/>
          <path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>
        </svg>

        <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/>
        </svg>

      </button>

    </div>

  </div>

  <div class="auth-side">

    <div class="auth-side-content">

      <div class="auth-side-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
        </svg>
      </div>

      <p class="quote">
        "What used to take twenty minutes in the binder now takes ten seconds."
      </p>

      <p class="attr">
        — Plant Operations, Meridian Steelworks
      </p>

    </div>

  </div>

</div>

<script src="js/script.js"></script>

</body>
</html>