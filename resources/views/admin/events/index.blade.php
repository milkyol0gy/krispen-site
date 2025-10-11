@extends('base.base-admin')

@section('content')
    <div class="max-w-7xl p-4">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">📅 Event Management</h1>

            <a href="{{ route('admin.events.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <span class="text-xl">＋</span>
                Add Event
            </a>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('admin.events.index') }}" class="flex gap-4 items-end">
                <div class="flex-1 max-w-md">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Events</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                        placeholder="Search by title or description..."
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
                    <a href="{{ route('admin.events.index') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <div class="text-sm text-gray-600">
                Showing {{ $events->firstItem() ?: 0 }} to {{ $events->lastItem() ?: 0 }}
                of {{ $events->total() }} events
                @if (request('search'))
                    for "<strong>{{ request('search') }}</strong>"
                @endif
            </div>
            <div class="text-sm text-gray-500">
                Page {{ $events->currentPage() }} of {{ $events->lastPage() }}
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                        <th class="py-3 px-4 border-b">#</th>
                        <th class="py-3 px-4 border-b">Title</th>
                        <th class="py-3 px-4 border-b">Date</th>
                        <th class="py-3 px-4 border-b">Time</th>
                        <th class="py-3 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($events as $index => $event)
                        @php
                            $startTime = \Carbon\Carbon::parse($event->start_time);
                            $endTime = $event->end_time ? \Carbon\Carbon::parse($event->end_time) : null;
                            $now = \Carbon\Carbon::now();
                            $isUpcoming = $startTime->isFuture();
                            $isOngoing = $startTime->isPast() && ($endTime ? $endTime->isFuture() : false);
                            $isPast = $endTime ? $endTime->isPast() : $startTime->isPast();
                        @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4">{{ $events->firstItem() + $index }}</td>
                            <td class="py-3 px-4">
                                <div class="font-semibold text-gray-900">{{ $event->title }}</div>
                                @if ($event->description)
                                    <div class="text-sm text-gray-500 mt-1">{{ Str::limit($event->description, 60) }}
                                    </div>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm">
                                    {{ $startTime->isoFormat('D MMM YYYY') }}
                                    @if ($endTime && $startTime->format('Y-m-d') !== $endTime->format('Y-m-d'))
                                        <br><span class="text-gray-500">s/d
                                            {{ $endTime->isoFormat('D MMM YYYY') }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm">
                                    {{ $startTime->format('H:i') }}
                                    @if ($endTime && $startTime->format('Y-m-d') === $endTime->format('Y-m-d'))
                                        - {{ $endTime->format('H:i') }}
                                    @endif
                                    WIB
                                </div>
                            </td>
                            <td class="py-3 px-4 text-center space-x-1">
                                <a href="{{ route('admin.events.show', $event->id) }}"
                                    class="px-3 py-1.5 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition">
                                    View
                                </a>
                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                    class="px-3 py-1.5 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                    Edit
                                </a>
                                <button onclick="confirmDelete({{ $event->id }}, '{{ addslashes($event->title) }}')"
                                    class="px-3 py-1.5 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center">
                                <div class="text-gray-500">
                                    <div class="text-4xl mb-4">📅</div>
                                    <h3 class="text-lg font-medium">No Events Found</h3>
                                    <p class="mt-2">Get started by creating your first event.</p>
                                    <a href="{{ route('admin.events.create') }}"
                                        class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        <span class="text-lg mr-2">＋</span>
                                        Add Event
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($events->hasPages())
            <div class="mt-6">
                <nav class="flex items-center justify-center space-x-2">
                    @if ($events->onFirstPage())
                        <span
                            class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                            ← Previous
                        </span>
                    @else
                        <a href="{{ $events->appends(request()->query())->previousPageUrl() }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition-all duration-200">
                            ← Previous
                        </a>
                    @endif

                    @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                        @if ($page == $events->currentPage())
                            <span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $events->appends(request()->query())->url($page) }}"
                                class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if ($events->hasMorePages())
                        <a href="{{ $events->appends(request()->query())->nextPageUrl() }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition-all duration-200">
                            Next →
                        </a>
                    @else
                        <span
                            class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                            Next →
                        </span>
                    @endif
                </nav>
            </div>
        @endif

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
