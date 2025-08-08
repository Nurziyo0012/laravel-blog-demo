@extends('layouts.app')

@section('content')
<style>
    .confirm-container {
        max-width: 600px;
        margin: 60px auto;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 12px;
        padding: 30px;
        font-family: 'Segoe UI', sans-serif;
        text-align: center;
    }

    .confirm-title {
        font-size: 26px;
        font-weight: 600;
        color: #c0392b;
        margin-bottom: 20px;
    }

    .confirm-text {
        font-size: 18px;
        color: #555;
        margin-bottom: 30px;
    }

    .confirm-actions {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .btn-custom {
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.3s ease;
        border: none;
        cursor: pointer;
    }
.btn-delete {
    background: #dc3545;
    color: white;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn-delete:hover {
    opacity: 0.9;
}

    .btn-cancel {
        background: #6c757d;
        color: white;
    }

    .btn-custom:hover {
        opacity: 0.9;
    }
</style>

<div class="confirm-container">
    <h2 class="confirm-title">⚠️ Do you want to delete the post?</h2>
    <p class="confirm-text">This action cannot be. Do you really want <strong>{{ $post->title }}</strong> to delete the post?</p>

    <div class="confirm-actions">
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-custom btn-delete">🗑️ Yes, delete!</button>
        </form>

        <a href="{{ route('posts.show', $post->id) }}" class="btn-custom btn-cancel">❌ No, cancel</a>
    </div>
</div>
@endsection