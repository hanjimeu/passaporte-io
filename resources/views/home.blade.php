<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Passaporte.io</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --white: #ffffff;
    --bg: #f9f7fc;
    --border: rgba(0,0,0,0.08);
    --border-md: rgba(0,0,0,0.12);
    --text: #1a1a2e;
    --muted: #6b6b80;
    --hint: #9b9baf;
    --radius-sm: 8px;
    --radius-md: 10px;
    --radius-lg: 14px;

    /* Twilight Sparkle — roxo pastel */
    --tw-50:  #f3eafc;
    --tw-100: #e8d5f9;
    --tw-300: #c9a8e0;
    --tw-500: #9b6cc4;
    --tw-700: #6b3a8f;

    /* Pinkie Pie — rosa pastel */
    --pp-50:  #fdf0f6;
    --pp-100: #fde0ee;
    --pp-300: #f5b8d4;
    --pp-500: #e070a0;
    --pp-700: #a04070;

    /* Rainbow Dash — azul pastel */
    --rd-50:  #edf6fd;
    --rd-100: #daeef9;
    --rd-300: #a8d6ef;
    --rd-500: #50a8d8;
    --rd-700: #1a6a96;

    /* Fluttershy — amarelo pastel */
    --fs-50:  #fffbec;
    --fs-100: #fef5d8;
    --fs-300: #f0df98;
    --fs-500: #d4b020;
    --fs-700: #8a6a00;

    /* Applejack — laranja pastel */
    --aj-50:  #fff5e8;
    --aj-100: #feebd0;
    --aj-300: #f8c888;
    --aj-500: #e89030;
    --aj-700: #a05a00;

    /* Rarity — azul claro pastel */
    --ra-50:  #eaf2fb;
    --ra-100: #d4e6f5;
    --ra-300: #9cc4e8;
    --ra-500: #5090c8;
    --ra-700: #1a5080;
  }

  body {
    font-family: 'Inter', sans-serif;
    background: var(--bg);
    color: var(--text);
    font-size: 14px;
    line-height: 1.5;
    min-height: 100vh;
  }

  /* ===================== NAVBAR ===================== */
  .navbar {
    background: var(--white);
    border-bottom: 0.5px solid var(--border);
    height: 56px;
    display: flex;
    align-items: center;
    padding: 0 24px;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 100;
  }
  .navbar-logo {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 15px;
    font-weight: 600;
    color: var(--text);
    text-decoration: none;
  }
  .logo-gem {
    width: 22px;
    height: 22px;
    background: var(--tw-100);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 0.5px solid var(--tw-300);
  }
  .logo-gem i { font-size: 13px; color: var(--tw-700); }
  .navbar-links {
    display: flex;
    align-items: center;
    gap: 4px;
  }
  .nav-link {
    font-size: 13px;
    color: var(--muted);
    padding: 6px 12px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    text-decoration: none;
    border: none;
    background: none;
    transition: background 0.15s, color 0.15s;
  }
  .nav-link:hover { background: var(--bg); color: var(--text); }
  .nav-link.active { color: var(--tw-700); background: var(--tw-50); }
  .btn-nav-outline {
    font-size: 13px;
    padding: 6px 14px;
    border-radius: var(--radius-sm);
    border: 0.5px solid var(--border-md);
    background: var(--white);
    color: var(--text);
    cursor: pointer;
    font-weight: 500;
    transition: background 0.15s;
  }
  .btn-nav-outline:hover { background: var(--bg); }
  .btn-nav-primary {
    font-size: 13px;
    padding: 6px 16px;
    border-radius: var(--radius-sm);
    border: none;
    background: var(--tw-100);
    color: var(--tw-700);
    cursor: pointer;
    font-weight: 600;
    transition: background 0.15s;
  }
  .btn-nav-primary:hover { background: var(--tw-300); }

  /* ===================== LAYOUT ===================== */
  .page { display: none; }
  .page.active { display: block; }

  .container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 24px;
  }

  /* ===================== HERO ===================== */
  .hero {
    background: var(--white);
    border-bottom: 0.5px solid var(--border);
    padding: 48px 24px 40px;
  }
  .hero-inner { max-width: 1100px; margin: 0 auto; }
  .hero-eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    color: var(--tw-500);
    margin-bottom: 10px;
  }
  .hero-title {
    font-size: 30px;
    font-weight: 600;
    color: var(--text);
    line-height: 1.25;
    margin-bottom: 10px;
  }
  .hero-sub {
    font-size: 14px;
    color: var(--muted);
    margin-bottom: 22px;
    max-width: 420px;
  }
  .hero-actions { display: flex; gap: 10px; flex-wrap: wrap; }
  .btn {
    padding: 9px 20px;
    border-radius: var(--radius-sm);
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: opacity 0.15s;
  }
  .btn:hover { opacity: 0.85; }
  .btn-purple { background: var(--tw-100); color: var(--tw-700); }
  .btn-pink   { background: var(--pp-100); color: var(--pp-700); }
  .btn-blue   { background: var(--rd-100); color: var(--rd-700); }
  .btn-yellow { background: var(--fs-100); color: var(--fs-700); }
  .btn-green  { background: #e2f4e6; color: #2a7040; }

  /* ===================== FILTER BAR ===================== */
  .filter-bar {
    background: var(--white);
    border-bottom: 0.5px solid var(--border);
    padding: 12px 24px;
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
  }
  .filter-label {
    font-size: 11px;
    font-weight: 500;
    color: var(--hint);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-right: 4px;
  }
  .pill {
    padding: 5px 13px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    border: 0.5px solid;
    transition: all 0.15s;
  }
  .pill-purple { background: var(--tw-50);  border-color: var(--tw-300); color: var(--tw-700); }
  .pill-pink   { background: var(--pp-50);  border-color: var(--pp-300); color: var(--pp-700); }
  .pill-blue   { background: var(--rd-50);  border-color: var(--rd-300); color: var(--rd-700); }
  .pill-yellow { background: var(--fs-50);  border-color: var(--fs-300); color: var(--fs-700); }
  .pill-green  { background: #e2f4e6; border-color: #b0ddb8; color: #2a7040; }
  .pill-orange { background: var(--aj-50);  border-color: var(--aj-300); color: var(--aj-700); }
  .pill-outline { background: transparent; border-color: var(--border-md); color: var(--muted); }
  .pill-outline:hover { background: var(--bg); }

  /* ===================== GRID DE EVENTOS ===================== */
  .events-section { padding: 28px 24px; max-width: 1100px; margin: 0 auto; }
  .section-label {
    font-size: 11px;
    font-weight: 600;
    color: var(--hint);
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 16px;
  }
  .events-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }
  @media (max-width: 860px) { .events-grid { grid-template-columns: repeat(2,1fr); } }
  @media (max-width: 560px) { .events-grid { grid-template-columns: 1fr; } }

  .event-card {
    background: var(--white);
    border: 0.5px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    transition: box-shadow 0.2s;
    cursor: pointer;
  }
  .event-card:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.07); }

  .card-banner {
    height: 96px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .card-banner i { font-size: 36px; }
  .banner-twilight   { background: var(--tw-50); }
  .banner-pinkie     { background: var(--pp-50); }
  .banner-rainbow    { background: var(--rd-50); }
  .banner-flutter    { background: var(--fs-50); }
  .banner-applejack  { background: var(--aj-50); }
  .banner-rarity     { background: var(--ra-50); }

  .card-body { padding: 14px; }
  .card-cat {
    display: inline-block;
    font-size: 10px;
    font-weight: 600;
    padding: 3px 9px;
    border-radius: 50px;
    margin-bottom: 8px;
  }
  .cat-purple { background: var(--tw-100); color: var(--tw-700); }
  .cat-pink   { background: var(--pp-100); color: var(--pp-700); }
  .cat-blue   { background: var(--rd-100); color: var(--rd-700); }
  .cat-yellow { background: var(--fs-100); color: var(--fs-700); }
  .cat-orange { background: var(--aj-100); color: var(--aj-700); }
  .cat-raBlue { background: var(--ra-100); color: var(--ra-700); }

  .card-title {
    font-size: 13px;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 6px;
    line-height: 1.4;
  }
  .card-meta {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    color: var(--muted);
    margin-bottom: 3px;
  }
  .card-meta i { font-size: 13px; }
  .card-spots {
    font-size: 12px;
    font-weight: 500;
    margin: 8px 0 10px;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .spots-ok   { color: #2a7040; }
  .spots-low  { color: var(--aj-700); }
  .spots-full { color: #a03030; }

  .card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 0.5px solid var(--border);
  }
  .card-org { font-size: 11px; color: var(--hint); }
  .card-cta {
    font-size: 11px;
    font-weight: 500;
    padding: 5px 12px;
    border-radius: var(--radius-sm);
    border: none;
    cursor: pointer;
    transition: opacity 0.15s;
  }
  .card-cta:hover { opacity: 0.8; }
  .cta-purple { background: var(--tw-100); color: var(--tw-700); }
  .cta-pink   { background: var(--pp-100); color: var(--pp-700); }
  .cta-blue   { background: var(--rd-100); color: var(--rd-700); }
  .cta-yellow { background: var(--fs-100); color: var(--fs-700); }
  .cta-orange { background: var(--aj-100); color: var(--aj-700); }
  .cta-raBlue { background: var(--ra-100); color: var(--ra-700); }

  /* ===================== PAGINAÇÃO ===================== */
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    padding: 20px 0 32px;
  }
  .pag-btn {
    width: 34px;
    height: 34px;
    border-radius: var(--radius-sm);
    border: 0.5px solid var(--border-md);
    background: var(--white);
    font-size: 13px;
    color: var(--muted);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.15s;
  }
  .pag-btn:hover { background: var(--bg); }
  .pag-btn.active { background: var(--tw-100); border-color: var(--tw-300); color: var(--tw-700); font-weight: 600; }

  /* ===================== DETALHE DO EVENTO ===================== */
  .detail-page { max-width: 1100px; margin: 0 auto; padding: 28px 24px; }
  .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: var(--muted);
    cursor: pointer;
    margin-bottom: 20px;
    background: none;
    border: none;
    padding: 0;
  }
  .back-btn:hover { color: var(--text); }

  .detail-layout { display: grid; grid-template-columns: 1fr 300px; gap: 24px; }
  @media (max-width: 720px) { .detail-layout { grid-template-columns: 1fr; } }

  .detail-main {
    background: var(--white);
    border: 0.5px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
  }
  .detail-banner-big {
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--tw-50);
  }
  .detail-banner-big i { font-size: 52px; color: var(--tw-300); }
  .detail-content { padding: 20px; }
  .detail-tag {
    display: inline-block;
    font-size: 10px;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 50px;
    background: var(--tw-100);
    color: var(--tw-700);
    margin-bottom: 10px;
  }
  .detail-title {
    font-size: 20px;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 10px;
    line-height: 1.3;
  }
  .detail-meta {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: var(--muted);
    margin-bottom: 6px;
  }
  .detail-meta i { font-size: 15px; }
  .detail-desc {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.7;
    margin-top: 16px;
    padding-top: 16px;
    border-top: 0.5px solid var(--border);
  }

  .detail-sidebar {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }
  .sidebar-card {
    background: var(--white);
    border: 0.5px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 16px;
  }
  .sidebar-label {
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--hint);
    margin-bottom: 6px;
  }
  .sidebar-value {
    font-size: 14px;
    font-weight: 500;
    color: var(--text);
    margin-bottom: 2px;
  }
  .sidebar-sub { font-size: 12px; color: var(--muted); }

  .spots-bar-wrap { margin: 8px 0 4px; }
  .spots-bar {
    height: 6px;
    background: var(--tw-50);
    border-radius: 3px;
    overflow: hidden;
  }
  .spots-fill { height: 100%; background: var(--tw-300); border-radius: 3px; }

  .register-btn {
    width: 100%;
    padding: 11px;
    border-radius: var(--radius-md);
    border: none;
    background: var(--tw-100);
    color: var(--tw-700);
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background 0.15s;
  }
  .register-btn:hover { background: var(--tw-300); }

  /* ===================== INGRESSOS ===================== */
  .tickets-page { max-width: 800px; margin: 0 auto; padding: 28px 24px; }
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    margin-bottom: 20px;
  }
  .page-title { font-size: 18px; font-weight: 600; color: var(--text); }
  .page-action { font-size: 13px; color: var(--tw-700); cursor: pointer; }
  .page-action:hover { text-decoration: underline; }

  .ticket-card {
    background: var(--white);
    border: 0.5px solid var(--border);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 16px;
    margin-bottom: 10px;
    transition: box-shadow 0.15s;
  }
  .ticket-card:hover { box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
  .ticket-stripe { width: 4px; border-radius: 2px; align-self: stretch; flex-shrink: 0; }
  .ts-purple { background: var(--tw-300); }
  .ts-pink   { background: var(--pp-300); }
  .ts-blue   { background: var(--rd-300); }
  .ticket-info { flex: 1; min-width: 0; }
  .ticket-name { font-size: 14px; font-weight: 500; color: var(--text); }
  .ticket-date { font-size: 12px; color: var(--muted); margin-top: 3px; display: flex; align-items: center; gap: 5px; }
  .ticket-code {
    font-size: 12px;
    font-weight: 600;
    padding: 4px 11px;
    border-radius: 50px;
    font-family: 'Courier New', monospace;
    letter-spacing: 0.05em;
    flex-shrink: 0;
  }
  .tc-purple { background: var(--tw-100); color: var(--tw-700); }
  .tc-pink   { background: var(--pp-100); color: var(--pp-700); }
  .tc-blue   { background: var(--rd-100); color: var(--rd-700); }
  .cancel-btn {
    font-size: 12px;
    color: var(--muted);
    cursor: pointer;
    padding: 5px 10px;
    border-radius: var(--radius-sm);
    border: none;
    background: none;
    flex-shrink: 0;
    transition: background 0.15s;
  }
  .cancel-btn:hover { background: #fde8e8; color: #a03030; }

  /* ===================== PAINEL ORGANIZADOR ===================== */
  .organizer-page { max-width: 1000px; margin: 0 auto; padding: 28px 24px; }
  .stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 24px;
  }
  .stat-card {
    background: var(--white);
    border: 0.5px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 16px;
  }
  .stat-label { font-size: 11px; color: var(--hint); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 500; }
  .stat-value { font-size: 24px; font-weight: 600; color: var(--text); }
  .stat-sub { font-size: 12px; color: var(--muted); margin-top: 3px; }

  .panel-card {
    background: var(--white);
    border: 0.5px solid var(--border);
    border-radius: var(--radius-lg);
    overflow: hidden;
  }
  .panel-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 0.5px solid var(--border);
  }
  .panel-title { font-size: 14px; font-weight: 600; color: var(--text); }
  .btn-new {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 7px 14px;
    border-radius: var(--radius-sm);
    background: var(--tw-100);
    border: none;
    color: var(--tw-700);
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-new:hover { background: var(--tw-300); }

  .events-table { width: 100%; border-collapse: collapse; }
  .events-table th {
    text-align: left;
    padding: 10px 20px;
    font-size: 11px;
    font-weight: 600;
    color: var(--hint);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    background: var(--bg);
    border-bottom: 0.5px solid var(--border);
  }
  .events-table td {
    padding: 13px 20px;
    font-size: 13px;
    color: var(--text);
    border-bottom: 0.5px solid var(--border);
    vertical-align: middle;
  }
  .events-table tr:last-child td { border-bottom: none; }
  .events-table tr:hover td { background: var(--bg); }

  .status-badge {
    display: inline-block;
    padding: 3px 9px;
    border-radius: 50px;
    font-size: 11px;
    font-weight: 600;
  }
  .badge-active { background: #e2f4e6; color: #2a7040; }
  .badge-soon   { background: var(--fs-100); color: var(--fs-700); }
  .badge-full   { background: var(--pp-100); color: var(--pp-700); }

  .action-group { display: flex; gap: 6px; }
  .action-btn {
    font-size: 12px;
    font-weight: 500;
    padding: 4px 10px;
    border-radius: var(--radius-sm);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    transition: opacity 0.15s;
  }
  .action-btn:hover { opacity: 0.8; }
  .btn-edit { background: var(--tw-100); color: var(--tw-700); }
  .btn-del  { background: #fde8e8; color: #a03030; }
  .btn-del.disabled { opacity: 0.35; cursor: not-allowed; pointer-events: none; }

  /* ===================== CADASTRO ===================== */
  .signup-page {
    max-width: 860px;
    margin: 0 auto;
    padding: 40px 24px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }
  @media (max-width: 660px) { .signup-page { grid-template-columns: 1fr; } }

  .form-card {
    background: var(--white);
    border: 0.5px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 24px;
  }
  .form-card-title { font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 20px; }
  .form-field { margin-bottom: 14px; }
  .form-label { display: block; font-size: 12px; font-weight: 500; color: var(--muted); margin-bottom: 5px; }
  .form-input, .form-select {
    width: 100%;
    padding: 9px 12px;
    border-radius: var(--radius-sm);
    border: 0.5px solid var(--border-md);
    background: var(--white);
    font-size: 13px;
    color: var(--text);
    font-family: inherit;
    outline: none;
    transition: border-color 0.15s;
  }
  .form-input:focus, .form-select:focus { border-color: var(--tw-300); }
  .submit-btn {
    width: 100%;
    padding: 11px;
    border-radius: var(--radius-md);
    border: none;
    background: var(--tw-100);
    color: var(--tw-700);
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 6px;
    transition: background 0.15s;
  }
  .submit-btn:hover { background: var(--tw-300); }

  .role-picker { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin: 8px 0 16px; }
  .role-option {
    border: 1.5px solid var(--border-md);
    border-radius: var(--radius-md);
    padding: 14px 12px;
    cursor: pointer;
    text-align: center;
    background: var(--white);
    transition: all 0.15s;
  }
  .role-option:hover { border-color: var(--tw-300); background: var(--tw-50); }
  .role-option.selected-p { border-color: var(--tw-300); background: var(--tw-50); }
  .role-option.selected-o { border-color: var(--pp-300); background: var(--pp-50); }
  .role-icon { font-size: 22px; margin-bottom: 6px; }
  .role-name { font-size: 13px; font-weight: 500; color: var(--text); }
  .role-sub  { font-size: 11px; color: var(--hint); margin-top: 3px; }

  .role-info {
    background: var(--bg);
    border-radius: var(--radius-md);
    padding: 12px 14px;
    margin-top: 4px;
  }
  .role-info-title { font-size: 12px; font-weight: 600; color: var(--tw-700); margin-bottom: 4px; }
  .role-info-text  { font-size: 12px; color: var(--muted); line-height: 1.6; }

  /* ===================== FLASH MESSAGE ===================== */
  .flash {
    margin: 12px 24px 0;
    padding: 10px 16px;
    border-radius: var(--radius-sm);
    font-size: 13px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    max-width: 1100px;
    margin-left: auto;
    margin-right: auto;
  }
  .flash-success { background: #e2f4e6; color: #2a7040; }
  .flash-error   { background: #fde8e8; color: #a03030; }
</style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar">
  <a class="navbar-logo" href="#" onclick="showPage('public')">
    <div class="logo-gem"><i class="ti ti-diamond"></i></div>
    Passaporte.io
  </a>
  <div class="navbar-links">
    <button class="nav-link" id="nl-public"    onclick="showPage('public')">Eventos</button>
    <button class="nav-link" id="nl-tickets"   onclick="showPage('tickets')">Meus ingressos</button>
    <button class="nav-link" id="nl-organizer" onclick="showPage('organizer')">Painel</button>
    <button class="btn-nav-outline" onclick="showPage('signup')">Entrar</button>
    <button class="btn-nav-primary" onclick="showPage('signup')">Criar conta</button>
  </div>
</nav>

<!-- ===== FLASH EXAMPLE ===== -->
<div class="flash flash-success" id="flash-msg" style="display:none">
  <i class="ti ti-circle-check"></i>
  <span id="flash-text"></span>
</div>

<!-- ===================================================== -->
<!-- PAGE: VITRINE PÚBLICA                                  -->
<!-- ===================================================== -->
<div class="page active" id="page-public">
  <div class="hero">
    <div class="hero-inner">
      <div class="hero-eyebrow">Eventos mágicos perto de você</div>
      <div class="hero-title">Encontre seu próximo<br>momento especial</div>
      <div class="hero-sub">Festivais, shows, workshops e muito mais — tudo em um só lugar.</div>
      <div class="hero-actions">
        <button class="btn btn-purple">Explorar eventos</button>
        <button class="btn btn-pink" onclick="showPage('signup')">Criar conta gratuita</button>
      </div>
    </div>
  </div>

  <div class="filter-bar">
    <span class="filter-label">Categoria</span>
    <span class="pill pill-purple">Todos</span>
    <span class="pill pill-pink">Festivais</span>
    <span class="pill pill-blue">Tecnologia</span>
    <span class="pill pill-yellow">Gastronomia</span>
    <span class="pill pill-green">Arte</span>
    <span class="pill pill-orange">Esportes</span>
    <span class="pill pill-outline">Música</span>
  </div>

  <div class="events-section">
    <div class="section-label">6 eventos encontrados</div>
    <div class="events-grid">

      <div class="event-card" onclick="showPage('detail')">
        <div class="card-banner banner-twilight">
          <i class="ti ti-sparkles" style="color:var(--tw-300)"></i>
        </div>
        <div class="card-body">
          <span class="card-cat cat-purple">Festivais</span>
          <div class="card-title">Ponyville Fest 2025</div>
          <div class="card-meta"><i class="ti ti-calendar"></i> 15 ago · 18h</div>
          <div class="card-meta"><i class="ti ti-map-pin"></i> São Paulo, SP</div>
          <div class="card-spots spots-ok"><i class="ti ti-ticket"></i> 42 vagas disponíveis</div>
          <div class="card-footer">
            <span class="card-org">por Twilight Sparkle</span>
            <button class="card-cta cta-purple">Ver detalhes</button>
          </div>
        </div>
      </div>

      <div class="event-card" onclick="showPage('detail')">
        <div class="card-banner banner-pinkie">
          <i class="ti ti-confetti" style="color:var(--pp-500)"></i>
        </div>
        <div class="card-body">
          <span class="card-cat cat-pink">Música</span>
          <div class="card-title">Pink Party Night — edição especial</div>
          <div class="card-meta"><i class="ti ti-calendar"></i> 22 ago · 21h</div>
          <div class="card-meta"><i class="ti ti-map-pin"></i> Rio de Janeiro, RJ</div>
          <div class="card-spots spots-low"><i class="ti ti-ticket"></i> 8 vagas restantes</div>
          <div class="card-footer">
            <span class="card-org">por Pinkie Pie</span>
            <button class="card-cta cta-pink">Ver detalhes</button>
          </div>
        </div>
      </div>

      <div class="event-card" onclick="showPage('detail')">
        <div class="card-banner banner-rainbow">
          <i class="ti ti-code" style="color:var(--rd-500)"></i>
        </div>
        <div class="card-body">
          <span class="card-cat cat-blue">Tecnologia</span>
          <div class="card-title">DevDash — hackathon de fim de semana</div>
          <div class="card-meta"><i class="ti ti-calendar"></i> 30 ago · 09h</div>
          <div class="card-meta"><i class="ti ti-map-pin"></i> Curitiba, PR</div>
          <div class="card-spots spots-full"><i class="ti ti-ticket"></i> Vagas esgotadas</div>
          <div class="card-footer">
            <span class="card-org">por Rainbow Dash</span>
            <button class="card-cta cta-blue" style="opacity:.4;cursor:default" disabled>Esgotado</button>
          </div>
        </div>
      </div>

      <div class="event-card" onclick="showPage('detail')">
        <div class="card-banner banner-flutter">
          <i class="ti ti-plant" style="color:var(--fs-500)"></i>
        </div>
        <div class="card-body">
          <span class="card-cat cat-yellow">Gastronomia</span>
          <div class="card-title">Feira orgânica Fluttershy</div>
          <div class="card-meta"><i class="ti ti-calendar"></i> 05 set · 10h</div>
          <div class="card-meta"><i class="ti ti-map-pin"></i> Florianópolis, SC</div>
          <div class="card-spots spots-ok"><i class="ti ti-ticket"></i> 130 vagas disponíveis</div>
          <div class="card-footer">
            <span class="card-org">por Fluttershy</span>
            <button class="card-cta cta-yellow">Ver detalhes</button>
          </div>
        </div>
      </div>

      <div class="event-card" onclick="showPage('detail')">
        <div class="card-banner banner-rarity">
          <i class="ti ti-diamond" style="color:var(--ra-500)"></i>
        </div>
        <div class="card-body">
          <span class="card-cat cat-raBlue">Arte e Cultura</span>
          <div class="card-title">Exposição Glamour — Rarity Atelier</div>
          <div class="card-meta"><i class="ti ti-calendar"></i> 10 set · 14h</div>
          <div class="card-meta"><i class="ti ti-map-pin"></i> Belo Horizonte, MG</div>
          <div class="card-spots spots-ok"><i class="ti ti-ticket"></i> 25 vagas disponíveis</div>
          <div class="card-footer">
            <span class="card-org">por Rarity</span>
            <button class="card-cta cta-raBlue">Ver detalhes</button>
          </div>
        </div>
      </div>

      <div class="event-card" onclick="showPage('detail')">
        <div class="card-banner banner-applejack">
          <i class="ti ti-run" style="color:var(--aj-500)"></i>
        </div>
        <div class="card-body">
          <span class="card-cat cat-orange">Esportes</span>
          <div class="card-title">Corrida Sweet Apple — 5K noturno</div>
          <div class="card-meta"><i class="ti ti-calendar"></i> 18 set · 19h30</div>
          <div class="card-meta"><i class="ti ti-map-pin"></i> Porto Alegre, RS</div>
          <div class="card-spots spots-ok"><i class="ti ti-ticket"></i> 88 vagas disponíveis</div>
          <div class="card-footer">
            <span class="card-org">por Applejack</span>
            <button class="card-cta cta-orange">Ver detalhes</button>
          </div>
        </div>
      </div>

    </div><!-- /events-grid -->

    <div class="pagination">
      <button class="pag-btn"><i class="ti ti-chevron-left"></i></button>
      <button class="pag-btn active">1</button>
      <button class="pag-btn">2</button>
      <button class="pag-btn">3</button>
      <button class="pag-btn"><i class="ti ti-chevron-right"></i></button>
    </div>
  </div>
</div><!-- /page-public -->

<!-- ===================================================== -->
<!-- PAGE: DETALHE DO EVENTO                               -->
<!-- ===================================================== -->
<div class="page" id="page-detail">
  <div class="detail-page">
    <button class="back-btn" onclick="showPage('public')">
      <i class="ti ti-arrow-left"></i> Voltar aos eventos
    </button>
    <div class="detail-layout">
      <div class="detail-main">
        <div class="detail-banner-big">
          <i class="ti ti-sparkles"></i>
        </div>
        <div class="detail-content">
          <span class="detail-tag">Festivais</span>
          <div class="detail-title">Ponyville Fest 2025</div>
          <div class="detail-meta"><i class="ti ti-calendar"></i> Sábado, 15 de agosto de 2025 às 18h00</div>
          <div class="detail-meta"><i class="ti ti-map-pin"></i> Parque do Ibirapuera, São Paulo — SP</div>
          <div class="detail-meta"><i class="ti ti-user"></i> Organizado por Twilight Sparkle</div>
          <div class="detail-desc">
            Uma celebração mágica de arte, música e conexões. O Ponyville Fest reúne artistas independentes, workshops criativos e performances ao vivo num único espaço de pura alegria. Venha com amigos ou faça novos por aqui. Teremos food trucks, exposições temáticas, batalhas de dança e muito mais ao longo da noite.
          </div>
        </div>
      </div>

      <div class="detail-sidebar">
        <div class="sidebar-card">
          <div class="sidebar-label">Vagas disponíveis</div>
          <div class="sidebar-value">42 de 100</div>
          <div class="spots-bar-wrap">
            <div class="spots-bar"><div class="spots-fill" style="width:58%"></div></div>
          </div>
          <div class="sidebar-sub">58 inscrições confirmadas</div>
        </div>

        <div class="sidebar-card">
          <div class="sidebar-label">Data e horário</div>
          <div class="sidebar-value">15 de agosto de 2025</div>
          <div class="sidebar-sub">Sábado, a partir das 18h</div>
        </div>

        <div class="sidebar-card">
          <div class="sidebar-label">Local</div>
          <div class="sidebar-value">Parque do Ibirapuera</div>
          <div class="sidebar-sub">São Paulo, SP</div>
        </div>

        <div class="sidebar-card">
          <div class="sidebar-label">Categoria</div>
          <span class="card-cat cat-purple">Festivais</span>
        </div>

        <button class="register-btn" onclick="showFlash('Inscrição confirmada! Seu ingresso: AXK9WZ2F', 'success'); showPage('tickets')">
          <i class="ti ti-ticket"></i> Garantir minha vaga
        </button>
      </div>
    </div>
  </div>
</div><!-- /page-detail -->

<!-- ===================================================== -->
<!-- PAGE: MEUS INGRESSOS                                   -->
<!-- ===================================================== -->
<div class="page" id="page-tickets">
  <div class="tickets-page">
    <div class="page-header">
      <div class="page-title">Meus ingressos</div>
      <span class="page-action" onclick="showPage('public')">Explorar mais eventos</span>
    </div>

    <div class="ticket-card">
      <div class="ticket-stripe ts-purple"></div>
      <div class="ticket-info">
        <div class="ticket-name">Ponyville Fest 2025</div>
        <div class="ticket-date"><i class="ti ti-calendar"></i> 15 ago, 18h — São Paulo, SP</div>
      </div>
      <span class="ticket-code tc-purple">AXK9WZ2F</span>
      <button class="cancel-btn" onclick="showFlash('Inscrição cancelada.','error')">Cancelar</button>
    </div>

    <div class="ticket-card">
      <div class="ticket-stripe ts-pink"></div>
      <div class="ticket-info">
        <div class="ticket-name">Pink Party Night — edição especial</div>
        <div class="ticket-date"><i class="ti ti-calendar"></i> 22 ago, 21h — Rio de Janeiro, RJ</div>
      </div>
      <span class="ticket-code tc-pink">B4RFMT1Q</span>
      <button class="cancel-btn" onclick="showFlash('Inscrição cancelada.','error')">Cancelar</button>
    </div>

    <div class="ticket-card">
      <div class="ticket-stripe ts-blue"></div>
      <div class="ticket-info">
        <div class="ticket-name">Exposição Glamour — Rarity Atelier</div>
        <div class="ticket-date"><i class="ti ti-calendar"></i> 10 set, 14h — Belo Horizonte, MG</div>
      </div>
      <span class="ticket-code tc-blue">PLW3CX8N</span>
      <button class="cancel-btn" onclick="showFlash('Inscrição cancelada.','error')">Cancelar</button>
    </div>

    <div class="pagination" style="padding-top:20px">
      <button class="pag-btn"><i class="ti ti-chevron-left"></i></button>
      <button class="pag-btn active">1</button>
      <button class="pag-btn">2</button>
      <button class="pag-btn"><i class="ti ti-chevron-right"></i></button>
    </div>
  </div>
</div><!-- /page-tickets -->

<!-- ===================================================== -->
<!-- PAGE: PAINEL ORGANIZADOR                              -->
<!-- ===================================================== -->
<div class="page" id="page-organizer">
  <div class="organizer-page">
    <div class="page-header">
      <div class="page-title">Painel do organizador</div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-label">Total de eventos</div>
        <div class="stat-value">3</div>
        <div class="stat-sub">2 ativos, 1 lotado</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Total de inscrições</div>
        <div class="stat-value">120</div>
        <div class="stat-sub">em todos os eventos</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Vagas restantes</div>
        <div class="stat-value">60</div>
        <div class="stat-sub">entre os eventos ativos</div>
      </div>
    </div>

    <div class="panel-card">
      <div class="panel-header">
        <div class="panel-title">Meus eventos</div>
        <button class="btn-new"><i class="ti ti-plus"></i> Novo evento</button>
      </div>
      <table class="events-table">
        <thead>
          <tr>
            <th>Evento</th>
            <th>Data</th>
            <th>Inscritos</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-weight:500">Ponyville Fest 2025</td>
            <td style="color:var(--muted)">15 ago 2025</td>
            <td>58 / 100</td>
            <td><span class="status-badge badge-active">Ativo</span></td>
            <td>
              <div class="action-group">
                <button class="action-btn btn-edit"><i class="ti ti-edit"></i> Editar</button>
                <button class="action-btn btn-del"><i class="ti ti-trash"></i></button>
              </div>
            </td>
          </tr>
          <tr>
            <td style="font-weight:500">Workshop de magia avançada</td>
            <td style="color:var(--muted)">28 ago 2025</td>
            <td>12 / 30</td>
            <td><span class="status-badge badge-soon">Em breve</span></td>
            <td>
              <div class="action-group">
                <button class="action-btn btn-edit"><i class="ti ti-edit"></i> Editar</button>
                <button class="action-btn btn-del"><i class="ti ti-trash"></i></button>
              </div>
            </td>
          </tr>
          <tr>
            <td style="font-weight:500">Noite de poesia — Canterlot</td>
            <td style="color:var(--muted)">03 set 2025</td>
            <td>50 / 50</td>
            <td><span class="status-badge badge-full">Lotado</span></td>
            <td>
              <div class="action-group">
                <button class="action-btn btn-edit"><i class="ti ti-edit"></i> Editar</button>
                <button class="action-btn btn-del disabled" title="Não é possível excluir com inscritos"><i class="ti ti-trash"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- /page-organizer -->

<!-- ===================================================== -->
<!-- PAGE: CADASTRO                                         -->
<!-- ===================================================== -->
<div class="page" id="page-signup">
  <div class="signup-page">
    <div class="form-card">
      <div class="form-card-title">Criar conta</div>
      <div class="form-field">
        <label class="form-label">Nome completo</label>
        <input class="form-input" type="text" placeholder="Seu nome">
      </div>
      <div class="form-field">
        <label class="form-label">E-mail</label>
        <input class="form-input" type="email" placeholder="seu@email.com">
      </div>
      <div class="form-field">
        <label class="form-label">Senha</label>
        <input class="form-input" type="password" placeholder="Mínimo 8 caracteres">
      </div>
      <div class="form-field">
        <label class="form-label">Confirmar senha</label>
        <input class="form-input" type="password" placeholder="Repita a senha">
      </div>
      <button class="submit-btn" onclick="showFlash('Conta criada com sucesso! Bem-vindo ao Passaporte.io','success'); showPage('public')">
        Criar minha conta
      </button>
    </div>

    <div class="form-card">
      <div class="form-card-title">Escolha seu perfil</div>
      <p style="font-size:13px;color:var(--muted);margin-bottom:14px">Qual é o seu papel no Passaporte.io?</p>
      <div class="role-picker">
        <div class="role-option selected-p" id="role-p" onclick="selectRole('p')">
          <div class="role-icon"><i class="ti ti-ticket" style="font-size:22px;color:var(--tw-500)"></i></div>
          <div class="role-name">Participante</div>
          <div class="role-sub">Quero me inscrever em eventos</div>
        </div>
        <div class="role-option" id="role-o" onclick="selectRole('o')">
          <div class="role-icon"><i class="ti ti-layout-dashboard" style="font-size:22px;color:var(--muted)"></i></div>
          <div class="role-name">Organizador</div>
          <div class="role-sub">Quero criar e gerenciar eventos</div>
        </div>
      </div>
      <div class="role-info" id="role-info">
        <div class="role-info-title" id="role-info-title">Participante</div>
        <div class="role-info-text" id="role-info-text">Explore eventos, garanta suas vagas e acompanhe todos os seus ingressos em um só lugar.</div>
      </div>

      <div style="margin-top:20px">
        <div class="form-card-title" style="font-size:13px;margin-bottom:12px">Já tem conta?</div>
        <div class="form-field">
          <label class="form-label">E-mail</label>
          <input class="form-input" type="email" placeholder="seu@email.com">
        </div>
        <div class="form-field">
          <label class="form-label">Senha</label>
          <input class="form-input" type="password" placeholder="••••••••">
        </div>
        <button class="submit-btn" style="background:var(--pp-100);color:var(--pp-700)"
          onclick="showFlash('Login realizado com sucesso!','success'); showPage('tickets')">
          Entrar na minha conta
        </button>
      </div>
    </div>
  </div>
</div><!-- /page-signup -->

<script>
  const pages = ['public','detail','tickets','organizer','signup'];

  function showPage(name) {
    pages.forEach(p => {
      document.getElementById('page-'+p).classList.toggle('active', p === name);
    });
    ['public','tickets','organizer'].forEach(id => {
      const el = document.getElementById('nl-'+id);
      if (el) el.classList.toggle('active', id === name);
    });
    document.getElementById('flash-msg').style.display = 'none';
    window.scrollTo(0, 0);
  }

  function showFlash(msg, type) {
    const el = document.getElementById('flash-msg');
    const txt = document.getElementById('flash-text');
    el.className = 'flash flash-' + type;
    txt.textContent = msg;
    el.style.display = 'flex';
    setTimeout(() => { el.style.display = 'none'; }, 4000);
  }

  function selectRole(role) {
    const infoTitle = document.getElementById('role-info-title');
    const infoText  = document.getElementById('role-info-text');
    const roleP = document.getElementById('role-p');
    const roleO = document.getElementById('role-o');

    roleP.className = 'role-option' + (role === 'p' ? ' selected-p' : '');
    roleO.className = 'role-option' + (role === 'o' ? ' selected-o' : '');

    if (role === 'p') {
      infoTitle.style.color = 'var(--tw-700)';
      infoTitle.textContent = 'Participante';
      infoText.textContent  = 'Explore eventos, garanta suas vagas e acompanhe todos os seus ingressos em um só lugar.';
    } else {
      infoTitle.style.color = 'var(--pp-700)';
      infoTitle.textContent = 'Organizador';
      infoText.textContent  = 'Crie eventos, gerencie inscrições e acompanhe tudo pelo seu painel administrativo.';
    }
  }
</script>
</body>
</html>