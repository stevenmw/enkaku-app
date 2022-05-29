<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserListController;

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
    // if (auth()->user()) {
    //     return redirect('dashboard');
    // }
    return view('landing_page.home');
});

Route::get('/user-list', [UserListController::class, 'showUserList']);

Route::get('update-patient', [UpdateController::class, 'formUpdatePatient'])->middleware('auth');
Route::get('update-doctor', [UpdateController::class, 'formUpdateDoctor'])->middleware('auth');
Route::get('update-admin', [UpdateController::class, 'formUpdateAdmin'])->middleware('auth');

Route::put('update-patient/{id}', [UpdateController::class, 'updatePatient'])->middleware('auth');
Route::put('update-doctor/{id}', [UpdateController::class, 'updateDoctor'])->middleware('auth');
Route::put('update-admin/{id}', [UpdateController::class, 'updateAdmin'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', [DashboardController::class, 'profile'])->middleware('auth');
Route::get('/helpcenter', [DashboardController::class, 'helpcenter'])->middleware('auth');
Route::get('/current', [DashboardController::class, 'current'])->middleware('auth');
Route::get('/trajectory', [DashboardController::class, 'trajectory'])->middleware('auth');
Route::get('/velocity', [DashboardController::class, 'velocity'])->middleware('auth');

Route::post('/import-file', [FileController::class, 'import']);
Route::post('/process-file', [FileController::class, 'processFile']);
Route::post('/download', [FileController::class, 'downloadFile']);

Route::get('/register-patient', [RegisterController::class, 'registerPatient']);
Route::get('/register-doctor', [RegisterController::class, 'registerDoctor'])->middleware('auth');
Route::get('/register-admin', [RegisterController::class, 'registerAdmin'])->middleware('auth');

Route::post('/register-patient', [RegisterController::class, 'storePatient']);
Route::post('/register-admin', [RegisterController::class, 'storeAdmin']);
Route::post('/register-doctor', [RegisterController::class, 'storeDoctor']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);
