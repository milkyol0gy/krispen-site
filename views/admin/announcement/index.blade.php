@extends('base.base-admin')

@section('content')
<div class="max-w-7xl p-4">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800">📢 Announcement Management</h1>

        <a href="{{ route('admin.announcement.create') }}"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
            <span class="text-xl">＋</span>
            Add Announcement
        </a>
    </div>

    {{-- Search Bar --}}
    <div class="mb-6">
        <form method="GET" action="{{ route('admin.announcement.index') }}" class="flex gap-4 items-end">
            <div class="flex-1 max-w-md">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Announcements</label>
                <input type="text" id="search" name="search" value="{{ request('search') }}"
                       placeholder="Search by headline or details..."
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
            @if (request('search'))
                <a href="{{ route('admin.announcement.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                    Clear
                </a>
            @endif
        </form>
    </div>

    {{-- Success message --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Info --}}
    <div class="flex justify-between items-center mb-4">
        <div class="text-sm text-gray-600">
            Showing {{ $announcements->firstItem() ?: 0 }} to {{ $announcements->lastItem() ?: 0 }}
            of {{ $announcements->total() }} announcements
            @if (request('search'))
                for "<strong>{{ request('search') }}</strong>"
            @endif
        </div>
        <div class="text-sm text-gray-500">
            Page {{ $announcements->currentPage() }} of {{ $announcements->lastPage() }}
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                    <th class="py-3 px-4 border-b">#</th>
                    <th class="py-3 px-4 border-b">Headline</th>
                    <th class="py-3 px-4 border-b">Upload Date</th>
                    <th class="py-3 px-4 border-b">Details</th>
                    <th class="py-3 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($announcements as $index => $announcement)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $announcements->firstItem() + $index }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-900">{{ $announcement->headline }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">
                            {{ \Carbon\Carbon::parse($announcement->upload_date)->isoFormat('D MMM YYYY') }}
                        </td>
                        <td class="py-3 px-4 text-sm text-gray-500">
                            {{ Str::limit($announcement->details, 60) }}
                        </td>
                        <td class="py-3 px-4 text-center space-x-1">
                            <a href="{{ route('admin.announcement.edit', $announcement->id) }}"
                               class="px-3 py-1.5 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                Edit
                            </a>
                            <button onclick="confirmDelete({{ $announcement->id }}, '{{ addslashes($announcement->headline) }}')"
                                    class="px-3 py-1.5 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center">
                            <div class="text-gray-500">
                                <div class="text-4xl mb-4">📢</div>
                                <h3 class="text-lg font-medium">No Announcements Found</h3>
                                <p class="mt-2">Start by creating your first announcement.</p>
                                <a href="{{ route('admin.announcement.create') }}"
                                   class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    <span class="text-lg mr-2">＋</span>
                                    Add Announcement
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if ($announcements->hasPages())
        <div class="mt-6">
            <nav class="flex items-center justify-center space-x-2">
                @if ($announcements->onFirstPage())
                    <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                        ← Previous
                    </span>
                @else
                    <a href="{{ $announcements->previousPageUrl() }}"
                       class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition">
                        ← Previous
                    </a>
                @endif

                @foreach ($announcements->getUrlRange(1, $announcements->lastPage()) as $page => $url)
                    @if ($page == $announcements->currentPage())
                        <span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($announcements->hasMorePages())
                    <a href="{{ $announcements->nextPageUrl() }}"
                       class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition">
                        Next →
                    </a>
                @else
                    <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                        Next →
                    </span>
                @endif
            </nav>
        </div>
    @endif
</div>

{{-- Delete Confirmation --}}
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
    function confirmDelete(announcementId, announcementTitle) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You want to delete "${announcementTitle}"? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('deleteForm');
                form.action = `/admin/announcement/${announcementId}/delete`;
                form.submit();
            }
        });
    }
</script>
@endsection
