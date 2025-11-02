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
<aside class="w-64 h-screen border-e-2 fixed hidden lg:block">
    <div class="h-[70px] w-full flex items-center p-3 border-b-2 border-blue-300 bg-white">
        <a href="#" class="ml-12">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-[80px] object-cover mt-2">
        </a>
        
        {{-- MODIFIED: Show profile info only if logged in --}}
        @auth
            <div class="ml-auto flex align-center justify-center">
                <img src="{{ asset('assets/icons/profile.png') }}" alt="profile_icon"
                    class="h-[15px] object-contain my-auto mr-4">
                <div class="flex flex-col my-auto mr-4">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>
        @endauth
    </div>
    <div class="mx-6 h-screen mt-[-70px] flex flex-col mb-5">
        {{-- Navlist --}}
        <div class="mt-[85px]">
            <ul>
                <a href="#" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-regular fa-calendar-days mr-3 text-lg w-[22px]"></i>
                        <span>Event</span>
                    </li>
                </a>
                
                <a href="{{ route('admin.events.prayer-list') }}" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-solid fa-hands-praying mr-3 text-lg w-[22px]"></i>
                        <span>Prayer List</span>
                    </li>
                </a>
                
                <a href="{{ route('admin.sermons.index') }}" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-solid fa-photo-film mr-3 text-lg w-[22px]"></i>
                        <span>Streaming</span>
                    </li>
                </a>
                <a href="#" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-solid fa-bullhorn mr-3 text-lg w-[22px]"></i>
                        <span>Announcement</span>
                    </li>
                </a>
                <a href="{{ route('admin.materials.index') }}" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-solid fa-book mr-3 text-lg w-[22px]"></i>
                        <span>Material PDF</span>
                    </li>
                </a>
                <a href="#" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-solid fa-circle-info mr-3 text-lg w-[22px]"></i>
                        <span>Static Content</span>
                    </li>
                </a>
                
                <a href="{{ route('admin.events.room-booking') }}" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-solid fa-door-open mr-3 text-lg w-[22px]"></i>
                        <span>Room Booking</span>
                    </li>
                </a>
                
                <a href="{{ route('admin.events.admin-list') }}" class="text-md">
                    <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                        <i class="fa-solid fa-user-tie mr-3 text-lg w-[22px]"></i>
                        <span>Admin List</span>
                    </li>
                </a>
                <hr>
            </ul>
        </div>

        {{-- MODIFIED: Show logout button only if logged in --}}
        @auth
            <div class="mt-auto mb-6 p-3 hover:bg-rose-500 rounded-lg transition text-red-500 hover:text-white">
                <form action="#" method="POST">
                    @csrf
                    <button class="text-md" type="submit">
                        <div class="flex flex-row items-center rounded-lg transition">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-3 text-lg w-[22px]"></i>
                            <span class="font-bold">Log Out</span>
                        </div>
                    </button>
                </form>
            </div>
        @endauth

        {{-- MODIFIED: Show login button if they are a guest --}}
        @guest
            <div class="mt-auto mb-6">
                <a href="#" class="text-md">
                    <div class="p-3 hover:bg-sky-500 rounded-lg transition text-sky-500 hover:text-white">
                        <div class="flex flex-row items-center rounded-lg transition">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-3 text-lg w-[22px]"></i>
                            <span class="font-bold">Log In</span>
                        </div>
                    </div>
                </a>
            </div>
        @endguest
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

{{-- Navbar Content --}}
<div id="smallNav" class="bg-white border-b-2 absolute w-full z-[99] lg:hidden">
    <ul class="ml-0">
        <ul class="m-3">
           <a href="#" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-regular fa-file-lines mr-3 text-lg w-[22px]"></i>
                    <span>Event</span>
                </li>
            </a>
            <a href="{{ route('admin.events.prayer-list') }}" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-solid fa-hands-praying mr-3 text-lg w-[22px]"></i>
                    <span>Pray List</span>
                </li>
            </a>
            <a href="#" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-solid fa-photo-film mr-3 text-lg w-[22px]"></i>
                    <span>Streaming</span>
                </li>
            </a>
            <a href="#" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-solid fa-bullhorn mr-3 text-lg w-[22px]"></i>
                    <span>Announcement</span>
                </li>
            </a>
            <a href="{{ route('admin.materials.index') }}" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-solid fa-book mr-3 text-lg w-[22px]"></i>
                    <span>Material PDF</span>
                </li>
            </a>
            <a href="#" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-solid fa-circle-info mr-3 text-lg w-[22px]"></i>
                    <span>Static Content</span>
                </li>
            </a>
            
            <a href="{{ route('admin.events.room-booking') }}" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-solid fa-door-open mr-3 text-lg w-[22px]"></i>
                    <span>Room Booking</span>
                </li>
            </a>
            
            <a href="{{ route('admin.events.admin-list') }}" class="text-md">
                <li class="flex flex-row items-center p-2 px-3 my-2 hover:bg-gray-200 rounded-lg transition">
                    <i class="fa-solid fa-user-tie mr-3 text-lg w-[22px]"></i>
                    <span>Admin List</span>
                </li>
            </a>
            <hr>
        </ul>

        {{-- MODIFIED: Show profile info only if logged in --}}
        @auth
            {{-- Profile --}}
            <div class="m-3 px-3 flex align-center justify-left mt-12">
                <img src="{{ asset('assets/icons/profile.png') }}" alt="profile_icon"
                    class="h-[15px] object-contain my-auto mr-4">
                <div class="flex flex-col my-auto mr-4">
                    <p>{{ auth()->user()->name }}</p>
                </div>
            </div>

            {{-- Logout --}}
            <div class="mt-0 m-3 p-3 hover:bg-rose-500 rounded-lg transition text-red-500 hover:text-white">
                <form action="#" method="POST">
                    @csrf
                    <button type="submit" class="text-md">
                        <div class="flex flex-row items-center rounded-lg transition">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-3 text-lg w-[22px]"></i>
                            <span class="font-bold">Log Out</span>
                        </div>
                    </button>
                </form>
            </div>
        @endauth
        
        {{-- MODIFIED: Show login button if they are a guest --}}
        @guest
            <div class="mt-12 m-3">
                <a href="#" class="text-md">
                    <div class="p-3 hover:bg-sky-500 rounded-lg transition text-sky-500 hover:text-white">
                        <div class="flex flex-row items-center rounded-lg transition">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-3 text-lg w-[22px]"></i>
                            <span class="font-bold">Log In</span>
                        </div>
                    </div>
                </a>
            </div>
        @endguest
    </ul>
</div>

{{-- Script --}}
<script>
    $(document).ready(function() {
        $('#toggle').on('click', function() {
            if ($('#smallNav').hasClass('active')) {
                $('#smallNav').removeClass('active');
            } else {
                $('#smallNav').addClass('active');
            }
        })
    })
</script>
