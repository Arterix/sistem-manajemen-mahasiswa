<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg:           #EDE8D0;
            --bg-card:      #F5F0DC;
            --accent:       #4A5534;
            --accent-dark:  #353d25;
            --accent-light: #5c6b41;
            --border:       #c5bc9e;
            --border-light: #d8d1b4;
            --text:         #26211a;
            --text-muted:   #6b6050;
            --danger:       #7a3030;
            --warning:      #7a6820;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 0.9375rem;
        }

        h1, h2, h3, h4, h5, .navbar-brand {
            font-family: 'Lora', Georgia, serif;
        }

        /* ── Navbar ── */
        .navbar {
            background-color: var(--accent) !important;
            border-bottom: 2px solid var(--accent-dark);
            padding-top: 0.65rem;
            padding-bottom: 0.65rem;
        }
        .navbar-brand {
            color: #fff !important;
            font-size: 1.15rem;
            letter-spacing: 0.015em;
        }
        .nav-link {
            color: rgba(255,255,255,0.82) !important;
            font-size: 0.875rem;
            padding-left: 0.9rem !important;
            padding-right: 0.9rem !important;
            transition: color 0.15s;
        }
        .nav-link:hover, .nav-link.active {
            color: #fff !important;
        }
        .nav-link.active {
            border-bottom: 2px solid rgba(255,255,255,0.6);
        }

        /* ── Cards ── */
        .card {
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 3px;
            box-shadow: none;
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid var(--border);
            padding: 0.7rem 1.1rem;
            font-family: 'Lora', Georgia, serif;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text);
        }
        .card-footer {
            background-color: transparent;
            border-top: 1px solid var(--border-light);
        }

        /* ── Tables ── */
        .table {
            --bs-table-bg: transparent;
            --bs-table-border-color: var(--border-light);
            --bs-table-hover-bg: rgba(74, 85, 52, 0.06);
            font-size: 0.9rem;
        }
        .table thead th {
            background-color: var(--accent);
            color: #fff;
            font-weight: 600;
            font-size: 0.82rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            border-color: var(--accent-dark);
            vertical-align: middle;
        }
        .table thead th a {
            color: #fff;
            text-decoration: none;
        }
        .table thead th a:hover {
            text-decoration: underline;
            text-underline-offset: 3px;
        }
        .table tbody td {
            vertical-align: middle;
            color: var(--text);
        }
        .table-bordered {
            --bs-table-border-color: var(--border-light);
        }

        /* ── Buttons ── */
        .btn {
            font-size: 0.85rem;
            border-radius: 2px;
            font-weight: 500;
        }
        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--accent-dark);
            border-color: var(--accent-dark);
            color: #fff;
        }
        .btn-outline-primary {
            color: var(--accent);
            border-color: var(--accent);
        }
        .btn-outline-primary:hover {
            background-color: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
        .btn-warning {
            background-color: var(--warning);
            border-color: var(--warning);
            color: #fff;
        }
        .btn-warning:hover {
            background-color: #635618;
            border-color: #635618;
            color: #fff;
        }
        .btn-danger {
            background-color: var(--danger);
            border-color: var(--danger);
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #621f1f;
            border-color: #621f1f;
            color: #fff;
        }
        .btn-secondary {
            background-color: #8a826e;
            border-color: #8a826e;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #706a58;
            border-color: #706a58;
            color: #fff;
        }
        .btn-info {
            background-color: #3d6b7a;
            border-color: #3d6b7a;
            color: #fff;
        }
        .btn-info:hover {
            background-color: #2f5461;
            border-color: #2f5461;
            color: #fff;
        }

        /* ── Alerts ── */
        .alert-success {
            background-color: #dde8d6;
            border-color: #b4c9a8;
            color: #2d4a22;
        }
        .alert-info {
            background-color: #dde4e8;
            border-color: #b0c4cc;
            color: #1f3c47;
        }

        /* ── Form controls ── */
        .form-control, .form-select {
            background-color: #faf7ed;
            border-color: var(--border);
            border-radius: 2px;
            color: var(--text);
            font-size: 0.9rem;
        }
        .form-control:focus, .form-select:focus {
            background-color: #fff;
            border-color: var(--accent);
            box-shadow: 0 0 0 0.15rem rgba(74, 85, 52, 0.2);
        }
        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 0.3rem;
        }

        /* ── Badges ── */
        .badge {
            border-radius: 2px;
            font-weight: 600;
            font-size: 0.78rem;
        }
        .badge.bg-primary {
            background-color: var(--accent) !important;
        }

        /* ── Stat cards ── */
        .stat-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-left: 4px solid var(--accent);
            border-radius: 3px;
            padding: 1.4rem 1.5rem;
        }
        .stat-card .stat-number {
            font-family: 'Lora', Georgia, serif;
            font-size: 2.6rem;
            font-weight: 600;
            color: var(--accent);
            line-height: 1;
        }
        .stat-card .stat-label {
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-muted);
            margin-top: 0.35rem;
        }
        .stat-card.variant-2 { border-left-color: #3d6b7a; }
        .stat-card.variant-2 .stat-number { color: #3d6b7a; }
        .stat-card.variant-3 { border-left-color: var(--warning); }
        .stat-card.variant-3 .stat-number { color: var(--warning); }

        /* ── Sort indicator ── */
        .sort-indicator {
            display: inline-block;
            margin-left: 4px;
            opacity: 0.75;
            font-size: 0.7rem;
        }

        /* ── Page header ── */
        .page-title {
            font-size: 1.35rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0;
        }

        /* ── Misc ── */
        .container { max-width: 1000px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Manajemen Mahasiswa</a>
            <button class="navbar-toggler border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}"
                           href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
