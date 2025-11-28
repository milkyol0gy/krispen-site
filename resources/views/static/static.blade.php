<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gereja Kristus Pencipta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .hero-bg {
            background: linear-gradient(to right, rgba(17, 94, 89, 0.6), rgba(15, 118, 110, 0.6)),
                        url('{{ asset("assets/banner-home.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Animasi muncul halus */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        blockquote.instagram-media figcaption {
            display: none !important;
        }
    </style>
</head>
<body class="bg-amber-50">
    <!-- Navigation -->
    <div x-data="{ sidebarOpen: false }" class="relative z-10">
        <nav class="fixed top-0 w-full bg-white/95 backdrop-blur shadow-md z-50">
            <div class="max-w-full mx-auto px-8 sm:px-12 lg:px-16">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('assets/logo.png') }}" 
                             alt="Logo GKP" 
                             class="w-14 h-14 object-contain">
                        <span class="font-bold text-lg text-gray-800">Gereja Kristus Pencipta</span>
                    </div>
                    
                    <div class="flex items-center space-x-8">
                        <!-- Desktop Menu -->
                        <div class="hidden md:flex space-x-8">
                            <a href="{{ url('/') }}" class="text-gray-700 hover:text-teal-700 font-medium">Home</a>
                            <a href="{{ route('events.index') }}" class="text-gray-700 hover:text-teal-700 font-medium">Events</a>
                            <a href="{{ route('visimisi') }}" class="text-gray-700 hover:text-teal-700 font-medium">Tentang Kami</a>
                        </div>

                        <!-- Hamburger Button -->
                        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 focus:outline-none">
                            <div class="space-y-1.5">
                                <div class="w-6 h-0.5 bg-gray-700 transition-transform duration-300" :class="sidebarOpen ? 'rotate-45 translate-y-2' : ''"></div>
                                <div class="w-6 h-0.5 bg-gray-700 transition-opacity duration-300" :class="sidebarOpen ? 'opacity-0' : ''"></div>
                                <div class="w-6 h-0.5 bg-gray-700 transition-transform duration-300" :class="sidebarOpen ? '-rotate-45 -translate-y-2' : ''"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sidebar Overlay -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40"></div>

        <!-- Right Sidebar -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transform transition ease-in-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in-out duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed top-0 right-0 h-full w-80 bg-white shadow-2xl z-50">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl overflow-hidden">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">Menu</h2>
                </div>
                <button @click="sidebarOpen = false" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="p-6 space-y-2">
                <!-- Mobile Main Links -->
                <div class="md:hidden space-y-2 pb-4 border-b border-gray-200 mb-4">
                    <a href="{{ url('/') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                        <i class="fas fa-home w-5"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('events.index') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                        <i class="fas fa-calendar w-5"></i>
                        <span>Events</span>
                    </a>
                    <a href="{{ route('visimisi') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                        <i class="fas fa-info-circle w-5"></i>
                        <span>Tentang Kami</span>
                    </a>
                </div>
                
                <!-- Additional Menu Items -->
                <a href="{{ route('materials.public') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-book w-5"></i>
                    <span>Materials</span>
                </a>
                <a href="{{ route('prayer.request') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-praying-hands w-5"></i>
                    <span>Permohonan Doa</span>
                </a>
                <a href="{{ route('cell-community.public') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-users w-5"></i>
                    <span>Jadwal Komsel</span>
                </a>
                <a href="{{ route('roombook.public') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-door-open w-5"></i>
                    <span>Peminjaman Ruangan</span>
                </a>
                <a href="{{ route('sermons.public') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-video w-5"></i>
                    <span>Rekaman Khotbah</span>
                </a>
                <a href="{{ route('persembahan') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-heart w-5"></i>
                    <span>Persembahan</span>
                </a>
            </nav>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="relative h-screen hero-bg">
        <div class="relative h-full flex items-center justify-center text-center px-4">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">
                    Together for the Love of Christ
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-8">
                    Sedang datang di Gereja Kristus Pencipta
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('events.index') }}" class="bg-white/20 hover:bg-white/30 text-white px-8 py-3 rounded-lg font-semibold backdrop-blur transition inline-block">
                        VIEW EVENTS
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <div class="flex justify-center items-center gap-4 mb-2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Welcome to Kristus Pencipta
                </h2>
                <img src="{{ asset('assets/logo.png') }}" 
                    alt="Logo Gereja Kristus Pencipta" 
                    class="w-14 h-14 rounded-full object-contain">
            </div>
            <div class="w-12 h-1 bg-teal-700 rounded-full mx-auto mt-4"></div>
        </div>

        <!-- Image Grid (Instagram Embed from Admin) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16 fade-in">
            @foreach($statics as $static)
                <div class="rounded-3xl overflow-hidden shadow-lg bg-white h-[28rem] hover:scale-[1.02] transition-transform duration-300">
                    <div class="p-3 text-center font-semibold border-b border-gray-100 text-gray-800">
                        {{ $static->title }}
                    </div>
                    <div class="p-3 overflow-hidden">
                        {!! $static->embed_code !!}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Announcements -->
        <div class="bg-teal-800 rounded-2xl p-8 text-white mb-16">
            <h3 class="text-2xl font-bold mb-6 text-center">PENGUMUMAN</h3>
            
            <div class="space-y-4">
                @forelse($announcements as $announcement)
                    <div class="flex gap-4 items-start bg-white/10 rounded-lg p-4 hover:bg-white/20 transition">
                        <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        <div>
                            <h4 class="font-bold mb-2">{{ $announcement->headline }}</h4>
                            <p class="text-sm text-white/90 mb-2">
                                {{ $announcement->details }}
                            </p>
                            <p class="text-xs text-white/70">
                                {{ $announcement->start_air ? \Carbon\Carbon::parse($announcement->start_air)->format('d M Y H:i') : \Carbon\Carbon::parse($announcement->created_at)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-white/80">Belum ada pengumuman terbaru</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Youth Section -->
        <div class="bg-gradient-to-r from-teal-700 to-teal-600 rounded-2xl p-8 md:p-12 text-center text-white mb-16">
            <p class="text-sm uppercase tracking-wider mb-2">VISI KAMI</p>
            <h3 class="text-3xl md:text-4xl font-bold mb-4">
                Murid Kristus yang berdoa dan Memulihkan
            </h3>
            <a href="{{ route('visimisi') }}" class="bg-white text-teal-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
                MISI KAMI
            </a>
        </div>

        <!-- Schedule Section -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Schedule</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                $schedules = [
                    ['name' => 'IBADAH 1', 'time' => 'Minggu 08:00 WIB'],
                    ['name' => 'IBADAH 2', 'time' => 'Minggu 10:30 WIB'],
                    ['name' => 'IBADAH DLC', 'time' => 'Sabtu 15:30 WIB'],
                    ['name' => 'IBADAH JCC', 'time' => 'Minggu 10:30 WIB']
                ];
                
                foreach($schedules as $schedule):
                ?>
                <div class="bg-[#C4661F] rounded-2xl p-6 text-white text-center shadow-lg hover:shadow-xl transition">
                    <div class="w-full h-32 bg-white/20 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg mb-2"><?php echo $schedule['name']; ?></h4>
                    <p class="text-sm"><?php echo $schedule['time']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('base.footer')

    <!-- Scripts -->
    <script>
        // Fade-in animation saat scroll
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>

    <script async src="//www.instagram.com/embed.js"></script>
    <script>
        window.addEventListener('load', function() {
            if (window.instgrm) {
                window.instgrm.Embeds.process();
                setTimeout(() => {
                    document.querySelectorAll('blockquote.instagram-media figcaption, blockquote.instagram-media div:nth-child(2)')
                        .forEach(el => el.style.display = 'none');
                }, 1000);
            }
        });
    </script>
</body>
</html>