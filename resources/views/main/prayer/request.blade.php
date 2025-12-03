<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Doa - Krispen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Trajan+Pro:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .trajan-font { font-family: 'Trajan Pro', serif; }
        .poppins-font { font-family: 'Poppins', sans-serif; }
        
        /* Smooth animations */
        .fade-in { opacity: 0; transform: translateY(30px); transition: all 0.8s ease; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }
        .slide-in-left { opacity: 0; transform: translateX(-50px); transition: all 0.8s ease; }
        .slide-in-left.visible { opacity: 1; transform: translateX(0); }
        .scale-in { opacity: 0; transform: scale(0.9); transition: all 0.6s ease; }
        .scale-in.visible { opacity: 1; transform: scale(1); }
        .hero-title { animation: heroSlide 1.2s ease-out; }
        
        @keyframes heroSlide {
            0% { opacity: 0; transform: translateX(-100px); }
            100% { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body class="bg-white">
    <div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
        @include('components.hero-section', ['title' => 'Permohonan Doa'])

        <!-- Bible Quote Section -->
        <div class="text-center px-4 py-8 fade-in">
            <blockquote class="trajan-font text-xl lg:text-2xl font-bold text-gray-800 mb-6 max-w-4xl mx-auto leading-relaxed">
                "Janganlah hendaknya kamu kuatir tentang apapun juga, tetapi nyatakanlah dalam segala hal keinginanmu kepada Allah dalam doa dan permohonan dengan ucapan syukur."
            </blockquote>
            <cite class="poppins-font text-lg text-gray-600 font-medium">Filipi 4:6</cite>
            <p class="poppins-font text-gray-600 text-lg mt-8 max-w-2xl mx-auto">
                Bagikan beban hati Anda dengan kami. Tim doa kami akan berdoa bersama untuk kebutuhan dan pergumulan Anda.
            </p>
        </div>

        <!-- Prayer Request Form -->
        <div class="px-4 pb-16 scale-in">
            <div class="max-w-2xl mx-auto">
                <div class="bg-[#8FB6B3] rounded-2xl p-8 lg:p-12 shadow-lg">
                    <h2 class="poppins-font text-2xl lg:text-2xl font-bold text-white text-center mb-8 lg:tracking-wider tracking-wide">
                        Kirim Permohonan Doa
                    </h2>
                    
                    <form action="{{ route('prayer.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="name" class="block poppins-font text-white font-medium mb-3">
                                Nama (Opsional)
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="w-full px-4 py-3 rounded-lg border-0 focus:ring-2 focus:ring-white/50 poppins-font text-gray-800 placeholder-gray-500"
                                   placeholder="Masukkan nama Anda">
                            @error('name')
                                <p class="text-red-200 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block poppins-font text-white font-medium mb-3">
                                Permohonan Doa <span class="text-red-200">*</span>
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="6"
                                      required
                                      class="w-full px-4 py-3 rounded-lg border-0 focus:ring-2 focus:ring-white/50 poppins-font text-gray-800 placeholder-gray-500 resize-none"
                                      placeholder="Saya ingin didoakan tentang ...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-200 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" 
                                class="w-full bg-[#D07A2A] hover:bg-[#B86A24] text-white font-semibold py-4 px-6 rounded-lg transition-colors duration-300 poppins-font text-lg shadow-lg hover:shadow-xl">
                            Kirim Permohonan Doa
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('base.footer')

    <script>
        // Smooth scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, delay);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe all animated elements
        document.addEventListener('DOMContentLoaded', () => {
            const animatedElements = document.querySelectorAll('.fade-in, .slide-in-left, .scale-in');
            animatedElements.forEach(el => observer.observe(el));
        });
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#D07A2A'
            });
        </script>
    @endif
</body>
</html>