<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});


/* In build Breeze routing */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::post('dashboard', [PostController::class, 'store'])->name('PostController.store');


/* In build Breeze routing */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




/* Custom routing */
Route::middleware(['auth'])->group(function () {
    // to post feed
    Route::get('/postfeed', [PostController::class, 'show'])->name('postfeed');
    
    // to individual post, by post ID
    Route::get('/indpost/{id}', [PostController::class, 'showindpost'])->name('PostController.showindpost')->name('indpost');
    

    // post to PostController.storecomment with comment form data
    Route::post('/indpost', [PostController::class, 'storecomment'])->name('PostController.storecomment');


});




require __DIR__.'/auth.php';
