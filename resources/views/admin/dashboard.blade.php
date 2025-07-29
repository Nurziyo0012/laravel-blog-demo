<ul>
@foreach($posts as $post)
    <li>
        <strong>{{ $post->title }}</strong> — ✍️ {{ $post->user->name }}
         <p>Postlar soni: {{ $postCount }}</p>
<p>Foydalanuvchilar soni: {{ $userCount }}</p>
<p>Izohlar soni: {{ $commentCount }}</p>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">✏️ Tahrirlash</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">🗑️ O‘chirish</button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
    </li>
@endforeach
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>👋 Admin Dashboard ishlayapti!</h1>
</div>
@endsection
</ul>