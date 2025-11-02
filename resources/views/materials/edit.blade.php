<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin: Edit Material</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-10 p-5 max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-700 mb-6">Edit PDF Link</h1>

    <form action="{{ route('admin.materials.update', $material) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" value="{{ old('title', $material->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="url" class="block text-gray-700 font-bold mb-2">URL</label>
            <input type="url" name="url" id="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" value="{{ old('url', $material->url) }}" required>
        </div>

        <div class="mb-4">
            <label for="published_date" class="block text-gray-700 font-bold mb-2">Published Date</label>
            <input type="date" name="published_date" id="published_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" value="{{ old('published_date', $material->published_date->format('Y-m-d')) }}">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('description', $material->description) }}</textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            <a href="{{ route('admin.materials.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
