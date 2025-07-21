@extends('layouts.app')

@section('title', 'Postni Tahrirlash')

@section('content')

<h2>✏️ Postni Tahrirlash</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($post->image)
    <p><strong>Mavjud rasm:</strong></p>
    <img src="{{ asset('storage/' . $post->image) }}" alt="Post rasmi" class="img-fluid mb-4" style="max-height:300px;">
@endif

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $post->title }}" required>
    <textarea name="content">{{ $post->content }}</textarea>

    <button type="submit" class="btn btn-primary">Saqlash</button>
</form>

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Sarlavha:</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Mazmun:</label>
        <textarea name="body" class="form-control" rows="6" required>{{ old('body', $post->body) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Yangi rasm (ixtiyoriy):</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Yangilash</button>
    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Bekor qilish</a>
</form>

@endsection