<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Download Buku PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Alpine.js Script --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; }
        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        }
    </style>

</head>
<body class="bg-white">

<div class="w-full mx-auto">
    {{-- ========= HERO SECTION (Unchanged) ========= --}}
    <div class="relative">
        <img src="https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop" alt="Hero Image" class="w-full h-48 object-cover ">
        <div class="absolute inset-0 bg-black bg-opacity-30 sm:rounded-b-md"></div>
        <div class="absolute top-0 left-0 w-full flex items-center justify-between px-4 py-3 z-10">
            <img src="https://placehold.co/40x40" alt="Logo" class="rounded-full w-10 h-10">
            <nav class="relative">
                <div class="hidden md:flex items-center space-x-6 text-white font-medium">
                    <a href="#" class="hover:underline">Home</a>
                    <a href="#" class="hover:underline">Events</a>
                    <a href="#" class="hover:underline">Tentang Kami</a>
                </div>
                <i id="menu-button" class="fa-solid fa-bars text-xl text-white md:hidden cursor-pointer"></i>
            </nav>
        </div>
        <div id="mobile-menu" class="hidden md:hidden absolute top-16 left-0 w-full bg-[#1b2b2a] bg-opacity-90 p-4 z-20">
            <a href="#" class="block text-white py-2 text-center hover:bg-gray-700 rounded">Home</a>
            <a href="#" class="block text-white py-2 text-center hover:bg-gray-700 rounded">Events</a>
            <a href="#" class="block text-white py-2 text-center hover:bg-gray-700 rounded">Tentang Kami</a>
        </div>
        <div class="absolute bottom-4 left-4">
            <h1 class="text-white text-2xl sm:text-3xl font-bold">Download Buku PDF</h1>
        </div>
    </div>

    {{-- ========= CONTENT SECTION with Alpine.js ========= --}}
    <div class="bg-[#faedcd] p-4 md:p-6" x-data="{ searchQuery: '', searchDate: '' }">
        <h2 class="text-xl sm:text-2xl font-bold text-center mb-6">Kumpulan Buku PDF</h2>

        {{-- ========= LIVE SEARCH AND FILTER INPUTS (Updated) ========= --}}
        <div class="mb-8 max-w-2xl mx-auto flex flex-col md:flex-row gap-4">
            {{-- Text Search Input --}}
            <div class="relative flex-grow">
                <input type="text" x-model.debounce.300ms="searchQuery" placeholder="Cari berdasarkan judul atau deskripsi..."
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1b2b2a]">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                </div>
            </div>

            <div class="relative cursor-pointer" @click="$refs.dateInput.showPicker()">
                <input type="date" x-model="searchDate" x-ref="dateInput"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1b2b2a] pointer-events-none">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <i class="fa-solid fa-calendar-day text-gray-400"></i>
                </div>
            </div>
        </div>

        {{-- ========= MATERIALS LIST (Updated with Alpine.js logic) ========= --}}
        @forelse($materials as $material)
            <a href="{{ $material->url }}" target="_blank" rel="noopener noreferrer"
               class="block bg-[#d8f3dc] flex items-start gap-4 p-4 mb-4 rounded-lg hover:bg-[#c7f0d0] transition duration-200"
               data-material-row
               data-title="{{ $material->title }}"
               data-description="{{ $material->description }}"
               data-date="{{ $material->published_date ? $material->published_date->format('Y-m-d') : '' }}"
               x-show="(searchQuery === '' || $el.dataset.title.toLowerCase().includes(searchQuery.toLowerCase()) || $el.dataset.description.toLowerCase().includes(searchQuery.toLowerCase())) && (searchDate === '' || $el.dataset.date === searchDate)">

                <div class="flex-shrink-0 text-green-700 text-3xl sm:text-4xl w-[60px] text-center pt-1">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div class="flex-grow">
                    <p class="font-bold text-base sm:text-lg text-gray-900">{{ $material->title }}</p>
                    <p class="text-sm text-gray-700 mt-1 mb-2">{{ $material->description }}</p>
                    <div class="text-xs text-gray-600 flex items-center gap-2">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Tanggal: {{ $material->published_date ? $material->published_date->format('d F Y') : 'N/A' }}</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center text-gray-600 bg-white p-8 rounded-lg">
                <i class="fa-solid fa-box-open text-4xl mb-4"></i>
                <p>Belum ada materi yang ditambahkan.</p>
            </div>
        @endforelse

        {{-- "No Results" Message for when filtering yields no matches --}}
        @if(count($materials) > 0)
        <div x-show="document.querySelectorAll('[data-material-row]:not([style*=\'display: none\'])').length === 0" style="display: none;"
             class="text-center text-gray-600 bg-white p-8 rounded-lg">
            <i class="fa-solid fa-search text-4xl mb-4"></i>
            <p>Materi tidak ditemukan.</p>
            <p class="text-sm">Coba ubah kata kunci pencarian atau filter Anda.</p>
        </div>
        @endif
    </div>
</div>

@include('base.footer')

{{-- ========= JAVASCRIPT FOR MOBILE MENU (Unchanged) ========= --}}
<script>
    document.getElementById('menu-button').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>

</body>
</html>
