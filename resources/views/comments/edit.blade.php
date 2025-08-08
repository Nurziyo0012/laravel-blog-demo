@extends('layouts.app')

@section('title', 'Izohni tahrirlash')

@section('content')

<h3>✏️ Edit Comment</h3>

<form action="{{ route('comments.update', $comment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-2">
        <label for="author">Name:</label>
        <input type="text" name="author" value="{{ old('author', $comment->author) }}" class="form-control" required>
    </div>

    <div class="mb-2">
        <label for="body">Comment:</label>
        <textarea name="body" rows="4" class="form-control" required>{{ old('body', $comment->body) }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-secondary">Cancel</a>
</form>

@extends('layouts.app')

@section('content')
  <h3>Edit Content</h3>
  <p><strong>Muallif:</strong> {{ optional($comment->user)->name ?? 'Unknown' }}</p>

  <form action="{{ route('comments.update', $comment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <textarea name="body" class="form-control" required>{{ $comment->body }}</textarea>
    <button type="submit" class="btn btn-primary mt-2">Save</button>
  </form>
@endsection

@endsection