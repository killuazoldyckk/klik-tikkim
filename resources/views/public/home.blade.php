<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#102d4f">
    <meta name="description" content="KLIK TIKKIM — portal literasi informasi layanan dan komunikasi keimigrasian.">
    <title>KLIK TIKKIM — Portal Informasi Keimigrasian</title>

    <style>
        :root {
            --navy: #102d4f;
            --navy-light: #193f69;
            --gold: #d9ad50;
            --gold-light: #f5e8c9;
            --ink: #182b45;
            --muted: #64748b;
            --surface: #ffffff;
            --background: #f4f7fb;
            --border: #e1e8f0;
            --radius: 18px;
            --shadow: 0 12px 35px rgba(16, 45, 79, .07);
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            color: var(--ink);
            background: var(--background);
            line-height: 1.65;
        }

        a { color: inherit; }

        a:focus-visible,
        button:focus-visible,
        input:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 3px;
        }

        .container {
            width: min(1120px, calc(100% - 40px));
            margin-inline: auto;
        }

        .topbar {
            background: #0b2039;
            color: #e2eaf4;
            font-size: 12px;
        }

        .topbar-inner {
            min-height: 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .site-header {
            background: var(--navy);
            color: white;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .header-inner {
            min-height: 86px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            color: white;
            text-decoration: none;
        }

        .brand-mark {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(217,173,80,.65);
            border-radius: 13px;
            color: var(--gold);
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-name {
            display: block;
            font-size: 21px;
            font-weight: 800;
            letter-spacing: .6px;
            line-height: 1.2;
        }

        .brand-subtitle {
            display: block;
            margin-top: 5px;
            color: #d0dbea;
            font-size: 11px;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .header-nav a {
            color: #edf3fb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .header-nav a:hover { color: var(--gold); }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 72px 0 68px;
            color: white;
            background:
                radial-gradient(ellipse at 90% 15%, rgba(217,173,80,.18), transparent 32%),
                linear-gradient(125deg, #102d4f, #194572);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 320px;
            height: 320px;
            right: -130px;
            bottom: -220px;
            border: 1px solid rgba(217,173,80,.28);
            border-radius: 50%;
            box-shadow: 0 0 0 35px rgba(217,173,80,.035),
                        0 0 0 75px rgba(217,173,80,.025);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 760px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 20px;
            color: var(--gold);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        .eyebrow::before {
            content: "";
            width: 25px;
            height: 2px;
            background: var(--gold);
        }

        .hero h1 {
            max-width: 720px;
            margin: 0;
            font-size: clamp(35px, 5vw, 58px);
            line-height: 1.13;
            letter-spacing: -1.7px;
        }

        .hero h1 span { color: var(--gold); }

        .hero-description {
            max-width: 590px;
            margin: 20px 0 30px;
            color: #dbe5f1;
            font-size: 17px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 670px;
            padding: 7px;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 13px;
            background: white;
            box-shadow: 0 15px 35px rgba(0,0,0,.12);
        }

        .search-icon {
            padding-left: 13px;
            color: var(--muted);
            font-size: 21px;
        }

        .search-box input {
            width: 100%;
            min-width: 0;
            padding: 12px 4px;
            border: 0;
            outline: none;
            color: var(--ink);
            background: transparent;
            font: inherit;
        }

        .search-box input:focus-visible { outline: none; }

        .search-box button {
            flex-shrink: 0;
            padding: 13px 22px;
            border: 0;
            border-radius: 9px;
            color: white;
            background: var(--navy);
            font: inherit;
            font-weight: 700;
            cursor: pointer;
        }

        .search-box button:hover { background: var(--navy-light); }

        .hero-note {
            margin: 14px 0 0;
            color: #c5d4e5;
            font-size: 12px;
        }

        .main-content { padding: 44px 0 60px; }

        .section { margin-bottom: 45px; }


        /* Instagram Reels */
        .reels-section {
            margin-bottom: 45px;
        }

        .reels-track {
            display: grid;
            grid-auto-columns: minmax(190px, 230px);
            grid-auto-flow: column;
            gap: 16px;
            overflow-x: auto;
            padding: 4px 2px 16px;
            scroll-snap-type: x mandatory;
            scrollbar-width: thin;
        }

        .reels-card {
            min-width: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background: white;
            scroll-snap-align: start;
        }

        .reels-cover {
            display: flex;
            min-height: 280px;
            align-items: center;
            justify-content: center;
            padding: 18px;
            color: white;
            text-align: center;
            background: linear-gradient(145deg, var(--navy), var(--navy-light));
        }

        .reels-cover a {
            color: white;
            text-decoration: none;
        }

        .reels-cover a:hover {
            color: var(--gold);
        }

        .reels-caption {
            padding: 14px;
            color: var(--ink);
            font-size: 13px;
            font-weight: 700;
        }

        .reels-caption a {
            color: #174d85;
            text-decoration: none;
        }

        .reels-caption a:hover {
            text-decoration: underline;
        }

        @media (max-width: 700px) {
            .reels-track {
                grid-auto-columns: minmax(170px, 72%);
                gap: 12px;
            }

            .reels-cover {
                min-height: 250px;
            }
        }


        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 21px;
        }

        .section-kicker {
            margin: 0 0 5px;
            color: #92702e;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .section-heading h2 {
            margin: 0;
            color: var(--navy);
            font-size: clamp(23px, 3vw, 30px);
            letter-spacing: -.5px;
            line-height: 1.3;
        }

        .section-description {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .category-card {
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background: var(--surface);
            box-shadow: 0 4px 15px rgba(16,45,79,.025);
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }

        .category-card:hover {
            transform: translateY(-3px);
            border-color: #c6d4e5;
            box-shadow: var(--shadow);
        }

        .category-top {
            display: flex;
            align-items: start;
            gap: 14px;
        }

        .category-icon {
            display: grid;
            flex-shrink: 0;
            place-items: center;
            width: 47px;
            height: 47px;
            border-radius: 13px;
            color: var(--navy);
            background: #edf3fa;
            font-size: 21px;
            font-weight: 800;
        }

        .category-card h3 {
            margin: 0;
            color: var(--navy);
            font-size: 17px;
            line-height: 1.4;
        }

        .category-card p {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .category-services {
            margin: 20px 0 0;
            padding: 0;
            list-style: none;
        }

        .category-services li + li {
            border-top: 1px solid #edf0f5;
        }

        .category-services a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 11px 0;
            color: #294969;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .category-services a::after {
            content: "↗";
            color: #98752e;
            font-size: 16px;
        }

        .category-services a:hover { color: #98752e; }

        .empty-note {
            padding: 15px;
            border-radius: 10px;
            color: var(--muted);
            background: #f6f8fb;
            font-size: 13px;
        }

        .service-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .service-card {
            display: flex;
            flex-direction: column;
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background: white;
            transition: box-shadow .2s, transform .2s;
        }

        .service-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .service-label {
            align-self: start;
            margin-bottom: 12px;
            padding: 5px 9px;
            border-radius: 6px;
            color: #785a20;
            background: var(--gold-light);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .service-card h3 {
            margin: 0;
            color: var(--navy);
            font-size: 19px;
            line-height: 1.4;
        }

        .service-card h3 a {
            text-decoration: none;
        }

        .service-card h3 a:hover { color: #98752e; }

        .service-card p {
            margin: 10px 0 18px;
            color: var(--muted);
            font-size: 13px;
        }

        .service-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 13px;
            margin-top: auto;
        }

        .text-link {
            color: #174d85;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .text-link:hover { text-decoration: underline; }

        .source-link {
            color: #64748b;
            font-size: 12px;
            font-weight: 600;
        }

        .faq-list {
            padding: 4px 22px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background: white;
        }

        .faq-list details + details { border-top: 1px solid var(--border); }

        .faq-list details { padding: 18px 0; }

        .faq-list summary {
            color: var(--navy);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .faq-list details p {
            margin: 12px 0 0;
            color: var(--muted);
            font-size: 14px;
            white-space: pre-line;
        }

        .empty-state {
            padding: 35px 20px;
            border: 1px dashed #c9d5e3;
            border-radius: var(--radius);
            color: var(--muted);
            text-align: center;
            background: white;
        }

        .empty-state strong {
            display: block;
            margin-bottom: 5px;
            color: var(--navy);
        }

        .site-footer {
            padding: 32px 0;
            color: #d4deeb;
            background: #0b2039;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: start;
            gap: 25px;
        }

        .footer-title {
            margin: 0;
            color: white;
            font-weight: 800;
        }

        .footer-description {
            max-width: 460px;
            margin: 7px 0 0;
            color: #b8c7d9;
            font-size: 12px;
        }

        .footer-note {
            max-width: 300px;
            color: #b8c7d9;
            font-size: 11px;
        }

        @media (max-width: 700px) {
            .container { width: min(100% - 30px, 560px); }

            .topbar-inner { justify-content: center; }

            .header-inner {
                min-height: 75px;
                gap: 10px;
            }

            .brand-mark {
                width: 40px;
                height: 40px;
            }

            .brand-name { font-size: 18px; }

            .brand-subtitle {
                max-width: 230px;
                font-size: 10px;
            }

            .header-nav { gap: 13px; }

            .header-nav a { font-size: 12px; }

            .hero { padding: 51px 0 45px; }

            .hero h1 { letter-spacing: -1px; }

            .hero-description { font-size: 15px; }

            .search-box { gap: 5px; }

            .search-box button { padding: 12px 14px; }

            .main-content { padding-top: 32px; }

            .category-grid, .service-list {
                grid-template-columns: 1fr;
            }

            .category-card, .service-card { padding: 19px; }

            .section { margin-bottom: 35px; }

            .section-heading { align-items: start; }

            .footer-inner { flex-direction: column; }
        }

        @media (max-width: 390px) {
            .brand-subtitle { max-width: 180px; }
            .header-nav a { font-size: 11px; }
            .search-icon { display: none; }
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
    <div class="topbar">
        <div class="container topbar-inner">
            <span>Portal informasi layanan keimigrasian</span>
            <span>Informasi · Literasi · Layanan</span>
        </div>
    </div>

    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ route('home') }}" aria-label="KLIK TIKKIM, beranda">
                <span class="brand-mark">KT</span>
                <span>
                    <span class="brand-name">KLIK TIKKIM</span>
                    <span class="brand-subtitle">Kanal Literasi Informasi Layanan dan Komunikasi Keimigrasian</span>
                </span>
            </a>

            <nav class="header-nav" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="#kategori">Kategori</a>
                <a href="#faq">FAQ</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container hero-content">
            <div class="eyebrow">Pusat informasi keimigrasian</div>

            <h1>
                Informasi yang tepat.<br>
                <span>Layanan lebih mudah.</span>
            </h1>

            <p class="hero-description">
                Temukan panduan layanan keimigrasian, baca informasi yang
                Anda perlukan, dan kunjungi sumber resmi untuk detail lebih lanjut.
            </p>

            <form class="search-box" method="GET" action="{{ route('home') }}" role="search">
                <span class="search-icon" aria-hidden="true">⌕</span>
                <input
                    type="search"
                    name="q"
                    value="{{ $search }}"
                    placeholder="Contoh: biaya paspor, izin tinggal..."
                    aria-label="Cari informasi layanan keimigrasian"
                >
                <button type="submit">Cari informasi</button>
            </form>

            <p class="hero-note">
                Gunakan pencarian untuk menemukan layanan dan jawaban FAQ berdasarkan kata kunci.
            </p>
        </div>
    </section>

    <section class="reels-section" aria-labelledby="reels-heading">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="section-kicker">Video informasi resmi</p>
                    <h2 id="reels-heading">Reels Informasi Imigrasi</h2>
                    <p class="section-description">
                        Simak informasi keimigrasian melalui video pendek dari
                        kanal resmi Direktorat Jenderal Imigrasi.
                    </p>
                </div>

                <a
                    class="text-link"
                    href="https://www.instagram.com/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Buka Instagram ↗
                </a>
            </div>


            <div class="reels-track">
                @forelse ($reels as $reel)
                    <article class="reels-card">
                        <div class="reels-cover">
                            <a
                                href="{{ $reel->instagram_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Tonton Reel: {{ $reel->title }}"
                            >
                                <span aria-hidden="true" style="font-size: 36px;">▶</span>
                                <br>
                                <strong>{{ $reel->title }}</strong>
                                <br>
                                <span>Buka Reel Instagram ↗</span>
                            </a>
                        </div>

                        @if ($reel->description)
                            <div class="reels-caption">
                                {{ $reel->description }}
                            </div>
                        @endif
                    </article>
                @empty
                    <div class="empty-note">
                        Video informasi sedang disiapkan. Konten akan ditampilkan
                        setelah diperiksa dan diaktifkan oleh pengelola.
                    </div>
                @endforelse
            </div>

        </div>
    </section>


    <main class="main-content">
        <div class="container">
            <section class="section" id="kategori">
                <div class="section-heading">
                    <div>
                        <p class="section-kicker">Jelajahi portal</p>
                        <h2>Kategori layanan</h2>
                        <p class="section-description">
                            Temukan informasi berdasarkan kelompok layanan.
                        </p>
                    </div>
                </div>

                @forelse ($categories as $category)
                    @if ($loop->first)
                        <div class="category-grid">
                    @endif

                    <article class="category-card">
                        <div class="category-top">
                            <div class="category-icon" aria-hidden="true">
                                {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div>
                                <h3>{{ $category->name }}</h3>

                                @if ($category->description)
                                    <p>{{ $category->description }}</p>
                                @else
                                    <p>Informasi dan panduan terkait kategori ini.</p>
                                @endif
                            </div>
                        </div>

                        @if ($category->services->isNotEmpty())
                            <ul class="category-services">
                                @foreach ($category->services as $service)
                                    <li>
                                        <a href="{{ route('services.show', ['slug' => $service->slug]) }}">
                                            <span>{{ $service->title }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="empty-note" style="margin-top:18px">
                                Informasi layanan sedang disiapkan.
                            </div>
                        @endif
                    </article>

                    @if ($loop->last)
                        </div>
                    @endif
                @empty
                    <div class="empty-state">
                        <strong>Kategori sedang disiapkan</strong>
                        Informasi kategori akan tersedia setelah dikelola dan diaktifkan.
                    </div>
                @endforelse
            </section>

            <section class="section" id="layanan">
                <div class="section-heading">
                    <div>
                        <p class="section-kicker">Informasi terverifikasi</p>
                        <h2>{{ $search !== '' ? 'Hasil pencarian' : 'Informasi layanan' }}</h2>
                        <p class="section-description">
                            {{ $search !== '' ? 'Informasi yang cocok dengan pencarian Anda.' : 'Baca ringkasan layanan dan buka detailnya.' }}
                        </p>
                    </div>
                </div>

                @forelse ($services as $service)
                    @if ($loop->first)
                        <div class="service-list">
                    @endif

                    <article class="service-card">
                        <span class="service-label">Informasi layanan</span>

                        <h3>
                            <a href="{{ route('services.show', ['slug' => $service->slug]) }}">
                                {{ $service->title }}
                            </a>
                        </h3>

                        <p>
                            {{ $service->summary ?: \Illuminate\Support\Str::limit(strip_tags($service->content), 160, '...') }}
                        </p>

                        <div class="service-actions">
                            <a class="text-link"
                               href="{{ route('services.show', ['slug' => $service->slug]) }}">
                                Baca detail &rarr;
                            </a>

                            @if ($service->official_url)
                                <a class="text-link source-link"
                                   href="{{ $service->official_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer">
                                    Sumber resmi ↗
                                </a>
                            @endif
                        </div>
                    </article>

                    @if ($loop->last)
                        </div>
                    @endif
                @empty
                    <div class="empty-state">
                        <strong>
                            {{ $search !== '' ? 'Informasi belum ditemukan' : 'Informasi sedang disiapkan' }}
                        </strong>
                        {{ $search !== '' ? 'Coba gunakan kata kunci yang lebih singkat atau berbeda.' : 'Layanan akan ditampilkan setelah tersedia, diverifikasi, dan diterbitkan.' }}
                    </div>
                @endforelse
            </section>

            <section class="section" id="faq">
                <div class="section-heading">
                    <div>
                        <p class="section-kicker">Bantuan informasi</p>
                        <h2>{{ $search !== '' ? 'Hasil pencarian FAQ' : 'Pertanyaan umum' }}</h2>
                        <p class="section-description">
                            {{ $search !== '' ? 'Jawaban FAQ yang cocok dengan kata kunci Anda.' : 'Jawaban atas pertanyaan yang sering diajukan.' }}
                        </p>
                    </div>
                </div>

                @forelse ($faqs as $faq)
                    @if ($loop->first)
                        <div class="faq-list">
                    @endif

                    <details>
                        <summary>{{ $faq->question }}</summary>
                        <p>{{ $faq->answer }}</p>
                    </details>

                    @if ($loop->last)
                        </div>
                    @endif
                @empty
                    <div class="empty-state">
                        <strong>
                            {{ $search !== '' ? 'FAQ belum ditemukan' : 'FAQ sedang disiapkan' }}
                        </strong>

                        {{ $search !== '' ? 'Coba kata kunci lain atau periksa hasil pencarian layanan di atas.' : 'Pertanyaan dan jawaban akan ditampilkan setelah diverifikasi dan diterbitkan.' }}
                    </div>
                @endforelse
            </section>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <div>
                <p class="footer-title">KLIK TIKKIM</p>
                <p class="footer-description">
                    Kanal Literasi Informasi Layanan dan Komunikasi Keimigrasian.
                    Gunakan sumber resmi untuk memastikan informasi terbaru.
                </p>
            </div>

            <div class="footer-note">
                Informasi pada portal ini merupakan panduan. Ketentuan dan tarif
                dapat berubah; selalu periksa sumber resmi yang dirujuk.
            </div>
        </div>
    </footer>
</body>
</html>