<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Set up your profile — Strata</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-wrap">

  <div class="auth-panel">

    <a href="index.php" class="logo">
      <span class="logo-mark">S</span> Strata
    </a>

    <div class="auth-form-wrap">

      <div style="display:flex;gap:8px;margin-bottom:22px;">
        <div style="height:6px;flex:1;border-radius:99px;background:var(--primary);"></div>
        <div style="height:6px;flex:1;border-radius:99px;background:var(--primary);"></div>
      </div>

      <h1>Set up your profile</h1>
      <p class="sub">Last step — tell us a bit about your role.</p>

      <form class="auth-form" action="auth/profileProcess.php" method="POST">

        <div style="display:flex;justify-content:center;margin-bottom:8px;">
          <div class="avatar-lg">SP</div>
        </div>

        <div class="field">
          <label for="name">Full Name</label>
          <input
              type="text"
              id="name"
              value="<?php echo $_SESSION['name']; ?>"
              readonly>
        </div>

        <div class="field">
          <label for="org">Organization</label>
          <input
              type="text"
              id="org"
              name="organization"
              placeholder="Enter Organization"
              required>
        </div>

        <div class="field">
          <label for="role">Role</label>

          <select id="role" name="role" required>
              <option value="">Select Role</option>
              <option value="Process Engineer">Process Engineer</option>
              <option value="Plant Manager">Plant Manager</option>
              <option value="Maintenance Technician">Maintenance Technician</option>
              <option value="Safety Officer">Safety Officer</option>
              <option value="Operations Lead">Operations Lead</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
          Finish Setup

          <svg width="15" height="15"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2.5"
          stroke-linecap="round"
          stroke-linejoin="round">

          <path d="M5 12h14M13 6l6 6-6 6"/>

          </svg>

        </button>

      </form>

    </div>

    <div class="auth-bottom-bar">

      <span>© 2026 Strata</span>

      <button class="theme-toggle" aria-label="Toggle theme">

        <svg class="icon-sun" width="16" height="16"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round">

        <circle cx="12" cy="12" r="4"/>

        <path d="M12 2v2
                 M12 20v2
                 M4.9 4.9l1.4 1.4
                 M17.7 17.7l1.4 1.4
                 M2 12h2
                 M20 12h2
                 M4.9 19.1l1.4-1.4
                 M17.7 6.3l1.4-1.4"/>

        </svg>

        <svg class="icon-moon"
        width="16"
        height="16"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2">

        <path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/>

        </svg>

      </button>

    </div>

  </div>

  <div class="auth-side">

    <div class="auth-side-content">

      <div class="auth-side-icon">

        <svg width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2">

        <path d="M14.7 6.3
                 l3.76-3.76
                 a6 6 0 01-7.94 7.94
                 l-6.91 6.91
                 a2.12 2.12 0 01-3-3
                 l6.91-6.91
                 a6 6 0 017.94-7.94z"/>

        </svg>

      </div>

      <p class="quote">
        "Set up once, and every new hire on the line has the same answers."
      </p>

      <p class="attr">
        — Plant Manager, Continental Foundry
      </p>

    </div>

  </div>

</div>

<script src="js/script.js"></script>

</body>
</html>