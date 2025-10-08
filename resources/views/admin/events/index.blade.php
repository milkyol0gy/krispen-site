<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto px-4 py-10">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">📅 Event Management</h1>

            <a href="{{ route('admin.events.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <span class="text-xl">＋</span>
                Add Event
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

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
                            <td class="py-3 px-4">{{ $index + 1 }}</td>
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
                            <td class="py-3 px-4 text-center space-x-2">
                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                    class="px-3 py-1.5 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                    Edit
                                </a>
                                <button
                                    onclick="confirmDelete({{ $event->id }}, '{{ addslashes($event->title) }}')"
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

</body>

</html>
