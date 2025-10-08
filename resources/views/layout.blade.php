<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Krispen - Gereja Kristen Protestan')</title>
    <meta name="description" content="@yield('description', 'Krispen - Gereja Kristen Protestan, tempat ibadah dan komunitas yang melayani dengan kasih')">
    <meta name="keywords" content="@yield('keywords', 'gereja, kristen, protestan, ibadah, komunitas, doa')">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')
</head>

<body class="min-h-screen bg-gray-50">
    <header class="bg-white shadow-lg">
        <div class="bg-blue-900 text-white py-2">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center space-x-4">
                        <span>📧 info@krispen.org</span>
                        <span>📞 (021) 1234-5678</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span>🕐 Ibadah: Minggu 08:00 & 10:00</span>
                    </div>
                </div>
            </div>
        </div>

        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('assets/logo.png') }}" alt="Krispen Logo" class="h-12 w-auto mr-3">
                    <div>
                        <h1 class="text-2xl font-bold text-blue-900">KRISPEN</h1>
                        <p class="text-sm text-gray-600">Gereja Kristen Protestan</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ url('/') }}"
                        class="text-gray-700 hover:text-blue-900 font-medium transition-colors">
                        Beranda
                    </a>
                    <a href="{{ route('events.index') }}"
                        class="text-gray-700 hover:text-blue-900 font-medium transition-colors">
                        Acara
                    </a>
                    <a href="{{ route('sermons.public') }}"
                        class="text-gray-700 hover:text-blue-900 font-medium transition-colors">
                        Khotbah
                    </a>
                    <a href="{{ route('materials.public') }}"
                        class="text-gray-700 hover:text-blue-900 font-medium transition-colors">
                        Materi
                    </a>
                    <div class="relative group">
                        <button
                            class="text-gray-700 hover:text-blue-900 font-medium transition-colors flex items-center">
                            Layanan
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900">Doa
                                Syafaat</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900">Pemesanan
                                Ruang</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900">Sel
                                Komunitas</a>
                        </div>
                    </div>
                    <a href="#" class="text-gray-700 hover:text-blue-900 font-medium transition-colors">
                        Kontak
                    </a>
                </div>

                <button
                    class="md:hidden flex items-center px-3 py-2 border rounded text-gray-700 border-gray-300 hover:text-blue-900 hover:border-blue-900"
                    id="mobile-menu-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div class="md:hidden mt-4 pb-4 border-t hidden" id="mobile-menu">
                <div class="pt-4 space-y-2">
                    <a href="{{ url('/') }}" class="block px-2 py-2 text-gray-700 hover:text-blue-900">Beranda</a>
                    <a href="{{ route('events.index') }}"
                        class="block px-2 py-2 text-gray-700 hover:text-blue-900">Acara</a>
                    <a href="{{ route('sermons.public') }}"
                        class="block px-2 py-2 text-gray-700 hover:text-blue-900">Khotbah</a>
                    <a href="{{ route('materials.public') }}"
                        class="block px-2 py-2 text-gray-700 hover:text-blue-900">Materi</a>
                    <a href="#" class="block px-2 py-2 text-gray-700 hover:text-blue-900">Doa Syafaat</a>
                    <a href="#" class="block px-2 py-2 text-gray-700 hover:text-blue-900">Pemesanan Ruang</a>
                    <a href="#" class="block px-2 py-2 text-gray-700 hover:text-blue-900">Sel Komunitas</a>
                    <a href="#" class="block px-2 py-2 text-gray-700 hover:text-blue-900">Kontak</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-1">
        @hasSection('page-header')
            <section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16">
                <div class="container mx-auto px-4 text-center">
                    @yield('page-header')
                </div>
            </section>
        @endif

        @hasSection('breadcrumb')
            <nav class="bg-gray-100 py-3">
                <div class="container mx-auto px-4">
                    @yield('breadcrumb')
                </div>
            </nav>
        @endif

        <div class="container mx-auto px-4 py-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
                    {{ session('warning') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    @include('base.footer')

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>

</html>
