<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [BookController::class, 'index'])->name('home');

Route::get('/create-book', [BookController::class, 'createBook']);

Route::post('/store-book', [BookController::class, 'storeBook']);

//View Update
Route::get('/update-book/{id}', [BookController::class, 'updateBookView']);

//update data from view
Route::patch('/update/{id}', [BookController::class, 'updateBook']);

//delete data
Route::delete('/delete-book/{id}', [BookController::class, 'deleteBook']);


// category view
Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');


// store category
Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('storeCategory');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
