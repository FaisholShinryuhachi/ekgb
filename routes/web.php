<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\KgbController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Auth;

// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
// Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
// Route::post('register', [AuthController::class, 'register']);

// Route::group(['middleware' => 'auth'], function () {

// Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::resource('tampil',KgbController::class);

//     Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// });

// Route::get('test',function(){ return view('material.table');});
// Route::get('ekgb/get',[KgbController::class, 'getEkgb']);
// Route::get('file/{name}',[KgbController::class, 'getfile']);
// Route::get('ekgb/edit-get/{id}',[KgbController::class, 'getForEdit']);
// Route::post('ekgb/post',[KgbController::class, 'postEkgb']);
// Route::post('ekgb/edit',[KgbController::class, 'editEkgb']);
// Route::get('ekgb/delete/{id}',[KgbController::class, 'deleteEkgb']);
// Route::get('ekgb/deadline',[KgbController::class, 'deadlineEkgb']);
// Route::get('ekgb/aktif',[KgbController::class, 'aktifEkgb']);

// Route::get('test2',function(){ return view('material.dashboard');});

// // Api untuk dashboard
// Route::get('api/dashboard',[KgbController::class, 'dashboardApi']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', function(){
//     return view('material.user.user');
// } );

Route::get('sandbox',[KgbController::class, 'sandbox']);

// ---------------------------------------------------------
// ------------------- Bagian api admin --------------------
// ---------------------------------------------------------

// Api Dashboard Admin Controller
Route::get('api/dashboard',[KgbController::class, 'dashboardApi']);

// Api Ekgb Admin Controller
Route::get('api/ekgb/get',[KgbController::class, 'getEkgb'])->name('api-get-ekgb');
Route::post('api/ekgb/post',[KgbController::class, 'postEkgb'])->name('api-post-ekgb');
Route::post('api/ekgb/edit',[KgbController::class, 'editEkgb'])->name('api-edit-ekgb');
Route::get('admin/ekgb/delete/{id}',[KgbController::class, 'deleteEkgb']);
Route::get('admin/api/ekgb/edit-get/{id}',[KgbController::class, 'getForEdit'])->name('api-get-edit-ekgb');

// Fitur Khusus Admin
Route::get('api/ekgb/deadline',[KgbController::class, 'deadlineEkgb'])->name('api-khusus-deadline');
Route::get('api/ekgb/aktif',[KgbController::class, 'aktifEkgb'])->name('api-khusus-aktif');

// Untuk Admin Filesystem
Route::get('admin/file/{name}',[KgbController::class, 'getfile']);
Route::get('file/{name}',[KgbController::class, 'getfile']);


// Api User Admin Controller
Route::get('api/user/get',[MyUserController::class, 'getUser'])->name('api-get-user');
Route::post('api/user/post',[MyUserController::class, 'addUser'])->name('api-post-user');
Route::get('admin/api/user/edit-get/{id}',[MyUserController::class, 'getForEdit'])->name('api-get-edit-user');
Route::post('api/user/edit',[MyUserController::class, 'postEdit'])->name('api-edit-user');
Route::get('api/user/kgb/get/',[MyUserController::class, 'getUserKgb'])->name('api-get-kgb-user');
Route::get('admin/user/delete/{id}',[MyUserController::class, 'deleteUser']);


// ---------------------------------------------------------
// ------------------- Bagian api pegawai ------------------
// ---------------------------------------------------------

Route::get('api/pegawai/get', [PegawaiController::class, 'getProfile']);
Route::post('api/pegawai/file', [PegawaiController::class, 'filePegawai'])->name('api-file-pegawai');


Route::get('/', function(){
    return redirect('login');
});


Auth::routes();


// ---------------------------------------------------------
// ----------------- Bagian Route pegawai ------------------
// ---------------------------------------------------------
Route::middleware(['pegawai'])->group(function () {
    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
});

// ---------------------------------------------------------
// ----------------- Bagian Route admin ------------------
// ---------------------------------------------------------
Route::middleware(['admin'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::prefix('admin')->group(function () {
        Route::get('/ekgb', function () {
            return view('material.admin.table');
        })->name('ekgb');
        Route::get('/user-table', function () {
            return view('material.admin.user-table');
        })->name('user-table');
    });
});

// Route::get('pegawai', [PegawaiController::class, 'index'])->middleware('pegawai')->name('pegawai');
// Route::get('admin', [AdminController::class, 'index'])->middleware('admin')->name('admin');
