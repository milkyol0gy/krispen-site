@extends('base.base-admin')

@section('content')
<style>
[x-cloak] { display: none !important; }
</style>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="p-8 pe-8 xl:pe-24" 
      x-data='streamingCrud({!! $sermonsJson !!}, {!! $recentJson !!})'>

    {{-- Header --}}
    <div class="flex flex-col md:flex-row mb-6 gap-x-10 max-w-[1200px] flex-wrap gap-y-4">
        <h1 class="font-bold text-xl lg:text-3xl">Streaming List</h1>
    </div>
      <form method="GET" action="{{ route('admin.sermons.index') }}" class="mb-6 flex flex-col sm:flex-row gap-2 w-full">
        <input type="text" name="search"
              value="{{ request('search') }}"
              placeholder="Search by title or link..."
              class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none w-full">
          <button type="submit"
                  class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
              Search
          </button>
      </form>
        <button @click="openAddModal()"
                class="ms-0 md:ms-auto bg-blue-500 text-white font-bold rounded-lg shadow px-5 py-2 flex items-center justify-center">
          <span class="text-xl">＋</span> Add Streaming
        </button>
    {{-- Table --}}
    <div class="overflow-x-auto rounded-lg z-0">
        <table class="w-full text-sm text-left rtl:text-right">
          <thead class="text-xs text-gray-700 uppercase text-center">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">YouTube Link</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($sermons as $index => $stream)
                <tr class="odd:bg-[#E6F3FD] even:bg-white text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ ($sermons->currentPage() - 1) * $sermons->perPage() + $loop->iteration }}
                    </th>
                    <td class="px-6 py-4 font-semibold">{{ $stream->title }}</td>
                    <td class="px-6 py-4 text-gray-700 max-w-xs truncate">{{ $stream->description ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ $stream->youtube_link }}" target="_blank"
                          class="text-blue-600 hover:underline break-words">
                          {{ $stream->youtube_link }}
                        </a>
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $stream->date ?? '-' }}
                    </td>
                    <td class="px-6 py-4 flex items-center justify-center gap-x-2">
                        <button @click="openEditModal({{ $stream->id }}, '{{ addslashes($stream->title) }}', '{{ addslashes($stream->youtube_link) }}', '{{ addslashes($stream->description ?? '') }}')"
                                class="font-medium bg-blue-400 hover:bg-blue-500 transition-all duration-200 px-4 py-2 rounded-lg shadow">
                            Edit
                        </button>
                        <form id="deleteForm-{{ $stream->id }}" action="{{ route('admin.sermons.destroy', $stream->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    @click="
                                      formData = { title: '{{ $stream->title }}', youtube_link: '{{ $stream->youtube_link }}', description: '{{ addslashes($stream->description ?? '') }}' };
                                      showPreview('delete', {{ $stream->id }})
                                    "
                                    class="font-medium bg-red-400 hover:bg-red-500 transition-all duration-200 px-4 py-2 rounded-lg shadow">
                              Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>

        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $sermons->links() }}
    </div>

<!-- Modal -->
  <div x-show="isOpen" x-cloak
      class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
      x-transition
      @keydown.escape.window="closeModal()">
      <div class="bg-white w-full max-w-md rounded-xl shadow-xl p-6 relative"
          @click.outside="closeModal()">

          <!-- Modal Title -->
          <h2 class="text-2xl font-bold text-gray-800 mb-4" x-text="modalTitle"></h2>

          <!-- Form -->
          <form :action="formAction" method="POST" class="space-y-5" id="crudForm">
              @csrf
              <template x-if="isEdit">
                  <input type="hidden" name="_method" value="PUT">
              </template>

              <!-- Title -->
              <div>
                  <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                  <input type="text" id="title" name="title" x-model="formData.title"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
              </div>
              <!-- Description -->
              <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" x-model="formData.description"
                          rows="3"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none resize-none"
                          placeholder="Enter a short sermon description..." required></textarea>
              </div>
              <!-- YouTube Link -->
              <div>
                  <label for="youtube_link" class="block text-sm font-medium text-gray-700 mb-1">YouTube URL</label>
                  <input type="url" id="youtube_link" name="youtube_link" x-model="formData.youtube_link"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
              </div>

              <!-- Buttons -->
              <div class="flex justify-end gap-4">
                  <button type="button" @click="closeModal()"
                          class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                      Cancel
                  </button>
                  <button type="button"
                          @click="showPreview(isEdit ? 'edit' : 'add')"
                          class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                      <span x-text="isEdit ? 'Preview & Update' : 'Preview & Save'"></span>
                  </button>
              </div>
          </form>
      </div>
  </div>

<!-- Preview Modal -->
<div x-show="isPreviewOpen" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" x-transition>
  <div class="bg-white w-full max-w-6xl rounded-xl shadow-xl overflow-y-auto max-h-[90vh]">
    
    <div class="flex justify-between items-center px-6 py-4 border-b">
      <h2 class="text-xl font-bold">Preview Public Page</h2>
      <button @click="isPreviewOpen=false" class="text-gray-500 hover:text-gray-700">&times;</button>
    </div>

    <div class="bg-gray-100 font-poppins">

      <!-- Hero -->
      <section class="relative mx-4 mt-6 py-6 px-6 bg-black rounded-3xl shadow-lg">
        <img src="{{ asset('assets/streaming_background.png') }}"
             class="absolute inset-0 w-full h-full object-cover opacity-70 rounded-3xl">
        <div class="relative max-w-7xl mx-auto h-32 flex flex-col justify-between">
          <img src="{{ asset('assets/logo.png') }}" class="h-12 w-12">
          <h1 class="text-2xl font-black text-white">Rekaman Live Khotbah</h1>
        </div>
      </section>

      <!-- Featured -->
      <section class="mx-4 mt-6 py-6 px-6 bg-green-200 rounded-3xl shadow-lg">
        <h2 class="text-2xl font-black text-center mb-6">Rekaman Minggu Ini</h2>

        <template x-if="featured">
          <div class="mb-6">
            <div class="bg-white rounded-lg shadow overflow-hidden flex flex-col lg:flex-row">
              <div class="relative aspect-video lg:w-3/4">
                <img :src="`https://img.youtube.com/vi/${featured.youtube_id}/hqdefault.jpg`" class="w-full h-full object-cover">
              </div>
              <div class="p-4 lg:w-1/4">
                <h3 class="text-lg font-semibold mb-2" x-text="featured.title"></h3>
                <p class="text-gray-600 text-sm" x-text="featured.date"></p>
                <p class="text-gray-700 text-sm" x-text="featured.description"></p>
              </div>
            </div>
          </div>
        </template>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <template x-for="sermon in others" :key="sermon.id">
            <div class="bg-white rounded-lg shadow overflow-hidden">
              <div class="relative aspect-video">
                <img :src="`https://img.youtube.com/vi/${sermon.youtube_id}/hqdefault.jpg`" class="w-full h-full object-cover">
              </div>
              <div class="p-3">
                <h4 class="font-semibold text-base" x-text="sermon.title"></h4>
                <p class="text-gray-600 text-xs" x-text="sermon.date"></p>
                <p class="text-gray-700 text-xs line-clamp-2" x-text="sermon.description"></p>
              </div>
            </div>
          </template>
        </div>
      </section>
    </div>


    <div class="flex justify-end gap-4 px-6 py-4 border-t">
      <button @click="isPreviewOpen=false" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</button>
      <button @click="confirmPreview()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Confirm</button>
    </div>
  </div>



<script>
window.streamingCrud = function (filteredSermons, recentSermons) {
  return {
    isOpen: false,
    isEdit: false,
    isPreviewOpen: false,
    modalTitle: '',
    formAction: '',
    formData: { title: '', youtube_link: '', description: '' }, // ✅ add description
    sermons: filteredSermons || [],
    recent: recentSermons || [],
    previewList: [],
    pendingAction: null,
    pendingId: null,

    openAddModal() {
      this.isOpen = true;
      this.isEdit = false;
      this.modalTitle = '➕ Add Streaming';
      this.formAction = '/admin/sermons/store';
      this.formData = { title: '', youtube_link: '', description: '' }; // ✅ reset description
    },
    openEditModal(id, title, youtube_link, description) {
      this.isOpen = true;
      this.isEdit = true;
      this.modalTitle = '✏️ Edit Streaming';
      this.formAction = `/admin/sermons/${id}/update`;
      this.formData = { title, youtube_link, description }; // ✅ include desc
      this.pendingId = id;
    },

    closeModal() { this.isOpen = false; },
    closePreview() { this.isPreviewOpen = false; },

    // preview logic (unchanged from yours)
    showPreview(action, id = null) {
      let list = JSON.parse(JSON.stringify(this.recent));

      if (action === 'add') {
        list.unshift({
          id: Date.now(),
          title: this.formData.title,
          youtube_link: this.formData.youtube_link,
          description: this.formData.description, // ✅ new
          youtube_id: this.extractYouTubeId(this.formData.youtube_link),
          date: new Date().toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' })
        });
      } else if (action === 'edit') {
        const idx = list.findIndex(s => s.id === this.pendingId);
        if (idx >= 0) {
          list[idx].title = this.formData.title;
          list[idx].youtube_link = this.formData.youtube_link;
          list[idx].description = this.formData.description; // ✅ new
          list[idx].youtube_id = this.extractYouTubeId(this.formData.youtube_link);
          list[idx].date = new Date().toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        }
      } else if (action === 'delete') {
        list = list.filter(s => s.id !== id);
      }

      this.previewList = list;
      this.pendingAction = action;
      this.pendingId = id;
      this.isPreviewOpen = true;
    },


    confirmPreview() {
      if (this.pendingAction === 'add' || this.pendingAction === 'edit') {
        document.getElementById('crudForm').submit();
      } else if (this.pendingAction === 'delete') {
        document.getElementById(`deleteForm-${this.pendingId}`).submit();
      }
      this.isPreviewOpen = false;
    },

    extractYouTubeId(url) {
      const m = url?.match(/[?&]v=([^&#]+)/);
      return m ? m[1] : '';
    },

    get featured() { return this.previewList[0] || null; },
    get others() { return this.previewList.slice(1, 10); },
  };
};
</script>


@endsection
