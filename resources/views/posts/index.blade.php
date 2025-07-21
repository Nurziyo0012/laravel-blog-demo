@extends('layouts.app')

@section('title', 'Postlar')

@section('content')
    <h2>📚 Postlar Ro‘yxati</h2>

    @forelse($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $post->title }}</h5>
                <p>{{ \Illuminate\Support\Str::limit($post->body, 150) }}</p>
                <p class="text-muted mb-0">
    💬          {{ $post->user->name}}
</p>
    @if($post->comments->count() > 0)
        {{ $post->comments->count() }} izoh
    @else
        Izoh yo‘q
    @endif
</p>
                
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Ko‘rish</a>
            </div>
        </div>


        <p class="text-muted">
    💬 
    @if($post->comments->count() > 0)
        {{ $post->comments->count() }} izoh
    @else
        Izoh yo‘q
    @endif
</p>
    @empty
        <p>Postlar hali mavjud emas.</p>
    @endforelse
@endsection