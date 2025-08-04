@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">My Posts</h1>

    @if($posts->count() > 0)
        <div class="list-group">
            @foreach($posts as $post)
                <div class="list-group-item mb-3">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->content }}</p>
                    <small class="text-muted">Yaratilgan sana: {{ $post->created_at->format('d.m.Y') }}</small>
                </div>
            @endforeach
        </div>
    @else
        <p>Sizda hali hech qanday post yo‘q.</p>
    @endif
</div>
@endsection