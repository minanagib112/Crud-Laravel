@extends('layout')
@section('content')
    <div class="card w-50 mx-auto mt-5">
        <h5 class="card-header bg-dark text-white">{{ $user->id }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ ucfirst($user->name) }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            @if ($posts->count() > 0)
                <p>Posts:</p>
                <ul>
                    @foreach ($posts as $post)
                        <a href="{{ url('posts/' . $post->id) }}"
                            class="list-group-item list-group-item-action bg-light border border-dark rounded p-2 text-center hover">{{ $post->title }}</a>
                    @endforeach
                </ul>
            @else
                <p>No posts found for this user.</p>
            @endif

            <a href="{{ url('users') }}" class="btn btn-secondary">Go back</a>
        </div>
    </div>
@endsection
