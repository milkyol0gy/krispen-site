<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Static Instagram CRUD</title>
</head>
<body style="font-family: sans-serif; background:#fafafa;">

    <h2 style="text-align:center; padding:20px;">Admin - Instagram Embed Manager</h2>

    @if (session('success'))
        <div style="color: green; text-align:center;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div style="color: red; text-align:center;">{{ session('error') }}</div>
    @endif

    <div style="text-align:center; margin-bottom:20px;">
        @if ($count < 3)
            <a href="{{ route('statics.create') }}" style="padding:10px 20px; background:#4CAF50; color:white; text-decoration:none; border-radius:6px;">+ Tambah Post</a>
        @else
            <button disabled style="padding:10px 20px; background:#aaa; color:white; border:none; border-radius:6px;">Maksimal 3 Post</button>
        @endif
    </div>

    <table border="1" cellpadding="10" cellspacing="0" style="margin:auto; background:white; border-collapse:collapse;">
        <thead style="background:#f0f0f0;">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Embed</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($statics as $index => $static)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $static->title }}</td>
                    <td style="max-width:400px; overflow:auto;">{!! $static->embed_code !!}</td>
                    <td>
                        <a href="{{ route('statics.edit', $static->id) }}" style="color:blue;">Edit</a> |
                        <form action="{{ route('statics.destroy', $static->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus post ini?')" style="color:red; border:none; background:none; cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">Belum ada post.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script async src="//www.instagram.com/embed.js"></script>
    <script>
        window.addEventListener('load', function() {
            if (window.instgrm) window.instgrm.Embeds.process();
        });
    </script>

</body>
</html>
