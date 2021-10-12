<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KgbController;
 
Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {
 
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('tampil',KgbController::class);

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});

Route::get('test',function(){ return view('material.table');});
Route::get('ekgb/get',[KgbController::class, 'getEkgb']);
Route::get('file/{name}',[KgbController::class, 'getfile']);
Route::get('ekgb/edit-get/{id}',[KgbController::class, 'getForEdit']);
Route::post('ekgb/post',[KgbController::class, 'postEkgb']);
Route::post('ekgb/edit',[KgbController::class, 'editEkgb']);
Route::get('ekgb/delete/{id}',[KgbController::class, 'deleteEkgb']);
Route::get('ekgb/deadline',[KgbController::class, 'deadlineEkgb']);
Route::get('ekgb/aktif',[KgbController::class, 'aktifEkgb']);

Route::get('test2',function(){ return view('material.dashboard');});

// Api untuk dashboard
Route::get('api/dashboard',[KgbController::class, 'dashboardApi']);
// Route::prefix('api/dashboard')->group(function () {
//     Route::get('deadline',[KgbController::class, 'deadlineApi']);
// });

// Route::get('sandbox',[KgbController::class, 'sandbox']);


