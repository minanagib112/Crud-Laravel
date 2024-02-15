@extends('layout')
@section('content')
    <div class="card w-50 mx-auto mt-5">
        <h5 class="card-header bg-dark text-white">{{ $post->id }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ ucfirst($post->name) }}</h5>
            <p class="card-text">{{ $post->email }}</p>
            <p>Written by:</p>
            <ul>
                <a href="{{ url('users/' . $user->id) }}"
                    class="list-group-item list-group-item-action bg-light border border-dark rounded p-2 ">{{ $user->name }}</a>
            </ul>
            <a href="{{ url('posts') }}" class="btn btn-secondary">Go back</a>
        </div>
    </div>
@endsection
