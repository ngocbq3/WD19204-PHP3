@extends('admin.layout')

@section('title', 'create post')

@section('content')
    <div class="w-60">
        @session('message')
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endsession
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ old('title') ?? $post->title }}" class="form-control">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Category Name</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @selected($cate->id === $post->category_id)>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Image</label> <br>
                <img src="{{ Storage::url($post->image) }}" width="90" alt="">
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">View</label>
                <input type="number" name="view" value="{{ old('view') ?? $post->view }}" class="form-control">
                @error('view')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" rows="5" class="form-control">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Content</label>
                <textarea name="content" rows="8" class="form-control">{{ old('description') ?? $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
