@extends('layouts.app')

@section('title', 'Izohni tahrirlash')

@section('content')

<h3>✏️ Izohni Tahrirlash</h3>

<form action="{{ route('comments.update', $comment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-2">
        <label for="author">Ismingiz:</label>
        <input type="text" name="author" value="{{ old('author', $comment->author) }}" class="form-control" required>
    </div>

    <div class="mb-2">
        <label for="body">Izoh:</label>
        <textarea name="body" rows="4" class="form-control" required>{{ old('body', $comment->body) }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Saqlash</button>
    <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-secondary">Bekor qilish</a>
</form>

@extends('layouts.app')

@section('content')
<h3>✏️ Izohni tahrirlash</h3>

<form action="{{ route('comments.update', $comment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <textarea name="body" class="form-control" required>{{ $comment->body }}</textarea>
    <button type="submit" class="btn btn-primary mt-2">Saqlash</button>
</form>
@endsection

@endsection