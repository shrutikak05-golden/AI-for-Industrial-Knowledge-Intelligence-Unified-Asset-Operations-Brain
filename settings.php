<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("config/db.php");

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings — Strata</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="app-shell">

  <div class="sidebar-overlay" data-close-sidebar></div>

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-head">
      <a href="dashboard.php" class="logo"><span class="logo-mark">S</span> Strata</a>
    </div>
    <nav class="sidebar-nav">
      <a href="dashboard.php" class="sidebar-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
        Dashboard
      </a>
      <a href="chat.php" class="sidebar-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        Ask AI
      </a>
      <a href="documents.php" class="sidebar-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6"/></svg>
        Documents
      </a>
      <a href="settings.php" class="sidebar-link active">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
        Settings
      </a>
    </nav>

    <div class="sidebar-foot">
      <div style="margin-bottom:15px;">
    <a href="auth/logout.php" class="btn btn-outline btn-block">
        Logout
    </a>
</div>
      <div class="user-chip">
        <div class="avatar">
<?php echo strtoupper(substr($user['name'],0,1)); ?>
</div>
        <div>
          <div class="u-name">
<?php echo $user['name']; ?>
</div>
          <div class="u-role">
<?php echo $user['role']; ?>
</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main-col">
    <header class="topbar">
      <div style="display:flex;align-items:center;gap:12px;">
        <button class="icon-btn menu-btn" data-open-sidebar aria-label="Open menu">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
        </button>
        <h1>Settings</h1>
      </div>
      <div class="topbar-actions">
        <button class="theme-toggle" aria-label="Toggle theme">
          <svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
          <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/></svg>
        </button>
        <div class="avatar">
<?php echo strtoupper(substr($user['name'],0,1)); ?>
</div>
      </div>
    </header>

    <main class="main-content" style="max-width:760px;">
<?php
if(isset($_GET['updated'])){
    echo "<script>alert('Profile Updated Successfully!');</script>";
}
?>
      <h2 style="font-size:20px;margin-bottom:2px;">Settings</h2>
      <p style="color:var(--text-muted);font-size:14px;margin-bottom:20px;">Manage your profile, appearance, and preferences.</p>

      <div class="tabs">
        <button class="tab-btn active" data-tab="profile">Profile</button>
        <button class="tab-btn" data-tab="appearance">Appearance</button>
        <button class="tab-btn" data-tab="notifications">Notifications</button>
      </div>

      <!-- PROFILE -->
      <div class="tab-panel active card card-pad" id="tab-profile">
        <div class="profile-head">
          <div class="avatar-lg">
<?php echo strtoupper(substr($user['name'],0,1)); ?>
</div>
          <div>
            <button class="btn btn-outline btn-sm">Change photo</button>
            <p style="font-size:12px;color:var(--text-faint);margin-top:6px;">JPG or PNG, max 2MB</p>
          </div>
        </div>
        <form action="settings/updateProfile.php" method="POST">


<div class="form-grid">

<div class="field">
<label>Full Name</label>
<input
type="text"
name="name"
value="<?php echo $user['name']; ?>">
</div>

<div class="field">
<label>Email</label>
<input
type="email"
value="<?php echo $user['email']; ?>"
disabled>
</div>

<div class="field">
<label>Role</label>

<select name="role">

<option value="Process Engineer"
<?php if($user['role']=="Process Engineer") echo "selected"; ?>>
Process Engineer
</option>

<option value="Plant Manager"
<?php if($user['role']=="Plant Manager") echo "selected"; ?>>
Plant Manager
</option>

<option value="Maintenance Technician"
<?php if($user['role']=="Maintenance Technician") echo "selected"; ?>>
Maintenance Technician
</option>

<option value="Safety Officer"
<?php if($user['role']=="Safety Officer") echo "selected"; ?>>
Safety Officer
</option>

<option value="Operations Lead"
<?php if($user['role']=="Operations Lead") echo "selected"; ?>>
Operations Lead
</option>

</select>

</div>

<div class="field">
<label>Organization</label>
<input
type="text"
name="organization"
value="<?php echo $user['organization']; ?>">
</div>

</div>

<div style="display:flex;justify-content:flex-end;">
<button type="submit" class="btn btn-primary">
Save Changes
</button>
</div>

</form>
</div>
      <!-- APPEARANCE -->
      <div class="tab-panel card card-pad" id="tab-appearance">
        <h3 style="font-size:16px;margin-bottom:4px;">Theme</h3>
        <p style="color:var(--text-muted);font-size:13.5px;margin-bottom:16px;">Choose how Strata looks on your device.</p>
        <div class="theme-option-grid">
          <button class="theme-option" data-theme="light" onclick="setTheme('light')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
            <span>Light</span>
          </button>
          <button class="theme-option" data-theme="dark" onclick="setTheme('dark')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/></svg>
            <span>Dark</span>
          </button>
        </div>
        <p class="mono" style="font-size:11.5px;color:var(--text-faint);margin-top:16px;">Your preference is saved automatically on this device.</p>
      </div>

      <!-- NOTIFICATIONS -->
      <div class="tab-panel card card-pad" id="tab-notifications">
        <div class="toggle-row">
          <div><strong>Email notifications</strong><span>Get notified when a document finishes indexing</span></div>
          <button class="switch on" data-toggle></button>
        </div>
        <div class="toggle-row">
          <div><strong>Weekly digest</strong><span>A summary of activity across your workspace</span></div>
          <button class="switch" data-toggle></button>
        </div>
        <div class="toggle-row">
          <div><strong>Indexing alerts</strong><span>Alert me if a document fails to process</span></div>
          <button class="switch on" data-toggle></button>
        </div>
        <div style="display:flex;justify-content:flex-end;margin-top:16px;">
          <button class="btn btn-primary" onclick="showToast('Notification preferences saved')">Save preferences</button>
        </div>
      </div>

    </main>
  </div>
</div>

<script src="js/script.js"></script>
<script src="js/settings.js"></script>
</body>
</html>
