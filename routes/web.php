<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('frontend/master');
// });

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/post/view/{id}', [FrontendController::class, 'post_view'])->name('postView');
Route::get('/category/view/{id}', [FrontendController::class, 'category_view'])->name('categoryView');
Route::post('/search', [FrontendController::class, 'search'])->name('search');
Route::post('/location', [FrontendController::class, 'location_post'])->name('locationPost');


// Route::get('/category/manage', [CategoryController::class, 'index'])->name('manageCategory');
Route::get('/category/add', [CategoryController::class, 'create'])->name('addCategory');
Route::post('/category/store', [CategoryController::class, 'store'])->name('storeCategory');
// Route::get('/category/active/{id}', [CategoryController::class, 'active'])->name('activeCategory');
// Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
// Route::post('/category/update', [CategoryController::class, 'update'])->name('updateCategory');
// Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');


// Route::get('/post/manage', [PostController::class, 'index'])->name('managePost');
Route::get('/post/add', [PostController::class, 'create'])->name('addPost');
Route::post('/post/store', [PostController::class, 'store'])->name('storePost');
// Route::get('/post/active/{id}', [PostController::class, 'active'])->name('activePost');
// Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('editPost');
// Route::post('/post/update', [PostController::class, 'update'])->name('updatePost');
// Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('deletePost');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
