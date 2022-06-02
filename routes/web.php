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

Route::get('/about-us', function () {
    return view('landing_page.about_us');
});

Route::get('/free-checkup', function () {
    return view('landing_page.services.free_checkups');
});

Route::get('/physiotherapy', function () {
    return view('landing_page.services.physiotherapy');
});

Route::get('/expert-doctor', function () {
    return view('landing_page.services.expert-doctor');
});

Route::get('/rehabilitation-facility', function () {
    return view('landing_page.services.rehabilitation');
});

// ------------user list routing---------------- //
Route::get('/user-list', [UserListController::class, 'showUserList'])->middleware('auth');
Route::get('/user-list/admin/{uuid}', [UserListController::class, 'getDataAdmin'])->middleware('auth');
Route::get('/user-list/doctor/{uuid}', [UserListController::class, 'getDataDoctor'])->middleware('auth');
Route::get('/user-list/patient/{uuid}', [UserListController::class, 'getDataPatient'])->middleware('auth');

Route::get('/user-list/edit/admin/{uuid}', [UserListController::class, 'formEditAdmin'])->middleware('auth');
Route::get('/user-list/edit/doctor/{uuid}', [UserListController::class, 'formEditDoctor'])->middleware('auth');
Route::get('/user-list/edit/patient/{uuid}', [UserListController::class, 'formEditPatient'])->middleware('auth');

Route::put('/user-list/edit/admin/{uuid}', [UserListController::class, 'editDataAdmin'])->middleware('auth');
Route::put('/user-list/edit/doctor/{uuid}', [UserListController::class, 'editDataDoctor'])->middleware('auth');
Route::put('/user-list/edit/patient/{uuid}', [UserListController::class, 'editDataPatient'])->middleware('auth');

Route::get('/user-list/delete/admin/{uuid}', [UserListController::class, 'deleteDataAdmin'])->middleware('auth');
Route::get('/user-list/delete/doctor/{uuid}', [UserListController::class, 'deleteDataDoctor'])->middleware('auth');
Route::get('/user-list/delete/patient/{uuid}', [UserListController::class, 'deleteDataPatient'])->middleware('auth');
// ---------end of user list routing---------------- //

// ---------update profile routing---------------- //
Route::get('update-patient', [UpdateController::class, 'formUpdatePatient'])->middleware('auth');
Route::get('update-doctor', [UpdateController::class, 'formUpdateDoctor'])->middleware('auth');
Route::get('update-admin', [UpdateController::class, 'formUpdateAdmin'])->middleware('auth');

Route::put('update-patient/{id}', [UpdateController::class, 'updatePatient'])->middleware('auth');
Route::put('update-doctor/{id}', [UpdateController::class, 'updateDoctor'])->middleware('auth');
Route::put('update-admin/{id}', [UpdateController::class, 'updateAdmin'])->middleware('auth');
// ---------end of update profile routing---------------- //

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', [DashboardController::class, 'profile'])->middleware('auth');
Route::get('/helpcenter', [DashboardController::class, 'helpcenter'])->middleware('auth');
Route::get('/current', [DashboardController::class, 'current'])->middleware('auth');
Route::get('/trajectory', [DashboardController::class, 'trajectory'])->middleware('auth');
Route::get('/velocity', [DashboardController::class, 'velocity'])->middleware('auth');

Route::post('/import-file', [FileController::class, 'import']);
Route::post('/process-file', [FileController::class, 'processFile']);
Route::post('/download', [FileController::class, 'downloadFile']);

// --------------registration routing------------------ //
Route::get('/register-patient', [RegisterController::class, 'registerPatient']);
Route::get('/register-doctor', [RegisterController::class, 'registerDoctor'])->middleware('auth');
Route::get('/register-admin', [RegisterController::class, 'registerAdmin'])->middleware('auth');

Route::post('/register-patient', [RegisterController::class, 'storePatient']);
Route::post('/register-admin', [RegisterController::class, 'storeAdmin']);
Route::post('/register-doctor', [RegisterController::class, 'storeDoctor']);
// --------------end of registration routing------------------ //

// --------------login and logout routing------------------ //
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);
// --------------end of login and logout routing------------------ //
