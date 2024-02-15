<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->paginate(5);
        return view('users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        User::create(
            ['name' => $request->name, 'email' => $request->email]
        );
        return redirect(url('/users'));
    }
    public function show(User $user)
    {
        $posts = Post::select('title')->where('user_id', $user->id)->get();
        return view('users.show', ['user' => $user, 'posts' => $posts]);
    }
    public function edit($userId)
    {
        $user = User::findorfail($userId);
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::findorfail($userId);
        $user->update(
            ['name' => $request->name, 'email' => $request->email]
        );
        return redirect(url('/users/'));
    }
    public function delete($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return redirect(url('/users/'))->with('success', 'User deleted successfully');
    }
}
