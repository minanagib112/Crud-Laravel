@extends('layout')
@section('content')
    <div class="card w-50 mx-auto mt-5">
        <h5 class="card-header bg-dark text-white">{{ $user->id }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ ucfirst($user->name) }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <a href="{{ url('users') }}" class="btn btn-secondary">Go back</a>
        </div>
    </div>
@endsection
