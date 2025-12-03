<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Visi & Misi Gereja Kristus Pencipta</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    /* === GLOBAL === */
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: white;
      color: #333;
      line-height: 1.6;
    }

    img {
      display: block;
      max-width: 100%;
    }
    
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

    /* === CONTAINER === */
    .main-container {
      max-width: 1280px;
      margin: 2rem auto;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      gap: 2rem;
      background-color: white;
    }
    
    .content-wrapper {
      padding: 4rem 2rem;
      border-radius: 1rem;
      background-color: #90B7BF;
    }
    
    .content-container {
      max-width: 1280px;
      margin: 0 auto;
    }
    
    .section-title {
      text-align: center;
      font-size: 1.25rem;
      font-weight: 700;
      color: #122B1D;
      margin-bottom: 3rem;
      letter-spacing: 0.1em;
    }

    /* === SECTION BASE STYLE === */
    section {
      background-color: white;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      padding: 2rem 3rem;
      margin-bottom: 2.5rem;
      box-sizing: border-box;
    }

    /* === VISI SECTION === */
    .visi-section {
      background-color: white;
      text-align: center;
      color: #1a1a1a;
    }

    .visi-logo {
      width: 60px;
      height: 60px;
      object-fit: contain;
      margin: 0 auto 15px;
    }

    .visi-title {
      font-size: 1rem;
      letter-spacing: 2px;
      font-weight: 600;
      color: #1a1a1a;
      margin-bottom: 5px;
      font-family: 'Poppins', serif;
    }

    .visi-subtitle {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      font-family: 'Playfair Display', serif;
    }

    .visi-description {
      font-size: 1rem;
      line-height: 1.6;
      color: #333;
      margin: 0 auto 40px auto;
      max-width: 700px;
      font-family: 'Poppins', sans-serif;
    }

    .visi-gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
    }

    .visi-gallery img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      transition: transform 0.3s ease;
    }

    .visi-gallery img:hover {
      transform: scale(1.05);
    }

    /* === MISI SECTION === */
    .misi {
      background-color: white;
      color: #333;
      text-align: center;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      margin-bottom: 2.5rem;
      padding: 2rem 3rem;
    }

    .misi-logo {
      width: 60px;
      height: 60px;
      object-fit: contain;
      margin: 0 auto 15px;
    }

    .misi-title {
      letter-spacing: 2px;
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 40px;
      font-family: 'Poppins', serif;
    }

    .misi-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 25px;
      justify-items: center;
    }

    .misi-card {
      background-color: #355E3B;
      padding: 1.5rem 1.25rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      width: 180px;
      min-height: 150px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-family: 'Poppins', sans-serif;
      color: white;
    }

    .misi-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .misi-icon {
      font-size: 2.2rem;
      margin-bottom: 15px;
  }


    .misi-card h3 {
      font-size: 0.95rem;
      font-weight: 600;
      line-height: 1.3;
      margin: 0;
      font-family: 'Poppins', sans-serif;
    }

    /* === NILAI SECTION === */
    .nilai {
      background-color: white;
      text-align: center;
      padding: 2rem 3rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      margin-bottom: 2.5rem;
      color: #355E3B;
    }

    .nilai-container {
      display: flex;
      align-items: stretch;
      padding: 0;
      background-color: transparent;
    }

    .nilai-kiri {
      flex: 0 0 35%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding-right: 20px;
      text-align: center;
    }

    .nilai-kiri img {
      width: 80px;
      height: 80px;
      margin-bottom: 15px;
    }

    .nilai-kiri h2 {
      font-size: 1.6rem;
      font-weight: 700;
      line-height: 1.2;
      margin: 0;
      color: #355E3B;
      font-family: 'Playfair Display', serif;
    }

    .nilai-kanan {
      flex: 1;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }

    .nilai-card {
      background-color: #a7dca5;
      padding: 20px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      text-align: left;
      font-weight: 600;
      min-height: 80px;
      font-family: 'Poppins', sans-serif;
    }

    .nilai-card-icon {
      font-size: 2rem;
      margin-right: 15px;
      color: #355E3B;
    }

    .nilai-card-text {
      font-size: 0.95rem;
      line-height: 1.2;
      color: #1a1a1a;
    }

    /* Responsiveness sederhana */
    @media (max-width: 768px) {
      .nilai-container {
        flex-direction: column;
        padding: 30px 20px;
      }

      .nilai-kiri {
        padding-right: 0;
        margin-bottom: 30px;
      }

      .nilai-kiri h2 {
        font-size: 1.4rem;
      }
    }

    /* === SEJARAH SECTION === */
.sejarah {
  background-color: #355E3B;
  color: white;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  margin-bottom: 2.5rem;
  padding: 0;
}

.sejarah-content-wrapper {
  position: relative;
  padding: 40px;
  box-sizing: border-box;
  display: flex;
  gap: 20px;
}

/* teks kiri */
.sejarah-text {
  flex: 1;
  font-size: 0.95rem;
  line-height: 1.8;
  min-width: 0; /* supaya flex shrink berjalan baik */
}

.sejarah-text p { margin-bottom: 1em; }

/* area kanan tempat judul + gambar */
.sejarah-right {
  width: 300px;
  flex-shrink: 0;
  position: relative; /* container untuk judul absolute dan gambar absolute */
  min-height: 220px; /* sediakan ruang minimal supaya judul tidak menempel ke tepi */
}

/* Judul: selalu di atas gambar */
.sejarah-right h2 {
  position: absolute;
  top: 24px;
  right: 0;
  margin: 0;
  z-index: 2;
  text-align: right;
  font-family: 'Playfair Display', serif;
  font-size: 1.6rem;
  line-height: 1.2;
  font-weight: 700;
  color: #fff;
  background: rgba(0,0,0,0); /* transparan, hanya untuk kejelasan */
  padding-left: 8px;
  padding-right: 8px;
}

/* Gambar: menempel di kanan bawah, berada di bawah judul (z-index lebih rendah) */
.sejarah-image {
  position: absolute;
  bottom: -40px;
  right: -40px;
  width: 230px;
  height: auto;
  object-fit: cover;
  z-index: 1;
}

@media (max-width: 768px) {
  .sejarah-content-wrapper {
    flex-direction: column;
    padding: 30px 20px;
  }

  .sejarah-right {
    width: 100%;
    min-height: auto;
    margin-top: 18px;
  }

  .sejarah-right h2 {
    position: relative;
    top: auto;
    right: auto;
    text-align: center;
    margin-bottom: 12px;
    z-index: 3;
  }

  .sejarah-image {
    position: relative;
    bottom: auto;
    right: auto;
    width: 80%;
    margin: 0 auto;
    z-index: 1;
  }
}
  </style>
</head>

<body>
<div class="main-container">
  @include('components.hero-section', ['title' => 'Visi Misi Gereja Kristus Pencipta'])
  
  <div class="content-wrapper fade-in">
    <div class="content-container">
      <h2 class="section-title slide-in-left">VISI & MISI GEREJA KRISTUS PENCIPTA</h2>
      
      <!-- VISI -->
      <section class="visi-section scale-in">
        <div class="w-16 h-16 bg-[#557e72] rounded-full mx-auto mb-6 flex items-center justify-center">
          <i class="fas fa-eye text-white text-2xl"></i>
        </div>
        <h2 class="visi-title">VISI KAMI</h2>
        <h3 class="visi-subtitle">Murid Kristus yang Berdoa dan Memulihkan</h3>
        <p class="visi-description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique ut libero nec fermentum.
        </p>
        <div class="visi-gallery">
          <img src="{{ asset('assets/visi_1.JPG') }}" alt="Visi 1" class="scale-in" data-delay="100">
          <img src="{{ asset('assets/visi_2.JPG') }}" alt="Visi 2" class="scale-in" data-delay="200">
          <img src="{{ asset('assets/visi_3.JPG') }}" alt="Visi 3" class="scale-in" data-delay="300">
          <img src="{{ asset('assets/visi_4.jpg') }}" alt="Visi 4" class="scale-in" data-delay="400">
        </div>
      </section>

      <!-- MISI -->
      <section class="misi fade-in">
        <div class="w-16 h-16 bg-[#91b7c0] rounded-full mx-auto mb-6 flex items-center justify-center">
          <i class="fas fa-bullseye text-white text-2xl"></i>
        </div>
        <h2 class="misi-title">MISI KAMI</h2>
        <div class="misi-container">
          <div class="misi-card scale-in" data-delay="100">
            <div class="w-12 h-12 bg-white rounded-full mx-auto mb-4 flex items-center justify-center">
              <i class="fas fa-cross text-[#355E3B] text-xl"></i>
            </div>
            <h3>Misi Layanan Pemulihan</h3>
          </div>
          <div class="misi-card scale-in" data-delay="200">
            <div class="w-12 h-12 bg-white rounded-full mx-auto mb-4 flex items-center justify-center">
              <i class="fas fa-praying-hands text-[#355E3B] text-xl"></i>
            </div>
            <h3>Misi Kegerakan Doa</h3>
          </div>
          <div class="misi-card scale-in" data-delay="300">
            <div class="w-12 h-12 bg-white rounded-full mx-auto mb-4 flex items-center justify-center">
              <i class="fas fa-globe text-[#355E3B] text-xl"></i>
            </div>
            <h3>Misi Memperlengkapi Tubuh Kristus di Indonesia dan Negara Lain</h3>
          </div>
          <div class="misi-card scale-in" data-delay="400">
            <div class="w-12 h-12 bg-white rounded-full mx-auto mb-4 flex items-center justify-center">
              <i class="fas fa-hands-helping text-[#355E3B] text-xl"></i>
            </div>
            <h3>Misi Pemuridan</h3>
          </div>
        </div>
      </section>

      <!-- NILAI -->
      <section class="nilai slide-in-left">
        <div class="nilai-container">
          <div class="nilai-kiri">
            <div class="w-16 h-16 bg-[#557e72] rounded-full mx-auto mb-6 flex items-center justify-center">
              <i class="fas fa-heart text-white text-2xl"></i>
            </div>
            <h2>Nilai-nilai Gereja Kristus Pencipta</h2>
          </div>

          <div class="nilai-kanan">
            <div class="nilai-card">
              <div class="nilai-card-icon"><i class="fas fa-cross"></i></div>
              <span class="nilai-card-text">Nilai Intim dengan Tuhan</span>
            </div>
            <div class="nilai-card">
              <div class="nilai-card-icon"><i class="fas fa-shield-alt"></i></div>
              <span class="nilai-card-text">Nilai Integritas</span>
            </div>
            <div class="nilai-card">
              <div class="nilai-card-icon"><i class="fas fa-dove"></i></div>
              <span class="nilai-card-text">Nilai Kekudusan</span>
            </div>
            <div class="nilai-card">
              <div class="nilai-card-icon"><i class="fas fa-hands"></i></div>
              <span class="nilai-card-text">Nilai Kehambaan</span>
            </div>
            <div class="nilai-card">
              <div class="nilai-card-icon"><i class="fas fa-users"></i></div>
              <span class="nilai-card-text">Nilai Kekeluargaan</span>
            </div>
            <div class="nilai-card">
              <div class="nilai-card-icon"><i class="fas fa-heart"></i></div>
              <span class="nilai-card-text">Nilai Mengasihi Jiwa-jiwa</span>
            </div>
          </div>
        </div>
      </section>

  <!-- SEJARAH -->
<section class="sejarah">
  <div class="sejarah-content-wrapper">
    
    <div class="sejarah-text">
      <p class="paragraf-satu">
        GBI Kristus Pencipta pertama kali dirintis oleh Pdt. Nikodemus Njoto Ongkosoetrisno dan istrinya pada tahun 1966. 
        Pada tahun 1975, gedung kebaktian GBI Kristus Pencipta yang berdiri di atas dua kapling selesai dibangun dan mulai digunakan untuk beribadah. 
        Dengan kasih karunia Tuhan Yesus, gereja yang berlokasi di Jl. Mojoarum V No. 2–4 Surabaya ini terus bertumbuh menjadi gereja yang dewasa.
      </p>

      <p class="paragraf-dua">
        Di bawah penggembalaan Pdt. Hanna Ongkosoetrisno, Tuhan semakin menegaskan visi dan misi GBI Kristus Pencipta 
        untuk menjadi gereja yang berdoa hingga kuasa Tuhan bekerja memulihkan kehidupan yang hancur.
      </p>

      <p class="paragraf-tiga">
        Untuk terus melangkah dalam panggilan Tuhan, GBI Kristus Pencipta didukung oleh ibadah umum setiap minggu 
        serta pelayanan yang berorientasi pada jiwa-jiwa melalui Komsel. 
        Ibadah gereja terdiri dari Ibadah Keluarga, Ibadah Pemuda, Ibadah Remaja, dan Sekolah Minggu JCC (Jesus Children Church). 
        Pada akhirnya, segala kasih karunia dan karya Tuhan dalam gereja ini semakin nyata dan meneguhkan GBI Kristus Pencipta 
        sebagai “Murid Kristus yang Berdoa dan Memulihkan”: We Pray We Restore!
      </p>
    </div>

    <div class="sejarah-right">
      <h2>Sejarah Gereja<br>Kristus Pencipta</h2>
      <img src="{{ asset('assets/sejarah.png') }}" alt="Pdt. Hanna Ongkosoetrisno" class="sejarah-image">
    </div>

  </div>
</section>

    </div>
  </div>
</div>

@include('base.footer')

<script>
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
    
    document.addEventListener('DOMContentLoaded', () => {
        const animatedElements = document.querySelectorAll('.fade-in, .slide-in-left, .scale-in');
        animatedElements.forEach(el => observer.observe(el));
    });
</script>

</body>
</html>
