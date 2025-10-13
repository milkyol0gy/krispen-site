<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Volkhov:wght@600&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sermon Records</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">


<!-- Top Hero Card -->
    <section class=" relative mx-4 sm:mx-6 md:mx-8 lg:mx-12. py-12 px-6 bg-black mt-8 rounded-3xl shadow-lg">
        <!-- Background -->
        <img src="{{ asset('assets/streaming_background.png') }}"
            alt="Hero Background"
            class="absolute inset-0 w-full h-full object-cover opacity-70 rounded-3xl">
            
        <div class="relative max-w-7xl mx-auto px-6 py-6 h-96 flex flex-col justify-between">
            <div>
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-24 w-auto">
            </div>
            <div class="pb-6">
            <h1 class="text-4xl font-black text-white">Rekaman Live Khotbah</h1>
            </div>

        </div>
    </section>


<!-- Rekaman Minggu Ini Card -->
<section class="mx-4 sm:mx-6 md:mx-8 lg:mx-12 py-12 px-6 bg-green-200 mt-8 rounded-3xl shadow-lg">
  <h2 class="text-5xl font-black text-center mb-8">Rekaman Minggu Ini</h2>

  <div class="max-w-6xl mx-auto">
    @if($featured && $featured->youtube_id)
    <div class="mb-10">
      <div class="bg-white rounded-lg shadow overflow-hidden flex flex-col lg:flex-row">
        <a href="{{ $featured->youtube_link }}" target="_blank"
          class="relative aspect-video lg:w-3/4 overflow-hidden">
          <img src="https://img.youtube.com/vi/{{ $featured->youtube_id }}/hqdefault.jpg"
              alt="{{ $featured->title }}"
              class="w-full h-full object-cover">
        </a>


        <div class="p-6 flex flex-col justify-start lg:w-1/4">
          <h3 class="text-2xl font-semibold mb-3">{{ $featured->title }}</h3>
          <p class="text-gray-600 text-lg">
            {{ \Carbon\Carbon::parse($featured->created_at)->format('d M Y') }}
          </p>
        </div>
      </div>
    </div>
    @endif

    <!-- Sermon Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($others as $sermon)
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <a href="{{ $sermon->youtube_link }}" target="_blank" class="block relative aspect-video">
          <img src="https://img.youtube.com/vi/{{ $sermon->youtube_id }}/hqdefault.jpg"
               alt="{{ $sermon->title }}"
               class="w-full h-full object-cover">
        </a>
        <div class="p-3">
          <h4 class="font-semibold text-base">{{ $sermon->title }}</h4>
          <p class="text-gray-600 text-xs">
            {{ \Carbon\Carbon::parse($sermon->created_at)->format('d M Y') }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


</body>

<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          poppins: ['Poppins', 'sans-serif'],
          volkhov: ['Volkhov', 'serif'],
        }
      }
    }
  }
</script>

</html>
