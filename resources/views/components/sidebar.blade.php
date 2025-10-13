{{-- =========================================
    Disesuaikan dengan route: php artisan route:list
========================================= --}}

@php
    $menuItems = [
        ['name' => 'Materials', 'icon' => 'fa-solid fa-book', 'route' => 'admin.materials.index'],
        ['name' => 'Sermons', 'icon' => 'fa-solid fa-microphone-lines', 'route' => 'admin.sermons.index'],
        ['name' => 'Static Pages', 'icon' => 'fa-solid fa-file-lines', 'route' => 'admin.statics.index'],
    ];
@endphp

{{-- Style --}}
<style>
    .ham { cursor: pointer; transition: transform 400ms; user-select: none; }
    .hamRotate.active { transform: rotate(45deg); }
    .line { fill: none; stroke: #000; stroke-width: 5.5; stroke-linecap: round; transition: all 400ms; }
    .ham8 .top { stroke-dasharray: 40 160; }
    .ham8 .middle { stroke-dasharray: 40 142; transform-origin: 50%; transition: transform 400ms; }
    .ham8 .bottom { stroke-dasharray: 40 85; transform-origin: 50%; transition: transform 400ms, stroke-dashoffset 400ms; }
    .ham8.active .top, .ham8.active .bottom { stroke-dashoffset: -64px; }
    .ham8.active .middle { transform: rotate(90deg); }
    #smallNav { margin-top: -450px; transition: all 0.6s ease; }
    #smallNav.active { margin-top: 0; }
</style>

{{-- Sidebar --}}
<aside class="w-64 h-screen border-e-2 fixed hidden lg:block bg-white">
    {{-- Header --}}
    <div class="h-[70px] flex items-center justify-between p-4 border-b-2 border-blue-300">
        <a href="/" class="flex items-center">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-[110px] object-cover">
        </a>
        <div class="flex items-center">
            <img src="{{ asset('assets/icons/profile.png') }}" alt="profile_icon" class="h-[20px] mr-2">
            <p class="text-sm font-medium">{{ auth()->user()->name ?? 'Admin' }}</p>
        </div>
    </div>

    {{-- Navlist --}}
    <div class="flex flex-col justify-between h-[calc(100%-70px)] px-6 pb-6">
        <nav class="mt-6 space-y-1">
            @foreach ($menuItems as $item)
                @if (Route::has($item['route']))
                    <a href="{{ route($item['route']) }}">
                        <li class="flex items-center p-2 px-3 my-1 rounded-lg transition hover:bg-gray-200 {{ request()->routeIs($item['route']) ? 'bg-blue-50 border-l-4 border-blue-500' : '' }}">
                            <i class="{{ $item['icon'] }} mr-3 text-lg w-[22px] text-gray-700"></i>
                            <span class="text-gray-800 font-medium">{{ $item['name'] }}</span>
                        </li>
                    </a>
                @endif
            @endforeach
        </nav>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button class="w-full flex items-center justify-center p-3 bg-red-50 hover:bg-rose-500 hover:text-white text-red-500 rounded-lg transition font-semibold">
                <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Log Out
            </button>
        </form>
    </div>
</aside>

{{-- Mobile Navbar --}}
<div class="h-[70px] w-full bg-white border-b-2 flex lg:hidden items-center justify-between px-4 z-50">
    <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-[110px] object-cover">
    <button id="toggle" class="p-1 rounded-full active:bg-gray-200 transition">
        <svg class="ham hamRotate ham8" viewBox="0 0 100 100" width="44">
            <path class="line top" d="m 30,33 h 40 c 3.7,0 7.5,3.1 7.5,8.6 0,5.4 -2.7,8.4 -7.5,8.4 h -20" />
            <path class="line middle" d="m 30,50 h 40" />
            <path class="line bottom" d="m 70,67 h -40 c 0,0 -7.5,-0.8 -7.5,-8.4 0,-7.6 7.5,-8.6 7.5,-8.6 h 20" />
        </svg>
    </button>
</div>

{{-- Mobile Dropdown --}}
<div id="smallNav" class="bg-white border-b-2 absolute w-full z-40 lg:hidden shadow-md">
    <ul class="p-3">
        @foreach ($menuItems as $item)
            @if (Route::has($item['route']))
                <a href="{{ route($item['route']) }}">
                    <li class="flex items-center p-2 px-3 my-1 hover:bg-gray-100 rounded-lg transition {{ request()->routeIs($item['route']) ? 'bg-blue-50 border-l-4 border-blue-500' : '' }}">
                        <i class="{{ $item['icon'] }} mr-3 text-lg w-[22px]"></i>
                        <span>{{ $item['name'] }}</span>
                    </li>
                </a>
            @endif
        @endforeach

        <div class="border-t my-4"></div>

        <div class="flex items-center mb-4">
            <img src="{{ asset('assets/icons/profile.png') }}" class="h-[20px] mr-3">
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full flex items-center justify-center p-3 bg-red-50 hover:bg-rose-500 hover:text-white text-red-500 rounded-lg transition font-semibold">
                <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Log Out
            </button>
        </form>
    </ul>
</div>

{{-- Script --}}
<script>
    $(document).ready(function() {
        $('#toggle').on('click', function() {
            $('#smallNav').toggleClass('active');
            $(this).find('.ham').toggleClass('active');
        });
    });
</script>
