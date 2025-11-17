<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Komunitas Sel - Krispen</title>
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
    
    {{-- @vite('resources/css/app.css') --}}
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Trajan+Pro:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .trajan-font { font-family: 'Trajan Pro', serif; }
        .poppins-font { font-family: 'Poppins', sans-serif; }
        
        /* Smooth animations */
        .fade-in { opacity: 0; transform: translateY(30px); transition: all 0.8s ease; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }
        .slide-in-left { opacity: 0; transform: translateX(-50px); transition: all 0.8s ease; }
        .slide-in-left.visible { opacity: 1; transform: translateX(0); }
        .scale-in { opacity: 0; transform: scale(0.9); transition: all 0.6s ease; }
        .scale-in.visible { opacity: 1; transform: scale(1); }
        .hero-title { animation: heroSlide 1.2s ease-out; }
        
        @keyframes heroSlide {
            0% { opacity: 0; transform: translateX(-100px); }
            100% { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body class="bg-white">
    <div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
        @include('components.hero-section', ['title' => 'Jadwal Komunitas Sel'])

        <!-- Content Section -->
        <div class="px-4 py-16 fade-in">
            <!-- Avatar and Title -->
            <div class="text-center mb-12 slide-in-left">
                <div class="w-16 h-16 rounded-2xl overflow-hidden mx-auto mb-6">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
                <h2 class="trajan-font text-xl md:text-4xl font-bold text-gray-900 mb-4 tracking-wider">
                    Jadwal Komunitas Sel
                </h2>
                <p class="poppins-font text-gray-600 text-lg max-w-2xl mx-auto">
                    Mari bertumbuh di dalam Tuhan melalui komunitas yang sehat
                </p>
            </div>

            <!-- Schedule Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($cellCommunities as $community)
                    <div class="bg-[#8FB6B3] rounded-2xl p-6 shadow-lg hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 scale-in" data-delay="{{ $loop->index * 100 }}">
                        <h3 class="poppins-font font-semibold text-white text-lg uppercase mb-4">
                            {{ $community->name }}
                        </h3>
                        
                        <div class="space-y-3">
                            <div class="flex items-center text-white">
                                <i class="fas fa-calendar-alt w-5 mr-3"></i>
                                <span class="poppins-font text-sm">{{ $community->meeting_schedule }}</span>
                            </div>
                            
                            <div class="flex items-center text-white">
                                <i class="fas fa-user w-5 mr-3"></i>
                                <span class="poppins-font text-sm">{{ $community->facilitator_name }}</span>
                            </div>
                            
                            @if($community->type)
                                <div class="flex items-center text-white">
                                    <i class="fas fa-tag w-5 mr-3"></i>
                                    <span class="poppins-font text-sm">{{ $community->type }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="poppins-font text-gray-500 text-lg">Belum ada jadwal komunitas sel tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('base.footer')
    
    <script>
        // Smooth scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, delay);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe all animated elements
        document.addEventListener('DOMContentLoaded', () => {
            const animatedElements = document.querySelectorAll('.fade-in, .slide-in-left, .scale-in');
            animatedElements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>