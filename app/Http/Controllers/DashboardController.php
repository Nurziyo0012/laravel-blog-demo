<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class DashboardController extends Controller
{
 
public function index()
{
    return view('dashboard', [
        'posts' => Post::count(),
        'comments' => Comment::count(),
        'users' => User::count(),
    ]);
}

public function myPosts()
{
   $userId = auth()->id;
   $posts = Post::where('user_id', $userId)->get();
   return view ('dashboard.my-posts', compact('posts'));
}
}
