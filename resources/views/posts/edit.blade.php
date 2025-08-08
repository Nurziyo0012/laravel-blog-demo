@extends('layouts.app')

@section('content')
<style>
    .edit-container {
        max-width: 700px;
        margin: 50px auto;
        background: #fefefe;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 12px;
        padding: 30px;
        font-family: 'Segoe UI', sans-serif;
    }

    .edit-title {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin-bottom: 25px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: 500;
        color: #444;
        display: block;
        margin-bottom: 8px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        background: #f9f9f9;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
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

    .btn-save {
        background: #28a745;
        color: white;
    }

    .btn-cancel {
        background: #6c757d;
        color: white;
    }

    .btn-custom:hover {
        opacity: 0.9;
    }
</style>

<div class="edit-container">
    <h2 class="edit-title">✏️ Edit Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="6" required>{{ old('body', $post->body) }}</textarea>
        </div>


        <div class="form-actions">
            <button type="submit" class="btn-custom btn-save">💾 Save Changes</button>
            <a href="{{ route('posts.show', $post->id) }}" class="btn-custom btn-cancel">❌ Cancel</a>
        </div>
    </form>
</div>
@endsection