<!DOCTYPE html>
<html>
<head>
    <title>Yangi Post Qo‘shish</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1>✍️ Yangi Post Qo‘shish</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Rasm yuklash:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Sarlavha:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Mazmun:</label>
            <textarea name="body" class="form-control" rows="6" required>{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Bekor qilish</a>
    </form>

</body>
</html>