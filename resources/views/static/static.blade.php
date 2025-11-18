<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gereja Kristus Pencipta</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <nav class="fixed top-0 w-full bg-white/95 backdrop-blur shadow-md z-50">
        <div class="max-w-full mx-auto px-8 sm:px-12 lg:px-16">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/logo.png') }}" 
                         alt="Logo GKP" 
                         class="w-14   h-14 object-contain">
                    <span class="font-bold text-lg text-gray-800">Gereja Kristus Pencipta</span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-teal-700 font-medium">Home</a>
                    <a href="#events" class="text-gray-700 hover:text-teal-700 font-medium">Events</a>
                    <a href="#tentang" class="text-gray-700 hover:text-teal-700 font-medium">Tentang Kami</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="#home" class="block py-2 text-gray-700 hover:text-teal-700">Home</a>
                <a href="#events" class="block py-2 text-gray-700 hover:text-teal-700">Events</a>
                <a href="#tentang" class="block py-2 text-gray-700 hover:text-teal-700">Tentang Kami</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative h-screen mt-16 hero-bg">
        <div class="relative h-full flex items-center justify-center text-center px-4">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">
                    Together for the Love of Christ
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-8">
                    Sedang datang di Gereja Kristus Pencipta
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-teal-700 hover:bg-teal-800 text-white px-8 py-3 rounded-lg font-semibold transition">
                        JOIN US
                    </button>
                    <button class="bg-white/20 hover:bg-white/30 text-white px-8 py-3 rounded-lg font-semibold backdrop-blur transition">
                        VIEW EVENTS
                    </button>
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
                    <div class="p-3">
                        {!! $static->embed_code !!}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Announcements -->
        <div class="bg-teal-800 rounded-2xl p-8 text-white mb-16">
            <h3 class="text-2xl font-bold mb-6 text-center">PENGUMUMAN</h3>
            
            <div class="space-y-4">
                <div class="flex gap-4 items-start bg-white/10 rounded-lg p-4 hover:bg-white/20 transition">
                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold mb-2">Perubahan Lokasi Ibadah Minggu 13 Okt</h4>
                        <p class="text-sm text-white/90">
                            Ibadah Umum Pukul 09:00 WIB Minggu ini dipindahkan ke Gedung Auditorium (Serang Gereja) karena adanya kegiatan di Ruang utama di Ruangan Utama, Mohon maklum.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4 items-start bg-white/10 rounded-lg p-4 hover:bg-white/20 transition">
                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold mb-2">Kebutuhan Tim Media dan Fotografer</h4>
                        <p class="text-sm text-white/90">
                            Kami mengundang jemaat yang memiliki talenta dalam bidang fotografi dan videografi untuk bergabung dalam Tim Media Gereja. Hubungi Sdri. Valencia untuk info lebih lanjut. Expert to Sheets
                        </p>
                    </div>
                </div>

                <div class="flex gap-4 items-start bg-white/10 rounded-lg p-4 hover:bg-white/20 transition">
                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold mb-2">Dibuka: Pendaftaran Calon Baptisan Dewasa</h4>
                        <p class="text-sm text-white/90">
                            Pendaftaran dan kelas persiapan Baptisan Dewasa periode akhir tahun telah dibuka. Segera daftarkan melalui Tim bagian Pendewasaan sebelum tanggal 30 Oktober.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Youth Section -->
        <div class="bg-gradient-to-r from-teal-700 to-teal-600 rounded-2xl p-8 md:p-12 text-center text-white mb-16">
            <p class="text-sm uppercase tracking-wider mb-2">VISI KAMI</p>
            <h3 class="text-3xl md:text-4xl font-bold mb-4">
                Murid Kristus yang berdoa dan Memulihkan
            </h3>
            <button class="bg-white text-teal-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                MISI KAMI
            </button>
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
                <div class="bg-orange-500 rounded-2xl p-6 text-white text-center shadow-lg hover:shadow-xl transition">
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
    <footer class="bg-teal-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="text-center">
                    <svg class="w-8 h-8 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <h4 class="font-bold mb-2">Email Us</h4>
                    <p class="text-sm text-white/80">gkp.contact@gmail.com</p>
                </div>

                <div class="text-center">
                    <svg class="w-8 h-8 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <h4 class="font-bold mb-2">Call Us</h4>
                    <p class="text-sm text-white/80">+62 812 3456 7890</p>
                </div>

                <div class="text-center">
                    <svg class="w-8 h-8 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <h4 class="font-bold mb-2">Find Us</h4>
                    <p class="text-sm text-white/80">Jl. Mojopahit V No.2-4, Gubeng, Surabaya</p>
                </div>
            </div>

            <div class="text-center border-t border-white/20 pt-8">
                <p class="font-bold mb-2">Gereja Kristus Pencipta</p>
                <div class="flex justify-center gap-4 text-white/80">
                    <a href="#" class="hover:text-white">WhatsApp</a>
                    <a href="#" class="hover:text-white">Instagram</a>
                    <a href="#" class="hover:text-white">YouTube</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

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