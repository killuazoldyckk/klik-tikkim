<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit FAQ — KLIK TIKKIM</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --navy: #102d4f;
            --navy-light: #193f69;
            --gold: #d9ad50;
            --background: #f4f7fb;
            --border: #dbe3ee;
            --text: #172033;
            --muted: #64748b;
            --danger: #b91c1c;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background: var(--background);
            line-height: 1.6;
        }

        a {
            color: inherit;
        }

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
            border: 1px solid rgba(217, 173, 80, .7);
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

        .topbar-link:hover {
            color: var(--gold);
        }


        .container {
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

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .page-header h1 {
            margin: 0;
            color: var(--navy);
            font-size: clamp(26px, 4vw, 33px);
            line-height: 1.3;
            letter-spacing: -.6px;
        }

        .page-header p {
            max-width: 650px;
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .card {
            padding: 30px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(16, 45, 79, 0.05);
        }

        .notice {
            margin-bottom: 24px;
            padding: 15px 17px;
            background: #fff9e9;
            border: 1px solid #f0dfb2;
            border-left: 4px solid var(--gold);
            border-radius: 8px;
            color: #6b531b;
            font-size: 14px;
        }

        .notice strong {
            display: block;
            margin-bottom: 4px;
        }

        .error-summary {
            margin-bottom: 24px;
            padding: 15px 18px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            color: var(--danger);
        }

        .error-summary ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .field {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--navy);
            font-size: 14px;
            font-weight: 700;
        }

        .required {
            color: var(--danger);
        }

        input,
        textarea,
        select {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #fff;
            color: var(--text);
            font: inherit;
            font-size: 15px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--navy-light);
            box-shadow: 0 0 0 3px rgba(25, 63, 105, 0.12);
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .has-error {
            border-color: var(--danger);
        }

        .help {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .field-error {
            margin-top: 6px;
            color: var(--danger);
            font-size: 13px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #e8edf4;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 11px 18px;
            border: 1px solid transparent;
            border-radius: 8px;
            font: inherit;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .button:focus-visible {
            outline: 3px solid rgba(217, 173, 80, 0.6);
            outline-offset: 3px;
        }

        .button-primary {
            background: var(--navy);
            color: #fff;
        }

        .button-primary:hover {
            background: var(--navy-light);
        }

        .button-secondary {
            background: #fff;
            border-color: var(--border);
            color: var(--navy);
        }

        .button-secondary:hover {
            background: #f8fafc;
        }

        @media (max-width: 600px) {
            body {
                padding: 14px;
            }

            .topbar-inner {
                width: calc(100% - 28px);
                min-height: 65px;
            }

            .brand-mark {
                width: 36px;
                height: 36px;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-subtitle {
                max-width: 190px;
            }

            .topbar-link {
                text-align: right;
            }

            .container {
                width: calc(100% - 28px);
                margin-top: 22px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .card {
                padding: 20px 16px;
            }

            .actions {
                flex-direction: column;
            }

            .button {
                width: 100%;
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

            <a class="topbar-link" href="{{ route('admin.faqs.index') }}">
                ← Kembali ke FAQ
            </a>
        </div>
    </header>

    <main class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            &nbsp; / &nbsp;
            <a href="{{ route('admin.faqs.index') }}">FAQ</a>
            &nbsp; / &nbsp;
            <strong>Edit FAQ</strong>
        </nav>

        <section class="page-header">
            <p class="eyebrow">Manajemen konten</p>
            <h1>Edit FAQ</h1>
            <p>
                Periksa kembali pertanyaan, jawaban, dan layanan terkait
                sebelum menyimpan perubahan.
            </p>
        </section>

        <section class="card">
            @if (session('error'))
                <div class="error-summary" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-summary" role="alert">
                    <strong>Periksa kembali data yang kamu masukkan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($faq->is_verified)
                <div class="notice" role="status">
                    <strong>FAQ sudah diverifikasi</strong>
                    FAQ ini sudah diverifikasi. Jika pertanyaan, jawaban,
                    atau layanan terkait berubah, FAQ akan dikembalikan
                    menjadi draft sesuai aturan aplikasi.
                </div>
            @endif

            <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="service_id">Layanan terkait</label>

                    <select
                        id="service_id"
                        name="service_id"
                        class="@error('service_id') has-error @enderror"
                    >
                        <option value="">
                            FAQ umum (tidak terkait layanan tertentu)
                        </option>

                        @foreach ($services as $service)
                            <option
                                value="{{ $service->id }}"
                                @selected(
                                    (string) old('service_id', $faq->service_id)
                                    === (string) $service->id
                                )
                            >
                                {{ $service->title }}
                            </option>
                        @endforeach
                    </select>

                    <p class="help">
                        Pilih layanan jika FAQ berkaitan dengan layanan tertentu.
                    </p>

                    @error('service_id')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="question">
                        Pertanyaan <span class="required">*</span>
                    </label>

                    <input
                        id="question"
                        type="text"
                        name="question"
                        value="{{ old('question', $faq->question) }}"
                        maxlength="500"
                        class="@error('question') has-error @enderror"
                        required
                    >

                    @error('question')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="answer">
                        Jawaban <span class="required">*</span>
                    </label>

                    <textarea
                        id="answer"
                        name="answer"
                        class="@error('answer') has-error @enderror"
                        required
                    >{{ old('answer', $faq->answer) }}</textarea>

                    <p class="help">
                        Pastikan jawaban jelas, akurat, dan sesuai informasi resmi.
                    </p>

                    @error('answer')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="sort_order">
                        Urutan tampilan <span class="required">*</span>
                    </label>

                    <input
                        id="sort_order"
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', $faq->sort_order) }}"
                        min="0"
                        step="1"
                        class="@error('sort_order') has-error @enderror"
                        required
                    >

                    <p class="help">
                        Pengaruh urutan mengikuti aturan pengurutan di aplikasi.
                    </p>

                    @error('sort_order')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <button class="button button-primary" type="submit">
                        Simpan Perubahan
                    </button>

                    <a
                        class="button button-secondary"
                        href="{{ route('admin.faqs.index') }}"
                    >
                        Batal
                    </a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>