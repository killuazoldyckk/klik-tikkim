<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="{{ \Illuminate\Support\Str::limit(strip_tags($service->summary ?: $service->content), 155) }}">
    <title>{{ $service->title }} — KLIK TIKKIM</title>

    <style>
        :root {
            font-family: Arial, sans-serif;
            color: #182b45;
            background: #f4f7fb;
            font-synthesis: none;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            line-height: 1.7;
        }

        header {
            background: #123765;
            color: white;
            padding: 20px;
        }

        .header-inner {
            max-width: 900px;
            margin: auto;
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }

        .tagline {
            margin: 4px 0 0;
            font-size: 14px;
            color: #e2eaf5;
        }

        main {
            width: min(900px, 100%);
            margin: auto;
            padding: 28px 20px 40px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            font-weight: bold;
        }

        article, section {
            background: white;
            padding: 28px;
            border: 1px solid #e0e7ef;
            border-radius: 14px;
            margin-bottom: 20px;
            overflow-wrap: anywhere;
        }

        .category {
            display: inline-block;
            background: #eaf1fa;
            color: #174d85;
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        h1 {
            margin: 16px 0 8px;
            line-height: 1.3;
            font-size: clamp(26px, 5vw, 36px);
        }

        h2 {
            margin-top: 0;
            line-height: 1.4;
        }

        .summary {
            color: #475c74;
            font-size: 17px;
        }

        .content {
            margin-top: 24px;
            line-height: 1.85;
        }

        .source-box {
            margin-top: 28px;
            padding: 18px;
            background: #f4f7fb;
            border-left: 4px solid #d9ad50;
            border-radius: 8px;
        }

        .source-box p { margin: 0 0 8px; }

        a { color: #174d85; }

        a:focus-visible, summary:focus-visible {
            outline: 3px solid #d9ad50;
            outline-offset: 3px;
        }

        .source-link {
            display: inline-block;
            margin-top: 4px;
            font-weight: bold;
        }

        details {
            border-top: 1px solid #e0e7ef;
            padding: 16px 0;
        }

        summary {
            cursor: pointer;
            font-weight: bold;
        }

        details p {
            margin-bottom: 0;
            color: #475c74;
            white-space: pre-line;
        }

        .muted { color: #596b80; }

        footer {
            text-align: center;
            color: #596b80;
            padding: 20px;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header { padding: 18px 20px; }

            main { padding: 20px 14px 30px; }

            article, section {
                padding: 20px 16px;
                border-radius: 10px;
            }

            .summary { font-size: 16px; }
        }
    </style>
</head>

<body>
<header>
    <div class="header-inner">
        <a class="brand" href="{{ route('home') }}">KLIK TIKKIM</a>
        <p class="tagline">
            Kanal Literasi Informasi Layanan dan Komunikasi Keimigrasian
        </p>
    </div>
</header>

<main>
    <a class="back-link" href="{{ route('home') }}">
        &larr; Kembali ke beranda
    </a>

    <article>
        @if ($service->category)
            <span class="category">{{ $service->category->name }}</span>
        @endif

        <h1>{{ $service->title }}</h1>

        @if ($service->summary)
            <p class="summary">{{ $service->summary }}</p>
        @endif

        <div class="content">
            {!! nl2br(e($service->content ?? 'Informasi layanan belum tersedia.')) !!}
        </div>

        @if ($service->official_url)
            <div class="source-box">
                <p><strong>Sumber informasi resmi</strong></p>
                <p class="muted">
                    Periksa sumber resmi untuk informasi terbaru.
                </p>
                <a class="source-link"
                   href="{{ $service->official_url }}"
                   target="_blank"
                   rel="noopener noreferrer">
                    Buka situs resmi &rarr;
                </a>
            </div>
        @endif
    </article>

    <section>
        <h2>Pertanyaan terkait</h2>

        @forelse ($faqs as $faq)
            <details>
                <summary>{{ $faq->question }}</summary>
                <p>{{ $faq->answer }}</p>
            </details>
        @empty
            <p class="muted">
                Belum ada FAQ terverifikasi untuk layanan ini.
            </p>
        @endforelse
    </section>
</main>

<footer>
    KLIK TIKKIM &middot; Portal informasi layanan keimigrasian
</footer>
</body>
</html>
