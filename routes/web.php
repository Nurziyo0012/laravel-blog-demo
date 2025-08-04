<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Models\Post;

// routes/web.php
Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile');

Route::get('/home', function () {
    $posts = Post::latest()->take(6)->get(); // Oxirgi 6 ta postni olamiz
    return view('home', ['posts' => []]);
})->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('status', 'Tizimdan muvaffaqiyatli chiqdingiz!');
})->name('logout');

Route::get('/dashboard/my-posts', [DashboardController::class, 'myPosts'])->name('dashboard.my-posts');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});



Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');

// Kirish talab qilinmaydigan route’lar
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// 🔐 Ro‘yxatdan o‘tganlar uchun cheklangan route’lar
Route::middleware(['auth'])->group(function () {
Route::resource('posts', PostController::class)->except(['index', 'show']);


    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

});