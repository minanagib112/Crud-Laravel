@extends('layout')
@section('content')
    <div class="card w-50 mx-auto mt-5">
        <h5 class="card-header bg-dark text-white">Post ID = {{ $post->id }}</h5>
        <div class="card-body">
            <h5 class="card-title">Post title: {{ ucfirst($post->title) }}</h5>
            <table class="table table-striped table-hover table-bordered text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">Slug</th>
                        <th scope="col">Body</th>
                        <th>Published at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->published_at }}</td>
                    </tr>
                </tbody>
            </table>
            <p>Written by</p>
            <div class="list-group mb-3 ">
                <a href="{{ url('users/' . $user->id) }}"
                    class="author-post list-group-item list-group-item-action border border-dark rounded p-2 text-center w-50 mx-auto ">{{ ucfirst($user->name) }}</a>
            </div>
            <a href="{{ url('posts') }}" class="btn btn-secondary">Posts List</a>
        </div>
    </div>
@endsection
