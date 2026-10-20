<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Instagram Reel — KLIK TIKKIM</title>

    <style>
        :root {
            --navy: #102d4f;
            --navy-dark: #0b2039;
            --gold: #d9ad50;
            --background: #f4f7fb;
            --border: #e1e8f0;
            --muted: #64748b;
            --white: #fff;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #182b45;
            background: var(--background);
        }

        a { color: inherit; text-decoration: none; }

        .app {
            display: grid;
            grid-template-columns: 255px minmax(0, 1fr);
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 26px 17px 20px;
            color: #e8eef7;
            background: var(--navy-dark);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px 30px;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border-radius: 12px;
            color: var(--navy-dark);
            background: var(--gold);
            font-size: 16px;
            font-weight: 800;
        }

        .brand-name, .brand-subtitle {
            display: block;
        }

        .brand-name {
            color: #fff;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .brand-subtitle {
            margin-top: 4px;
            color: #aab9cc;
            font-size: 11px;
        }

        .nav-label {
            margin: 0 10px 12px;
            color: #91a4bb;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.4px;
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
            padding: 12px;
            border: 1px solid transparent;
            border-radius: 9px;
            color: #d4deea;
            font-size: 13px;
            transition: background .2s, color .2s;
        }

        .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,.07);
        }

        .nav-link.active {
            color: var(--gold);
            background: rgba(217,173,80,.12);
            border-color: rgba(217,173,80,.22);
            font-weight: 700;
        }

        .nav-icon {
            display: inline-grid;
            place-items: center;
            width: 22px;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .sidebar-note {
            padding: 13px;
            margin-bottom: 14px;
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 9px;
            color: #aab9cc;
            font-size: 11px;
            line-height: 1.6;
        }

        .sidebar-note strong {
            display: block;
            margin-bottom: 4px;
            color: #fff;
        }

        .logout-button {
            width: 100%;
            padding: 11px;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 8px;
            color: #fff;
            background: transparent;
            cursor: pointer;
            font: inherit;
            font-size: 12px;
            text-align: left;
        }

        .logout-button:hover {
            background: rgba(255,255,255,.08);
        }

        /* Area konten dan topbar */
        .main-area { min-width: 0; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            min-height: 76px;
            padding: 15px 32px;
            border-bottom: 1px solid var(--border);
            background: #fff;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 12px;
        }

        .breadcrumb strong { color: var(--navy); }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            color: var(--navy);
            background: #f7e9c8;
            font-weight: 800;
        }

        .user-name, .user-role { display: block; }

        .user-name {
            color: var(--navy);
            font-size: 12px;
            font-weight: 700;
        }

        .user-role {
            margin-top: 3px;
            color: var(--muted);
            font-size: 11px;
        }

        .content {
            width: 100%;
            max-width: 1100px;
            padding: 30px 32px;
            margin: 0 auto;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .eyebrow {
            margin-bottom: 8px;
            color: #9b7628;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-size: 27px;
            letter-spacing: -.5px;
        }

        .page-description {
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--white);
            box-shadow: 0 4px 16px rgba(16,45,79,.035);
        }

        .card-heading {
            padding: 22px 25px;
            border-bottom: 1px solid var(--border);
            background: #fff;
        }

        .card-heading h2 {
            margin: 0;
            color: var(--navy);
            font-size: 16px;
        }

        .card-heading p {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .form-body { padding: 26px; }

        .field { margin-bottom: 23px; }

        label {
            display: block;
            margin-bottom: 9px;
            color: var(--navy);
            font-size: 13px;
            font-weight: 700;
        }

        .required { color: #b91c1c; }

        input, textarea {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d5deea;
            border-radius: 8px;
            outline: none;
            color: #182b45;
            background: #fff;
            font-family: inherit;
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input { min-height: 44px; }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.7;
        }

        input:focus, textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(217,173,80,.16);
        }

        .hint {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .error {
            margin-top: 7px;
            color: #b91c1c;
            font-size: 12px;
        }

        .alert {
            padding: 15px 18px;
            margin-bottom: 20px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            color: #991b1b;
            background: #fef2f2;
            font-size: 13px;
        }

        .alert ul {
            padding-left: 20px;
            margin-bottom: 0;
            line-height: 1.8;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            padding: 19px 26px;
            border-top: 1px solid var(--border);
            background: #f8fafc;
        }

        .form-footer-note {
            max-width: 390px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 10px 15px;
            border: 1px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            transition: opacity .2s, transform .2s;
        }

        .button:hover {
            opacity: .9;
            transform: translateY(-1px);
        }

        .button-gold {
            color: var(--navy-dark);
            background: var(--gold);
        }

        .button-secondary {
            border-color: #d5deea;
            color: var(--navy);
            background: #fff;
        }

        .footer {
            padding: 24px 0 5px;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.7;
        }

        @media (max-width: 900px) {
            .app { grid-template-columns: 220px minmax(0, 1fr); }
            .topbar { padding: 15px 22px; }
            .content { padding: 25px 22px; }
        }

        @media (max-width: 680px) {
            .app { display: block; }

            .sidebar {
                min-height: auto;
                padding: 16px;
            }

            .brand { padding-bottom: 18px; }

            .nav-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .nav-link { padding: 10px 8px; font-size: 11px; }
            .nav-label { margin-top: 5px; }
            .sidebar-bottom { padding-top: 15px; }
            .sidebar-note { display: none; }

            .topbar {
                min-height: 65px;
                padding: 13px 16px;
            }

            .breadcrumb { font-size: 10px; }
            .user-chip { gap: 7px; }
            .avatar { width: 32px; height: 32px; }
            .user-name { max-width: 100px; overflow-wrap: anywhere; }
            .content { padding: 23px 15px; }
            .page-heading { align-items: flex-start; flex-direction: column; }
            h1 { font-size: 23px; }
            .form-body { padding: 20px 17px; }
            .card-heading { padding: 19px 17px; }
            .form-footer { padding: 17px; align-items: flex-start; }
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
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            @if (in_array($user->role, ['admin', 'editor'], true))
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <span class="nav-icon">▦</span>
                    <span>Kategori layanan</span>
                </a>
            @endif

            <a class="nav-link" href="{{ route('admin.services.index') }}">
                <span class="nav-icon">▤</span>
                <span>Informasi layanan</span>
            </a>

            <a class="nav-link" href="{{ route('admin.faqs.index') }}">
                <span class="nav-icon">?</span>
                <span>FAQ</span>
            </a>

            <a class="nav-link active" href="{{ route('admin.instagram-reels.index') }}">
                <span class="nav-icon">▶</span>
                <span>Instagram Reels</span>
            </a>

            <a class="nav-link" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                <span class="nav-icon">↗</span>
                <span>Halaman publik</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="sidebar-note">
                <strong>Area kerja Anda</strong>
                Menu ditampilkan berdasarkan hak akses akun.
            </div>

            <form method="POST" action="{{ route('admin.logout') }}">
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
                Panel administrasi &nbsp; / &nbsp;
                <a href="{{ route('admin.instagram-reels.index') }}">Instagram Reels</a>
                &nbsp; / &nbsp; <strong>Edit</strong>
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
            <div class="page-heading">
                <div>
                    <div class="eyebrow">Manajemen konten</div>
                    <h1>Edit Instagram Reel</h1>
                    <p class="page-description">
                        Perbarui informasi Reel yang dikelola KLIK TIKKIM.
                        Perubahan pada konten memerlukan verifikasi ulang.
                    </p>
                </div>

                <a class="button button-secondary"
                   href="{{ route('admin.instagram-reels.index') }}">
                    ← Kembali ke daftar
                </a>
            </div>

            @if ($errors->any())
                <div class="alert">
                    <strong>Data belum dapat disimpan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="card">
                <div class="card-heading">
                    <h2>Informasi Reel</h2>
                    <p>
                        Lengkapi data dengan benar. Gunakan URL Instagram
                        yang mengarah ke postingan atau Reel yang valid.
                    </p>
                </div>

                <form method="POST"
                      action="{{ route('admin.instagram-reels.update', $instagramReel) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-body">
                        <div class="field">
                            <label for="title">
                                Judul Reel <span class="required">*</span>
                            </label>
                            <input
                                id="title"
                                name="title"
                                type="text"
                                maxlength="255"
                                value="{{ old('title', $instagramReel->title) }}"
                                placeholder="Contoh: Panduan Pembayaran M-Paspor"
                                required
                            >
                            @error('title')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="instagram_url">
                                URL Instagram <span class="required">*</span>
                            </label>
                            <input
                                id="instagram_url"
                                name="instagram_url"
                                type="url"
                                maxlength="2048"
                                value="{{ old('instagram_url', $instagramReel->instagram_url) }}"
                                placeholder="https://www.instagram.com/reel/..."
                                required
                            >
                            <p class="hint">
                                Pastikan tautan mengarah ke postingan Instagram
                                yang ingin ditampilkan.
                            </p>
                            @error('instagram_url')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="description">Deskripsi</label>
                            <textarea
                                id="description"
                                name="description"
                                maxlength="2000"
                                placeholder="Tambahkan ringkasan informasi untuk pengunjung..."
                            >{{ old('description', $instagramReel->description) }}</textarea>
                            <p class="hint">
                                Deskripsi bersifat opsional, maksimal 2.000 karakter.
                            </p>
                            @error('description')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field" style="margin-bottom: 0;">
                            <label for="sort_order">Urutan Tampilan</label>
                            <input
                                id="sort_order"
                                name="sort_order"
                                type="number"
                                min="0"
                                max="4294967295"
                                value="{{ old('sort_order', $instagramReel->sort_order) }}"
                            >
                            <p class="hint">
                                Angka lebih kecil akan ditampilkan lebih dahulu.
                            </p>
                            @error('sort_order')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-footer">
                        <div class="form-footer-note">
                            <strong>Perhatian:</strong>
                            jika isi konten berubah, Reel akan memerlukan
                            verifikasi dan aktivasi kembali.
                        </div>

                        <div class="actions">
                            <a class="button button-secondary"
                               href="{{ route('admin.instagram-reels.index') }}">
                                Batal
                            </a>

                            <button class="button button-gold" type="submit">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </section>

            <footer class="footer">
                KLIK TIKKIM · Panel administrasi<br>
                Kelola informasi secara cermat dan bertanggung jawab.
            </footer>
        </main>
    </div>
</div>
</body>
</html>