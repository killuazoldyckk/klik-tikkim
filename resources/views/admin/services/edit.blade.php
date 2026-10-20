<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Layanan — KLIK TIKKIM</title>

    <style>
        :root {
            --navy: #102d4f;
            --navy-light: #193f69;
            --gold: #d9ad50;
            --background: #f4f7fb;
            --text: #182b45;
            --muted: #64748b;
            --border: #dbe3ed;
            --white: #ffffff;
            --danger: #b91c1c;
            --success: #166534;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 32px 20px;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 850px;
            margin: 0 auto;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .brand {
            color: var(--navy);
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.4px;
        }

        .brand span {
            color: #a77920;
        }

        .breadcrumb {
            margin-top: 5px;
            color: var(--muted);
            font-size: 13px;
        }

        .breadcrumb a {
            color: var(--navy-light);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .panel {
            overflow: hidden;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 28px rgba(16, 45, 79, 0.06);
        }

        .panel-header {
            padding: 28px 32px;
            border-bottom: 1px solid var(--border);
            border-top: 4px solid var(--gold);
            background: linear-gradient(
                135deg,
                #ffffff 0%,
                #f8fafd 100%
            );
        }

        .eyebrow {
            margin: 0 0 6px;
            color: #9a7427;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-size: 28px;
            line-height: 1.3;
        }

        .description {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .panel-body {
            padding: 28px 32px 32px;
        }

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 24px;
            padding: 15px 16px;
            border: 1px solid #f0d79d;
            border-radius: 10px;
            background: #fff9e9;
            color: #805d13;
            font-size: 14px;
        }

        .notice strong {
            display: block;
            margin-bottom: 3px;
        }

        .notice p {
            margin: 0;
        }

        .alert-error {
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #fecaca;
            border-radius: 10px;
            background: #fef2f2;
            color: var(--danger);
            font-size: 14px;
        }

        .alert-error strong {
            display: block;
            margin-bottom: 5px;
        }

        .alert-error ul {
            margin: 6px 0 0;
            padding-left: 20px;
        }

        .form-section-title {
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border);
            color: var(--navy);
            font-size: 16px;
            font-weight: 700;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            min-width: 0;
        }

        .field-full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: var(--text);
            font-size: 14px;
            font-weight: 700;
        }

        .required {
            color: var(--danger);
        }

        input,
        select,
        textarea {
            display: block;
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            background: #ffffff;
            color: var(--text);
            font: inherit;
            font-size: 14px;
            transition:
                border-color 0.2s,
                box-shadow 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--navy-light);
            box-shadow: 0 0 0 3px rgba(25, 63, 105, 0.12);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.7;
        }

        #summary {
            min-height: 100px;
        }

        .help {
            display: block;
            margin-top: 6px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .field-error {
            display: block;
            margin-top: 6px;
            color: var(--danger);
            font-size: 12px;
        }

        .is-invalid {
            border-color: var(--danger);
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
        }

        .action-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 43px;
            padding: 11px 18px;
            border: 1px solid transparent;
            border-radius: 9px;
            font: inherit;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition:
                background 0.2s,
                border-color 0.2s;
        }

        .button-primary {
            background: var(--navy);
            color: white;
        }

        .button-primary:hover {
            background: var(--navy-light);
        }

        .button-secondary {
            border-color: var(--border);
            background: white;
            color: var(--navy);
        }

        .button-secondary:hover {
            background: #f1f5f9;
        }

        .footer-note {
            margin: 18px 0 0;
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 600px) {
            body {
                padding: 18px 12px;
            }

            .topbar {
                align-items: flex-start;
            }

            .panel-header {
                padding: 23px 20px;
            }

            .panel-body {
                padding: 22px 20px;
            }

            h1 {
                font-size: 23px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 17px;
            }

            .field-full {
                grid-column: auto;
            }

            .form-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .action-group {
                display: grid;
                grid-template-columns: 1fr;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <header class="topbar">
        <div>
            <div class="brand">KLIK <span>TIKKIM</span></div>

            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                /
                <a href="{{ route('admin.services.index') }}">
                    Data Layanan
                </a>
                / Edit
            </nav>
        </div>
    </header>

    <main class="panel">
        <div class="panel-header">
            <p class="eyebrow">Administrasi Konten</p>
            <h1>Edit Layanan</h1>
            <p class="description">
                Perbarui informasi layanan dan pastikan sumber yang
                digunakan berasal dari kanal resmi keimigrasian.
            </p>
        </div>

        <div class="panel-body">

            @if (session('error'))
                <div class="alert-error" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error" role="alert">
                    <strong>Periksa kembali data yang dimasukkan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($service->is_verified)
                <div class="notice" role="status">
                    <div>
                        <strong>Layanan telah diverifikasi</strong>
                        <p>
                            Perubahan pada konten dapat mengembalikan
                            status ke draft sehingga informasi perlu
                            diverifikasi kembali sebelum dipublikasikan.
                        </p>
                    </div>
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('admin.services.update', $service) }}"
            >
                @csrf
                @method('PUT')

                <h2 class="form-section-title">
                    Informasi Layanan
                </h2>

                <div class="form-grid">

                    <div class="field field-full">
                        <label for="service_category_id">
                            Kategori <span class="required">*</span>
                        </label>

                        <select
                            id="service_category_id"
                            name="service_category_id"
                            class="@error('service_category_id') is-invalid @enderror"
                            required
                            aria-describedby="category-help"
                        >
                            <option value="">-- Pilih kategori --</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(
                                        (string) old(
                                            'service_category_id',
                                            $service->service_category_id
                                        ) === (string) $category->id
                                    )
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <small id="category-help" class="help">
                            Pilih kategori yang sesuai dengan jenis layanan.
                        </small>

                        @error('service_category_id')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field field-full">
                        <label for="title">
                            Judul Layanan <span class="required">*</span>
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $service->title) }}"
                            maxlength="200"
                            required
                            class="@error('title') is-invalid @enderror"
                            autocomplete="off"
                        >

                        @error('title')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field field-full">
                        <label for="summary">Ringkasan Layanan</label>

                        <textarea
                            id="summary"
                            name="summary"
                            maxlength="500"
                            class="@error('summary') is-invalid @enderror"
                            aria-describedby="summary-help"
                        >{{ old('summary', $service->summary) }}</textarea>

                        <small id="summary-help" class="help">
                            Ringkasan singkat untuk membantu masyarakat
                            memahami layanan.
                        </small>

                        @error('summary')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field field-full">
                        <label for="content">
                            Isi Informasi Layanan
                            <span class="required">*</span>
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            required
                            class="@error('content') is-invalid @enderror"
                            aria-describedby="content-help"
                        >{{ old('content', $service->content) }}</textarea>

                        <small id="content-help" class="help">
                            Cantumkan persyaratan, prosedur, atau informasi
                            lain yang relevan dan telah diperiksa.
                        </small>

                        @error('content')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field field-full">
                        <label for="official_url">
                            Tautan Sumber Resmi
                            <span class="required">*</span>
                        </label>

                        <input
                            id="official_url"
                            type="url"
                            name="official_url"
                            value="{{ old('official_url', $service->official_url) }}"
                            maxlength="2048"
                            required
                            class="@error('official_url') is-invalid @enderror"
                            placeholder="https://..."
                            inputmode="url"
                        >

                        <small class="help">
                            Pastikan tautan merujuk pada sumber resmi
                            dan dapat diakses.
                        </small>

                        @error('official_url')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="sort_order">
                            Urutan Tampilan
                            <span class="required">*</span>
                        </label>

                        <input
                            id="sort_order"
                            type="number"
                            name="sort_order"
                            value="{{ old('sort_order', $service->sort_order) }}"
                            min="0"
                            required
                            class="@error('sort_order') is-invalid @enderror"
                        >

                        <small class="help">
                            Gunakan angka untuk mengatur urutan layanan.
                        </small>

                        @error('sort_order')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">
                    <a
                        class="button button-secondary"
                        href="{{ route('admin.services.index') }}"
                    >
                        Batal
                    </a>

                    <div class="action-group">
                        <button
                            class="button button-primary"
                            type="submit"
                        >
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <p class="footer-note">
        KLIK TIKKIM — Kanal Literasi Informasi Layanan dan Komunikasi
        Keimigrasian
    </p>

</div>
</body>
</html>