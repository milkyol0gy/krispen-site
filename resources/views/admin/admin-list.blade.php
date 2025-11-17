@extends('base.base-admin')

@section('content')
    <div class="w-full max-w-7xl mx-auto p-4 sm:p-6 lg:p-8" x-data="adminCrud()">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 sm:mb-8 gap-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">🧑💻 Admin Management List</h1>

            <button @click="openCreateModal()"
                class="inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition w-full sm:w-auto">
                <span class="text-xl">＋</span>
                Add New Admin
            </button>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('admin.events.admin-list') }}" class="flex flex-col sm:flex-row gap-3 sm:gap-4 sm:items-end">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Admins</label>
                    <input type="text" id="search" name="search" value="{{ $search ?? '' }}"
                        placeholder="Search by name or email..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 px-4 sm:px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition w-full sm:w-auto">
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
                            <th class="py-3 px-2 sm:px-4 border-b">Name</th>
                            <th class="py-3 px-2 sm:px-4 border-b hidden sm:table-cell">Email</th>
                            <th class="py-3 px-2 sm:px-4 border-b text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($admins as $index => $admin)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 px-2 sm:px-4 text-sm">{{ $admins->firstItem() + $index }}</td>
                                <td class="py-3 px-2 sm:px-4">
                                    <div class="font-semibold text-gray-900 text-sm sm:text-base">{{ $admin->name }}</div>
                                    <div class="text-xs text-gray-600 sm:hidden">{{ $admin->email }}</div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 hidden sm:table-cell">
                                    <div class="text-sm text-gray-600">{{ $admin->email }}</div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 text-center">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2 sm:justify-center">
                                        <button @click="openEditModal({{ $admin->id }}, '{{ $admin->email }}')"
                                            class="px-2 sm:px-3 py-1.5 bg-yellow-400 text-white text-xs sm:text-sm rounded hover:bg-yellow-500 transition">
                                            <i class="fa-solid fa-pen-to-square"></i> <span class="hidden sm:inline">Edit</span>
                                        </button>
                                        <button @click="openDeleteModal({{ $admin->id }}, '{{ $admin->name }}')"
                                            class="px-2 sm:px-3 py-1.5 bg-red-500 text-white text-xs sm:text-sm rounded hover:bg-red-600 transition">
                                            <i class="fa-solid fa-trash-can"></i> <span class="hidden sm:inline">Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-gray-500 text-sm">
                                    No admins found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($admins->hasPages())
            <div class="mt-6">
                {{ $admins->links() }}
            </div>
        @endif

        <!-- Create Modal -->
        <div x-show="showCreateModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-4 sm:p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Add New Admin</h3>
                <p class="text-sm text-gray-600 mb-4">Enter the Google email address. The admin's name will be automatically fetched from their Google account.</p>
                <form action="{{ route('admin.events.admin-store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Google Email</label>
                        <input type="email" name="email" required placeholder="admin@gmail.com"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
        <div x-show="showEditModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-4 sm:p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Edit Admin</h3>
                <p class="text-sm text-gray-600 mb-4">Update the Google email address. The admin's name will be automatically updated from their Google account.</p>
                <form :action="`{{ route('admin.events.admin-list') }}/${editId}/update`" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Google Email</label>
                        <input type="email" name="email" x-model="editEmail" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-4 sm:p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Delete Admin</h3>
                <p class="mb-4">Are you sure you want to delete <strong x-text="deleteName"></strong>?</p>
                <form :action="`{{ route('admin.events.admin-list') }}/${deleteId}/delete`" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex flex-col sm:flex-row justify-end gap-2 sm:gap-2">
                        <button type="button" @click="showDeleteModal = false"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 order-2 sm:order-1">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 order-1 sm:order-2">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function adminCrud() {
            return {
                showCreateModal: false,
                showEditModal: false,
                showDeleteModal: false,
                editId: null,
                editEmail: '',
                deleteId: null,
                deleteName: '',
                
                openCreateModal() {
                    this.showCreateModal = true;
                },
                
                openEditModal(id, email) {
                    this.editId = id;
                    this.editEmail = email;
                    this.showEditModal = true;
                },
                
                openDeleteModal(id, name) {
                    this.deleteId = id;
                    this.deleteName = name;
                    this.showDeleteModal = true;
                }
            }
        }
    </script>
@endsection