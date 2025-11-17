<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekaman Khotbah - Krispen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        
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
<body class="bg-white font-poppins">

<div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
    @include('components.hero-section', ['title' => 'Rekaman Khotbah'])
    <!-- Content Section -->
    <div class="py-16 px-8 rounded-2xl fade-in" style="background-color: #90B7BF;">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-center text-xl font-bold text-[#122B1D] mb-12 tracking-widest slide-in-left">REKAMAN KHOTBAH</h2>

            {{-- Featured Sermon --}}
            @if($featured && $featured->youtube_id)
            <div class="mb-10 scale-in">
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <a href="{{ $featured->youtube_link }}" target="_blank" class="block">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="https://img.youtube.com/vi/{{ $featured->youtube_id }}/hqdefault.jpg"
                                alt="{{ $featured->title }}"
                                class="w-full h-full object-cover">
                            <div class="absolute top-4 left-4 bg-red-600 text-white text-xs px-3 py-1 rounded-full uppercase tracking-wide">
                                Featured
                            </div>
                            <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors duration-300"></div>
                        </div>
                    </a>
                    <div class="p-6 bg-white">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $featured->title }}</h3>
                        @if($featured->description)
                            <p class="text-gray-600 text-sm mb-3">{{ $featured->description }}</p>
                        @endif
                        <div class="flex items-center text-gray-600 text-sm">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-medium">{{ \Carbon\Carbon::parse($featured->created_at)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Other Sermons Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($others as $sermon)
                    <a href="{{ $sermon->youtube_link }}" target="_blank"
                        class="block bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out scale-in" data-delay="{{ $loop->index * 100 }}">
                        <div class="aspect-video bg-cover bg-center relative overflow-hidden">
                            <img src="https://img.youtube.com/vi/{{ $sermon->youtube_id }}/hqdefault.jpg"
                                alt="{{ $sermon->title }}"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors duration-300"></div>
                        </div>
                        <div class="p-6 bg-white">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-indigo-600 transition-colors duration-300">
                                {{ $sermon->title }}
                            </h3>
                            @if($sermon->description)
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $sermon->description }}</p>
                            @endif
                            <div class="flex items-center text-gray-600 text-sm">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-medium">{{ \Carbon\Carbon::parse($sermon->created_at)->format('d M Y') }}</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Belum Ada Rekaman</h3>
                        <p class="mt-1 text-sm text-gray-500">Saat ini belum ada rekaman khotbah yang tersedia. Silakan cek kembali nanti.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

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
