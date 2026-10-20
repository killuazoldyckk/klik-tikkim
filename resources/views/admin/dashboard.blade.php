<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102d4f">
    <title>Dashboard Admin — KLIK TIKKIM</title>

    <style>
        :root {
            --navy: #102d4f;
            --navy-light: #193f69;
            --gold: #d9ad50;
            --ink: #182b45;
            --muted: #64748b;
            --background: #f4f7fb;
            --border: #e1e8f0;
            --white: #fff;
            --radius: 17px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--background);
            color: var(--ink);
            line-height: 1.6;
        }

        a { color: inherit; }

        button, a { -webkit-tap-highlight-color: transparent; }

        a:focus-visible, button:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 3px;
        }

        .app {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 255px minmax(0, 1fr);
        }

        /* Sidebar */

        .sidebar {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 27px 18px 20px;
            color: #fff;
            background: var(--navy);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 7px 28px;
            border-bottom: 1px solid rgba(255,255,255,.13);
            text-decoration: none;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border: 1px solid rgba(217,173,80,.7);
            border-radius: 12px;
            color: var(--gold);
            font-size: 16px;
            font-weight: 800;
        }

        .brand-name {
            display: block;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: .5px;
            line-height: 1.3;
        }

        .brand-subtitle {
            display: block;
            margin-top: 4px;
            color: #c4d2e3;
            font-size: 10px;
        }

        .nav-label {
            margin: 26px 10px 10px;
            color: #91a9c4;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .nav-list {
            display: grid;
            gap: 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            border: 1px solid transparent;
            border-radius: 10px;
            color: #d8e3f0;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s, color .2s;
        }

        .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,.08);
        }

        .nav-link.active {
            color: #fff;
            border-color: rgba(217,173,80,.2);
            background: rgba(217,173,80,.13);
        }

        .nav-icon {
            width: 24px;
            text-align: center;
            color: var(--gold);
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .sidebar-note {
            margin: 0 4px 18px;
            padding: 14px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 12px;
            color: #c4d2e3;
            font-size: 11px;
        }

        .sidebar-note strong {
            display: block;
            margin-bottom: 5px;
            color: white;
            font-size: 12px;
        }

        .logout-button {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 10px;
            color: white;
            background: transparent;
            font: inherit;
            font-size: 13px;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }

        .logout-button:hover {
            border-color: rgba(255,255,255,.5);
            background: rgba(255,255,255,.07);
        }

        /* Main area */

        .main-area { min-width: 0; }

        .topbar {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 15px 35px;
            border-bottom: 1px solid var(--border);
            background: white;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 12px;
        }

        .breadcrumb strong { color: var(--navy); }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            color: var(--navy);
            background: #edf3fa;
            font-size: 14px;
            font-weight: 800;
        }

        .user-name {
            display: block;
            color: var(--ink);
            font-size: 12px;
            font-weight: 800;
        }

        .user-role {
            display: block;
            color: var(--muted);
            font-size: 11px;
        }

        .content {
            width: min(1150px, 100%);
            margin: 0 auto;
            padding: 34px 35px 45px;
        }

        .welcome {
            position: relative;
            overflow: hidden;
            padding: 32px;
            border-radius: 20px;
            color: white;
            background:
                radial-gradient(circle at 90% 10%, rgba(217,173,80,.19), transparent 28%),
                linear-gradient(120deg, var(--navy), var(--navy-light));
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            right: -90px;
            bottom: -155px;
            border: 1px solid rgba(217,173,80,.4);
            border-radius: 50%;
            box-shadow: 0 0 0 28px rgba(217,173,80,.04),
                        0 0 0 58px rgba(217,173,80,.035);
            pointer-events: none;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            margin: 0 0 10px;
            color: var(--gold);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .welcome h1 {
            margin: 0;
            font-size: clamp(25px, 3vw, 34px);
            line-height: 1.3;
            letter-spacing: -.7px;
        }

        .welcome-description {
            max-width: 650px;
            margin: 12px 0 20px;
            color: #d4e0ee;
            font-size: 14px;
        }

        .welcome-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border: 1px solid rgba(217,173,80,.45);
            border-radius: 8px;
            color: #f8e8bf;
            background: rgba(217,173,80,.1);
            font-size: 11px;
            font-weight: 800;
        }

        .public-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: white;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .public-link:hover { color: var(--gold); }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 15px;
            margin: 34px 0 18px;
        }

        .section-heading h2 {
            margin: 0;
            color: var(--navy);
            font-size: 21px;
            letter-spacing: -.3px;
        }

        .section-heading p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .section-tag {
            padding: 6px 10px;
            border-radius: 7px;
            color: #775a24;
            background: #f6ecd6;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .menu-card {
            display: flex;
            flex-direction: column;
            min-height: 235px;
            padding: 24px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background: white;
            box-shadow: 0 4px 15px rgba(16,45,79,.025);
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }

        .menu-card:hover {
            transform: translateY(-3px);
            border-color: #c6d4e5;
            box-shadow: 0 12px 30px rgba(16,45,79,.08);
        }

        .menu-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            margin-bottom: 20px;
            border-radius: 14px;
            color: var(--navy);
            background: #edf3fa;
            font-size: 23px;
        }

        .menu-card h3 {
            margin: 0;
            color: var(--navy);
            font-size: 17px;
        }

        .menu-card p {
            margin: 8px 0 22px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }

        .menu-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: auto;
            padding-top: 13px;
            border-top: 1px solid #edf0f5;
            color: #174d85;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
        }

        .menu-action span:last-child {
            color: #98752e;
            font-size: 18px;
            transition: transform .2s;
        }

        .menu-action:hover span:last-child { transform: translateX(3px); }

        .workflow-note {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-top: 22px;
            padding: 18px 20px;
            border: 1px solid #e5dfce;
            border-radius: 13px;
            background: #fffdf8;
        }

        .workflow-icon {
            flex-shrink: 0;
            font-size: 20px;
        }

        .workflow-note strong {
            display: block;
            color: var(--navy);
            font-size: 12px;
        }

        .workflow-note p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .footer {
            padding-top: 25px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 11px;
        }

        @media (max-width: 850px) {
            .app { grid-template-columns: 210px minmax(0, 1fr); }

            .sidebar { padding-inline: 12px; }

            .topbar { padding-inline: 22px; }

            .content { padding: 25px 22px 35px; }

            .welcome { padding: 25px; }

            .menu-grid { gap: 13px; }

            .menu-card { padding: 19px; }
        }

        @media (max-width: 650px) {
            .app { display: block; }

            .sidebar {
                min-height: auto;
                padding: 15px;
            }

            .brand {
                padding: 0 3px 14px;
            }

            .nav-label { margin-top: 15px; }

            .nav-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .nav-link {
                gap: 8px;
                padding: 10px;
                font-size: 11px;
            }

            .nav-icon { width: 19px; }

            .sidebar-bottom {
                display: grid;
                grid-template-columns: minmax(0, 1fr) auto;
                align-items: center;
                gap: 10px;
                padding-top: 15px;
            }

            .sidebar-note {
                margin: 0;
                padding: 10px;
            }

            .logout-form { min-width: 95px; }

            .logout-button {
                padding: 10px;
                font-size: 11px;
                text-align: center;
            }

            .topbar {
                min-height: 60px;
                padding: 10px 16px;
            }

            .content { padding: 22px 15px 30px; }

            .welcome { padding: 23px 19px; }

            .welcome h1 { font-size: 26px; }

            .menu-grid { grid-template-columns: 1fr; }

            .menu-card { min-height: 210px; }

            .section-heading { align-items: start; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>
@php
    $user = auth()->user();

    $roleLabel = match ($user->role) {
        'admin' => 'Administrator',
        'editor' => 'Editor Konten',
        'verifikator' => 'Verifikator',
        default => 'Tidak dikenal',
    };

    $initial = \Illuminate\Support\Str::upper(
        \Illuminate\Support\Str::substr($user->name, 0, 1)
    );
@endphp

<div class="app">
    <aside class="sidebar">
        <a class="brand" href="{{ route('admin.dashboard') }}">
            <span class="brand-mark">KT</span>
            <span>
                <span class="brand-name">KLIK TIKKIM</span>
                <span class="brand-subtitle">Panel administrasi</span>
            </span>
        </a>

        <p class="nav-label">Menu utama</p>

        <nav class="nav-list" aria-label="Menu administrasi">
            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                <span class="nav-icon" aria-hidden="true">⌂</span>
                <span>Dashboard</span>
            </a>

            @if (in_array($user->role, ['admin', 'editor'], true))
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <span class="nav-icon" aria-hidden="true">▦</span>
                    <span>Kategori layanan</span>
                </a>
            @endif

            <a class="nav-link" href="{{ route('admin.services.index') }}">
                <span class="nav-icon" aria-hidden="true">▤</span>
                <span>Informasi layanan</span>
            </a>

            <a class="nav-link" href="{{ route('admin.faqs.index') }}">
                <span class="nav-icon" aria-hidden="true">?</span>
                <span>FAQ</span>
            </a>

            <a class="nav-link" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                <span class="nav-icon" aria-hidden="true">↗</span>
                <span>Halaman publik</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="sidebar-note">
                <strong>Area kerja Anda</strong>
                Menu ditampilkan berdasarkan hak akses akun.
            </div>

            <form class="logout-form" method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="logout-button" type="submit">
                    ↪ &nbsp; Keluar dari akun
                </button>
            </form>
        </div>
    </aside>

    <div class="main-area">
        <header class="topbar">
            <div class="breadcrumb">
                Panel administrasi &nbsp; / &nbsp; <strong>Dashboard</strong>
            </div>

            <div class="user-chip">
                <div class="avatar">{{ $initial }}</div>
                <div>
                    <span class="user-name">{{ $user->name }}</span>
                    <span class="user-role">{{ $roleLabel }}</span>
                </div>
            </div>
        </header>

        <main class="content">
            <section class="welcome">
                <div class="welcome-content">
                    <p class="eyebrow">Dashboard · KLIK TIKKIM</p>

                    <h1>Selamat datang, {{ $user->name }}.</h1>

                    <p class="welcome-description">
                        Kelola informasi keimigrasian, periksa kelengkapan konten,
                        dan bantu memastikan informasi yang diterbitkan siap
                        diakses masyarakat.
                    </p>

                    <div class="welcome-actions">
                        <span class="role-badge">
                            <span aria-hidden="true">●</span>
                            {{ $roleLabel }}
                        </span>

                        <a class="public-link" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                            Lihat portal publik ↗
                        </a>
                    </div>
                </div>
            </section>

            <section aria-labelledby="menu-heading">
                <div class="section-heading">
                    <div>
                        <h2 id="menu-heading">Ruang kerja</h2>
                        <p>Pilih menu sesuai tugas dan kewenangan akun Anda.</p>
                    </div>

                    <span class="section-tag">AKSES BERBASIS PERAN</span>
                </div>

                <div class="menu-grid">
                    @if (in_array($user->role, ['admin', 'editor'], true))
                        <article class="menu-card">
                            <div class="menu-icon" aria-hidden="true">▦</div>
                            <h3>Kategori Layanan</h3>
                            <p>
                                Tambah dan kelola kategori untuk mengelompokkan
                                informasi layanan keimigrasian.
                            </p>
                            <a class="menu-action" href="{{ route('admin.categories.index') }}">
                                <span>Kelola kategori</span>
                                <span aria-hidden="true">→</span>
                            </a>
                        </article>
                    @endif

                    <article class="menu-card">
                        <div class="menu-icon" aria-hidden="true">▤</div>
                        <h3>Informasi Layanan</h3>
                        <p>
                            @if (in_array($user->role, ['admin', 'verifikator'], true))
                                Periksa kelayakan informasi, lakukan verifikasi,
                                dan kelola status publikasi layanan.
                            @else
                                Tambah dan perbarui informasi layanan beserta
                                ringkasan, isi, dan sumber rujukannya.
                            @endif
                        </p>
                        <a class="menu-action" href="{{ route('admin.services.index') }}">
                            <span>
                                {{ $user->role === 'editor' ? 'Kelola konten layanan' : 'Periksa layanan' }}
                            </span>
                            <span aria-hidden="true">→</span>
                        </a>
                    </article>

                    <article class="menu-card">
                        <div class="menu-icon" aria-hidden="true">?</div>
                        <h3>FAQ</h3>
                        <p>
                            @if (in_array($user->role, ['admin', 'verifikator'], true))
                                Periksa pertanyaan dan jawaban, lakukan verifikasi,
                                serta kelola penerbitannya.
                            @else
                                Tambah dan kelola pertanyaan serta jawaban yang
                                sering diajukan oleh masyarakat.
                            @endif
                        </p>
                        <a class="menu-action" href="{{ route('admin.faqs.index') }}">
                            <span>
                                {{ $user->role === 'editor' ? 'Kelola FAQ' : 'Periksa FAQ' }}
                            </span>
                            <span aria-hidden="true">→</span>
                        </a>
                    </article>
                </div>
            </section>

            <aside class="workflow-note">
                <div class="workflow-icon" aria-hidden="true">ⓘ</div>
                <div>
                    <strong>Alur pengelolaan konten</strong>
                    <p>
                        Konten yang diperbarui perlu melalui proses verifikasi
                        sebelum dapat diterbitkan. Pastikan informasi dan sumber
                        rujukannya telah diperiksa sesuai tugas Anda.
                    </p>
                </div>
            </aside>

            <footer class="footer">
                KLIK TIKKIM · Panel administrasi
                <br>
                Kelola informasi secara cermat dan bertanggung jawab.
            </footer>
        </main>
    </div>
</div>
</body>
</html>
