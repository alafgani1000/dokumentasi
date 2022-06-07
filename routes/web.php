<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [UserController::class, 'formRegister'])
    ->name('register');
Route::post('/register',[UserController::class, 'register'])
    ->name('register');

Route::get('/email/verify?signature={code}&token={token}',[UserController::class, 'verification'])->name('link.verify');
Route::get('/email/verify',[UserController::class, 'verification'])->name('email.verify');
Route::get('hello', function() {
    Tools::hello();
});
