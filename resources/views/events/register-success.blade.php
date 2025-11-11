<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Alpine.js x-cloak style --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <title>Pendaftaran Berhasil - Krispen</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Trajan+Pro:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .trajan-font { font-family: 'Trajan Pro', serif; }
        .poppins-font { font-family: 'Poppins', sans-serif; }
        body {
            font-family: 'Inter', sans-serif;
        }

        .success-gradient {
            background: linear-gradient(135deg, #CDDECB 0%, #90B7BF 100%);
        }

        .card-shadow {
            background: white;
            box-shadow: 0 10px 25px rgba(18, 43, 29, 0.1);
            border: 1px solid #CDDECB;
        }

        .primary-gradient {
            background: linear-gradient(135deg, #537E72 0%, #122B1D 100%);
        }
    </style>
</head>

<body class="bg-white poppins-font">

    <div class="min-h-screen flex items-center justify-center success-gradient">
        <div class="max-w-md w-full mx-4">
            <div class="card-shadow rounded-2xl p-8 text-center">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6"
                    style="background-color: #9CC97F;">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h1 class="text-2xl font-bold mb-4" style="color: #122B1D;">Pendaftaran Berhasil!</h1>
                <p class="mb-2" style="color: #537E72;">Terima kasih telah mendaftar untuk acara:</p>
                <h2 class="text-lg font-semibold mb-6" style="color: #122B1D;">{{ $event->title }}</h2>

                <div class="rounded-lg p-4 mb-6" style="background-color: #CDDECB;">
                    @php
                        $startTime = \Carbon\Carbon::parse($event->start_time);
                    @endphp
                    <p class="text-sm font-medium" style="color: #122B1D;">
                        📅 {{ $startTime->isoFormat('dddd, D MMMM YYYY') }}<br>
                        🕐 {{ $startTime->format('H:i') }} WIB
                    </p>
                </div>

                <div class="space-y-3">
                    <a href="{{ route('events.show', $event->id) }}"
                        class="primary-gradient block w-full text-white font-medium py-3 px-6 rounded-xl hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                        Kembali ke Detail Event
                    </a>
                    <a href="{{ route('events.index') }}"
                        class="block w-full font-medium py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105"
                        style="border: 2px solid #537E72; color: #537E72; background: white;">
                        Lihat Event Lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
