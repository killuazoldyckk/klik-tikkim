<!DOCTYPE html>

<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Kategori — KLIK TIKKIM</title>
        <style>
            * { box-sizing: border-box; }
            body {
                margin: 0;
                padding: 24px;
                font-family: Arial, sans-serif;
                background: #f1f5f9;
                color: #172033;
            }
            main {
                max-width: 680px;
                margin: 24px auto;
                padding: 28px;
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
            }
            label { display: block; margin: 18px 0 8px; font-weight: bold; }
            input[type="text"], input[type="number"], textarea, select {
                width: 100%;
                padding: 11px;
                border: 1px solid #cbd5e1;
                border-radius: 7px;
                font: inherit;
            }
            textarea { min-height: 110px; resize: vertical; }
            .actions { display: flex; gap: 10px; margin-top: 24px; }
            .button {
                display: inline-block;
                padding: 11px 15px;
                border: 0;
                border-radius: 7px;
                background: #123b63;
                color: white;
                text-decoration: none;
                cursor: pointer;
                font: inherit;
            }
            .secondary { background: #64748b; }
            .errors { color: #b91c1c; }
        </style>
    </head>
    <body>
        <main>
            <h1>Tambah Kategori</h1>
            <p>Isi informasi kategori layanan berikut.</p>

            @if ($errors->any())
            <div class="errors" role="alert">
                <strong>Periksa kembali data:</strong>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <label for="name">Nama kategori *</label>
                <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            maxlength="150"
                            required
                        >
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                <label for="sort_order">Urutan tampilan *</label>
                <input
                            id="sort_order"
                            type="number"
                            name="sort_order"
                            value="{{ old('sort_order', 0) }}"
                            min="0"
                            required
                        >
                <label for="is_active">Status kategori *</label>
                <select id="is_active" name="is_active" required>
                    <option value="1" @selected(old('is_active', '1') == '1')>Aktif</option>
                    <option value="0" @selected(old('is_active') == '0')>Nonaktif</option>
                </select>
                <div class="actions">
                    <button class="button" type="submit">Simpan Kategori</button>
                    <a class="button secondary" href="{{ route('admin.categories.index') }}">Batal</a>
                </div>
            </form>
        </main>
    </body>
</html>