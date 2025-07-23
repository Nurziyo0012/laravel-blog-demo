<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->author = $request->author;
        $comment->body = $request->body;
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Izoh yuborildi!');
    }
public function destroy(Comment $comment)
{
    if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
        abort(403, 'Bu izohni o‘chirish huquqiga ega emassiz.');
    }

    $comment->delete();
    return back()->with('success', 'Izoh o‘chirildi!');
}

public function edit(Comment $comment)
{
     if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
        abort(403, 'Bu izohni tahrirlash huquqiga ega emassiz.');
    }

    return view('comments.edit', compact('comment'));
}

public function update(Request $request, Comment $comment)
{
     if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
        abort(403, 'Bu izohni yangilash huquqiga ega emassiz.');
    }

    $request->validate([
        'author' => 'required|string|max:255',
        'body' => 'required|string'
    ]);

    $comment->update([
        'author' => $request->author,
        'body' => $request->body,
    ]);

    return redirect()->route('posts.show', $comment->post_id)->with('success', 'Izoh yangilandi!');
}





}