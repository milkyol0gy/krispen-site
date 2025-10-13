@extends('base.base-admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pengumuman</h2>
    <form action="{{ route('admin.announces.store') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menambah pengumuman ini?')">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="headline" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Upload</label>
            <input type="date" name="upload_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Isi Pengumuman</label>
            <textarea name="details" class="form-control" rows="4" required></textarea>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.announcement.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
