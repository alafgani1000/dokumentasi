<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
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
//  register
Route::get('/register', [UserController::class, 'formRegister'])
    ->name('register');
Route::post('/register',[UserController::class, 'register'])
    ->name('register');
Route::get('/email/verify?signature={code}&token={token}',[UserController::class, 'verification'])
    ->name('link.verify');
Route::get('/email/verify',[UserController::class, 'verification'])
    ->name('email.verify');
// authentication
Route::get('/login', [UserController::class, 'formLogin'])
    ->name('login');
Route::post('/login', [UserController::class, 'login'])
    ->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'home'])
        ->name('home');
    Route::post('/logout', [UserController::class, 'logout'])
        ->name('logout');
    // drive controller
    Route::controller(DriveController::class)->group(function () {
        Route::get('/drive','index')
            ->name('drive');
        Route::get('/search','search')
            ->name('drive.search');
    });
    // file controller
    Route::controller(FileController::class)->group(function () {
        Route::get('/file/{id}/{name}/','index')
            ->name('file');
        Route::get('/link','link')
            ->name('link');
    });
    // category controller
    Route::controller(CategoryController::class)->group(function () {
        Route::post('/category','store')
            ->name('category');
    });
});
