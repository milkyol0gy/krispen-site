<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room Book</title>
  
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
        Form Peminjaman Ruangan
      </h1>
    </div>
  </div>
</section>



<section class="relative mx-4 sm:mx-6 md:mx-8 lg:mx-12. py-12 px-20 bg-green-200 mt-8 rounded-3xl shadow-lg sm: px-6">
  <div class="bg-white rounded-3xl shadow-sm py-10 px-6 md:px-20 max-w-6xl mx-auto bg-opacity-90">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Peminjaman Ruang</h2>
        <form id="waForm" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Nama Peminjam</label>
            <input type="text" name="namaPeminjam" id="namaPeminjam" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700">Nama PKS</label>
            <input type="text" name="namaPKS" id="namaPKS" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700">Acara</label>
            <input type="text" name="acara" id="acara" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700">Jumlah Orang</label>
            <input type="number" name="jumlahOrang" id="jumlahOrang" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700">Hari</label>
            <input type="text" name="hari" id="hari" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700">Jam</label>
            <input type="time" name="jam" id="jam" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700">Peralatan yang Dibutuhkan</label>
            <input type="text" name="peralatan" id="peralatan" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 transition">
            Kirim ke WhatsApp
        </button>
        </form>

    </div>
  </div>
</section>

<!-- Modal -->
<div id="successModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-2xl shadow-lg p-6 w-full max-w-md text-center">
    <h3 class="text-lg font-semibold text-gray-800 mb-2">Berhasil</h3>
    <p class="text-gray-600 mb-6">Data peminjaman berhasil dikirim.</p>
    <button id="closeModalBtn" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
      OK
    </button>
  </div>
</div>



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
    const baseUrl = "https://wa.me/123456789?text="; // ganti nomor
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
</script>


</html>
