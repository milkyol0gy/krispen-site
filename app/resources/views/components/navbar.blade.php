<div class="relative z-10 flex items-center justify-between h-24 px-8">
    <div class="flex items-center">
        <div class="w-12 h-12 rounded-2xl overflow-hidden">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-full h-full object-cover"
                style="background-color: #CDBECB;">
        </div>
    </div>

    <div class="flex items-center space-x-12">
        <nav class="hidden md:flex space-x-12">
            <a href="{{ url('/') }}" class="text-white hover:text-gray-300 font-medium">Home</a>
            <a href="{{ route('events.index') }}" class="text-white font-medium">Events</a>
            <a href="#" class="text-white hover:text-gray-300 font-medium">Tentang Kami</a>
        </nav>

        <button class="md:hidden text-white">
            <div class="space-y-1.5">
                <div class="w-6 h-0.5 bg-white"></div>
                <div class="w-6 h-0.5 bg-white"></div>
                <div class="w-6 h-0.5 bg-white"></div>
            </div>
        </button>
    </div>
</div>
