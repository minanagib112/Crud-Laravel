@extends('layout')
@section('content')
    <table class="table table-striped table-hover table-bordered text-center ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="align-middle">
                    <td>{{ $post->id }}</td>
                    <td><a href="{{ url('posts/' . $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->user->id }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->user->email }}</td>
                    <td class="d-flex justify-content-center gap-5">
                        <a class="btn btn-success" href="{{ url('posts/' . $post->id . '/edit') }}">Edit</a>
                        <form action="{{ url('posts/' . $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center"> {{ $posts->links() }}</div>
@endsection
