<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;

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
    return view('landing_page.home');
});

// Route::get('/main', function () {
//     return view('main');
// });

// Route::get('/user', function () {
//     return view('user.index');
// });

// Route::get('/home', function () {
//     return view('templates.layouts.home');
// });

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
Route::get('/register-doctor', [RegisterController::class, 'registerDoctor']);
Route::get('/register-admin', [RegisterController::class, 'registerAdmin']);

Route::post('/register-patient', [RegisterController::class, 'storePatient']);
Route::post('/register-admin', [RegisterController::class, 'storeAdmin']);
Route::post('/register-doctor', [RegisterController::class, 'storeDoctor']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);
