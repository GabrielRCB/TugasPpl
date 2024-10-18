<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
})->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});

Route::group(['prefix' => 'user','middleware'=>'auth'], function () {
    Route::get('/change-password', [UserController::class, 'changePassword']);

    Route::post('/change-password', [UserController::class, 'updatePassword']);
});

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::group(['prefix' => 'customer','middleware'=>'auth'], function () {
    Route::get('/', [CustomerController::class, 'list']);
    Route::get('/add', [CustomerController::class, 'add']);
    Route::get('/edit/{id}', [CustomerController::class, 'edit']);
    Route::post('/update', [CustomerController::class, 'update']);
    Route::post('/insert', [CustomerController::class, 'insert']);
    Route::post('/delete', [CustomerController::class, 'delete']);
});

