@extends('base.base-admin')

@section('content')
<div class="container mt-4">
    <h2>📢 Announcement List</h2>

    <form method="GET" class="mb-3">
        <input type="text" name="search" class="form-control w-50 d-inline" placeholder="Search headline..." value="{{ request('search') }}">
        <button class="btn btn-primary">Search</button>
        <a href="{{ route('admin.announcement.create') }}" class="btn btn-success float-end">+ Add New</a>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Headline</th>
                <th>Upload Date</th>
                <th>Admin</th>
                <th>Actions</th>
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
                    <a href="{{ route('admin.announcement.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.announcement.destroy', $a->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this announcement?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $announcements->links() }}
</div>
@endsection