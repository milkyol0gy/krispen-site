<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Daftar {{ $event->title }} - Krispen</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .card-shadow {
            background: white;
            box-shadow: 0 10px 25px rgba(18, 43, 29, 0.1);
            border: 1px solid #CDDECB;
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(83, 126, 114, 0.15);
        }
        .primary-gradient {
            background: linear-gradient(135deg, #537E72 0%, #122B1D 100%);
        }
        .secondary-gradient {
            background: linear-gradient(135deg, #9CC97F 0%, #537E72 100%);
        }
        .floating-label {
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>

<body class="bg-white">

    <div class="min-h-screen" style="background: linear-gradient(135deg, #CDDECB 0%, #90B7BF 100%);">
        
        <div class="container mx-auto px-4 py-8">
            {{-- Header with Navigation --}}
            <div class="flex items-center justify-between mb-12">
                <div class="flex items-center space-x-3">
                    <div class="w-14 h-14 rounded-full overflow-hidden ring-4 ring-white/50">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-full h-full object-cover"
                            style="background-color: #CDDECB;">
                    </div>
                    <div style="color: #122B1D;">
                        <h3 class="font-bold text-xl">Krispen</h3>
                        <p class="text-sm" style="color: #537E72;">Event Registration</p>
                    </div>
                </div>

                <nav class="hidden md:flex space-x-8" style="color: #122B1D;">
                    <a href="{{ url('/') }}" class="font-medium transition-colors duration-200 flex items-center space-x-2 hover:opacity-75">
                        <i class="fas fa-home text-sm"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('events.index') }}" class="font-medium transition-colors duration-200 flex items-center space-x-2 hover:opacity-75">
                        <i class="fas fa-calendar text-sm"></i>
                        <span>Events</span>
                    </a>
                    <a href="#" class="font-medium transition-colors duration-200 flex items-center space-x-2 hover:opacity-75">
                        <i class="fas fa-info-circle text-sm"></i>
                        <span>Tentang Kami</span>
                    </a>
                </nav>
            </div>

            {{-- Main Content --}}
            <div class="max-w-lg mx-auto">
                {{-- Event Header --}}
                <div class="text-center mb-10">
                    <div class="inline-block p-4 rounded-full mb-6" style="background-color: #9CC97F;">
                        <i class="fas fa-calendar-plus text-4xl" style="color: #122B1D;"></i>
                    </div>
                    <h1 class="text-4xl font-bold mb-4 tracking-tight" style="color: #122B1D;">Daftar Event</h1>
                    <div class="card-shadow rounded-2xl p-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background-color: #537E72;">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                            <div class="text-left flex-1">
                                <h2 class="text-xl font-bold" style="color: #122B1D;">{{ $event->title }}</h2>
                                @php
                                    $startTime = \Carbon\Carbon::parse($event->start_time);
                                    $endTime = $event->end_time ? \Carbon\Carbon::parse($event->end_time) : null;
                                @endphp
                                <p class="text-sm mt-1 flex items-center" style="color: #537E72;">
                                    <i class="fas fa-clock mr-2"></i>
                                    {{ $startTime->isoFormat('dddd, D MMMM YYYY') }} • {{ $startTime->format('H:i') }} WIB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Registration Form --}}
                <div class="card-shadow rounded-2xl p-8">
                    <form action="{{ route('events.register.store', $event->id) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        {{-- Form Title --}}
                        <div class="text-center pb-4 border-b" style="border-color: #CDDECB;">
                            <h3 class="text-2xl font-bold" style="color: #122B1D;">Informasi Pendaftar</h3>
                            <p class="text-sm mt-2" style="color: #537E72;">Lengkapi data diri Anda untuk bergabung</p>
                        </div>
                        
                        {{-- Nama Pendaftar (Attendee Name) --}}
                        <div class="relative">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background-color: #9CC97F;">
                                    <i class="fas fa-user text-sm" style="color: #122B1D;"></i>
                                </div>
                                <label for="attandee_name" class="block text-sm font-semibold" style="color: #122B1D;">
                                    Nama Lengkap
                                </label>
                            </div>
                            <input type="text" id="attandee_name" name="attandee_name" 
                                   value="{{ old('attandee_name') }}" required
                                   class="w-full px-5 py-4 border-2 rounded-xl focus:outline-none input-focus transition-all duration-200"
                                   style="border-color: #CDDECB; focus:border-color: #537E72;"
                                   placeholder="Masukkan nama lengkap Anda">
                            @error('attandee_name')
                                <p class="mt-2 text-sm flex items-center" style="color: #122B1D;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Nama Pengundang (Inviter Name) --}}
                        <div class="relative">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background-color: #90B7BF;">
                                    <i class="fas fa-user-friends text-sm" style="color: #122B1D;"></i>
                                </div>
                                <label for="inviter_name" class="block text-sm font-semibold" style="color: #122B1D;">
                                    Nama Pengundang <span style="color: #537E72;" class="font-normal">(Opsional)</span>
                                </label>
                            </div>
                            <input type="text" id="inviter_name" name="inviter_name" 
                                   value="{{ old('inviter_name') }}"
                                   class="w-full px-5 py-4 border-2 rounded-xl focus:outline-none input-focus transition-all duration-200"
                                   style="border-color: #CDDECB;"
                                   placeholder="Siapa yang mengundang Anda?">
                            @error('inviter_name')
                                <p class="mt-2 text-sm flex items-center" style="color: #122B1D;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Nomor Telepon --}}
                        <div class="relative">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background-color: #CDDECB;">
                                    <i class="fas fa-phone text-sm" style="color: #122B1D;"></i>
                                </div>
                                <label for="attandee_phone" class="block text-sm font-semibold" style="color: #122B1D;">
                                    Nomor Telepon <span style="color: #537E72;" class="font-normal">(Opsional)</span>
                                </label>
                            </div>
                            <input type="text" id="attandee_phone" name="attandee_phone" 
                                   value="{{ old('attandee_phone') }}"
                                   class="w-full px-5 py-4 border-2 rounded-xl focus:outline-none input-focus transition-all duration-200"
                                   style="border-color: #CDDECB;"
                                   placeholder="Contoh: 0812-3456-7890">
                            @error('attandee_phone')
                                <p class="mt-2 text-sm flex items-center" style="color: #122B1D;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-4">
                            <button type="submit" 
                                    class="w-full primary-gradient text-white font-bold py-5 rounded-xl transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center space-x-3">
                                <i class="fas fa-paper-plane"></i>
                                <span class="text-lg">Daftar Sekarang</span>
                            </button>

                            {{-- Cancel Button --}}
                            <a href="{{ route('events.show', $event->id) }}" 
                               class="w-full mt-4 py-4 border-2 rounded-xl transition-all duration-200 flex items-center justify-center space-x-2"
                               style="border-color: #CDDECB; color: #537E72;">
                                <i class="fas fa-arrow-left"></i>
                                <span class="font-medium">Kembali ke Detail Event</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>