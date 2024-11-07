@extends('layout')

@section('title', $post->title)

@section('content')
    <div>
        <h3>{{ $post->title }}</h3>
        <div>View: {{ $post->view }}</div>
        <div><img src="{{ $post->image }}" alt="{{ $post->title }}" width="400"></div>
        <div>
            {{ $post->content }}
        </div>
    </div>
@endsection
