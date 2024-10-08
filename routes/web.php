<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StaticController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/blog', [PostsController::class, 'index'])->name('blog_index');
Route::get('/blog/{id}', [PostsController::class, 'show'])->name('blog_show');
Route::get('/blog/Category/{cat}', [StaticController::class, 'category_page'])->name('category');

Route::middleware('auth')->group(function () {
    Route::get('/blog/create/new', [PostsController::class, 'create'])->name('blog_create');
    Route::post('/blog/store', [PostsController::class, 'store'])->name('blog_add');
    Route::get('/blog/{id}/edit', [PostsController::class, 'edit'])->name('blog_edit');
    Route::put('/blog/update/{id}', [PostsController::class, 'update'])->name('blog_update');
    Route::delete('/blog/{id}', [PostsController::class, 'destroy'])->name('blog_delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
