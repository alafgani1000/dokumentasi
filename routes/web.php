<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\LinkController;
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
    Route::group(['middleware' => ['verified']], function() {
        Route::get('/home', [HomeController::class, 'home'])
            ->name('home');
        Route::post('/logout', [UserController::class, 'logout'])
            ->name('logout');
        // drive controller
        Route::controller(DriveController::class)->group(function () {
            Route::get('/drive','index')
                ->name('drive');
        });
        // file controller
        Route::controller(FileController::class)->group(function () {
            Route::get('/file/{id}/{name}/','index')
                ->name('file');
            Route::post('/file/upload','store')
                ->name('file.upload');
            Route::get('/show-file/{id}/{name}','readFile')
                ->name('file.read');
            Route::delete('/file/{id}/delete','delete')
                ->name('file.delete');
            Route::get('/file/access?signature={code}&token={token}', 'accessVerification')
                ->name('file.access-verify');
            Route::get('/file/access', 'accessVerification')
                ->name('file.access');
            Route::post('file/{id}/create-link', 'createLink')
                ->name('file.create-link');
        });
        // category controller
        Route::controller(CategoryController::class)->group(function () {
            Route::post('/category','store')
                ->name('category');
            Route::delete('/category/{id}/delete', 'delete')
                ->name('category.delete');
            Route::get('/category/{id}/edit', 'edit')
                ->name('category.edit');
            Route::put('/category/{id}/rename', 'rename')
                ->name('category.rename');
        });
        // route link
        Route::controller(LinkController::class)->group(function () {
            Route::get('/link','index')
                ->name('link');
            Route::delete('/link/{id}/delete', 'delete')
                ->name('link.delete');
        });
    });
});
