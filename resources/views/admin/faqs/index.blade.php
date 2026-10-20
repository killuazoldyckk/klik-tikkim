<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102d4f">
    <title>Kelola FAQ — KLIK TIKKIM</title>

    <style>
        :root {
            --navy: #102d4f;
            --navy-light: #193f69;
            --gold: #d9ad50;
            --ink: #182b45;
            --muted: #64748b;
            --background: #f4f7fb;
            --border: #e1e8f0;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            color: var(--ink);
            background: var(--background);
            line-height: 1.6;
        }

        a { color: inherit; }

        a:focus-visible, button:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 3px;
        }

        .topbar {
            color: white;
            background: var(--navy);
        }

        .topbar-inner {
            width: min(1200px, calc(100% - 40px));
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(217,173,80,.7);
            border-radius: 12px;
            color: var(--gold);
            font-weight: 800;
        }

        .brand-name {
            display: block;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .brand-subtitle {
            display: block;
            margin-top: 2px;
            color: #c7d5e5;
            font-size: 10px;
        }

        .topbar-link {
            color: #f3f6fb;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .topbar-link:hover { color: var(--gold); }

        main {
            width: min(1200px, calc(100% - 40px));
            margin: 32px auto 50px;
        }

        .breadcrumb {
            margin-bottom: 20px;
            color: var(--muted);
            font-size: 12px;
        }

        .breadcrumb a {
            color: #315779;
            text-decoration: none;
        }

        .page-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .eyebrow {
            margin: 0 0 7px;
            color: #98752e;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-size: clamp(27px, 4vw, 34px);
            letter-spacing: -.7px;
            line-height: 1.3;
        }

        .page-description {
            max-width: 650px;
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 37px;
            padding: 9px 13px;
            border: 1px solid transparent;
            border-radius: 8px;
            color: white;
            background: var(--navy);
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.4;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: background .2s;
        }

        .button:hover { background: var(--navy-light); }

        .button-primary {
            min-height: 43px;
            padding: 11px 16px;
        }

        .button-success {
            color: white;
            background: #176747;
        }

        .button-success:hover { background: #12563b; }

        .button-danger {
            color: #a12d35;
            border-color: #f0cfd2;
            background: #fff5f5;
        }

        .button-danger:hover { background: #fee9e9; }

        .button-neutral {
            color: #315779;
            border-color: #d9e3ef;
            background: #f7f9fc;
        }

        .button-neutral:hover { background: #edf3fa; }

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            padding: 14px 16px;
            border: 1px solid;
            border-radius: 11px;
            font-size: 13px;
        }

        .notice strong {
            display: block;
            margin-bottom: 2px;
        }

        .notice-success {
            color: #176747;
            border-color: #bde5d0;
            background: #f0fbf5;
        }

        .notice-error {
            color: #a12d35;
            border-color: #f0cfd2;
            background: #fff5f5;
        }

        .notice-icon {
            font-size: 17px;
            font-weight: 800;
        }

        .panel {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: white;
            box-shadow: 0 5px 20px rgba(16,45,79,.035);
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
        }

        .panel-heading h2 {
            margin: 0;
            color: var(--navy);
            font-size: 16px;
        }

        .panel-heading p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .record-count {
            padding: 5px 9px;
            border-radius: 7px;
            color: #775a24;
            background: #f8efd9;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 920px;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            padding: 13px 17px;
            color: #5d7087;
            background: #f8fafc;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 17px;
            border-top: 1px solid #edf0f5;
            vertical-align: top;
            font-size: 12px;
        }

        tbody tr:hover { background: #fbfcfe; }

        .question {
            max-width: 330px;
            color: var(--navy);
            font-size: 13px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .answer-preview {
            max-width: 350px;
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .service-name {
            max-width: 190px;
            color: #405670;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border: 1px solid transparent;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            flex-shrink: 0;
            border-radius: 50%;
            background: currentColor;
        }

        .status-published {
            color: #176747;
            border-color: #c9ead8;
            background: #effaf4;
        }

        .status-draft {
            color: #8a641b;
            border-color: #f0dfb6;
            background: #fff9e9;
        }

        .status-verified {
            color: #245b91;
            border-color: #cfe1f5;
            background: #f0f7ff;
        }

        .status-unverified {
            color: #a12d35;
            border-color: #f0cfd2;
            background: #fff5f5;
        }

        .verifier-name {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 10px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 6px;
            min-width: 180px;
        }

        .actions form { margin: 0; }

        .empty-state {
            padding: 42px 20px;
            color: var(--muted);
            text-align: center;
        }

        .empty-state strong {
            display: block;
            margin-bottom: 6px;
            color: var(--navy);
            font-size: 15px;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 17px 22px;
            border-top: 1px solid var(--border);
        }

        .pagination-info {
            color: var(--muted);
            font-size: 11px;
        }

        .pagination-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .footer {
            margin-top: 22px;
            color: var(--muted);
            font-size: 11px;
        }

        @media (max-width: 700px) {
            .topbar-inner, main {
                width: calc(100% - 28px);
            }

            .topbar-inner { min-height: 68px; }

            .brand-mark {
                width: 37px;
                height: 37px;
            }

            .brand-name { font-size: 15px; }

            .brand-subtitle { max-width: 200px; }

            main { margin-top: 23px; }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .button-primary { align-self: stretch; }

            .panel-heading { padding: 17px; }

            .pagination {
                align-items: flex-start;
                flex-direction: column;
                padding: 16px;
            }

            .pagination-actions { width: 100%; }

            .pagination-actions .button { flex: 1; }
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
<header class="topbar">
    <div class="topbar-inner">
        <a class="brand" href="{{ route('admin.dashboard') }}">
            <span class="brand-mark">KT</span>
            <span>
                <span class="brand-name">KLIK TIKKIM</span>
                <span class="brand-subtitle">Panel administrasi</span>
            </span>
        </a>

        <a class="topbar-link" href="{{ route('admin.dashboard') }}">
            ← Dashboard
        </a>
    </div>
</header>

@php
    $role = auth()->user()->role;
    $canManage = in_array($role, ['admin', 'editor'], true);
    $canVerify = in_array($role, ['admin', 'verifikator'], true);
@endphp

<main>
    <div class="breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        &nbsp; / &nbsp; <strong>FAQ</strong>
    </div>

    <section class="page-heading">
        <div>
            <p class="eyebrow">Manajemen konten</p>
            <h1>Kelola FAQ</h1>
            <p class="page-description">
                Kelola pertanyaan dan jawaban untuk membantu masyarakat
                memahami informasi layanan keimigrasian.
            </p>
        </div>

        @if ($canManage)
            <a class="button button-primary" href="{{ route('admin.faqs.create') }}">
                <span aria-hidden="true">＋</span>
                Tambah FAQ
            </a>
        @endif
    </section>

    @if (session('success'))
        <div class="notice notice-success" role="status">
            <span class="notice-icon" aria-hidden="true">✓</span>
            <div>
                <strong>Berhasil</strong>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="notice notice-error" role="alert">
            <span class="notice-icon" aria-hidden="true">!</span>
            <div>
                <strong>Tindakan belum berhasil</strong>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <section class="panel">
        <div class="panel-heading">
            <div>
                <h2>Daftar pertanyaan dan jawaban</h2>
                <p>Periksa status FAQ dan lakukan tindakan sesuai hak akses.</p>
            </div>

            <span class="record-count">{{ $faqs->total() }} data</span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Pertanyaan dan jawaban</th>
                        <th>Layanan terkait</th>
                        <th>Publikasi</th>
                        <th>Verifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($faqs as $faq)
                        <tr>
                            <td>
                                <div class="question">{{ $faq->question }}</div>

                                <p class="answer-preview">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($faq->answer), 160) }}
                                </p>
                            </td>

                            <td>
                                <span class="service-name">
                                    {{ $faq->service?->title ?? 'FAQ umum' }}
                                </span>
                            </td>

                            <td>
                                @if ($faq->publication_status === 'published')
                                    <span class="status status-published">Terpublikasi</span>
                                @else
                                    <span class="status status-draft">Draft</span>
                                @endif
                            </td>

                            <td>
                                @if ($faq->is_verified && $faq->verified_at)
                                    <span class="status status-verified">Terverifikasi</span>

                                    @if ($faq->verified_by_name)
                                        <p class="verifier-name">
                                            Oleh {{ $faq->verified_by_name }}
                                        </p>
                                    @endif
                                @else
                                    <span class="status status-unverified">Belum diverifikasi</span>
                                @endif
                            </td>

                            <td>
                                <div class="actions">
                                    @if ($canManage)
                                        <a class="button button-neutral"
                                           href="{{ route('admin.faqs.edit', $faq) }}">
                                            Edit
                                        </a>

                                        <form method="POST"
                                              action="{{ route('admin.faqs.destroy', $faq) }}"
                                              onsubmit="return confirm('Yakin ingin menghapus FAQ ini? Tindakan ini tidak dapat dibatalkan.')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="button button-danger" type="submit">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif

                                    @if ($canVerify)
                                        @if (! $faq->is_verified || ! $faq->verified_at)
                                            <form method="POST"
                                                  action="{{ route('admin.faqs.verify', $faq) }}">
                                                @csrf

                                                <button class="button button-success" type="submit">
                                                    Verifikasi
                                                </button>
                                            </form>
                                        @elseif ($faq->publication_status !== 'published')
                                            <form method="POST"
                                                  action="{{ route('admin.faqs.publish', $faq) }}">
                                                @csrf
                                                @method('PATCH')

                                                <button class="button button-success" type="submit">
                                                    Terbitkan
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST"
                                                  action="{{ route('admin.faqs.unpublish', $faq) }}"
                                                  onsubmit="return confirm('Jadikan FAQ ini sebagai draft? FAQ tidak akan tampil di halaman publik.')">
                                                @csrf
                                                @method('PATCH')

                                                <button class="button button-neutral" type="submit">
                                                    Jadikan Draft
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <strong>Belum ada FAQ</strong>
                                    Pertanyaan dan jawaban yang dibuat akan ditampilkan di sini.

                                    @if ($canManage)
                                        <p>
                                            <a href="{{ route('admin.faqs.create') }}">
                                                Tambahkan FAQ pertama
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <div class="pagination-info">
                @if ($faqs->total() > 0)
                    Menampilkan {{ $faqs->firstItem() }}–{{ $faqs->lastItem() }}
                    dari {{ $faqs->total() }} data
                @else
                    Belum ada data untuk ditampilkan
                @endif

                · Halaman {{ $faqs->currentPage() }} dari {{ $faqs->lastPage() }}
            </div>

            <div class="pagination-actions">
                @if ($faqs->previousPageUrl())
                    <a class="button button-neutral"
                       href="{{ $faqs->previousPageUrl() }}">
                        ← Sebelumnya
                    </a>
                @endif

                @if ($faqs->nextPageUrl())
                    <a class="button button-neutral"
                       href="{{ $faqs->nextPageUrl() }}">
                        Berikutnya →
                    </a>
                @endif
            </div>
        </div>
    </section>

    <footer class="footer">
        KLIK TIKKIM · Panel administrasi informasi keimigrasian
    </footer>
</main>
</body>
</html>