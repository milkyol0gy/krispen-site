<div class="relative h-80 bg-cover bg-center bg-no-repeat rounded-2xl overflow-hidden"
    style="background-image: url('{{ asset('assets/streaming_background.png') }}');">
    <div class="absolute inset-0"
        style="background: linear-gradient(45deg, rgba(26, 45, 16, 0.8), rgba(89, 126, 114, 0.6))"></div>

    @include('components.navbar')

    <div class="absolute bottom-12 left-8">
        <h1 class="text-3xl font-bold text-white tracking-wide hero-title">{{ $title }}</h1>
    </div>
</div>