@extends('layouts.app')

@section('title', 'Postlar')

@section('content')
<div class="max-w-7xl mx-auto p-6">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold">Posts</h2>
    @auth
    <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ New Post</a>
    @endauth
  </div>

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
    <div class="bg-white rounded shadow p-4 hover:shadow-lg transition">
      <h3 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h3>
      <p class="text-gray-600 mt-2">{{ Str::limit($post->body, 100) }}</p>

      @if ($post->image)
      <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="mt-4 rounded">
      @endif

      <a href="{{ route('posts.show', $post->id) }}" class="mt-4 inline-block text-blue-500">Read more →</a>
    </div>
    @endforeach
  </div>

  <div class="mt-8">
    {{ $posts->links() }}
  </div>
</div>
@endsection