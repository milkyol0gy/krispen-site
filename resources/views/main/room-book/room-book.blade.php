<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Ruangan - Krispen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        
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
<body class="bg-white font-poppins">

<div class="max-w-7xl mx-auto my-8 overflow-hidden flex flex-col gap-8 bg-white">
    @include('components.hero-section', ['title' => 'Peminjaman Ruangan'])
    <!-- Content Section -->
    <div class="py-16 px-8 rounded-2xl fade-in" style="background-color: #90B7BF;">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-center text-xl font-bold text-[#122B1D] mb-12 tracking-widest slide-in-left">FORM PEMINJAMAN RUANGAN</h2>
            
            <div class="bg-white rounded-lg shadow-md p-8 lg:p-12 scale-in">
                <form id="waForm" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nama Peminjam</label>
                            <input type="text" name="namaPeminjam" id="namaPeminjam" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nama PKS</label>
                            <input type="text" name="namaPKS" id="namaPKS" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Acara</label>
                        <input type="text" name="acara" id="acara" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Jumlah Orang</label>
                            <input type="number" name="jumlahOrang" id="jumlahOrang" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Hari</label>
                            <input type="text" name="hari" id="hari" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Jam</label>
                            <input type="time" name="jam" id="jam" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Peralatan yang Dibutuhkan</label>
                        <textarea name="peralatan" id="peralatan" rows="3" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors resize-none"
                            placeholder="Sebutkan peralatan yang dibutuhkan..."></textarea>
                    </div>

                    <button type="submit" 
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-6 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Kirim ke WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="successModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md text-center mx-4">
        <div class="mb-4">
            <svg class="mx-auto h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Berhasil!</h3>
        <p class="text-gray-600 mb-6">Data peminjaman ruangan berhasil dikirim ke WhatsApp.</p>
        <button id="closeModalBtn" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-medium">
            OK
        </button>
    </div>
</div>

@include('base.footer')

</body>
<script>
document.getElementById("waForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const namaPeminjam = document.getElementById("namaPeminjam").value;
    const namaPKS      = document.getElementById("namaPKS").value;
    const acara        = document.getElementById("acara").value;
    const jumlahOrang  = document.getElementById("jumlahOrang").value;
    const hari         = document.getElementById("hari").value;
    const tanggal      = document.getElementById("tanggal").value;
    const jam          = document.getElementById("jam").value;
    const peralatan    = document.getElementById("peralatan").value;

    // 1) kirim ke Laravel
    try {
        const res = await fetch("{{ route('roombook.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json",
            },
            body: JSON.stringify({
                namaPeminjam,
                namaPKS,
                acara,
                jumlahOrang,
                hari,
                tanggal,
                jam,
                peralatan
            })
        });

        // optional cek respon
        const data = await res.json();
        console.log(data);
    } catch (err) {
        console.error("Gagal simpan ke DB", err);
        // kalau mau tetap lanjut ke WA walau DB gagal, lanjut saja
    }

    // 2) setelah simpan, buka WhatsApp
    const baseUrl = "https://wa.me/089699934379?text="; // ganti nomor
    const text =
      "Form Peminjaman Ruang%0A" +
      "Nama peminjam: " + encodeURIComponent(namaPeminjam) + "%0A" +
      "Nama PKS: " + encodeURIComponent(namaPKS) + "%0A" +
      "Acara: " + encodeURIComponent(acara) + "%0A" +
      "Jumlah orang: " + encodeURIComponent(jumlahOrang) + "%0A" +
      "Hari: " + encodeURIComponent(hari) + "%0A" +
      "Tanggal: " + encodeURIComponent(tanggal) + "%0A" +
      "Jam: " + encodeURIComponent(jam) + "%0A" +
      "Peralatan yang dibutuhkan: " + encodeURIComponent(peralatan);

    window.open(baseUrl + text, "_blank");

        const modal = document.getElementById("successModal");
    modal.classList.remove("hidden");
});

    // 3) tampilkan modal sukses


    // tombol OK -> refresh
document.getElementById("closeModalBtn").addEventListener("click", function () {
    location.reload();
});

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


</html>
