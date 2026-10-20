<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Instagram Reels — KLIK TIKKIM</title>
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

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            color: var(--ink);
            background: var(--background);
            line-height: 1.6;
        }

        a {
            color: inherit;
        }

        .app {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 255px minmax(0, 1fr);
        }

        /* Sidebar mengikuti dashboard */
        .sidebar {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 27px 18px 20px;
            color: white;
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
            color: white;
            background: rgba(255,255,255,.08);
        }

        .nav-link.active {
            color: white;
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
            background: rgba(255,255,255,.07);
        }

        /* Area konten dan topbar */
        .main-area {
            min-width: 0;
        }

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

        .breadcrumb strong {
            color: var(--navy);
        }

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

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 22px;
        }

        .page-heading h1 {
            margin: 0;
            color: var(--navy);
            font-size: clamp(24px, 3vw, 32px);
        }

        .page-heading p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        /* Tombol dan tabel */
        .button {
            display: inline-block;
            padding: 10px 14px;
            border: 0;
            border-radius: 8px;
            color: white;
            background: var(--navy);
            text-decoration: none;
            cursor: pointer;
            font: inherit;
            font-size: 13px;
            font-weight: 700;
        }

        .button-gold {
            color: var(--navy);
            background: var(--gold);
        }

        .button-red {
            background: #a83232;
        }

        .button-green {
            background: #237447;
        }

        .button-gray {
            background: #64748b;
        }

        .card {
            padding: 22px;
            margin-bottom: 18px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background: var(--white);
            box-shadow: 0 4px 15px rgba(16,45,79,.025);
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }

        th, td {
            padding: 13px 10px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid var(--border);
        }

        th {
            color: var(--navy);
            background: #f8fafc;
            font-size: 12px;
        }

        td {
            font-size: 13px;
        }

        td a {
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .actions form {
            display: inline;
        }

        .status {
            display: inline-block;
            padding: 4px 8px;
            margin: 2px 0;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-yes {
            color: #166534;
            background: #dcfce7;
        }

        .status-no {
            color: #92400e;
            background: #fef3c7;
        }

        .alert {
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .pagination {
            margin-top: 18px;
        }

        @media (max-width: 850px) {
            .app {
                grid-template-columns: 210px minmax(0, 1fr);
            }

            .sidebar {
                padding-inline: 12px;
            }

            .topbar {
                padding-inline: 22px;
            }

            .content {
                padding: 25px 22px 35px;
            }
        }

        @media (max-width: 650px) {
            .app {
                display: block;
            }

            .sidebar {
                min-height: auto;
                padding: 15px;
            }

            .brand {
                padding: 0 3px 14px;
            }

            .nav-label {
                margin-top: 15px;
            }

            .nav-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .nav-link {
                gap: 8px;
                padding: 10px;
                font-size: 11px;
            }

            .nav-icon {
                width: 19px;
            }

            .sidebar-bottom {
                padding-top: 15px;
            }

            .topbar {
                min-height: 60px;
                padding: 10px 16px;
            }

            .content {
                padding: 22px 15px 30px;
            }

            .card {
                padding: 16px;
            }

            .page-heading {
                align-items: flex-start;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
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
                <strong>Instagram Reels</strong>
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
                    <h1>Instagram Reels</h1>
                    <p>Kelola video informasi keimigrasian untuk halaman Home.</p>
                </div>

                @if (in_array($user->role, ['admin', 'editor'], true))
                    <a class="button button-gold"
                       href="{{ route('admin.instagram-reels.create') }}">
                        + Tambah Reel
                    </a>
                @endif
            </div>

            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            <section class="card">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Judul / URL</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th>Verifikasi</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($reels as $reel)
                                <tr>
                                    <td>
                                        <strong>{{ $reel->title }}</strong>

                                        @if ($reel->description)
                                            <p>{{ $reel->description }}</p>
                                        @endif

                                        <a href="{{ $reel->instagram_url }}"
                                           target="_blank"
                                           rel="noopener noreferrer">
                                            Buka Reel ↗
                                        </a>
                                    </td>

                                    <td>{{ $reel->sort_order }}</td>

                                    <td>
                                        @if ($reel->is_active)
                                            <span class="status status-yes">Aktif</span>
                                        @else
                                            <span class="status status-no">Tidak aktif</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($reel->is_verified && $reel->verified_at)
                                            <span class="status status-yes">Terverifikasi</span>
                                            <p>{{ $reel->verified_by_name }}</p>
                                        @else
                                            <span class="status status-no">Belum diverifikasi</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="actions">
                                            @if (in_array($user->role, ['admin', 'editor'], true))
                                                <a class="button"
                                                   href="{{ route('admin.instagram-reels.edit', $reel) }}">
                                                    Edit
                                                </a>

                                                <form method="POST"
                                                      action="{{ route('admin.instagram-reels.destroy', $reel) }}"
                                                      onsubmit="return confirm('Hapus Reel ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="button button-red" type="submit">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endif

                                            @if (in_array($user->role, ['admin', 'verifikator'], true))
                                                @if (!$reel->is_verified)
                                                    <form method="POST"
                                                          action="{{ route('admin.instagram-reels.verify', $reel) }}">
                                                        @csrf
                                                        <button class="button button-green" type="submit">
                                                            Verifikasi
                                                        </button>
                                                    </form>
                                                @else
                                                    @if (!$reel->is_active)
                                                        <form method="POST"
                                                              action="{{ route('admin.instagram-reels.publish', $reel) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="button button-green" type="submit">
                                                                Aktifkan
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form method="POST"
                                                              action="{{ route('admin.instagram-reels.unpublish', $reel) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="button button-gray" type="submit">
                                                                Nonaktifkan
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        Belum ada Reel. Tambahkan tautan Instagram untuk memulai.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    {{ $reels->links() }}
                </div>
            </section>

            <footer class="footer">
                KLIK TIKKIM · Panel administrasi
            </footer>
        </main>
    </div>
</div>
</body>
</html>
