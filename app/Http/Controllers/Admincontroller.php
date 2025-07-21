<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::latest()->get();
        $comments = Comment::latest()->get();
        return view('admin.dashboard', compact('posts', 'comments'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}