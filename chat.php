<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ask AI — Strata</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="app-shell">

  <div class="sidebar-overlay" data-close-sidebar></div>

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-head">
      <a href="index.php" class="logo"><span class="logo-mark">S</span> Strata</a>
    </div>
    <nav class="sidebar-nav">
      <a href="dashboard.php" class="sidebar-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
        Dashboard
      </a>
      <a href="chat.php" class="sidebar-link active">
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
        <div class="avatar">SP</div>
        <div>
          <div class="u-name">Shreyas Patil</div>
          <div class="u-role">Process Engineer</div>
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
        <h1>Ask AI</h1>
      </div>
      <div class="topbar-actions">
        <button class="icon-btn menu-btn" data-open-chat-sidebar aria-label="Conversations">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </button>
        <button class="theme-toggle" aria-label="Toggle theme">
          <svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
          <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/></svg>
        </button>
        <div class="avatar">SP</div>
      </div>
    </header>

    <div class="chat-layout">
      <!-- CONVERSATIONS -->
      <aside class="chat-sidebar">
        <button class="btn btn-primary btn-block btn-sm" id="new-chat-btn">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
          New conversation
        </button>
        <div class="mono" style="font-size:11px;color:var(--text-faint);padding:14px 4px 4px;">RECENT</div>
        <div class="convo-item active">Turbine vibration thresholds<div class="c-time">2h ago</div></div>
        <div class="convo-item">SOP for valve lockout<div class="c-time">1d ago</div></div>
        <div class="convo-item">Boiler pressure Q1 anomalies<div class="c-time">3d ago</div></div>
        <div class="convo-item">Conveyor inspection findings<div class="c-time">1w ago</div></div>
      </aside>

      <!-- CHAT MAIN -->
      <div class="chat-main">
        <div class="chat-messages" id="chat-messages">

          <div class="message assistant fade-in">
            <div class="message-avatar">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
            </div>
            <div class="message-bubble">Hi Shreyas — I'm ready to answer questions using your indexed plant documents. Try asking about a manual, SOP, or report.</div>
          </div>

          <div class="message user fade-in">
            <div class="message-bubble">What's the maximum vibration threshold for Turbine B before shutdown?</div>
          </div>

          <div class="message assistant fade-in">
            <div class="message-avatar">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
            </div>
            <div class="message-bubble">
              Per the maintenance manual, Turbine B should be automatically shut down if sustained vibration exceeds 7.1 mm/s RMS on the drive-end bearing, or if any single reading spikes above 11.0 mm/s. Readings between 4.5–7.1 mm/s trigger a maintenance inspection within 48 hours.
              <div class="cite-row">
                <span class="cite-tag">DOC-104 · p.34, §5.2 · 96% match</span>
                <span class="cite-tag">DOC-104 · p.35, Table 5-1 · 91% match</span>
              </div>
            </div>
          </div>

        </div>

        <div class="chat-input-bar">
          <div class="chat-input-inner">
            <button class="icon-btn" style="border:none;background:transparent;" aria-label="Attach file">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48"/></svg>
            </button>
            <textarea id="chat-input" rows="1" placeholder="Ask about a manual, SOP, or report..."></textarea>
            <button class="btn btn-primary btn-sm" id="send-btn">
              Send
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4z"/></svg>
            </button>
          </div>
          <p class="chat-hint">Strata cites sources but can make mistakes. Verify critical procedures.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/script.js"></script>
<script src="js/chat.js"></script>
</body>
</html>
