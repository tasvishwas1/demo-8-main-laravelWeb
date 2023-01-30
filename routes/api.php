<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/greeting', function () {
//    return 'Hello World';
//});

Route::prefix('v1')->name('api.v1.')->namespace('Api\V1')->group(function () {

    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('register', [LoginController::class, 'register'])->name('register');

    Route::group(['middleware' => ['api']], function () {

        /* Get user Profile */
        Route::get('/profile', [
           LoginController::class, 'profile'
        ])->name('profile');

        /* Category Api */
        Route::get('/category', [
            CategoryController::class, 'index'
        ])->name('category');

        Route::get('/category-details/{id}', [
            CategoryController::class, 'show'
        ])->name('category-details');

        Route::post('/add-category', [
            CategoryController::class, 'create'
        ])->name('add-category');

        Route::get('/delete-category/{id}', [
            CategoryController::class, 'destroy'
        ])->name('delete-category');

        Route::get('/category-status/{id}/{status}', [
            CategoryController::class, 'changeStatus'
        ])->name('category-status');

    });

});
