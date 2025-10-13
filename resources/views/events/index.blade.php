<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Events - Krispen</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-white">

    <div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
        <div class="relative h-80 bg-cover bg-center bg-no-repeat rounded-2xl overflow-hidden"
            style="background-image: url('https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib-rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
            <div class="absolute inset-0"
                style="background: linear-gradient(45deg, rgba(26, 45, 16, 0.8), rgba(89, 126, 114, 0.6))"></div>

            @include('components.navbar')

            <div class="absolute bottom-12 left-8 z-10">
                <h1 class="text-5xl font-bold text-white tracking-wide">Events</h1>
            </div>
        </div>

        <div class="py-16 px-8 rounded-2xl" style="background-color: #90B7BF;">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-center text-xl font-bold text-[#122B1D] mb-12 tracking-widest">EVENTS</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($events as $event)
                        <a href="{{ route('events.show', $event->id) }}"
                            class="block bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out">
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
</body>

</html>
