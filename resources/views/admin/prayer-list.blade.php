@extends('base.base-admin')

@section('content')
    <div class="max-w-7xl p-4">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">🙏 Prayer List Management</h1>
        </div>

        <div class="mb-6">
            <form method="GET" action="#" class="flex gap-4 items-end">
                <div class="flex-1 max-w-md">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Prayers</label>
                    <input type="text" id="search" name="search" value=""
                        placeholder="Search prayer request..."
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

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                        <th class="py-3 px-4 border-b w-1/12">#</th>
                        <th class="py-3 px-4 border-b w-9/12">Prayer Request</th>
                        <th class="py-3 px-4 border-b w-2/12">Submit Date</th>
                        {{-- Kolom Action dihapus --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">

                    {{-- DUMMY ROW 1 --}}
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-4 align-top">1</td>
                        <td class="py-4 px-4 align-top">
                            <div class="font-semibold text-gray-900 mb-1">Mohon didoakan untuk kesembuhan adik saya yang sedang dirawat di rumah sakit akibat demam berdarah.</div>
                            
                        </td>
                        <td class="py-4 px-4 align-top">
                            <div class="text-sm font-medium text-gray-800">
                                10 Oktober 2025
                            </div>
                        </td>
                        {{-- Kolom Action dihapus --}}
                    </tr>

                    {{-- DUMMY ROW 2 --}}
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-4 align-top">2</td>
                        <td class="py-4 px-4 align-top">
                            <div class="font-semibold text-gray-900 mb-1">Saya sedang mencari pekerjaan baru. Mohon didoakan agar Tuhan membuka jalan dan memberikan pekerjaan yang sesuai dengan kehendak-Nya.</div>
                        </td>
                        <td class="py-4 px-4 align-top">
                            <div class="text-sm font-medium text-gray-800">
                                05 Oktober 2025
                            </div>
                        </td>
                        {{-- Kolom Action dihapus --}}
                    </tr>
                    
                    {{-- DUMMY ROW 3 --}}
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-4 align-top">3</td>
                        <td class="py-4 px-4 align-top">
                            <div class="font-semibold text-gray-900 mb-1">Mohon didoakan agar semua panitia retreat memiliki hati yang melayani dan persiapan berjalan lancar.</div>
                        
                        </td>
                        <td class="py-4 px-4 align-top">
                            <div class="text-sm font-medium text-gray-800">
                                28 September 2025
                            </div>
                        </td>
                        {{-- Kolom Action dihapus --}}
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Pagination dan Statistik (yang dikomentari) tidak perlu diubah karena sudah dikomentari. --}}
        
    </div>
@endsection