<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Embed Instagram</title>
</head>
<body style="font-family: sans-serif; background:#f7f7f7;">
    <h2 style="text-align:center; padding:20px;">Tambah Embed Instagram</h2>

    <form action="{{ route('statics.store') }}" method="POST" style="max-width:600px; margin:auto; background:white; padding:20px; border-radius:8px;">
        @csrf

        <label>Judul (opsional):</label><br>
        <input type="text" name="title" style="width:100%; padding:10px;" value="{{ old('title') }}"><br><br>

        <label>Kode Embed Instagram:</label><br>
        <textarea name="embed_code" rows="10" style="width:100%; padding:10px;" placeholder="Tempelkan kode embed di sini...">{{ old('embed_code') }}</textarea><br><br>

        <button type="submit" style="padding:10px 20px; background:#4CAF50; color:white; border:none; border-radius:6px;">Simpan</button>
        <a href="{{ route('statics.index') }}" style="margin-left:10px;">Kembali</a>
    </form>
</body>
</html>
