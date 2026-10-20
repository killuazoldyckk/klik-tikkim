<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Layanan — KLIK TIKKIM</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #172033;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 18px 5%;
            background: #123b63;
            color: white;
        }

        header a { color: white; }

        main {
            max-width: 1100px;
            margin: 32px auto;
            padding: 0 20px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 10px 14px;
            border: 0;
            border-radius: 7px;
            background: #123b63;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .panel {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            vertical-align: top;
        }

        th { background: #f8fafc; }

        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 6px;
            background: #e2e8f0;
        }

        .success { color: #166534; }
        .error { color: #b91c1c; }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .actions form { margin: 0; }
        .delete { background: #991b1b; }
        .muted { color: #64748b; }

        .pagination {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 20px;
            align-items: center;
        }
    </style>
</head>
<body>
<header>
    <strong>KLIK TIKKIM · Admin</strong>
    <a href="{{ route('admin.dashboard') }}">Kembali ke dashboard</a>
</header>

<main>
    <div class="toolbar">
        <div>
            <h1>Kategori Layanan</h1>
            <p class="muted">Kelola kategori yang digunakan untuk mengelompokkan informasi layanan.</p>
        </div>
        <a class="button" href="{{ route('admin.categories.create') }}">+ Tambah Kategori</a>
    </div>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <section class="panel">
        <table>
            <thead>
                <tr>
                    <th>Nama kategori</th>
                    <th>Slug</th>
                    <th>Jumlah layanan</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>
                            <strong>{{ $category->name }}</strong>
                            @if ($category->description)
                                <p class="muted">{{ $category->description }}</p>
                            @endif
                        </td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->services_count }}</td>
                        <td>{{ $category->sort_order }}</td>
                        <td>
                            <span class="status">
                                {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <a class="button"
                                   href="{{ route('admin.categories.edit', $category) }}">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.categories.destroy', $category) }}"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button delete" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            <span class="muted">
                Halaman {{ $categories->currentPage() }} dari {{ $categories->lastPage() }}
            </span>
            <div class="actions">
                @if ($categories->previousPageUrl())
                    <a class="button" href="{{ $categories->previousPageUrl() }}">Sebelumnya</a>
                @endif

                @if ($categories->nextPageUrl())
                    <a class="button" href="{{ $categories->nextPageUrl() }}">Berikutnya</a>
                @endif
            </div>
        </div>
    </section>
</main>
</body>
</html>