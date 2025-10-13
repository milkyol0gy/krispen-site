@extends('base.base-admin')

@section('content')
<div class="container mt-4">
    <h2>📢 Daftar Pengumuman</h2>

    <form method="GET" class="mb-3">
        <input type="text" name="search" class="form-control w-50 d-inline" placeholder="Cari judul..." value="{{ $search }}">
        <button class="btn btn-primary">Cari</button>
        <a href="{{ route('admin.announces.create') }}" class="btn btn-success float-end">+ Tambah</a>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tanggal Upload</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->headline }}</td>
                <td>{{ \Carbon\Carbon::parse($a->upload_date)->format('d M Y') }}</td>
                <td>{{ $a->user?->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.announces.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.announces.destroy', $a->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $announcements->links() }}
</div>
@endsection
