<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Visi & Misi Gereja Kristus Pencipta</title>

  <!-- === GOOGLE FONTS === -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    /* === GLOBAL === */
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f4f8f4;
      color: #333;
      line-height: 1.6;
    }

    img {
      display: block;
      max-width: 100%;
    }

    /* === HEADER === */
    header {
      position: relative;
      background: url("{{ asset('assets/streaming_background.png') }}") center/cover no-repeat;
      height: 250px;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-radius: 15px;
      overflow: hidden;
      max-width: 900px;
      margin: 20px auto;
    }

    header::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
    }

    .top-bar {
      position: relative;
      z-index: 2;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
    }

    .logo {
      height: 50px;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: 600;
      transition: color 0.3s;
      font-family: 'Poppins', sans-serif;
    }

    nav a:hover {
      color: #cfe9cf;
    }

    .header-title {
      position: relative;
      z-index: 2;
      padding: 20px 40px;
      font-size: 1.8rem;
      font-weight: 700;
      text-align: left;
    }

    /* === SECTION BASE STYLE === */
    section {
      max-width: 900px;
      margin: 40px auto;
      padding: 40px 30px;
      border-radius: 15px;
      box-sizing: border-box;
    }

    /* === VISI SECTION === */
    .visi-section {
      background-color: #a7dca5;
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
      background-color: #5b7b6b;
      color: white;
      text-align: center;
      border-radius: 15px;
      max-width: 900px;
      margin: 40px auto;
      padding: 60px 30px;
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
      background-color: #0f3022;
      padding: 30px 20px;
      border-radius: 10px;
      width: 180px;
      min-height: 150px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      transition: transform 0.3s ease, background-color 0.3s ease;
      font-family: 'Poppins', sans-serif;
    }

    .misi-card:hover {
      transform: translateY(-5px);
      background-color: #184e34;
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
      background-color: #dbeedb;
      text-align: center;
      padding: 0;
      border-radius: 15px;
      overflow: hidden;
      color: #355E3B;
    }

    .nilai-container {
      display: flex;
      align-items: stretch;
      padding: 40px 30px;
      background-color: #e5f1e5;
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
  border-radius: 15px;
  overflow: hidden;
  max-width: 900px;
  margin: 40px auto;
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
  right: 20px;
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
  bottom: 16px;
  right: 20px;
  width: 260px;
  height: auto;
  object-fit: cover;
  border-radius: 10px;
  z-index: 1;
  box-shadow: 0 6px 18px rgba(0,0,0,0.35);
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
  <!-- HEADER -->
  <header>
    <div class="top-bar">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo Gereja" class="logo" />
      <nav>
        <a href="/">Home</a>
        <a href="/events">Events</a>
        <a href="/tentangkami">Tentang Kami</a>
      </nav>
    </div>
    <div class="header-title">
      Visi Misi Gereja Kristus Pencipta
    </div>
  </header>

  <!-- VISI -->
  <section class="visi-section">
    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="visi-logo">
    <h2 class="visi-title">VISI KAMI</h2>
    <h3 class="visi-subtitle">Murid Kristus yang Berdoa dan Memulihkan</h3>
    <p class="visi-description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique ut libero nec fermentum.
    </p>
    <div class="visi-gallery">
      <img src="https://source.unsplash.com/400x300/?prayer" alt="Visi 1">
      <img src="https://source.unsplash.com/400x300/?bible" alt="Visi 2">
      <img src="https://source.unsplash.com/400x300/?community" alt="Visi 3">
      <img src="https://source.unsplash.com/400x300/?worship" alt="Visi 4">
    </div>
  </section>

  <!-- MISI -->
  <section class="misi">
    <img src="{{ asset('assets/logo.png') }}" alt="Logo Misi" class="misi-logo" />
    <h2 class="misi-title">MISI KAMI</h2>
    <div class="misi-container">
      <div class="misi-card">
        <div class="misi-icon">✝️</div>
        <h3>Misi Layanan Pemulihan</h3>
      </div>
      <div class="misi-card">
        <div class="misi-icon">🙏</div>
        <h3>Misi Kegerakan Doa</h3>
      </div>
      <div class="misi-card">
        <div class="misi-icon">🌍</div>
        <h3>Misi Memperlengkapi Tubuh Kristus di Indonesia dan Negara Lain</h3>
      </div>
      <div class="misi-card">
        <div class="misi-icon">🤝</div>
        <h3>Misi Pemuridan</h3>
      </div>
    </div>
  </section>

  <!-- NILAI -->
  <section class="nilai">
    <div class="nilai-container">
      <div class="nilai-kiri">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo Gereja" />
        <h2>Nilai-nilai Gereja Kristus Pencipta</h2>
      </div>

      <div class="nilai-kanan">
        <div class="nilai-card">
          <div class="nilai-card-icon">✝️</div>
          <span class="nilai-card-text">Nilai Intim dengan Tuhan</span>
        </div>
        <div class="nilai-card">
          <div class="nilai-card-icon">👍</div>
          <span class="nilai-card-text">Nilai Integritas</span>
        </div>
        <div class="nilai-card">
          <div class="nilai-card-icon">🕊️</div>
          <span class="nilai-card-text">Nilai Kekudusan</span>
        </div>
        <div class="nilai-card">
          <div class="nilai-card-icon">🙌</div>
          <span class="nilai-card-text">Nilai Kehambaan</span>
        </div>
        <div class="nilai-card">
          <div class="nilai-card-icon">🌲</div>
          <span class="nilai-card-text">Nilai Kekeluargaan</span>
        </div>
        <div class="nilai-card">
          <div class="nilai-card-icon">💚</div>
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

</body>
</html>
