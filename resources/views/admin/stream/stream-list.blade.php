@extends('base.base-admin')

@section('content')
    <div class="w-full max-w-7xl mx-auto p-4 sm:p-6 lg:p-8" x-data="streamingCrud()">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">🎥 Streaming Management</h1>

            <button @click="openCreateModal()"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <span class="text-xl">＋</span>
                Add New Streaming
            </button>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('admin.sermons.index') }}" class="flex gap-4 items-end">
                <div class="flex-1 max-w-md">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Streaming</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        placeholder="Search by title or YouTube link..."
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
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left text-gray-700 uppercase text-xs sm:text-sm">
                            <th class="py-3 px-2 sm:px-4 border-b">#</th>
                            <th class="py-3 px-2 sm:px-4 border-b">Title</th>
                            <th class="py-3 px-2 sm:px-4 border-b hidden md:table-cell">YouTube Link</th>
                            <th class="py-3 px-2 sm:px-4 border-b hidden sm:table-cell">Date</th>
                            <th class="py-3 px-2 sm:px-4 border-b text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($sermons as $index => $sermon)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 px-2 sm:px-4 text-sm">{{ $sermons->firstItem() + $index }}</td>
                                <td class="py-3 px-2 sm:px-4">
                                    <div class="font-semibold text-gray-900 text-sm sm:text-base">{{ $sermon->title }}</div>
                                    @if($sermon->description)
                                        <div class="text-xs text-gray-600">{{ Str::limit($sermon->description, 40) }}</div>
                                    @endif
                                    <div class="text-xs text-gray-500 md:hidden">
                                        <a href="{{ $sermon->youtube_link }}" target="_blank" class="text-blue-600 hover:underline">
                                            YouTube Link
                                        </a>
                                    </div>
                                    <div class="text-xs text-gray-500 sm:hidden">{{ $sermon->created_at->format('d M Y') }}</div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 hidden md:table-cell">
                                    <a href="{{ $sermon->youtube_link }}" target="_blank" 
                                       class="text-blue-600 hover:underline text-sm break-all">
                                        {{ Str::limit($sermon->youtube_link, 50) }}
                                    </a>
                                </td>
                                <td class="py-3 px-2 sm:px-4 hidden sm:table-cell">
                                    <div class="text-sm text-gray-600">
                                        {{ $sermon->created_at->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 text-center">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2 sm:justify-center">
                                        <button @click="openEditModal({{ $sermon->id }}, '{{ addslashes($sermon->title) }}', '{{ addslashes($sermon->youtube_link) }}', '{{ addslashes($sermon->description ?? '') }}')"
                                            class="px-2 sm:px-3 py-1.5 bg-yellow-400 text-white text-xs sm:text-sm rounded hover:bg-yellow-500 transition">
                                            <i class="fa-solid fa-pen-to-square"></i> <span class="hidden sm:inline">Edit</span>
                                        </button>
                                        <button @click="openDeleteModal({{ $sermon->id }}, '{{ addslashes($sermon->title) }}')"
                                            class="px-2 sm:px-3 py-1.5 bg-red-500 text-white text-xs sm:text-sm rounded hover:bg-red-600 transition">
                                            <i class="fa-solid fa-trash-can"></i> <span class="hidden sm:inline">Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-500 text-sm">
                                    No streaming records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($sermons->hasPages())
            <div class="mt-6">
                {{ $sermons->links() }}
            </div>
        @endif

        <!-- Create Modal -->
        <div x-show="showCreateModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Add New Streaming</h3>
                <form action="{{ route('admin.sermons.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">YouTube Link</label>
                        <input type="url" name="youtube_link" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showCreateModal = false"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-show="showEditModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Edit Streaming</h3>
                <form :action="`{{ route('admin.sermons.index') }}/${editId}/update`" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" x-model="editTitle" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" x-model="editDescription" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">YouTube Link</label>
                        <input type="url" name="youtube_link" x-model="editYoutubeLink" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showEditModal = false"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Delete Streaming</h3>
                <p class="mb-4">Are you sure you want to delete <strong x-text="deleteTitle"></strong>?</p>
                <form :action="`{{ route('admin.sermons.index') }}/${deleteId}/delete`" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showDeleteModal = false"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function streamingCrud() {
            return {
                showCreateModal: false,
                showEditModal: false,
                showDeleteModal: false,
                editId: null,
                editTitle: '',
                editDescription: '',
                editYoutubeLink: '',
                deleteId: null,
                deleteTitle: '',
                
                openCreateModal() {
                    this.showCreateModal = true;
                },
                
                openEditModal(id, title, youtubeLink, description) {
                    this.editId = id;
                    this.editTitle = title;
                    this.editDescription = description;
                    this.editYoutubeLink = youtubeLink;
                    this.showEditModal = true;
                },
                
                openDeleteModal(id, title) {
                    this.deleteId = id;
                    this.deleteTitle = title;
                    this.showDeleteModal = true;
                }
            }
        }
    </script>
@endsection