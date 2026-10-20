
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Reel — KLIK TIKKIM</title>
    <style>
        body {
            margin: 0;
            padding: 24px;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #182b45;
            background: #f4f7fb;
        }

        .container { max-width: 760px; margin: auto; }

        .card {
            padding: 26px;
            border: 1px solid #e1e8f0;
            border-radius: 14px;
            background: white;
        }

        h1 { margin-top: 0; color: #102d4f; }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 700;
        }

        input, textarea {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
        }

        textarea { min-height: 100px; resize: vertical; }

        .help {
            margin-top: 6px;
            color: #64748b;
            font-size: 13px;
        }

        .error { color: #b91c1c; font-size: 13px; margin-top: 5px; }

        .alert {
            padding: 12px;
            border-radius: 8px;
            color: #991b1b;
            background: #fee2e2;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 24px;
        }

        .button {
            display: inline-block;
            padding: 11px 16px;
            border: 0;
            border-radius: 8px;
            color: white;
            background: #102d4f;
            text-decoration: none;
            font: inherit;
            cursor: pointer;
        }

        .button-gold { color: #102d4f; background: #d9ad50; }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Tambah Instagram Reel</h1>
        <p>Masukkan tautan video informasi dari akun Instagram resmi yang telah diperiksa sumbernya.</p>

        @if ($errors->any())
            <div class="alert">
                <strong>Periksa kembali isian berikut:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.instagram-reels.store') }}">
            @csrf

            <label for="title">Judul Reel</label>
            <input
                id="title"
                name="title"
                type="text"
                maxlength="255"
                value="{{ old('title') }}"
                required
                placeholder="Contoh: Informasi Permohonan Paspor"
            >
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="instagram_url">URL Reel Instagram</label>
            <input
                id="instagram_url"
                name="instagram_url"
                type="url"
                maxlength="2048"
                value="{{ old('instagram_url') }}"
                required
                placeholder="https://www.instagram.com/reel/..."
            >
            <p class="help">
                Gunakan tautan postingan publik Instagram, misalnya URL yang memuat
                /reel/ atau /p/. Tautan akan divalidasi saat disimpan.
            </p>
            @error('instagram_url')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="description">Deskripsi (opsional)</label>
            <textarea
                id="description"
                name="description"
                maxlength="2000"
                placeholder="Ringkasan isi video..."
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="sort_order">Urutan tampil</label>
            <input
                id="sort_order"
                name="sort_order"
                type="number"
                min="0"
                max="4294967295"
                value="{{ old('sort_order', 0) }}"
            >
            <p class="help">Angka lebih kecil akan tampil lebih dahulu.</p>
            @error('sort_order')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="actions">
                <button class="button button-gold" type="submit">
                    Simpan sebagai draf
                </button>

                <a class="button" href="{{ route('admin.instagram-reels.index') }}">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
