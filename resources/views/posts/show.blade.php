@extends('layouts.app')

@section('content')
<style>
    .post-container {
        max-width: 800px;
        margin: 40px auto;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 12px;
        padding: 30px;
        font-family: 'Segoe UI', sans-serif;
    }

    .post-title {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }

    .post-body {
        font-size: 18px;
        line-height: 1.6;
        color: #555;
    }

    .post-image {
        max-width: 100%;
        border-radius: 8px;
        margin-top: 20px;
    }

    .post-actions {
        margin-top: 30px;
        display: flex;
        gap: 10px;
    }

    .btn-custom {
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .btn-back {
        background: #6c757d;
        color: white;
    }

    .btn-edit {
        background: #007bff;
        color: white;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
        border: none;
    }

    .btn-custom:hover {
        opacity: 0.85;
    }
</style>

<div class="post-container">
    <h1 class="post-title">{{ $post->title }}</h1>
    <div class="post-body">{{ $post->body }}</div>

    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="post-image">
    @endif

    <div class="post-actions">
        <a href="{{ route('home') }}" class="btn-custom btn-back">⬅ Back to Posts</a>

        @auth
            <a href="{{ route('posts.edit', $post->id) }}" class="btn-custom btn-edit">✏️ Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
               
                <a href="{{route('posts.confirmDelete', $post->id)}}" class="btn-custtom btn-delete">🗑️ Delete Post</a>
            </form>
        @endauth
    </div>
</div>
@endsection