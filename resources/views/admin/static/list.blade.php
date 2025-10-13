@extends('base.base-admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Instagram Embed Manager</h1>
            <p class="text-gray-500 text-sm mt-1">Kelola dan pantau embed post Instagram secara efisien</p>
        </div>

        <div class="flex gap-3 mt-3 md:mt-0">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>
                <input id="search-input" type="search" placeholder="Cari judul atau ID..."
                    class="pl-10 pr-3 py-2 w-56 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm" />
            </div>

            <a href="{{ route('admin.statics.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-sm transition">
                <i class="fa-solid fa-plus mr-1"></i> Tambah Post
            </a>
        </div>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded-md mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded-md mb-4 text-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- Daftar Embed --}}
    <div id="list-rows" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @forelse ($statics as $static)
            <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition p-4 flex flex-col"
                 data-title="{{ strtolower($static->title ?? '') }}">

                <div class="aspect-[4/5] overflow-hidden rounded-md mb-3">
                    {!! $static->embed_code !!}
                </div>

                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="font-semibold text-gray-800 mb-1 text-sm">
                            {{ $static->title ?? 'Tanpa judul' }}
                        </h2>
                        <p class="text-xs text-gray-500">
                            ID: {{ $static->id }} · {{ $static->updated_at ?? $static->created_at }}
                        </p>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('admin.statics.edit', $static->id) }}"
                            class="text-blue-600 hover:text-blue-800" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <button class="text-gray-600 hover:text-gray-800 btn-copy"
                            data-embed-id="{{ $static->id }}" title="Copy Embed">
                            <i class="fa-solid fa-copy"></i>
                        </button>

                        <form action="{{ route('admin.statics.destroy', $static->id) }}" method="POST"
                              id="delete-form-{{ $static->id }}">
                            @csrf @method('DELETE')
                            <button type="button"
                                class="text-red-600 hover:text-red-800 btn-delete"
                                data-form-id="delete-form-{{ $static->id }}" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-400 py-10">
                Belum ada post yang ditambahkan.
            </div>
        @endforelse
    </div>
</div>


@section('script')
<script>
    // 🔍 Live search
    $('#search-input').on('input', function () {
        const term = $(this).val().toLowerCase();
        $('#list-rows [data-title]').each(function () {
            $(this).toggle($(this).data('title').includes(term));
        });
    });

    // 📋 Copy embed
    $('.btn-copy').on('click', function () {
        const embed = $(this).closest('.flex').prev().find('iframe, blockquote').parent().html().trim();
        navigator.clipboard.writeText(embed).then(() => showToast('Embed code berhasil disalin.'));
    });

    // 🗑️ Konfirmasi hapus
    $('.btn-delete').on('click', function () {
        const form = $('#' + $(this).data('form-id'));
        confirmDelete(form[0]);
    });

    // 🪄 Lazy load Instagram embed
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof instgrm !== 'undefined') instgrm.Embeds.process();
    });
</script>
@endsection
@endsection
