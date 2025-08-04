<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<header class="bg-white shadow p-4 flex justify-between items-center">
  <h1 class="text-2xl font-bold text-gray-800">My Blog</h1>
  <nav class="space-x-4">
    <a href="/profile" class="text-gray-600 hover:text-blue-600">Profile</a>
    <form action="{{ route('logout') }}" method="POST" class="inline">
      @csrf
      <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
    </form>
  </nav>
</header>

<main class="py-12 px-6 max-w-5xl mx-auto">
  <div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h2>
    <p class="text-gray-600 text-lg">Welcome back, {{ Auth::user()->name }}!</p>
  </div>
</main>

<footer class="bg-gray-800 text-white py-8 text-center mt-16">
  <p>&copy; {{ date('Y') }} My Blog. All rights reserved.</p>
  <div class="mt-2 space-x-4">
    <a href="#" class="text-gray-300 hover:text-white">About</a>
    <a href="#" class="text-gray-300 hover:text-white">Contact</a>
    <a href="https://github.com/Nurziyo0012/laravel-blog-demo" class="text-gray-300 hover:text-white">GitHub</a>
  </div>
</footer>
@endsection