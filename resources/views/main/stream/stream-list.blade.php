<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sermon Records</title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  <!-- Tailwind config BEFORE library -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
            playfair: ['Playfair Display', 'serif'],
          },
        },
      },
    };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-poppins">

<!-- Top Hero Card -->
<section class="relative mx-4 sm:mx-6 md:mx-8 lg:mx-12 py-8 sm:py-12 px-4 sm:px-6 bg-black mt-8 rounded-3xl shadow-lg overflow-hidden">
  <!-- Background -->
  <img src="{{ asset('assets/streaming_background.png') }}"
       alt="Hero Background"
       class="absolute inset-0 w-full h-full object-cover opacity-70 rounded-3xl">

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-6 h-64 sm:h-80 md:h-96 flex flex-col justify-between">
    <!-- Logo -->
    <div>
      <img src="{{ asset('assets/logo.png') }}" alt="Logo"
           class="h-16 w-auto sm:h-20 md:h-24 transition-all duration-300">
    </div>

    <!-- Heading -->
    <div class="pb-4 sm:pb-6">
      <h1 class="text-2xl sm:text-3xl md:text-4xl font-poppins font-extrabold text-white leading-tight">
        Rekaman Live Khotbah
      </h1>
    </div>
  </div>
</section>



<!-- Rekaman Minggu Ini Card -->
<section class="relative mx-4 sm:mx-6 md:mx-8 lg:mx-12. py-12 px-20 bg-green-200 mt-8 rounded-3xl shadow-lg sm: px-6">
  <div class="bg-white rounded-3xl shadow-sm py-10 px-6 md:px-20 max-w-8xl mx-auto bg-opacity-20">
    <h2 class="text-lg md:text-4xl font-bold text-center mb-8 sm: text-lg">Rekaman Minggu Ini</h2>

    {{-- Featured (tetap besar) --}}
    @if($featured && $featured->youtube_id)
    <div class="mb-10 transition-transform duration-300 hover:scale-95">
      <div class="bg-white rounded-2xl shadow overflow-hidden flex flex-col lg:flex-row">
        <a href="{{ $featured->youtube_link }}" target="_blank"
          class="relative aspect-video lg:w-3/4 overflow-hidden">
          <img src="https://img.youtube.com/vi/{{ $featured->youtube_id }}/hqdefault.jpg"
              alt="{{ $featured->title }}"
              class="w-full h-full object-cover ">
          <div class="absolute top-4 left-4 bg-red-600 text-white text-xs px-3 py-1 rounded-full uppercase tracking-wide">
            Featured
          </div>
        </a>

        <div class="p-6 flex flex-col justify-start lg:w-1/4 bg-gray-50">
          <h3 class="text-xl font-semibold mb-3">{{ $featured->title }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $featured->description }}</p>
          <p class="text-gray-600 text-sm">
            {{ \Carbon\Carbon::parse($featured->created_at)->format('d M Y') }}
          </p>
        </div>
      </div>
    </div>
    @endif

    <!-- 3x3 lainnya -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($others as $sermon)
      <div class="bg-white border rounded-2xl overflow-hidden hover:shadow-md transition transition-transform duration-300 hover:scale-95">
        <a href="{{ $sermon->youtube_link }}" target="_blank" class="block relative aspect-video">
          <img src="https://img.youtube.com/vi/{{ $sermon->youtube_id }}/hqdefault.jpg"
               alt="{{ $sermon->title }}"
               class="w-full h-full object-cover">
        </a>
        <div class="p-3">
          <h4 class="font-medium text-sm leading-snug line-clamp-2">{{ $sermon->title }}</h4>
          @if(!empty($sermon->description))
            <p class="text-gray-600 text-xs mt-1 line-clamp-2">{{ $sermon->description }}</p>
          @endif
          <p class="text-gray-500 text-xs mt-1">
            {{ \Carbon\Carbon::parse($sermon->created_at)->format('d M Y') }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


@include('base.footer')

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
