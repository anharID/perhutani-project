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

Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/assets/trash', [DashboardAssetController::class, 'trash'])->name('trash')->middleware('auth');
Route::get('/dashboard/assets/restore/{slug?}', [DashboardAssetController::class, 'restore'])->name('restore')->middleware('auth');
Route::get('/dashboard/assets/delete/{slug?}', [DashboardAssetController::class, 'delete'])->name('delete')->middleware('auth');
Route::post('/dashboard/kph/{id}/confirm', [DashboardKphController::class, 'confirm'])->name('confirm')->middleware('admin');
Route::post('/dashboard/kph/{id}/delete', [DashboardKphController::class, 'delete'])->name('delete')->middleware('admin');

Route::resource('/dashboard/kph', DashboardKphController::class)->name('index', 'kph')->middleware('admin');

Route::resource('/dashboard/category', DashboardCategoryController::class)->name('index', 'category')->middleware('admin');

Route::resource('/dashboard/users', DashboardUserController::class)->name('index', 'user')->middleware('admin');

Route::resource('/dashboard/assets', DashboardAssetController::class)->name('index', 'assets')->middleware('auth');

Route::resource('/dashboard/approve', DashboardApproveController::class)->name('index', 'approve')->middleware(['admin','supervisor']);