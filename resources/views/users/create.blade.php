@extends('layout')
@section('content')
    <form class="row mx-auto mt-5 w-50 bg-light border rounded p-3" action="{{ url('/users') }} " method="POST">
        @csrf
        <div class="mb-3 col-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3 col-6">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark col-4 mt-2 mx-auto">Submit</button>
    </form>
@endsection
