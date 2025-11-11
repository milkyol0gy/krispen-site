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
    <title>{{ $event->title }} - Krispen</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Trajan+Pro:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .trajan-font { font-family: 'Trajan Pro', serif; }
        .poppins-font { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 poppins-font">

    <div class="relative h-96 bg-cover bg-center"
        style="background-image: url('{{ asset('storage/' . $event->poster_link) }}');">
        <div class="absolute inset-0 bg-black/20"></div>

        <a href="{{ route('events.index') }}"
            class="absolute top-8 left-8 z-20 inline-flex items-center text-white hover:text-gray-200 font-medium transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="text-lg">Return</span>
        </a>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-32 relative z-10 pb-16">
        <div class="bg-white rounded-lg shadow-xl">
            <div class="p-8 md:p-10" style="background-color: #537E72;">
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ $event->title }}</h1>

                @if ($event->description)
                    <p class="text-white/90 leading-relaxed text-base">
                        {{ $event->description }}
                    </p>
                @else
                    <p class="text-white/90 leading-relaxed text-base">
                        Bergabunglah dengan kami dalam acara yang inspiratif ini.
                    </p>
                @endif
            </div>

            <div class="p-8 md:p-10 bg-[#CEDFCC]">
                <div class="mb-6">
                    @php
                        $startTime = \Carbon\Carbon::parse($event->start_time);
                        $endTime = $event->end_time ? \Carbon\Carbon::parse($event->end_time) : null;
                    @endphp

                    <div class="flex items-start mb-3">
                        <svg class="w-5 h-5 text-[#132B1D] mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <div>
                            <p class="font-semibold text-[#132B1D]">Tanggal</p>
                            <p class="text-gray-800">
                                {{ $startTime->isoFormat('dddd, D MMMM YYYY') }}
                                @if ($endTime && $startTime->format('Y-m-d') !== $endTime->format('Y-m-d'))
                                    - {{ $endTime->isoFormat('dddd, D MMMM YYYY') }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start mb-6">
                        <svg class="w-5 h-5 text-[#132B1D] mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="font-semibold text-[#132B1D]">Waktu</p>
                            <p class="text-gray-800">
                                {{ $startTime->format('H:i') }} WIB
                                @if ($endTime && $startTime->format('Y-m-d') === $endTime->format('Y-m-d'))
                                    - {{ $endTime->format('H:i') }} WIB
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-black mb-5">JOIN!!</h2>
                <a href="{{ route('events.register', $event->id) }}"
                    class="inline-block bg-[#132B1D] text-white font-semibold px-8 py-3 rounded-md hover:bg-gray-800 transition-colors duration-300 shadow-md">
                    DAFTAR
                </a>
            </div>
        </div>
    </div>

</body>

</html>
