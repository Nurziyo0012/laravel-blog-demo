@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h2>{{ $post->title }}</h2>
    <p class="text-muted">Yaratilgan sana: {{ $post->created_at->format('d-m-Y') }}</p>

    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post rasmi" class="img-fluid mb-4" style="max-height:400px;">
    @endif

    <div class="mb-4">
        {!! nl2br(e($post->body)) !!}
    </div>

    <hr>

<p class="text-muted mb-2">
    ✍️ Muallif: {{ $post->user->name }}
</p>


<small class="text-secondary">
    🕒 {{ $post->created_at->format('d-m-Y H:i') }}
</small>
<h4>💬 Izohlar</h4>

@forelse($post->comments as $comment)
    <div class="border p-3 mb-2">
        <strong>{{ $comment->author }}</strong>
        <p class="mb-0">{{ $comment->body }}</p>
        <small class="text-muted">{{ $comment->created_at->format('d-m-Y H:i') }}</small>
    </div>
@empty
    <p>Izohlar hali mavjud emas.</p>
@endforelse

<hr>

<h5>✍️ Izoh qoldirish</h5>

<form action="{{ route('comments.store', $post->id) }}" method="POST">
    @csrf
    <div class="mb-2">
        <label for="author" class="form-label">Ismingiz:</label>
        <input type="text" name="author" class="form-control" required>
    </div>
    <div class="mb-2">
        <label for="body" class="form-label">Izoh:</label>
        <textarea name="body" class="form-control" rows="3" required></textarea>
    </div>
    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('Rostdan ham o‘chirmoqchimisiz?')">🗑️</button>
</form>
<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-warning">✏️</a>

    <button type="submit" class="btn btn-primary">Yuborish</button>
</form>

    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">✏️ Tahrirlash</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Rostdan ham o‘chirmoqchimisiz?')">🗑️ O‘chirish</button>
    </form>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary ms-2">⬅️ Bosh sahifaga</a>

    @foreach($post->comments as $comment)
    <div class="mb-2 p-3 border rounded bg-gray-50 dark:bg-gray-800">
        <p>{{ $comment->body }}</p>
        <small class="text-muted">Muallif: {{ $comment->user->name }}</small>

        @if(Auth::id() === $comment->user_id || Auth::user()->is_admin)
            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-warning">✏️ Tahrirlash</a>

            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('O‘chirilsinmi?')" class="btn btn-sm btn-danger">🗑️ O‘chirish</button>
            </form>
        @endif
    </div>
@endforeach

@endsection