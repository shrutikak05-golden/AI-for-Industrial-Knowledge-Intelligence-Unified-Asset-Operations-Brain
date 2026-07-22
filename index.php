<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Strata — Industrial Knowledge Platform</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <div class="container navbar-inner">
    <a href="index.php" class="logo">
      <span class="logo-mark">S</span> Strata
    </a>
    <nav class="nav-links">
      <a href="#features">Features</a>
      <a href="#how">How it works</a>
      <a href="#footer">Contact</a>
    </nav>
    <div class="nav-actions">
      <button class="theme-toggle" aria-label="Toggle theme">
        <svg class="icon-sun" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
        <svg class="icon-moon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z"/></svg>
      </button>
      <a href="login.php" class="btn btn-ghost btn-sm">Log in</a>
      <a href="signup.php" class="btn btn-primary btn-sm">Get started</a>
    </div>
  </div>
</header>

<!-- HERO -->
<section class="hero">
  <div class="container">
    <div class="hero-badge"><span class="hero-dot"></span> 128 documents indexed</div>
    <h1>Every manual, SOP, and report — <span>answered on the spot.</span></h1>
    <p>Strata reads your plant's documentation — manuals, SOPs, inspection reports, wiring diagrams — and answers technician questions instantly, citing the exact source.</p>
    <div class="hero-actions">
      <a href="signup.php" class="btn btn-primary">
        Get started free
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
      <a href="login.php" class="btn btn-outline">See a live demo</a>
    </div>

    <div class="card fade-in-up" style="margin-top:60px; max-width:600px; margin-left:auto; margin-right:auto; text-align:left; padding:20px; box-shadow:var(--shadow-lg);">
      <div style="display:flex;align-items:center;gap:8px;font-size:12px;color:var(--text-faint);font-family:'JetBrains Mono',monospace;margin-bottom:14px;">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21l1.9-5.7A8 8 0 113 12"/></svg>
        ASK STRATA
      </div>
      <div style="display:flex;justify-content:flex-end;margin-bottom:10px;">
        <div style="background:var(--text);color:var(--bg);padding:10px 14px;border-radius:14px 14px 4px 14px;font-size:13.5px;max-width:80%;">
          Max vibration threshold for Turbine B before shutdown?
        </div>
      </div>
      <div style="display:flex;justify-content:flex-start;">
        <div style="background:var(--surface-2);border:1px solid var(--border);padding:12px 14px;border-radius:14px 14px 14px 4px;font-size:13.5px;max-width:85%;">
          Automatic shutdown triggers above <strong>7.1&nbsp;mm/s RMS</strong> on the drive-end bearing.
          <div class="cite-row">
            <span class="cite-tag">DOC-104 · p.34 · 96% match</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TRUST BAR -->
<div class="trust-bar">
  <div class="container">
    <span>Meridian Steelworks</span><span>Orion Chemical</span><span>Northgate Manufacturing</span><span>Vale Energy</span><span>Continental Foundry</span>
  </div>
</div>

<!-- FEATURES -->
<section class="section" id="features">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">CAPABILITIES</span>
      <h2>Built for how the plant floor actually works</h2>
    </div>
    <div class="feature-grid">
      <div class="card card-hover feature-card fade-in-up">
        <div class="feature-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <h3>Instant, cited answers</h3>
        <p>Ask a question in plain language and get an answer sourced directly from your manuals — with the page and confidence score attached.</p>
      </div>
      <div class="card card-hover feature-card fade-in-up delay-1">
        <div class="feature-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><path d="M3.27 6.96L12 12.01l8.73-5.05M12 22.08V12"/></svg>
        </div>
        <h3>Any format, one index</h3>
        <p>PDFs, scanned SOPs, spreadsheets, and photos of nameplates all get parsed into a single searchable knowledge base.</p>
      </div>
      <div class="card card-hover feature-card fade-in-up delay-2">
        <div class="feature-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <h3>Built for uptime</h3>
        <p>Surface the exact torque spec or shutdown threshold in seconds, not the twenty minutes it takes to find the binder.</p>
      </div>
      <div class="card card-hover feature-card fade-in-up">
        <div class="feature-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>Enterprise-grade security</h3>
        <p>Role-based access, audit trails, and on-prem deployment options keep proprietary procedures where they belong.</p>
      </div>
      <div class="card card-hover feature-card fade-in-up delay-1">
        <div class="feature-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
        </div>
        <h3>Built for shift teams</h3>
        <p>Shared workspaces mean the answer one technician finds is there for the next shift too.</p>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="section" id="how" style="background:var(--surface-2); border-top:1px solid var(--border); border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">PROCESS</span>
      <h2>Three steps from binder to answer</h2>
    </div>
    <div class="feature-grid">
      <div class="fade-in-up">
        <div class="mono" style="font-size:12px;color:var(--text-faint);margin-bottom:10px;">01</div>
        <div class="feature-icon" style="background:var(--surface);border:1px solid var(--border);">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg>
        </div>
        <h3>Upload documentation</h3>
        <p style="color:var(--text-muted);font-size:14px;margin-top:8px;line-height:1.6;">Drag in manuals, SOPs, reports, or scanned images. Strata parses and indexes them automatically.</p>
      </div>
      <div class="fade-in-up delay-1">
        <div class="mono" style="font-size:12px;color:var(--text-faint);margin-bottom:10px;">02</div>
        <div class="feature-icon" style="background:var(--surface);border:1px solid var(--border);">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <h3>Ask in plain language</h3>
        <p style="color:var(--text-muted);font-size:14px;margin-top:8px;line-height:1.6;">Technicians ask questions the way they'd ask a colleague — no keyword search required.</p>
      </div>
      <div class="fade-in-up delay-2">
        <div class="mono" style="font-size:12px;color:var(--text-faint);margin-bottom:10px;">03</div>
        <div class="feature-icon" style="background:var(--surface);border:1px solid var(--border);">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
        </div>
        <h3>Get a cited answer</h3>
        <p style="color:var(--text-muted);font-size:14px;margin-top:8px;line-height:1.6;">Every response links back to the exact document and page it came from, with a confidence score.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <h2>Stop hunting through binders.</h2>
    <p>Set up your first knowledge base in under five minutes.</p>
    <div class="hero-actions">
      <a href="signup.php" class="btn btn-primary">Create free account</a>
      <a href="login.php" class="btn btn-outline">Log in</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="site-footer" id="footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <a href="index.php" class="logo"><span class="logo-mark">S</span> Strata</a>
        <p>Turn every manual, SOP, and report on the plant floor into instant, cited answers.</p>
      </div>
      <div>
        <h4>Product</h4>
        <ul><li>Features</li><li>How it works</li><li>Security</li></ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul><li>About</li><li>Contact</li><li>Careers</li></ul>
      </div>
    </div>
    <div class="footer-bottom">© 2026 Strata Industrial AI. Built for the plant floor.</div>
  </div>
</footer>

<script src="js/script.js"></script>
</body>
</html>
