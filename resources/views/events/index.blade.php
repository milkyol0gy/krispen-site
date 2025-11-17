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
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
    <title>Events - Krispen</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-white poppins-font">

    <div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
        @include('components.hero-section', ['title' => 'Events'])

        <div class="py-16 px-8 rounded-2xl fade-in" style="background-color: #90B7BF;">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-center text-xl font-bold text-[#122B1D] mb-12 tracking-widest slide-in-left">EVENTS</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($events as $event)
                        <a href="{{ route('events.show', $event->id) }}"
                            class="block bg-white rounded-lg overflow-hidden shadow-md card-hover scale-in" data-delay="{{ $loop->index * 100 }}">
                            <div class="h-56 bg-cover bg-center"
                                style="background-image: url('{{ asset('storage/' . $event->poster_link) }}');">
                            </div>

                            <div class="p-6 bg-white">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors duration-300">
                                    {{ $event->title }}</h3>

                                <div class="flex items-center text-gray-600 text-sm mt-4">
                                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    @php
                                        $startTime = \Carbon\Carbon::parse($event->start_time);
                                        $endTime = $event->end_time ? \Carbon\Carbon::parse($event->end_time) : null;
                                    @endphp
                                    <span class="font-medium">{{ $startTime->isoFormat('D MMM YYYY') }}
                                        @if ($endTime && $startTime->format('Y-m-d') !== $endTime->format('Y-m-d'))
                                            - {{ $endTime->isoFormat('D MMM YYYY') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full text-center py-16">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Belum Ada Event</h3>
                            <p class="mt-1 text-sm text-gray-500">Saat ini belum ada event yang terjadwal. Silakan cek
                                kembali nanti.</p>
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
