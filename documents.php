<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Documents — Strata</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="app-shell">

<div class="sidebar-overlay" data-close-sidebar></div>

<!-- SIDEBAR -->
<aside class="sidebar">

<div class="sidebar-head">
<a href="dashboard.php" class="logo">
<span class="logo-mark">S</span> Strata
</a>
</div>

<nav class="sidebar-nav">

<a href="dashboard.php" class="sidebar-link">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<rect x="3" y="3" width="7" height="9"/>
<rect x="14" y="3" width="7" height="5"/>
<rect x="14" y="12" width="7" height="9"/>
<rect x="3" y="16" width="7" height="5"/>
</svg>
Dashboard
</a>

<a href="chat.php" class="sidebar-link">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
</svg>
Ask AI
</a>

<a href="documents.php" class="sidebar-link active">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
<path d="M14 2v6h6"/>
</svg>
Documents
</a>

<a href="settings.php" class="sidebar-link">
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<circle cx="12" cy="12" r="3"/>
<path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
</svg>
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
<?php
echo strtoupper(substr($_SESSION['name'],0,1));
?>
</div>

<div>
<div class="u-name">
<?php echo $_SESSION['name']; ?>
</div>

<div class="u-role">
<?php echo $_SESSION['role']; ?>
</div>
</div>

</div>
</div>

</aside>

<!-- MAIN -->

<div class="main-col">

<header class="topbar">

<div style="display:flex;align-items:center;gap:12px;">

<button class="icon-btn menu-btn" data-open-sidebar>

<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

<path d="M3 12h18M3 6h18M3 18h18"/>

</svg>

</button>

<h1>Documents</h1>

</div>

<div class="topbar-actions">

<button class="theme-toggle">

<svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

<circle cx="12" cy="12" r="4"/>

<path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>

</svg>

<svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

<path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/>

</svg>

</button>

<div class="avatar">
<?php
echo strtoupper(substr($_SESSION['name'],0,1));
?>
</div>

</div>

</header>

<main class="main-content">

<div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;margin-bottom:20px;">

<div>

<h2 style="font-size:20px;">
Documents
</h2>

<p style="color:var(--text-muted);font-size:14px;margin-top:3px;">
Manage all your uploaded files.
</p>

</div>

<form action="document/upload.php" method="POST" enctype="multipart/form-data">

<input
type="file"
name="document"
required>

<button type="submit" class="btn btn-primary">

<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

<path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/>

</svg>

Upload

</button>

</form>

</div>

<!-- DOCUMENT TABLE -->

<div class="card" style="overflow-x:auto;">

<table class="doc-table">

<thead>

<tr>
<th>Document Name</th>
<th>Size</th>
<th>Uploaded</th>
<th>Status</th>
<th>Actions</th>
</tr>

</thead>

<tbody>

<?php

$user = $_SESSION['user_id'];

$sql = "SELECT * FROM documents
        WHERE user_id='$user'
        ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td>

<strong>

<?php echo $row['file_name']; ?>

</strong>

</td>

<td>

<?php

echo round($row['file_size']/1024,2);

?> KB

</td>

<td>

<?php echo $row['uploaded_at']; ?>

</td>

<td>

<span style="color:green;">
Uploaded
</span>

</td>

<td>

<a
href="document/download.php?id=<?php echo $row['id']; ?>"
class="btn btn-outline btn-sm">

Download

</a>

<a
href="document/delete.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this document?')">

Delete

</a>

</td>

</tr>

<?php

}

}
else
{

?>

<tr>

<td colspan="5" style="text-align:center;padding:40px;">

<h3>No Documents Found</h3>

<p>
Upload your first document.
</p>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

<br>

<div class="card">

<h3>Quick Information</h3>

<br>

<p>

Logged in as

<strong>

<?php echo $_SESSION['name']; ?>

</strong>

</p>

<br>

<p>

Role :

<strong>

<?php echo $_SESSION['role']; ?>

</strong>

</p>

<br>

<p>

Organization :

<strong>

<?php

if(isset($_SESSION['organization']))
echo $_SESSION['organization'];
else
echo "Not Available";

?>

</strong>

</p>

</div>

      <!-- DELETE CONFIRM MODAL -->
      <div class="modal-overlay" id="delete-modal">
        <div class="modal-box">
          <div class="modal-head">
            <h3>Delete Document</h3>
          </div>

          <div class="modal-body">
            Are you sure you want to delete
            <strong id="delete-doc-name"></strong> ?
          </div>

          <div class="modal-foot">
            <button class="btn btn-outline" onclick="closeModal('delete-modal')">
              Cancel
            </button>

            <button class="btn btn-danger" id="confirm-delete-btn">
              Delete
            </button>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<style>
@media (max-width:900px){
    .doc-table{
        min-width:700px;
    }
}
</style>

<script src="js/script.js"></script>
<script src="js/documents.js"></script>

</body>
</html>