<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persembahan - Gereja Kristus PenciPta</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* Apply the font globally */
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white" x-data="{ mobileMenuOpen: false }">

    <div class="max-w-screen-2xl mx-auto">

        <header class="relative h-64 md:h-80">
            <img src="https://placehold.co/1200x320/808080/FFFFFF?text=Worship+Image"
                 alt="Worship"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <nav class="absolute top-0 left-0 right-0 z-10 flex justify-between items-center p-4 md:p-6">
                <img src="https://placehold.co/40x40/ffffff/111e1d?text=GKP" alt="Logo" class="rounded-full w-10 h-10 border-2 border-white">

                <div class="hidden md:flex space-x-6 text-white font-medium">
                    <a href="#" class="hover:underline">Home</a>
                    <a href="#" class="hover:underline">Events</a>
                    <a href="#" class="hover:underline">Tentang Kami</a>
                </div>

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white text-2xl">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </nav>

            <div x-show="mobileMenuOpen"
                 @click.outside="mobileMenuOpen = false"
                 x-transition
                 class="absolute top-16 left-0 right-0 z-20 md:hidden bg-white shadow-lg m-2 rounded-lg">
                <a href="#" class="block px-4 py-3 text-gray-800 hover:bg-gray-100">Home</a>
                <a href="#" class="block px-4 py-3 text-gray-800 hover:bg-gray-100">Events</a>
                <a href="#" class="block px-4 py-3 text-gray-800 hover:bg-gray-100">Tentang Kami</a>
            </div>

            <div class="absolute bottom-0 left-0 p-4 md:p-6">
                <h1 class="text-white text-4xl md:text-5xl font-bold">Persembahan</h1>
            </div>
        </header>
<section class="bg-teal-200 py-12 px-9">
        <section class="bg-[#557e72] py-16 px-4 rounded-lg mb-10">
            <div class="container mx-auto max-w-5xl text-center">
                <img src="https://placehold.co/60x60/333333/ffffff?text=G" alt="Icon" class="rounded-full w-16 h-16 mx-auto mb-6 border-4 border-white shadow-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Murid Kristus yang Berdoa dan Memulihkan</h2>
                <p class="text-gray-700 max-w-2xl mx-auto mb-5">
                    Memberi adalah bentuk ibadah kita kepada Tuhan.  Setiap persembahan bukan hanya angka, tetapi wujud kasih dan rasa syukur atas segala kebaikan-Nya

                </p>
            <p class="text-gray-700 max-w-2xl mx-auto mb-5">
                    Melalui persembahan, kita ikut ambil bagian dalam pekerjaan Tuhan untuk menjangkau, menolong, dan membangun sesama
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:auto">
                    <img src="https://placehold.co/300x200/808080/FFFFFF?text=Image+1" alt="Reading" class="w-full h-[150px] object-cover rounded-lg shadow-md">
                    <img src="https://placehold.co/300x200/808080/FFFFFF?text=Image+2" alt="Group Study" class="w-full h-[150px] object-cover rounded-lg shadow-md">
                    <img src="https://placehold.co/300x200/808080/FFFFFF?text=Image+3" alt="Discussion" class="w-full h-[150px] object-cover rounded-lg shadow-md">
                    <img src="https://placehold.co/300x200/808080/FFFFFF?text=Image+4" alt="Community" class="w-full h-[150px] object-cover rounded-lg shadow-md">
                </div>
            </div>
        </section>

        <section class="bg-[#91b7c0] py-16 px-4 rounded-lg mb-10">
            <div class="container mx-auto max-w-5xl text-center">
                <img src="https://placehold.co/60x60/333333/ffffff?text=G" alt="Icon" class="rounded-full w-16 h-16 mx-auto mb-6 border-4 border-white shadow-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-12">Cara Memberi Persembahan</h2>

                <div class="grid md:grid-cols-3 gap-8">

                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <i class="fa-solid fa-landmark text-5xl text-gray-800 mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Transfer Bank</h3>
                        <div class="text-left w-fit mx-auto space-y-2 text-gray-700 text-center">
                            <p><strong>GEREJA KRISTUS PENCIPTA</strong></p>
                            <p>BCA 000 123 4567</p>
                            <p><strong>GEREJA KRISTUS PENCIPTA</strong></p>
                            <p>VA 000 0101 1234</p>
                        </div>
                    </div>

                 <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <i class="fa-solid fa-qrcode text-5xl text-gray-800 mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">QRIS / E-Wallet</h3>
                        <img src="https://placehold.co/200x200/eeeeee/333333?text=QRIS+Code" alt="QRIS Code" class="w-48 h-48 mx-auto rounded-md">
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <i class="fa-solid fa-church text-5xl text-gray-800 mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Langsung di Gereja</h3>
                        <p class="text-gray-700">
                            Anda dapat memberikan persembahan kasih
                            langsung saat ibadah
                            maupun di persekutuan doa.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#132b1c] text-white py-16 px-4 rounded-lg">
            <div class="container mx-auto max-w-3xl text-center">
                <h2 class="text-3xl font-bold mb-4">Terima kasih telah menjadi saluran berkat</h2>
                <p class="text-gray-200">
                    Persembahan Anda memungkinkan kami melanjutkan pelayanan misi, membantu keluarga yang membutuhkan, dan membangun generasi yang mengenal kasih Kristus.
                </p>
            </div>

        </section>
</section>
@include('base.footer')

    </div> </body>
</html>

