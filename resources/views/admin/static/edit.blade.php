@extends('base.base-admin')

@section('content')
<div class="p-6 min-h-screen bg-gray-50 flex items-center justify-center">

  <div class="w-full max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Embed Instagram</h1>

    {{-- Error alert --}}
    @if ($errors->any())
      <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-md mb-5 text-sm">
        <ul class="list-disc pl-5 mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.statics.update', $static->id) }}" method="POST" class="space-y-5">
      @csrf
      @method('PUT')

      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
          Judul (opsional)
        </label>
        <input type="text" name="title" id="title"
          value="{{ old('title', $static->title) }}"
          placeholder="Masukkan judul post..."
          class="w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none px-4 py-2 text-sm text-gray-800">
      </div>

      <div>
        <label for="embed_code" class="block text-sm font-medium text-gray-700 mb-2">
          Kode Embed Instagram
        </label>
        <textarea name="embed_code" id="embed_code" rows="8"
          placeholder="Tempelkan kode embed di sini..."
          class="w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none px-4 py-2 text-sm text-gray-800">{{ old('embed_code', $static->embed_code) }}</textarea>
      </div>

      <div class="flex justify-between items-center pt-2">
        <a href="{{ route('admin.statics.index') }}"
           class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition text-sm font-medium">
          Kembali
        </a>
        <button type="submit"
          class="px-5 py-2 rounded-lg bg-blue-600 text-white font-medium text-sm hover:bg-blue-700 shadow-sm transition">
          Update
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
