<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Login and Login check routes...
 * */
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-check', [LoginController::class, 'loginCheck'])->name('login-check');
Route::post('/account-deactivate', [LoginController::class, 'accountDeactivate'])->name('account-deactivate');

Route::group(['middleware' => ['adminCheck']], function () {

    /* * Dashboard route for load all the dashboard(home) page details call from the admin-dashboard controller. */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* Category resource route for all category module operations call from the admin-category controller. */
    Route::resource('/category', CategoryController::class);

    /* status change route for category */
    Route::get('category/status/{id}/{status}', [
        CategoryController::class, 'changeStatus'
    ])->name('category.status.change');

    /* get-category-list route for load category data from the db in datatable. */
    Route::get('get-category-list', [
        CategoryController::class, 'getCategoryList'
    ])->name('get-category-list');

    /* get-category-details route for load category details modal */
    Route::get('category-details/{id}', [
        CategoryController::class, 'show'
    ])->name('category-details');

    /* Settings Routes */


    // pending functionalities...

    /* Blog resource route for all blog module operations call from the admin-blog controller. */
    Route::resource('/blog', BlogController::class);

    /* Load dashboard charts... */
    Route::post('/charts-loading', [DashboardController::class, 'loadCharts'])->name('charts-loading');

});

