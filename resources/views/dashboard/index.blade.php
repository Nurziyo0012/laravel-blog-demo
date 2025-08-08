@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Hi, {{ auth()->user()->name }} 👋</h1>
    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add new Post</a>

    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Your Posts:</h2>
        <ul>
            @forelse ($posts as $post)
                <li class="mb-2 border-b pb-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">{{ $post->title }}</a>
                    <small class="text-gray-500">— {{ $post->created_at->diffForHumans() }}</small>
                </li>
            @empty
                <p>You do not have post yet.</p>
            @endforelse
        </ul>
    </div>
</div>
@endsection