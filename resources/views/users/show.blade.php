@extends('layout')
@section('content')
    <div class="card w-50 mx-auto mt-5">
        <h5 class="card-header bg-dark text-white">User ID = {{ $user->id }}</h5>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ ucfirst($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
            @if ($posts->count() > 0)
                <p>Posts:</p>
                <ul>
                    @foreach ($posts as $post)
                        <a href="{{ url('posts/' . $post->id) }}"
                            class="author-post list-group-item list-group-item-action border border-dark rounded p-2 text-center w-50 mx-auto my-2">{{ ucfirst($post->title) }}</a>
                    @endforeach
                </ul>
            @else
                <p>No posts found for this user.</p>
            @endif

            <a href="{{ url('users') }}" class="btn btn-secondary">Users List</a>
        </div>
    </div>
@endsection
