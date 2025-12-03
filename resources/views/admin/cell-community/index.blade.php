@extends('base.base-admin')

@section('content')
    <div class="w-full max-w-7xl mx-auto p-4 sm:p-6 lg:p-8" x-data="cellCommunityCrud()">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">🏠 Cell Communities Management</h1>

            <button @click="openCreateModal()"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <span class="text-xl">＋</span>
                Add New Cell Community
            </button>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('admin.cell-communities.index') }}" class="flex gap-4 items-end">
                <div class="flex-1 max-w-md">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Cell Communities</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        placeholder="Search by name, type, or facilitator..."
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
                            <th class="py-3 px-2 sm:px-4 border-b">Name</th>
                            <th class="py-3 px-2 sm:px-4 border-b hidden md:table-cell">Type</th>
                            <th class="py-3 px-2 sm:px-4 border-b hidden lg:table-cell">Facilitator</th>
                            <th class="py-3 px-2 sm:px-4 border-b hidden xl:table-cell">Contact</th>
                            <th class="py-3 px-2 sm:px-4 border-b hidden sm:table-cell">Schedule</th>
                            <th class="py-3 px-2 sm:px-4 border-b text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($cellCommunities as $index => $community)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 px-2 sm:px-4 text-sm">{{ $cellCommunities->firstItem() + $index }}</td>
                                <td class="py-3 px-2 sm:px-4">
                                    <div class="font-semibold text-gray-900 text-sm sm:text-base">{{ $community->name }}</div>
                                    <div class="text-xs text-gray-500 md:hidden">{{ $community->type }}</div>
                                    <div class="text-xs text-gray-500 lg:hidden">{{ $community->facilitator_name }}</div>
                                    <div class="text-xs text-gray-500 xl:hidden">{{ $community->contact_info }}</div>
                                    <div class="text-xs text-gray-500 sm:hidden">{{ $community->meeting_schedule }}</div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 hidden md:table-cell">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $community->type }}
                                    </span>
                                </td>
                                <td class="py-3 px-2 sm:px-4 hidden lg:table-cell">
                                    <div class="text-sm text-gray-900">{{ $community->facilitator_name }}</div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 hidden xl:table-cell">
                                    <div class="text-sm text-gray-600">{{ $community->contact_info }}</div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 hidden sm:table-cell">
                                    <div class="text-sm text-gray-600">{{ $community->meeting_schedule }}</div>
                                </td>
                                <td class="py-3 px-2 sm:px-4 text-center">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2 sm:justify-center">
                                        <button @click="openEditModal({{ $community->id }}, '{{ addslashes($community->name) }}', '{{ addslashes($community->type) }}', '{{ addslashes($community->facilitator_name) }}', '{{ addslashes($community->contact_info) }}', '{{ addslashes($community->meeting_schedule) }}')"
                                            class="px-2 sm:px-3 py-1.5 bg-yellow-400 text-white text-xs sm:text-sm rounded hover:bg-yellow-500 transition">
                                            <i class="fa-solid fa-pen-to-square"></i> <span class="hidden sm:inline">Edit</span>
                                        </button>
                                        <button @click="openDeleteModal({{ $community->id }}, '{{ addslashes($community->name) }}')"
                                            class="px-2 sm:px-3 py-1.5 bg-red-500 text-white text-xs sm:text-sm rounded hover:bg-red-600 transition">
                                            <i class="fa-solid fa-trash-can"></i> <span class="hidden sm:inline">Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-gray-500 text-sm">
                                    No cell communities found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($cellCommunities->hasPages())
            <div class="mt-6">
                {{ $cellCommunities->links() }}
            </div>
        @endif

        <!-- Create Modal -->
        <div x-show="showCreateModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                <h3 class="text-lg font-semibold mb-4">Add New Cell Community</h3>
                <form action="{{ route('admin.cell-communities.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" name="name" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                            <input type="text" name="type" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Facilitator Name</label>
                            <input type="text" name="facilitator_name" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Contact Info</label>
                            <input type="text" name="contact_info" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meeting Schedule</label>
                        <input type="text" name="meeting_schedule" required
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
            <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                <h3 class="text-lg font-semibold mb-4">Edit Cell Community</h3>
                <form :action="`{{ route('admin.cell-communities.index') }}/${editId}/update`" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" name="name" x-model="editName" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                            <input type="text" name="type" x-model="editType" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Facilitator Name</label>
                            <input type="text" name="facilitator_name" x-model="editFacilitatorName" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Contact Info</label>
                            <input type="text" name="contact_info" x-model="editContactInfo" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meeting Schedule</label>
                        <input type="text" name="meeting_schedule" x-model="editMeetingSchedule" required
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
                <h3 class="text-lg font-semibold mb-4">Delete Cell Community</h3>
                <p class="mb-4">Are you sure you want to delete <strong x-text="deleteName"></strong>?</p>
                <form :action="`{{ route('admin.cell-communities.index') }}/${deleteId}/delete`" method="POST">
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
        function cellCommunityCrud() {
            return {
                showCreateModal: false,
                showEditModal: false,
                showDeleteModal: false,
                editId: null,
                editName: '',
                editType: '',
                editFacilitatorName: '',
                editContactInfo: '',
                editMeetingSchedule: '',
                deleteId: null,
                deleteName: '',
                
                openCreateModal() {
                    this.showCreateModal = true;
                },
                
                openEditModal(id, name, type, facilitatorName, contactInfo, meetingSchedule) {
                    this.editId = id;
                    this.editName = name;
                    this.editType = type;
                    this.editFacilitatorName = facilitatorName;
                    this.editContactInfo = contactInfo;
                    this.editMeetingSchedule = meetingSchedule;
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