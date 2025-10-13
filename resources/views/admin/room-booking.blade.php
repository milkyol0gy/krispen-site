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

        {{-- Search Form (Dummy) --}}
        <div class="mb-6">
            <form method="GET" action="#" class="flex gap-4 items-end">
                <div class="flex-1 max-w-md">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Bookings</label>
                    <input type="text" id="search" name="search" value=""
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
                    
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">1</td>
                        <td class="py-3 px-4">
                            <div class="font-semibold text-gray-900">David Wijaya</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm">Ibu Siti</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm">Meeting Rutin Pengurus Inti</div>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">12 Orang</span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm font-medium text-gray-800">
                                19 Oktober 2025 19:00
                            </div>
                            <div class="text-xs text-gray-500">s/d 19 Oktober 2025 21:00</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm text-gray-600">Proyektor, Whiteboard</div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">2</td>
                        <td class="py-3 px-4">
                            <div class="font-semibold text-gray-900">Yohana Kusuma</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm">Bapak Budi</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm">Sesi Doa Malam</div>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">5 Orang</span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm font-medium text-gray-800">
                                25 Oktober 2025 18:30
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm text-gray-600">Sound System Kecil</div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">3</td>
                        <td class="py-3 px-4">
                            <div class="font-semibold text-gray-900">Michael Jonathan</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm">Ibu Siti</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm">Pelatihan Fasilitator Baru</div>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">25 Orang</span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm font-medium text-gray-800">
                                01 November 2025 10:00
                            </div>
                            <div class="text-xs text-gray-500">s/d 01 November 2025 16:00</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm text-gray-600">Laptop, Spidol Permanen</div>
                        </td>
                    </tr>

                    

                </tbody>
            </table>
        </div>

        {{-- Pagination Dummy --}}
        {{-- <div class="mt-6">
            <nav class="flex items-center justify-center space-x-2">
                <span
                    class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    ← Previous
                </span>

                <span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg">1</span>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                    2
                </a>
                <a href="#"
                    class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                    3
                </a>
                
                <a href="#"
                    class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition-all duration-200">
                    Next →
                </a>
            </nav>
        </div> --}}

    </div>
@endsection