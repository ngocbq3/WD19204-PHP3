<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [PostController::class, 'show'])->name('detail');
Route::get('/category/{id}', [PostController::class, 'list'])->name('list-post');

//Update
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('update');
//Delete
Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('destroy');


//Test Eloquent
Route::get('/test', [AdminPostController::class, 'test']);
//CRUD
Route::prefix('admin/posts')->group(function () {
    Route::get('/', [AdminPostController::class, 'index'])->name('posts.index');
    Route::get('/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('create', [AdminPostController::class, 'store'])->name('posts.store');
    Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::put('edit/{id}', [AdminPostController::class, 'update'])->name('posts.update');
});

Route::get('/about', function () {
    return view('about');
});

//xây dựng đường dẫn có tham số
Route::get('/users/{id}', function ($id) {
    return "<h1>User ID $id</h1>";
});
//Nhiều tham số
Route::get('/users/{id}/comment/{comment_id}', function ($id, $comment_id) {
    return "<h1>User ID: $id; Comment ID: $comment_id</h1>";
});
//Group
Route::prefix('products')->group(function () {
    Route::get('{id}/show', function ($id) {

        return "Sản phẩm $id";
    });
    Route::get('/create', function () {
        return "Tạo mới";
    })->name('create');

    //Tham số null
    Route::get('list/{id?}', function ($id = null) {
        return "Danh sách: $id";
    });
});
