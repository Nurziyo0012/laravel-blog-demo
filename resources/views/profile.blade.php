@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')
  <div class="p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold text-gray-800">Profile</h2>
    <p class="mt-2 text-gray-600">{{ Auth::user()->name }}</p>
    <p class="text-gray-600">{{ Auth::user()->email }}</p>
  </div>
@endsection
<header class="bg-white shadow p-4 flex justify-between items-center">
  <h1 class="text-2xl font-bold text-gray-800">My Blog</h1>
  <nav class="space-x-4">
    <a href="/dashboard" class="text-gray-600 hover:text-blue-600">Dashboard</a>
    <form action="{{ route('logout') }}" method="POST" class="inline">
      @csrf
      <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
    </form>
  </nav>
</header>

<main class="py-12 px-6 max-w-4xl mx-auto">
  <div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div class="flex justify-end">
        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
          Update Profile
        </button>
      </div>
    </form>
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