<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instagram Posts - GBI Kristus Pencipta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font & Icon --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #333;
        }

        .page-title {
            font-weight: 700;
            text-align: center;
            margin: 40px 0 20px;
            color: #1a1a1a;
        }

        .post-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            background: white;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        }

        .post-title {
            font-size: 1.1rem;
            font-weight: 600;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            text-align: center;
            background-color: #fafafa;
        }

        .instagram-embed {
            padding: 10px;
        }

        blockquote.instagram-media figcaption {
            display: none !important; /* hides all captions */
        }

        footer {
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="page-title"><i class="fa-brands fa-instagram text-danger"></i> Instagram Posts</h2>

        <div class="row g-4 justify-content-center">
            @foreach($statics as $static)
                <div class="col-md-4 col-sm-6">
                    <div class="card post-card">
                        <div class="post-title">{{ $static->title }}</div>
                        <div class="instagram-embed">
                            {!! $static->embed_code !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Footer --}}
        @extends('base.footer')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Instagram Embed Loader --}}
    <script>
        window.addEventListener('load', function() {
            if (window.instgrm) {
                window.instgrm.Embeds.process();

                // Tunggu sebentar untuk memastikan semua elemen render
                setTimeout(() => {
                    // hide figcaption atau div yang berisi caption
                    document.querySelectorAll('blockquote.instagram-media figcaption, blockquote.instagram-media div:nth-child(2)').forEach(el => {
                        el.style.display = 'none';
                    });
                }, 1000);
            }
        });
    </script>

    {{-- <script async src="//www.instagram.com/embed.js"></script>
    <script>
        window.addEventListener('load', function() {
            if (window.instgrm) window.instgrm.Embeds.process();
        });
    </script> --}}

</body>
</html>
