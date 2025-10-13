<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin: Manage Materials</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-10 p-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Manage PDF Links</h1>
        <a href="{{ route('admin.materials.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Add New Link
        </a>
    </div>

    <table class="min-w-full table-auto md:table-fixed border border-slate-400">
        <thead class="bg-slate-50">
            <tr>
                <th class="border border-slate-300 px-5 py-3 text-left">Title</th>
                <th class="border border-slate-300 px-5 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($materials as $material)
            <tr>
                <td class="border border-slate-300 px-5 py-5">{{ $material->title }}</td>
                <td class="border border-slate-300 px-5 py-5">
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.materials.edit', $material) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('admin.materials.destroy', $material) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="2" class="border border-slate-300 text-center py-10">No materials found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
