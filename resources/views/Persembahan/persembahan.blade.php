<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persembahan - Krispen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
    </style>
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
<body class="bg-white poppins-font">

<div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
    @include('components.hero-section', ['title' => 'Persembahan'])

    <!-- Content Section -->
    <div class="py-16 px-8 rounded-2xl fade-in" style="background-color: #90B7BF;">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-center text-xl font-bold text-[#122B1D] mb-12 tracking-widest slide-in-left">PERSEMBAHAN</h2>
            
            <!-- Introduction Section -->
            <div class="bg-white rounded-lg shadow-md p-8 lg:p-12 mb-10 scale-in">
                <div class="text-center">
                    <div class="w-16 h-16 bg-[#557e72] rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-6 trajan-font">Murid Kristus yang Berdoa dan Memulihkan</h3>
                    <p class="text-gray-700 max-w-2xl mx-auto mb-6 text-lg leading-relaxed">
                        Memberi adalah bentuk ibadah kita kepada Tuhan. Setiap persembahan bukan hanya angka, tetapi wujud kasih dan rasa syukur atas segala kebaikan-Nya
                    </p>
                    <p class="text-gray-700 max-w-2xl mx-auto mb-8 text-lg leading-relaxed">
                        Melalui persembahan, kita ikut ambil bagian dalam pekerjaan Tuhan untuk menjangkau, menolong, dan membangun sesama
                    </p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <img src="{{ asset('assets/persembahan_1.JPG') }}" alt="Persembahan 1" class="w-full h-[150px] object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 scale-in" data-delay="100">
                        <img src="{{ asset('assets/persembahan_2.JPG') }}" alt="Persembahan 2" class="w-full h-[150px] object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 scale-in" data-delay="200">
                        <img src="{{ asset('assets/persembahan_3.JPG') }}" alt="Persembahan 3" class="w-full h-[150px] object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 scale-in" data-delay="300">
                        <img src="{{ asset('assets/persembahan_4.JPG') }}" alt="Persembahan 4" class="w-full h-[150px] object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 scale-in" data-delay="400">
                    </div>
                </div>
            </div>

            <!-- Payment Methods Section -->
            <div class="bg-white rounded-lg shadow-md p-8 lg:p-12 mb-10 fade-in">
                <div class="text-center mb-12">
                    <div class="w-16 h-16 bg-[#91b7c0] rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">Cara Memberi Persembahan</h3>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center scale-in" data-delay="100">
                        <div class="w-16 h-16 bg-blue-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <i class="fa-solid fa-landmark text-blue-600 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-6">Transfer Bank</h4>
                        <div class="space-y-3 text-gray-700">
                            <div class="bg-white p-4 rounded-lg">
                                <p class="font-semibold text-gray-800">GEREJA KRISTUS PENCIPTA</p>
                                <p class="text-blue-600 font-mono">BCA 5060 689 000</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg">
                                <p class="font-semibold text-gray-800">GEREJA KRISTUS PENCIPTA</p>
                                <p class="text-blue-600 font-mono">BNI 754 009 3210</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center scale-in" data-delay="200">
                        <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <i class="fa-solid fa-qrcode text-green-600 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-6">QRIS / E-Wallet</h4>
                        <div class="bg-white p-4 rounded-lg">
                            <img src="https://placehold.co/200x200/eeeeee/333333?text=QRIS+Code" alt="QRIS Code" class="w-48 h-48 mx-auto rounded-lg shadow-sm">
                        </div>
                    </div>

                    <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center scale-in" data-delay="300">
                        <div class="w-16 h-16 bg-purple-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <i class="fa-solid fa-church text-purple-600 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-6">Langsung di Gereja</h4>
                        <div class="bg-white p-4 rounded-lg">
                            <p class="text-gray-700 leading-relaxed">
                                Anda dapat memberikan persembahan kasih langsung saat ibadah maupun di persekutuan doa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thank You Section -->
            <div class="bg-[#132b1c] text-white rounded-lg shadow-md p-8 lg:p-12 slide-in-left">
                <div class="text-center max-w-3xl mx-auto">
                    <div class="w-16 h-16 bg-yellow-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-hands-praying text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-6">Terima kasih telah menjadi saluran berkat</h3>
                    <p class="text-gray-200 text-lg leading-relaxed">
                        Persembahan Anda memungkinkan kami melanjutkan pelayanan misi, membantu keluarga yang membutuhkan, dan membangun generasi yang mengenal kasih Kristus.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

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

</body>
</html>