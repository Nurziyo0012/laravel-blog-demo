@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
  <h2 class="text-2xl font-bold mb-4">Write a new post ✍️</h2>

  @if ($errors->any())
    <div class="bg-red-100 p-4 mb-4 text-red-700 rounded">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div class="mb-4">
      <label for="title" class="block text-sm font-semibold">Title</label>
      <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title') }}">
    </div>

    <div class="mb-4">
      <label for="body" class="block text-sm font-semibold">Content</label>
      <textarea name="body" rows="5" class="w-full border rounded p-2">{{ old('body') }}</textarea>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
      Send Post 🚀
    </button>
  </form>
</div>
@endsection