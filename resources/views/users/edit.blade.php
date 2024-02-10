@extends('layout')
@section('content')
    <form class="row mx-auto mt-5 w-50 bg-light border rounded p-3" action="{{ url('/users' . $user->id) }} " method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 col-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>
        <div class="mb-3 col-6">
            <label class="form-label">Email address</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark col-4 mt-2 mx-auto">Edit</button>
    </form>
@endsection
