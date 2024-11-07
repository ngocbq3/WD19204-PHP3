@extends('layout')

@section('title', 'Trang chủ')

@section('content')
    <div>
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('detail', $post->id) }}">
                    <h3>{{ $post->title }}</h3>
                </a>
                <p>{{ $post->description }}</p>
                <hr>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
@endsection
