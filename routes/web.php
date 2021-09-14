<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReorderController;
use App\Http\Controllers\ReordersReportController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\UsersController;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('products', ProductController::class);
    Route::resource('reorders', ReorderController::class);
    Route::resource('sales-report', SalesReportController::class);
    Route::resource('reorders-report', ReordersReportController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('sales', SalesController::class);
    Route::resource('logout', LogoutController::class);
    Route::group(['middleware' => ['role:superAdmin']], function () {
        Route::resource('users', UsersController::class);
        Route::resource('roles', RolesController::class);
    });
    Route::resource('docs', DocumentationController::class);
    Route::get('/sales/get-price/{id}', [ProductController::class, 'prices']);
});
Route::resource('login', LoginController::class);
