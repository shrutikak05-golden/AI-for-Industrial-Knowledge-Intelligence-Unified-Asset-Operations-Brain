<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign up — Strata</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-wrap">
  <div class="auth-panel">

    <a href="index.php" class="logo">
      <span class="logo-mark">S</span> Strata
    </a>

    <div class="auth-form-wrap">

      <h1>Create your account</h1>
      <p class="sub">Start indexing your plant's documentation.</p>

      <form class="auth-form" id="signup-form" action="auth/signupProcess.php" method="POST">

        <div class="field">
          <label for="name">Full Name</label>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter your full name"
            required>
        </div>

        <div class="field">
          <label for="email">Work Email</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            required>
        </div>

        <div class="field">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Create a password"
            required>
        </div>

        <button type="submit" class="btn btn-primary btn-block" id="signup-btn">
          Create Account
        </button>

      </form>

      <p class="auth-footer-link">
        Already have an account?
        <a href="login.php">Log in</a>
      </p>

    </div>

    <div class="auth-bottom-bar">
      <span>© 2026 Strata</span>

      <button class="theme-toggle" aria-label="Toggle theme">
        <svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="4"/>
          <path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>
        </svg>

        <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/>
        </svg>
      </button>

    </div>

  </div>

  <div class="auth-side">

    <div class="auth-side-content">

      <div class="auth-side-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
          <circle cx="9" cy="7" r="4"/>
          <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
        </svg>
      </div>

      <p class="quote">
        "Onboarding a new hire used to take a week of shadowing. Now they ask Strata."
      </p>

      <p class="attr">
        — Maintenance Lead, Northgate Manufacturing
      </p>

    </div>

  </div>

</div>

<script src="js/script.js"></script>

</body>
</html>