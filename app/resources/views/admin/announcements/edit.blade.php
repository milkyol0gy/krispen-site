@extends('base.base-admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Pengumuman</h2>
    <form action="{{ route('admin.announces.update', $announce->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengubah pengumuman ini?')">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="headline" value="{{ $announce->headline }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Upload</label>
            <input type="date" name="upload_date" value="{{ $announce->upload_date }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Isi Pengumuman</label>
            <textarea name="details" class="form-control" rows="4" required>{{ $announce->details }}</textarea>
        </div>
        <button class="btn btn-warning">Update</button>
        <a href="{{ route('admin.announces.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
