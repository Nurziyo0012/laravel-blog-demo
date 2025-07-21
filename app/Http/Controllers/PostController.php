<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    // Barcha postlarni ko‘rsatish
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Post yaratish forma
    public function create()
    {
        return view('posts.create');
    }

    // Postni saqlash
 public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $post = new Post;
    $post->title = $request->title;
    $post->content = $request->content;
    $post->user_id = Auth::id(); // 🔐 Muallifni biriktirdik

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $post->image = $name;
    }

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}
    // Yagona postni ko‘rish
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Tahrirlash forma
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (!Auth::user()->is_admin && Auth::id() !== $post->user_id) {
        abort(403, 'Siz bu postni tahrirlash huquqiga ega emassiz.');
    }

    return view('posts.edit', compact('post'));
    }

    // Yangilash
  public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    $post = Post::findOrFail($id);
    $data = $request->only(['title', 'body']);

    // Agar yangi rasm yuklangan bo‘lsa
    if ($request->hasFile('image')) {
        // Eski rasmni o‘chirish (agar mavjud bo‘lsa)
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        // Yangi rasmni saqlash
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }

    // Postni yangilash
    $post->update($data);

    return redirect()->route('posts.show', $post->id)->with('success', 'Post muvaffaqiyatli yangilandi!');
}
     
    // O‘chirish
    public function destroy($id)
    {
         $post = Post::findOrFail($id);

    if (!Auth::user()->is_admin && Auth::id() !== $post->user_id) {
        abort(403, 'Siz bu postni o‘chirish huquqiga ega emassiz.');
    }

    $post->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Post o‘chirildi!');
    }
    
}