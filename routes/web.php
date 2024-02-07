<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;


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

//投稿閲覧
Route::get('/posts/{id}', [PostController::class, 'showPost'])->name('posts.show');

//タイムライン表示画面。homeと重複
Route::get('/timeline', [PostController::class, 'showTimeline']);

//Authの設定
Auth::routes();

//ホーム画面の表示
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//会員登録ページ
Route::post('/register', [RegistrationController::class, 'register']);

// ログイン画面の表示
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// ログイン処理
Route::post('/login', [AuthController::class, 'login']);
// 投稿画面の表示
Route::get('/create', [PostController::class, 'create'])->name('posts.create');

// 投稿処理
Route::post('/create', [PostController::class, 'store'])->name('posts.store');

//authをアクセス時呼び出し
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//ゲストユーザーの閲覧ページ
Route::get('/public', [PublicController::class, 'index'])->middleware('web');

//userプロフィール閲覧
Route::get('/profile/{user}', [ProfileController::class,'show'])->name('profile.show');

//アニマル編集フォーム
Route::get('/animals/{animal}/edit', [AnimalController::class,'edit'])->name('animals.edit');
//アニマルデータのPUT
Route::put('/animals/{animal}', [AnimalController::class,'update'])->name('animals.update');



