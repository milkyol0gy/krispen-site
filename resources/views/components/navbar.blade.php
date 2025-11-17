<div x-data="{ sidebarOpen: false }" class="relative z-10">
    <div class="flex items-center justify-between h-24 px-8">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-2xl overflow-hidden">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="flex items-center space-x-8">
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}" class="text-white hover:text-gray-300 font-medium transition-colors">Home</a>
                <a href="{{ route('events.index') }}" class="text-white hover:text-gray-300 font-medium transition-colors">Events</a>
                <a href="#" class="text-white hover:text-gray-300 font-medium transition-colors">Tentang Kami</a>
            </nav>

            <!-- Hamburger Button (All Screen Sizes) -->
            <button @click="sidebarOpen = !sidebarOpen" class="text-white focus:outline-none">
                <div class="space-y-1.5">
                    <div class="w-6 h-0.5 bg-white transition-transform duration-300" :class="sidebarOpen ? 'rotate-45 translate-y-2' : ''"></div>
                    <div class="w-6 h-0.5 bg-white transition-opacity duration-300" :class="sidebarOpen ? 'opacity-0' : ''"></div>
                    <div class="w-6 h-0.5 bg-white transition-transform duration-300" :class="sidebarOpen ? '-rotate-45 -translate-y-2' : ''"></div>
                </div>
            </button>
        </div>
    </div>

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
                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
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

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
