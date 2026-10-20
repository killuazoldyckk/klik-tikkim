<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — KLIK TIKKIM</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #172033;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 32px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
        }

        h1 { margin: 0 0 8px; font-size: 26px; }
        .subtitle { margin: 0 0 28px; color: #64748b; }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 16px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 18px 0;
            color: #475569;
        }

        button {
            width: 100%;
            padding: 13px;
            border: 0;
            border-radius: 8px;
            background: #123b63;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            margin-top: 8px;
            color: #b91c1c;
            font-size: 14px;
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <main class="login-card">
        <h1>KLIK TIKKIM</h1>
        <p class="subtitle">Masuk ke panel administrator</p>

        @if ($errors->any())
            <div class="error" role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <label for="email">Email administrator</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="username"
                required
                autofocus
            >

            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                autocomplete="current-password"
                required
            >

            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>

            <button type="submit">Masuk</button>
        </form>

        <p class="footer">
            KLIK TIKKIM · Panel Administrasi
        </p>
    </main>
</body>
</html>