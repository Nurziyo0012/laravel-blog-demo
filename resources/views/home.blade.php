<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<header class="bg-white shadow p-4 flex justify-between items-center">
  <h1 class="text-2xl font-bold text-gray-800">My Blog</h1>
  <nav class="space-x-4">
    <a href="/dashboard" class="text-gray-600 hover:text-blue-600">Dashboard</a>
    <a href="/profile" class="text-gray-600 hover:text-blue-600">Profile</a>
    <form action="{{ route('logout') }}" method="POST" class="inline">
      @csrf
      <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
    </form>
  </nav>
</header>

<section class="bg-blue-50 text-center py-12">
  <h2 class="text-4xl font-semibold text-blue-700">Welcome to My Blog</h2>
  <p class="mt-4 text-gray-600">Explore posts, share your thoughts, and connect with others!</p>
  <a href="{{ route('posts.create') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
    + Write a Post
  </a>
</section>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
  @foreach($posts as $post)
    <div class="bg-white rounded-lg shadow hover:shadow-lg p-4">
      <h3 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h3>
      <p class="mt-2 text-gray-600">{{ Str::limit($post->content, 80) }}</p>
      <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 mt-4 inline-block">Read more →</a>
    </div>
  @endforeach
</div>

<footer class="bg-gray-800 text-white py-8 text-center">
  <p>&copy; {{ date('Y') }} My Blog. All rights reserved.</p>
  <div class="mt-2 space-x-4">
    <a href="#" class="text-gray-300 hover:text-white">About</a>
    <a href="#" class="text-gray-300 hover:text-white">Contact</a>
    <a href="https://github.com/Nurziyo0012/laravel-blog-demo" class="text-gray-300 hover:text-white">GitHub</a>
  </div>
</footer>
@endsection