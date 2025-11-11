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
    </style>
</head>
<body class="bg-white">
    <div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
        <div class="relative h-80 bg-cover bg-center bg-no-repeat rounded-2xl overflow-hidden"
            style="background-image: url('https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib-rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
            <div class="absolute inset-0"
                style="background: linear-gradient(45deg, rgba(26, 45, 16, 0.8), rgba(89, 126, 114, 0.6))"></div>

            @include('components.navbar')

            <div class="absolute bottom-12 left-8 z-10">
                <h1 class="text-3xl font-bold text-white tracking-wide poppins-font">Jadwal Komunitas Sel</h1>
            </div>
        </div>

        <!-- Content Section -->
        <div class="px-4 py-16">
            <!-- Avatar and Title -->
            <div class="text-center mb-12">
                <div class="w-16 h-16 bg-gray-300 rounded-full mx-auto mb-6"></div>
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
                    <div class="bg-[#8FB6B3] rounded-2xl p-6 shadow-lg hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
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
</body>
</html>