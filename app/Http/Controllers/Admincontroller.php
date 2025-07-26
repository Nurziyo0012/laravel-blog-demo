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
        $postCount = \App\Models\Post::count();
        $userCount = \App\Models\User::count();
        $commentCount = \App\Models\Comment::count();


        
 
        return view('admin.dashboard', compact('posts', 'comments', 'postCount', 'userCount', 'commentCount'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}