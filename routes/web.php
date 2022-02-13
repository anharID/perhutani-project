<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardKphController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardAssetController;
use App\Http\Controllers\DashboardApproveController;

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

Route::redirect('/', '/login')->middleware('guest');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/kph', DashboardKphController::class)->name('index', 'kph')->middleware('auth');
Route::resource('/dashboard/category', DashboardCategoryController::class)->name('index', 'category')->middleware('auth');
Route::resource('/dashboard/users', DashboardUserController::class)->name('index', 'user')->middleware('auth');
Route::resource('/dashboard/asset', DashboardAssetController::class)->name('index', 'asset')->middleware('auth');
Route::resource('/dashboard/approve', DashboardApproveController::class)->name('index', 'approve')->middleware('auth');