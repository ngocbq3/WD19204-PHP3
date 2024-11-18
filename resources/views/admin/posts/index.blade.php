@extends('admin.layout')

@section('title', 'Danh sách sản phẩm')

@section('content')
    @session('message')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endsession
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">View</th>
                    <th scope="col">Category</th>
                    <th scope="col">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img src="{{ Storage::url($post->image) }}" width="60" alt="">
                        </td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->view }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            Edit | Delete
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
