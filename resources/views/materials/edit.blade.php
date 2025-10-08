<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin: Edit Material Link</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-10 p-5 max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-700 mb-6">Edit Material Link</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.materials.update', $material) }}" method="POST">
    @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required value="{{ old('title', $material->title) }}">
        </div>
        <div class="mb-6">
            <label for="url" class="block text-gray-700 text-sm font-bold mb-2">PDF URL:</label>
            <input type="url" name="url" id="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required value="{{ old('url', $material->url) }}">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Link</button>
            <a href="{{ route('admin.materials.index') }}">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
