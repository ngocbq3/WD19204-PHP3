@extends('layout')

@section('title', $post->title)

@section('content')
    <div>
        <form action="{{ route('update', $post->id) }}" method="post">
            @csrf
            <div class="b-3">
                <label for="">Tiêu đề</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>


        </form>
    </div>
@endsection
