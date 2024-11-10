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
                <form action="{{ route('destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')">Delete</button>
                </form>
                <a href="{{ route('edit', $post->id) }}">Edit</a>
                <hr>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
@endsection
