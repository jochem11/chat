<?php

use App\Http\Controllers\chat\ChatController;
use App\Http\Controllers\friends\friendsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('friends', [friendsController::class, 'index'])->middleware(['auth', 'verified'])->name('friends');
Route::post('friends', [friendsController::class, 'store'])->middleware(['auth', 'verified'])->name('friends.store');
Route::delete('/friends', [FriendsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('friends.destroy');
//add chat route /chat/{id}
Route::get('/chat/{id}', [ChatController::class, 'index'])->middleware(['auth', 'verified'])->name('chat');
//add chat route /chat/{id}/send
Route::post('/chat/{id}/send', [ChatController::class, 'store'])->middleware(['auth', 'verified'])->name('chat.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
