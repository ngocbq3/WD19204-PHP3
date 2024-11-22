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
                        <a href="{{ route('posts.trash') }}" class="btn btn-primary">Trash</a>
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
                            <div>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn xóa không?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
