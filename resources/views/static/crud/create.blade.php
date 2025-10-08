<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Embed Instagram</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --gradient-accent: linear-gradient(135deg, #7f5af0, #00c6ff);
      --card-bg: rgba(25, 25, 25, 0.6);
      --input-bg: rgba(40, 40, 40, 0.7);
      --border-color: rgba(255, 255, 255, 0.1);
    }

    body {
      font-family: 'Space Grotesk', sans-serif;
      background: radial-gradient(circle at top left, #0f0f10, #0a0a0b 70%);
      color: #eaeaea;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
    }

    .card-form {
      background: var(--card-bg);
      border: 1px solid var(--border-color);
      backdrop-filter: blur(16px);
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.6);
      padding: 40px;
      width: 100%;
      max-width: 650px;
      transition: all 0.3s ease;
    }

    .card-form:hover {
      box-shadow: 0 0 25px rgba(127,90,240,0.25);
    }

    h2 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 30px;
      background: var(--gradient-accent);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    label {
      font-weight: 500;
      margin-bottom: 8px;
    }

    .form-control {
      background: var(--input-bg);
      border: 1px solid var(--border-color);
      color: #eaeaea;
      border-radius: 10px;
      padding: 10px 14px;
      transition: all 0.2s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: #7f5af0;
      box-shadow: 0 0 0 2px rgba(127,90,240,0.3);
    }

    .btn-custom {
      font-weight: 500;
      border-radius: 8px;
      padding: 10px 18px;
      transition: all 0.25s ease;
    }

    .btn-primary {
      background: var(--gradient-accent);
      border: none;
      color: #fff;
    }

    .btn-primary:hover {
      opacity: 0.9;
      transform: translateY(-1px);
      box-shadow: 0 0 15px rgba(127,90,240,0.4);
    }

    .btn-outline-secondary {
      border-color: rgba(255,255,255,0.2);
      color: #ccc;
    }

    .btn-outline-secondary:hover {
      background: rgba(255,255,255,0.1);
      color: #fff;
    }

    .alert {
      background: rgba(255,0,0,0.1);
      border: 1px solid rgba(255,0,0,0.2);
      color: #ff8b8b;
    }
  </style>
</head>
<body>

  <div class="card-form">
    <h2>Tambah Embed Instagram</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.statics.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Judul (opsional)</label>
        <input 
          type="text" 
          name="title" 
          id="title" 
          class="form-control" 
          value="{{ old('title') }}" 
          placeholder="Masukkan judul post...">
      </div>

      <div class="mb-4">
        <label for="embed_code" class="form-label">Kode Embed Instagram</label>
        <textarea 
          name="embed_code" 
          id="embed_code" 
          class="form-control" 
          rows="8" 
          placeholder="Tempelkan kode embed di sini...">{{ old('embed_code') }}</textarea>
      </div>

      <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.statics.index') }}" class="btn btn-outline-secondary btn-custom">Kembali</a>
        <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
