<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;

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
// タスク管理システム
Route::get('/', [AuthController::class, 'index'])->name('front.index');
Route::Post('/login', [AuthController::class, 'login']);

// 認可処理
Route::middleware(['auth'])->group(function() {
    Route::get('/task/list', [TaskController::Class, 'list']);
    Route::post('/task/register', [TaskController::Class, 'register']);
    Route::get('/logout', [AuthController::Class, 'logout']);
});

// テスト用
Route::get('/welcome', [WelcomeController::class, 'index']);
Route::get('/welcome/second', [WelcomeController::class, 'second']);

// formテスト用
Route::get('/test', [TestController::class, 'index']);
Route::post('/test/input', [TestController::class, 'input']);

