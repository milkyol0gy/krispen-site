@extends('base.base-admin')

@section('content')
    <div class="p-4">
        <div class="flex justify-between items-center mb-2">
            <a href="{{ route('admin.events.index') }}"
                class="inline-flex items-center font-medium gap-2 px-4 py-2 text-black bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Event List
            </a>

            <button onclick="confirmDelete({{ $event->id }}, '{{ addslashes($event->title) }}')"
                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
                Delete Event
            </button>
        </div>
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-4">

                <h1 class="text-3xl font-bold text-gray-800">📅 Event Details</h1>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.events.edit', $event->id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Event
                </a>
                <a href="{{ route('events.show', $event->id) }}" target="_blank"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Public Page
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-4 border-4">
                <div class="flex gap-6 mb-6">
                    <div class="flex-shrink-0">
                        @if ($event->poster_link)
                            <img src="{{ asset('storage/' . $event->poster_link) }}" alt="{{ 'Poster ' . $event->title }}"
                                class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                        @else
                            <div
                                class="w-32 h-32 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $event->title }}</h1>
                        @php
                            $startTime = \Carbon\Carbon::parse($event->start_time);
                            $endTime = $event->end_time ? \Carbon\Carbon::parse($event->end_time) : null;
                            $now = \Carbon\Carbon::now();
                            $isUpcoming = $startTime->isFuture();
                            $isOngoing = $startTime->isPast() && ($endTime ? $endTime->isFuture() : false);
                            $isPast = $endTime ? $endTime->isPast() : $startTime->isPast();
                        @endphp

                        <div class="mb-3">
                            @if ($isUpcoming)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    🔵 Upcoming
                                </span>
                            @elseif($isOngoing)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    🟢 Ongoing
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    ⚫ Completed
                                </span>
                            @endif
                        </div>

                        <div class="text-gray-600">
                            <p class="mb-1">📅 {{ $startTime->isoFormat('dddd, D MMMM YYYY') }}</p>
                            <p>🕐 {{ $startTime->format('H:i') }}@if ($endTime && $startTime->format('Y-m-d') === $endTime->format('Y-m-d'))
                                    - {{ $endTime->format('H:i') }}
                                @endif WIB</p>
                        </div>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-6 mb-6">

                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-sm font-semibold text-gray-800 mb-3">📅 Schedule Details</h3>
                        <div class="space-y-2 text-sm">
                            <span class="text-gray-600">Start: </span>
                            <span class="font-medium">{{ $startTime->format('H:i') }} WIB</span>
                            @if ($endTime)
                                <div>
                                    <span class="text-gray-600">End: </span>
                                    <span class="font-medium">
                                        @if ($startTime->format('Y-m-d') === $endTime->format('Y-m-d'))
                                            {{ $endTime->format('H:i') }} WIB
                                        @else
                                            {{ $endTime->isoFormat('D MMM') }}, {{ $endTime->format('H:i') }} WIB
                                        @endif
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-sm font-semibold text-gray-800 mb-3">📊 Event Info</h3>
                        <div class="space-y-1 text-gray-500">
                            <p>Created: {{ $event->created_at->isoFormat('D MMM YYYY, H:mm') }} WIB</p>
                            @if ($event->updated_at != $event->created_at)
                                <p>Updated: {{ $event->updated_at->isoFormat('D MMM YYYY, H:mm') }} WIB</p>
                            @endif
                            <p class="pt-2">
                                @if ($isUpcoming)
                                    Starts {{ $startTime->diffForHumans() }}
                                @elseif($isOngoing)
                                    @if ($endTime)
                                        Ends {{ $endTime->diffForHumans() }}
                                    @else
                                        Currently ongoing
                                    @endif
                                @else
                                    Ended {{ ($endTime ?: $startTime)->diffForHumans() }}
                                @endif
                            </p>
                        </div>
                    </div>

                </div>

                @if ($event->description)
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">📝 Description</h3>
                        <div class="prose prose-gray max-w-none">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $event->description }}</p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function confirmDelete(eventId, eventTitle) {
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete "${eventTitle}"? This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('deleteForm');
                    form.action = `/admin/events/${eventId}/delete`;
                    form.submit();
                }
            });
        }
    </script>
@endsection
