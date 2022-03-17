<?php

use App\Http\Controllers\CustomerController;
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
use App\Http\Controllers\UserAccountController;

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


Route::get('/dashboard/approve/assets', [DashboardAssetController::class, 'approve'])->name('approve')->middleware('supervisor');
Route::get('/dashboard/approve/assets/{slug}', [DashboardAssetController::class, 'approveShow'])->name('approve.show')->middleware('supervisor');
Route::post('/dashboard/approve/assets/{slug}/approved', [DashboardAssetController::class, 'approved'])->name('approved')->middleware('supervisor');
Route::get('/dashboard/approve/costumers', [CustomerController::class, 'approveCustomer'])->name('approve.customer')->middleware('supervisor');
Route::get('/dashboard/approve/costumers/{id}', [CustomerController::class, 'approveCustomerShow'])->name('approve.customer.show')->middleware('supervisor');
Route::post('/dashboard/approve/costumers/{id}/approved', [CustomerController::class, 'customerApprovedProcess'])->name('approve.customer.approved')->middleware('supervisor');

Route::get('/dashboard/assets/trash', [DashboardAssetController::class, 'trash'])->name('trash')->middleware('auth');
Route::post('/dashboard/assets/restore/{slug?}', [DashboardAssetController::class, 'restore'])->name('restore')->middleware('auth');
Route::post('/dashboard/assets/delete/{slug?}', [DashboardAssetController::class, 'delete'])->name('delete')->middleware('auth');
 
Route::post('/attachment/download/{id}', [DashboardAssetController::class, 'downloadFile'])->name('download')->middleware('auth');

Route::get('/dashboard/users/non-active', [DashboardUserController::class, 'trash'])->name('nonaktif')->middleware('auth');
Route::post('/dashboard/users/{username}/restore', [DashboardUserController::class, 'restore'])->name('aktifkan')->middleware('auth');

Route::get('/dashboard/user/setting', [UserAccountController::class, 'setting'])->name('setting')->middleware('auth');
Route::post('/dashboard/user/setting/update', [UserAccountController::class, 'updateProfile'])->name('user.update')->middleware('auth');
Route::get('/dashboard/user/change-password', [UserAccountController::class, 'password'])->name('password')->middleware('auth');
Route::post('/dashboard/user/change-password', [UserAccountController::class, 'passwordUpdate'])->name('password.update')->middleware('auth');

Route::get('/dashboard/customers/approved', [CustomerController::class, 'customerApproved'])->name('customer.approved')->middleware('auth');
Route::get('/dashboard/customers/approved/{id}', [CustomerController::class, 'customerApprovedShow'])->name('customer.approved.show')->middleware('auth');
Route::post('/dashboard/customers/approved/{id}/download', [CustomerController::class, 'customerFileDownload'])->name('customer.approved.show')->middleware('auth');


Route::get('/dashboard/depreciation', [DashboardAssetController::class, 'depreciation'])->name('depreciation')->middleware('auth');

Route::resource('/dashboard/kph', DashboardKphController::class)->name('index', 'kph')->middleware('admin');

Route::resource('/dashboard/category', DashboardCategoryController::class)->name('index', 'category')->middleware('admin');

Route::resource('/dashboard/users', DashboardUserController::class)->name('index', 'user')->middleware('admin');

Route::resource('/dashboard/assets', DashboardAssetController::class)->name('index', 'assets')->middleware('auth');

Route::resource('/dashboard/customers/candidates', CustomerController::class)->name('index', 'customer')->middleware('auth');