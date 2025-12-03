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
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">📝 Description</h3>
                        <div class="prose prose-gray max-w-none">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $event->description }}</p>
                        </div>
                    </div>
                @endif

                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">👥 Registered Participants</h3>
                        <div class="flex items-center gap-3">
                            @if($event->eventRegists->count() > 0)
                                <a href="{{ route('admin.events.export-participants', $event->id) }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition">
                                    <i class="fas fa-file-csv"></i>
                                    Export CSV
                                </a>
                            @endif
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                                {{ $event->eventRegists->count() }} Total Registered
                            </span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <form method="GET" action="{{ route('admin.events.show', $event->id) }}" class="flex gap-3">
                            <div class="flex-1 relative">
                                <input type="text" name="search" value="{{ $search }}"
                                    placeholder="Search by name, inviter, or phone number..."
                                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                                Search
                            </button>
                            @if ($search)
                                <a href="{{ route('admin.events.show', $event->id) }}"
                                    class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition">
                                    Clear
                                </a>
                            @endif
                        </form>
                    </div>

                    @if ($search)
                        <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-sm text-blue-700">
                                Showing {{ $registrations->count() }} of {{ $registrations->total() }} results for
                                "<strong>{{ $search }}</strong>"
                            </p>
                        </div>
                    @endif

                    @if ($registrations->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Attendee Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Inviter Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Phone Number
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Registered At
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($registrations as $index => $registration)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $registrations->firstItem() + $index }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="flex-shrink-0 h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                        <span class="text-blue-600 font-medium text-sm">
                                                            {{ strtoupper(substr($registration->attandee_name, 0, 1)) }}
                                                        </span>
                                                    </div>
                                                    <div class="ml-3">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $registration->attandee_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $registration->inviter_name ?: '-' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $registration->attandee_phone ?: '-' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $registration->created_at->format('d/m/Y H:i') }} WIB
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($registrations->hasPages())
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">
                                        Showing {{ $registrations->firstItem() }} to {{ $registrations->lastItem() }} of
                                        {{ $registrations->total() }} registrations
                                    </div>
                                    <div class="flex space-x-2">
                                        {{ $registrations->links() }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            @if ($search)
                                <p class="text-gray-500 text-sm">No registrations found for "{{ $search }}".</p>
                                <p class="text-gray-400 text-xs mt-2">Try adjusting your search terms or clear the search
                                    to see all registrations.</p>
                            @else
                                <p class="text-gray-500 text-sm">No registrations yet for this event.</p>
                            @endif
                        </div>
                    @endif
                </div>

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
