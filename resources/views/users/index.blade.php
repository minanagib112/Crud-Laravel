@extends('layout')
@section('content')
    <table class="table table-striped table-hover table-bordered text-center ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="align-middle">
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ url('users/' . $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td class="d-flex justify-content-center gap-5">
                        <a class="btn btn-success" href="{{ url('users/' . $user->id . '/edit') }}">Edit</a>
                        <form action="{{ url('users/' . $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center"> {{ $users->links() }}</div>
@endsection
