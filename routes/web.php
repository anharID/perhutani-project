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
use App\Http\Controllers\DashboardAssetTrashController;
use App\Http\Controllers\DashboardConroller;
use App\Http\Controllers\UserController;

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

Route::redirect('/', '/dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardConroller::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('online-user', [DashboardUserController::class, 'index']);

Route::get('/dashboard/assets/trash', [DashboardAssetController::class, 'trash'])->name('trash')->middleware('auth');
Route::post('/dashboard/assets/restore/{slug?}', [DashboardAssetController::class, 'restore'])->name('restore')->middleware('auth');
Route::post('/dashboard/assets/delete/{slug?}', [DashboardAssetController::class, 'delete'])->name('delete')->middleware('auth');
Route::get('/dashboard/user/setting', [UserController::class, 'setting'])->name('setting')->middleware('auth');

Route::resource('/dashboard/kph', DashboardKphController::class)->name('index', 'kph')->middleware('admin');

Route::resource('/dashboard/category', DashboardCategoryController::class)->name('index', 'category')->middleware('admin');

Route::resource('/dashboard/users', DashboardUserController::class)->name('index', 'user')->middleware('admin');

Route::resource('/dashboard/assets', DashboardAssetController::class)->name('index', 'assets')->middleware('auth');

Route::resource('/dashboard/approve', DashboardApproveController::class)->name('index', 'approve')->middleware('supervisor');