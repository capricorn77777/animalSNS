<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::get('/posts/{id}', [PostController::class, 'showPost'])->name('posts.show');

Route::get('/timeline', [PostController::class, 'showTimeline']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/register', [RegistrationController::class, 'register']);



// ログイン画面の表示
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');



// ログイン画面の表示
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// ログイン処理
Route::post('/login', [AuthController::class, 'login']);
// 投稿画面の表示
Route::get('/create', [PostController::class, 'create'])->name('posts.create');

// 投稿処理
Route::post('/create', [PostController::class, 'store'])->name('posts.store');



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});