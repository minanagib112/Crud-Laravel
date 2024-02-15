@extends('layout')
@section('content')
    <form class="col mx-auto mt-5 w-50 bg-light border rounded p-3 " action="{{ url('/posts' . $post->id) }} " method="POST">
        @csrf
        <div class="mb-3 col-6">
            <label class="form-label">Post Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control">
        </div>
        <div class="mb-3 col-6 ">
            <label class="form-label">User ID</label>
            <select class="form-select" name="user_id">
                <option selected disabled>Choose user</option>
                @foreach ($users as $user)
                    <option @if ($user->id == $post->user_id) selected @endif>{{ $user->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-6">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
        </div>
        <div class=" mb-3 col-8">
            <label class="form-label">Post Content</label>
            <textarea class="form-control" name="body"> {{ $post->body }}</textarea>
        </div>
        <div class="col-12 d-flex justify-content-center ">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
@endsection
