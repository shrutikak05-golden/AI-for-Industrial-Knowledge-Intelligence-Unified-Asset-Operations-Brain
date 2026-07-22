<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("config/db.php");

$user_id = $_SESSION['user_id'];

// Count only logged-in user's documents
$sql = "SELECT COUNT(*) AS total FROM documents WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalDocuments = $row['total'];
} else {
    $totalDocuments = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard — Strata</title>
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
      <a href="dashboard.php" class="sidebar-link active">
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
      <a href="settings.php" class="sidebar-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
        Settings
      </a>
    </nav>
    <div class="sidebar-foot">
      <div class="user-chip">
        <div style="margin-top:15px;">
    <a href="auth/logout.php" class="btn btn-outline btn-block">
        Logout
    </a>
</div>
        <div class="avatar">
<?php
echo strtoupper(substr($_SESSION['name'],0,1));
?>
</div>
        <div>
          <div class="u-name"><?php echo $_SESSION['name']; ?></div>
         <div class="u-role"><?php echo $_SESSION['role']; ?></div>
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
        <h1>Dashboard</h1>
      </div>
      <div class="topbar-actions">
        <button class="theme-toggle" aria-label="Toggle theme">
          <svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
          <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/></svg>
        </button>
        <button class="icon-btn" aria-label="Notifications">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 01-3.4 0"/></svg>
        </button>
        <div class="avatar" style="cursor:pointer;">SP</div>
      </div>
    </header>

    <main class="main-content">

      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;margin-bottom:24px;">
        <div>
          <h2 style="font-size:20px;">
Welcome back, <?php echo $_SESSION['name']; ?>
</h2>
          <p style="color:var(--text-muted);font-size:14px;margin-top:3px;">Here's what's happening across your knowledge base.</p>
        </div>
        <div style="display:flex;gap:10px;">
          <a href="documents.php" class="btn btn-outline btn-sm">Upload document</a>
          <a href="chat.php" class="btn btn-primary btn-sm">Ask a question</a>
        </div>
      </div>

      <!-- STAT CARDS -->
      <div class="stat-grid">
        <div class="card card-hover stat-card fade-in-up">
          <div class="stat-icon" style="background:var(--primary-light);color:var(--primary-hover);">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6"/></svg>
          </div>
          <div class="stat-value">
<?php echo $totalDocuments; ?>
</div>
          <div class="stat-label">Documents indexed</div>
          <div class="stat-sub">+6 this week</div>
        </div>
        <div class="card card-hover stat-card fade-in-up delay-1">
          <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
          </div>
          <div class="stat-value">1,024</div>
          <div class="stat-label">AI queries (30 days)</div>
          <div class="stat-sub">+18% vs last month</div>
        </div>
        <div class="card card-hover stat-card fade-in-up delay-2">
          <div class="stat-icon" style="background:var(--surface-2);color:var(--text-muted);">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
          </div>
          <div class="stat-value">4.2 GB</div>
          <div class="stat-label">Storage used of 10 GB</div>
          <div style="margin-top:10px;height:6px;border-radius:99px;background:var(--surface-2);overflow:hidden;">
            <div style="height:100%;width:42%;background:var(--accent);border-radius:99px;"></div>
          </div>
        </div>
      </div>

      <div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;" id="dash-grid">
        <!-- ACTIVITY -->
        <div class="card card-pad">
          <div class="section-title-row">
            <h2>Recent activity</h2>
            <a href="documents.php" class="btn btn-ghost btn-sm">View all</a>
          </div>
          <ul class="activity-list">
            <li>
              <div class="activity-icon" style="background:var(--primary-light);color:var(--primary-hover);">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg>
              </div>
              <div><div class="activity-text">Uploaded Turbine Maintenance Manual Rev.4.pdf</div><div class="activity-time">2 hours ago</div></div>
            </li>
            <li>
              <div class="activity-icon" style="background:var(--accent-light);color:var(--accent);">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              </div>
              <div><div class="activity-text">Asked "What's the max vibration threshold for Turbine B?"</div><div class="activity-time">5 hours ago</div></div>
            </li>
            <li>
              <div class="activity-icon" style="background:var(--success-light);color:var(--success);">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
              </div>
              <div><div class="activity-text">Hydraulic Press Wiring Diagram.pdf finished indexing</div><div class="activity-time">1 day ago</div></div>
            </li>
            <li>
              <div class="activity-icon" style="background:var(--danger-light);color:var(--danger);">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6"/></svg>
              </div>
              <div><div class="activity-text">Removed outdated Boiler SOP v1.docx</div><div class="activity-time">1 day ago</div></div>
            </li>
            <li>
              <div class="activity-icon" style="background:var(--accent-light);color:var(--accent);">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              </div>
              <div><div class="activity-text">Asked "Summarize the LOTO procedure for Line 3"</div><div class="activity-time">2 days ago</div></div>
            </li>
          </ul>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="card card-pad">
          <h2 style="font-size:17px;margin-bottom:14px;">Quick actions</h2>
          <div class="quick-actions">
            <a href="documents.php" class="quick-action">
              <div class="qi"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg></div>
              <div><strong>Upload a document</strong><span>Add a manual, SOP, or report</span></div>
            </a>
            <a href="chat.php" class="quick-action">
              <div class="qi"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
              <div><strong>Start a new chat</strong><span>Ask Strata anything</span></div>
            </a>
            <a href="settings.php" class="quick-action">
              <div class="qi"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg></div>
              <div><strong>Manage preferences</strong><span>Theme, profile, notifications</span></div>
            </a>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<style>
  @media (max-width: 900px){ #dash-grid{ grid-template-columns:1fr !important; } }
</style>

<script src="js/script.js"></script>
</body>
</html>
