@extends('base.base-admin')

@section('content')
    <div class="max-w-7xl p-4">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">🧑‍💻 Admin Management List</h1>

            {{-- Tombol Add Admin --}}
            <a href="#"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <span class="text-xl">＋</span>
                Add New Admin
            </a>
        </div>

        {{-- Search Form (Dummy) --}}
        <div class="mb-6">
            <form method="GET" action="#" class="flex gap-4 items-end">
                <div class="flex-1 max-w-md">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Admins</label>
                    <input type="text" id="search" name="search" value=""
                        placeholder="Search by name or email..."
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

        {{-- Tabel Admin List Dummy --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                        <th class="py-3 px-4 border-b w-1/12">#</th>
                        <th class="py-3 px-4 border-b w-4/12">Name</th>
                        <th class="py-3 px-4 border-b w-4/12">Email</th>
                        <th class="py-3 px-4 border-b w-3/12 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">

                    {{-- DUMMY ROW 1 --}}
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">1</td>
                        <td class="py-3 px-4">
                            <div class="font-semibold text-gray-900">Budi Santoso (Super Admin)</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm text-gray-600">budi.santoso@example.com</div>
                        </td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="#" class="px-3 py-1.5 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <button class="px-3 py-1.5 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </td>
                    </tr>

                    {{-- DUMMY ROW 2 --}}
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">2</td>
                        <td class="py-3 px-4">
                            <div class="font-semibold text-gray-900">Siti Rahayu</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm text-gray-600">siti.rahayu@example.com</div>
                        </td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="#" class="px-3 py-1.5 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <button class="px-3 py-1.5 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </td>
                    </tr>
                    
                    {{-- DUMMY ROW 3 --}}
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">3</td>
                        <td class="py-3 px-4">
                            <div class="font-semibold text-gray-900">Michael Sitorus</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm text-gray-600">michael.sitorus@example.com</div>
                        </td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="#" class="px-3 py-1.5 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <button class="px-3 py-1.5 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@endsection