<?php

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
})->name('home');

Auth::routes();

Route::get('/user/home', [App\Http\Controllers\UserController::class, 'index'])->name('user.home');

Route::middleware('auth')->prefix('/session')->group(function (){
    Route::get('/', 'App\Http\Controllers\SessionController@index')->name('session.index');
    Route::delete('/{id}', 'App\Http\Controllers\SessionController@destroy')->name('session.destroy');
    Route::get('/end_except_current', 'App\Http\Controllers\SessionController@destroyExceptCurrent')->name('session.except');
});
