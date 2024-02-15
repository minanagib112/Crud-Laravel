<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

use function Laravel\Prompts\select;

class PostController extends Controller
{
    public function index()
    {
        $user = User::select('id', 'name', 'email')->get();
        $posts = Post::paginate(5);
        return view('posts.index', ['posts' => $posts, 'user' => $user]);
    }
    public function create()
    {
        $user = User::select('id')->get();
        return view('posts.create', ['users' => $user]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'user_id' => 'required | exists:users,id'

        ]);
        Post::create(
            ['title' => $request->title, 'slug' => $request->slug, 'body' => $request->body, 'user_id' => $request->user_id]
        );
        return redirect(url('/posts'));
    }
    public function show(Post $post)
    {
        $user = User::select('id', 'name')->where('id', $post->user_id)->first();
        return view('posts.show', ['post' => $post], ['user' => $user]);
    }
    public function edit($postId)
    {
        $user = User::select('id')->get();
        $post = Post::findorfail($postId);
        return view('posts.edit', ['post' => $post], ['users' => $user]);
    }
    public function update(Request $request, $postId)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'user_id' => 'required | exists:users,id'
        ]);
        $post = Post::findorfail($postId);
        $post->update(
            ['title' => $request->title, 'slug' => $request->slug, 'body' => $request->body, 'user_id' => $request->user_id]
        );
        return redirect(url('/posts/'));
    }
    public function delete($postId)
    {
        $post = Post::findorfail($postId);
        $post->delete();
        return redirect(url('/posts/'))->with('success', 'Post deleted successfully');
    }
}
