@extends('base.base-admin')

@section('content')
    <div class="max-w-7xl p-4">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">🗓️ Room Bookings Management</h1>

            {{-- Tombol Add (Dummy) --}}
            {{-- <a href="#"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <span class="text-xl">＋</span>
                Add Booking
            </a> --}}
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('admin.room-booking') }}" class="flex gap-4 items-end">
                <div class="flex-1 max-w-md">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Bookings</label>
                    <input type="text" id="search" name="search" value="{{ $search ?? '' }}"
                        placeholder="Search by user or event name..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Search
                </button>
            </form>
        </div>

        {{-- <div class="flex justify-between items-center mb-4">
            <div class="text-sm text-gray-600">
                Showing **1** to **3** of **15** bookings
            </div>
            <div class="text-sm text-gray-500">
                Page 1 of 5
            </div>
        </div> --}}

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                        <th class="py-3 px-4 border-b">#</th>
                        <th class="py-3 px-4 border-b">User Name</th>
                        <th class="py-3 px-4 border-b">Facilitator Name</th>
                        <th class="py-3 px-4 border-b">Event Name</th>
                        <th class="py-3 px-4 border-b text-center">Number of People</th>
                        <th class="py-3 px-4 border-b">Booking Date</th>
                        <th class="py-3 px-4 border-b">Required Equipment</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($bookings as $index => $booking)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4">{{ $bookings->firstItem() + $index }}</td>
                            <td class="py-3 px-4">
                                <div class="font-semibold text-gray-900">{{ $booking->user_name }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm">{{ $booking->facilitator_name }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm">{{ $booking->event_name }}</div>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">{{ $booking->number_of_people }} Orang</span>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm font-medium text-gray-800">
                                    {{ \Carbon\Carbon::parse($booking->event_date)->format('d F Y') }} {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm text-gray-600">{{ $booking->required_equipment }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-gray-500">
                                No room bookings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($bookings->hasPages())
            <div class="mt-6">
                {{ $bookings->links() }}
            </div>
        @endif

    </div>
@endsection