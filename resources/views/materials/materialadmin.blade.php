@extends('base.base-admin')

@section('style')
    <title>Admin: Manage Materials</title>
    {{-- ADDED: This script enables all Tailwind CSS utility classes --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- jQuery (must load before DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>

    {{-- Alpine.js (load after jQuery and DataTables) --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        /* Custom DataTables Tailwind Styling */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            padding: 1rem 0;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 2rem 0.5rem 0.5rem;
            margin: 0 0.5rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            margin-left: 0.5rem;
        }

        .dataTables_wrapper .dataTables_info {
            padding: 1rem 0;
            color: #6b7280;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding: 1rem 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5rem 0.75rem;
            margin: 0 0.25rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background: white;
            color: #374151;
            cursor: pointer;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #2563eb;
            border-color: #2563eb;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            background: white;
            border-color: #d1d5db;
        }

        #materialsTable_wrapper {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            font-size: 0.875rem;
        }

        /* --- ADDED: Custom DataTable Color Theme --- */

        /* Table Header */
        #materialsTable thead {
            background-color: #2d3748; /* Dark Gray/Blue Background */
        }

        #materialsTable thead th {
            color: #ffffff; /* White Text */
        }

        /* Table Body & Rows */
        #materialsTable tbody td {
            color: #4a5568; /* Dark Gray Text */

        }

        /* Even Row (Zebra Striping) */
        /* NOTE: You should remove 'even:bg-blue-100' from the <tr> tag if you use this */
        #materialsTable tbody tr:nth-child(even) {
            background-color: hsla(221.087, 97.87%, 81.57%, 1); /* Very Light Gray */
        }

        /* Row Hover */
        /* NOTE: You should remove 'hover:bg-blue-50' from the <tr> tag if you use this */


        /* Pagination Buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #4a5568;    /* Dark Gray/Blue for current page */
            color: white !important; /* White text */
            border-color: #2d3748;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e2e8f0;    /* Lighter gray on hover for other pages */
            border-color: #cbd5e0;
        }

        /* --- END of Custom Theme --- */

    </style>
@endsection

@section('content')

<div class="bg-gray-200 min-h-screen">
    <div class="container mx-auto p-5"
        x-data="{
            showDeleteModal: false,
            formToDelete: null,
            searchDate: '',
            table: null,
            initTable() {
                const self = this;

                // Initialize DataTable
                this.table = $('#materialsTable').DataTable({
                    pageLength: 10,
                    // UPDATED: Changed the length menu to increments of 10 up to 100
                    lengthMenu: [
                        [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, -1],
                        [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 'All']
                    ],
                    language: {
                        search: 'Search:',
                        lengthMenu: 'Show _MENU_ entries',
                        info: 'Showing _START_ to _END_ of _TOTAL_ materials',
                        infoEmpty: 'Showing 0 to 0 of 0 materials',
                        infoFiltered: '(filtered from _MAX_ total materials)',
                        zeroRecords: 'No matching materials found',
                        paginate: {
                            first: 'First',
                            last: 'Last',
                            next: 'Next',
                            previous: 'Previous'
                        }
                    },
                    columnDefs: [
                        { orderable: false, targets: 4 }
                    ],
                    order: [[0, 'asc']],
                    dom: 'lfrtip'
                });

                // Custom date filter
                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    if (self.searchDate === '') return true;

                    const rowDate = data[3]; // Date column
                    if (rowDate === 'N/A') return false;

                    const filterDate = new Date(self.searchDate);
                    const parts = rowDate.split(' ');
                    const months = {
                        'Jan': 0, 'Feb': 1, 'Mar': 2, 'Apr': 3, 'May': 4, 'Jun': 5,
                        'Jul': 6, 'Aug': 7, 'Sep': 8, 'Oct': 9, 'Nov': 10, 'Dec': 11
                    };

                    if (parts.length === 3) {
                        const rowDateObj = new Date(parts[2], months[parts[1]], parts[0]);
                        return rowDateObj.toDateString() === filterDate.toDateString();
                    }

                    return false;
                });

                // --- Move date filter to the left of the search bar ---
                const dateFilter = $('#dateFilter');
                $('#materialsTable_filter').prepend(dateFilter);
                $('#materialsTable_filter').addClass('flex items-center');
                dateFilter.show();
            }
        }"
        x-init="setTimeout(() => initTable(), 100)">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold text-gray-700 "> <i class="fa-solid fa-file-circle-plus " style="color: #ed0202;"></i> Manage PDF Links</h1>
            {{-- UPDATED: Added transition classes --}}
            <a href="{{ route('admin.materials.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-transform duration-200 transform hover:-translate-y-1">
                + Add New Link
            </a>
        </div>

        <div>
            <div id="dateFilter" class="flex items-center mr-4" style="display: none;">
                <label class="block text-sm font-medium text-gray-700 mr-2 whitespace-nowrap">Filter by Date:</label>
                <input type="date" x-model="searchDate" @change="table && table.draw()" class="h-9 border border-gray-300 rounded shadow-sm px-3 text-sm">
                {{-- UPDATED: Added transition classes --}}
                <button type="button" x-show="searchDate !== ''" @click="searchDate = ''; table && table.draw()" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-1.5 px-3 rounded text-sm transition-transform duration-200 transform hover:-translate-y-1">
                    Clear
                </button>
            </div>

            <table id="materialsTable" class="min-w-full divide-y divide-gray-200 display" style="width:100%">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{--
                        IMPORTANT:
                        Remove the Tailwind hover and even classes from here if you want the CSS above to take full effect.
                        Change this:
                        <tr class="hover:bg-blue-50 even:bg-blue-100">
                        To this:
                        <tr>
                    --}}
                    @forelse ($materials as $material)
                    <tr class="hover:bg-blue-50 even:bg-blue-100">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $material->title }}</td>
                        <td class="px-6 py-4">{{ Str::limit($material->description, 100) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $material->published_date ? $material->published_date->format('d M Y') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex justify-end space-x-2">
                                {{-- UPDATED: Added transition classes --}}
                                <a href="{{ route('admin.materials.edit', $material) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm transition-transform duration-200 transform hover:-translate-y-1">Edit</a>
                                <form action="{{ route('admin.materials.destroy', $material) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    {{-- UPDATED: Added transition classes --}}
                                    <button type="button" @click="formToDelete = $event.target.closest('form'); showDeleteModal = true" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg text-sm transition-transform duration-200 transform hover:-translate-y-1">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-10">No materials have been added yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Delete Confirmation Modal --}}
        <div x-show="showDeleteModal" style="display: none;" x-transition.opacity.duration.300ms class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div @click.away="showDeleteModal = false" class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mt-5">Delete material?</h3>
                <p class="text-gray-600 mt-2">Are you sure you want to delete this material? This action cannot be undone.</p>
                <div class="mt-6 flex justify-center space-x-4">
                    {{-- UPDATED: Added transition classes --}}
                    <button type="button" @click="showDeleteModal = false" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition-transform duration-200 transform hover:-translate-y-1">
                        Cancel
                    </button>
                    {{-- UPDATED: Added transition classes --}}
                    <button type="button" @click="formToDelete.submit()" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-transform duration-200 transform hover:-translate-y-1">
                        Yes, Delete It
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
