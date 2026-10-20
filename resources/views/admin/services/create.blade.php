<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102d4f">
    <title>Tambah Layanan — KLIK TIKKIM</title>

    <style>
        :root {
            --navy: #102d4f;
            --navy-light: #193f69;
            --gold: #d9ad50;
            --ink: #182b45;
            --muted: #64748b;
            --background: #f4f7fb;
            --border: #dbe4ef;
            --danger: #a12d35;
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

        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        textarea:focus-visible,
        select:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 2px;
        }

        .topbar {
            color: white;
            background: var(--navy);
        }

        .topbar-inner {
            width: min(1000px, calc(100% - 40px));
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: white;
            text-decoration: none;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(217,173,80,.7);
            border-radius: 11px;
            color: var(--gold);
            font-weight: 800;
        }

        .brand-name {
            display: block;
            font-size: 16px;
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
            color: #f0f5fb;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .topbar-link:hover { color: var(--gold); }

        main {
            width: min(850px, calc(100% - 36px));
            margin: 30px auto 50px;
        }

        .breadcrumb {
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 12px;
        }

        .breadcrumb a {
            color: #315779;
            text-decoration: none;
        }

        .page-heading { margin-bottom: 23px; }

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
            font-size: clamp(26px, 4vw, 33px);
            line-height: 1.3;
            letter-spacing: -.6px;
        }

        .page-description {
            max-width: 650px;
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .workflow-note {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
            padding: 15px 17px;
            border: 1px solid #eadcb8;
            border-radius: 12px;
            background: #fffaf0;
        }

        .note-icon {
            flex-shrink: 0;
            color: #98752e;
            font-size: 19px;
        }

        .workflow-note strong {
            display: block;
            margin-bottom: 3px;
            color: #6e541f;
            font-size: 12px;
        }

        .workflow-note p {
            margin: 0;
            color: #796b4d;
            font-size: 12px;
        }

        .form-panel {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 6px 25px rgba(16,45,79,.04);
        }

        .panel-heading {
            padding: 21px 25px;
            border-bottom: 1px solid var(--border);
        }

        .panel-heading h2 {
            margin: 0;
            color: var(--navy);
            font-size: 16px;
        }

        .panel-heading p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .form-body { padding: 25px; }

        .errors {
            margin-bottom: 23px;
            padding: 15px 17px;
            border: 1px solid #f0cfd2;
            border-radius: 11px;
            color: var(--danger);
            background: #fff5f5;
            font-size: 12px;
        }

        .errors strong { display: block; }

        .errors ul {
            margin: 7px 0 0;
            padding-left: 20px;
        }

        .form-section + .form-section {
            margin-top: 29px;
            padding-top: 25px;
            border-top: 1px solid #edf0f5;
        }

        .form-section h3 {
            margin: 0 0 5px;
            color: var(--navy);
            font-size: 14px;
        }

        .section-description {
            margin: 0 0 19px;
            color: var(--muted);
            font-size: 11px;
        }

        .field { margin-top: 18px; }

        .field:first-child { margin-top: 0; }

        label {
            display: block;
            margin-bottom: 7px;
            color: #293e58;
            font-size: 12px;
            font-weight: 800;
        }

        .required {
            color: var(--danger);
        }

        input,
        textarea,
        select {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 13px;
            border: 1px solid #cbd6e3;
            border-radius: 9px;
            color: var(--ink);
            background: white;
            font: inherit;
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #527ca6;
            box-shadow: 0 0 0 3px rgba(25,63,105,.08);
        }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.7;
        }

        #content { min-height: 220px; }

        input::placeholder,
        textarea::placeholder {
            color: #9aa8b9;
        }

        .help {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .field-error {
            margin: 6px 0 0;
            color: var(--danger);
            font-size: 11px;
        }

        .has-error {
            border-color: #d66b73;
            background: #fffafa;
        }

        .empty-category {
            margin-top: 10px;
            padding: 13px 14px;
            border: 1px solid #f0cfd2;
            border-radius: 9px;
            color: var(--danger);
            background: #fff5f5;
            font-size: 12px;
        }

        .empty-category a {
            color: #8e2028;
            font-weight: 800;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 29px;
            padding-top: 22px;
            border-top: 1px solid #edf0f5;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 42px;
            padding: 11px 16px;
            border: 1px solid transparent;
            border-radius: 9px;
            font: inherit;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
        }

        .button-primary {
            color: white;
            background: var(--navy);
        }

        .button-primary:hover { background: var(--navy-light); }

        .button-secondary {
            color: #315779;
            border-color: #d9e3ef;
            background: #f7f9fc;
        }

        .button-secondary:hover { background: #edf3fa; }

        .footer {
            margin-top: 20px;
            color: var(--muted);
            font-size: 11px;
        }

        @media (max-width: 600px) {
            .topbar-inner {
                width: calc(100% - 28px);
                min-height: 65px;
            }

            .brand-mark {
                width: 36px;
                height: 36px;
            }

            .brand-name { font-size: 14px; }

            .brand-subtitle { max-width: 190px; }

            main {
                width: calc(100% - 28px);
                margin-top: 22px;
            }

            .panel-heading { padding: 18px; }

            .form-body { padding: 19px; }

            .actions { flex-direction: column; }

            .actions .button { width: 100%; }
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

        <a class="topbar-link" href="{{ route('admin.services.index') }}">
            ← Kembali ke layanan
        </a>
    </div>
</header>

<main>
    <div class="breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        &nbsp; / &nbsp;
        <a href="{{ route('admin.services.index') }}">Layanan</a>
        &nbsp; / &nbsp;
        <strong>Tambah layanan</strong>
    </div>

    <section class="page-heading">
        <p class="eyebrow">Manajemen konten</p>
        <h1>Tambah Layanan</h1>
        <p class="page-description">
            Lengkapi informasi layanan dan cantumkan tautan sumber resmi
            agar konten dapat diperiksa sebelum diterbitkan.
        </p>
    </section>

    <aside class="workflow-note">
        <span class="note-icon" aria-hidden="true">ⓘ</span>
        <div>
            <strong>Informasi penting</strong>
            <p>
                Layanan baru disimpan sebagai draft. Pastikan isi informasi
                dan sumber rujukannya benar sebelum diajukan untuk verifikasi.
            </p>
        </div>
    </aside>

    <section class="form-panel">
        <div class="panel-heading">
            <h2>Informasi layanan</h2>
            <p>Kolom bertanda <span class="required">*</span> wajib diisi.</p>
        </div>

        <div class="form-body">
            @if ($errors->any())
                <div class="errors" role="alert" aria-live="polite">
                    <strong>Data belum dapat disimpan. Periksa kembali:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf

                <section class="form-section">
                    <h3>Klasifikasi layanan</h3>
                    <p class="section-description">
                        Tentukan kategori dan judul agar informasi mudah ditemukan.
                    </p>

                    <div class="field">
                        <label for="service_category_id">
                            Kategori layanan <span class="required">*</span>
                        </label>

                        <select
                            id="service_category_id"
                            name="service_category_id"
                            class="{{ $errors->has('service_category_id') ? 'has-error' : '' }}"
                            required
                            aria-invalid="{{ $errors->has('service_category_id') ? 'true' : 'false' }}"
                            @if ($categories->isEmpty()) disabled @endif
                        >
                            <option value="">Pilih kategori layanan</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected((string) old('service_category_id') === (string) $category->id)
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('service_category_id')
                            <p class="field-error">{{ $message }}</p>
                        @enderror

                        @if ($categories->isEmpty())
                            <div class="empty-category">
                                Belum ada kategori layanan. Buat kategori terlebih dahulu
                                sebelum menambahkan layanan.
                                <a href="{{ route('admin.categories.index') }}">Kelola kategori</a>
                            </div>
                        @endif
                    </div>

                    <div class="field">
                        <label for="title">
                            Judul layanan <span class="required">*</span>
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            maxlength="200"
                            placeholder="Contoh: Informasi Biaya Paspor"
                            required
                            class="{{ $errors->has('title') ? 'has-error' : '' }}"
                            aria-invalid="{{ $errors->has('title') ? 'true' : 'false' }}"
                        >

                        @error('title')
                            <p class="field-error">{{ $message }}</p>
                        @enderror

                        <p class="help">
                            Gunakan judul yang singkat, jelas, dan mudah dipahami.
                        </p>
                    </div>
                </section>

                <section class="form-section">
                    <h3>Isi informasi</h3>
                    <p class="section-description">
                        Susun ringkasan dan penjelasan berdasarkan sumber yang dapat diperiksa.
                    </p>

                    <div class="field">
                        <label for="summary">Ringkasan layanan</label>

                        <textarea
                            id="summary"
                            name="summary"
                            maxlength="500"
                            placeholder="Tuliskan ringkasan singkat mengenai layanan..."
                            class="{{ $errors->has('summary') ? 'has-error' : '' }}"
                            aria-invalid="{{ $errors->has('summary') ? 'true' : 'false' }}"
                        >{{ old('summary') }}</textarea>

                        @error('summary')
                            <p class="field-error">{{ $message }}</p>
                        @enderror

                        <p class="help">Opsional. Maksimal 500 karakter.</p>
                    </div>

                    <div class="field">
                        <label for="content">
                            Isi informasi layanan <span class="required">*</span>
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            required
                            placeholder="Tuliskan persyaratan, prosedur, biaya, atau informasi terkait layanan..."
                            class="{{ $errors->has('content') ? 'has-error' : '' }}"
                            aria-invalid="{{ $errors->has('content') ? 'true' : 'false' }}"
                        >{{ old('content') }}</textarea>

                        @error('content')
                            <p class="field-error">{{ $message }}</p>
                        @enderror

                        <p class="help">
                            Pisahkan informasi menjadi paragraf yang jelas.
                            Pastikan rincian dan ketentuannya sesuai sumber rujukan.
                        </p>
                    </div>
                </section>

                <section class="form-section">
                    <h3>Sumber dan tampilan</h3>
                    <p class="section-description">
                        Cantumkan sumber resmi serta posisi layanan dalam daftar.
                    </p>

                    <div class="field">
                        <label for="official_url">
                            Tautan sumber resmi <span class="required">*</span>
                        </label>

                        <input
                            id="official_url"
                            type="url"
                            name="official_url"
                            value="{{ old('official_url') }}"
                            maxlength="2048"
                            placeholder="https://www.contoh.go.id/..."
                            required
                            class="{{ $errors->has('official_url') ? 'has-error' : '' }}"
                            aria-invalid="{{ $errors->has('official_url') ? 'true' : 'false' }}"
                        >

                        @error('official_url')
                            <p class="field-error">{{ $message }}</p>
                        @enderror

                        <p class="help">
                            Gunakan alamat halaman yang relevan dengan informasi yang dicantumkan.
                        </p>
                    </div>

                    <div class="field">
                        <label for="sort_order">
                            Urutan tampilan <span class="required">*</span>
                        </label>

                        <input
                            id="sort_order"
                            type="number"
                            name="sort_order"
                            value="{{ old('sort_order', 0) }}"
                            min="0"
                            required
                            class="{{ $errors->has('sort_order') ? 'has-error' : '' }}"
                            aria-invalid="{{ $errors->has('sort_order') ? 'true' : 'false' }}"
                        >

                        @error('sort_order')
                            <p class="field-error">{{ $message }}</p>
                        @enderror

                        <p class="help">
                            Angka lebih kecil biasanya ditampilkan lebih dahulu.
                        </p>
                    </div>
                </section>

                <div class="actions">
                    <button
                        class="button button-primary"
                        type="submit"
                        @if ($categories->isEmpty()) disabled @endif
                    >
                        Simpan sebagai Draft →
                    </button>

                    <a class="button button-secondary"
                       href="{{ route('admin.services.index') }}">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>

    <footer class="footer">
        KLIK TIKKIM · Panel administrasi informasi keimigrasian
    </footer>
</main>
</body>
</html>