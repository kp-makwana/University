<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\LoginController;
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

Route::middleware('no-auth')->group(function () {

    #login
    Route::get('/', function () {
        return view('pages.collage.login');
    });
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('DoLogin');

    #Admin Login
    Route::get('/admin', [AdminController::class, 'loginPage'])->name('adminLogin');
    Route::post('/adminLogin', [LoginController::class, 'adminLogin'])->name('adminLogin');
});

Route::middleware('auth')->group(function () {
    Route::get('/index', [CollageController::class, 'index'])->name('index');
    Route::get('/studentList', [CollageController::class, 'studentList'])->name('studentList');
    Route::get('/add_student', [CollageController::class, 'student_form'])->name('student_form');
    Route::post('/add_student', [CollageController::class, 'add_student'])->name('add_student');

    Route::get('/certificate', [CertificateController::class, 'index'])->name('certificates');
    Route::get('/add-certificate', [CertificateController::class, 'certificate_form'])->name('certificate_form');
    Route::post('/add-certificate', [CertificateController::class, 'addCertificate'])->name('addCertificate');

    Route::get('/profile', [CollageController::class, 'profile'])->name('profile');
    Route::get('/logout', [CollageController::class, 'logout'])->name('logout');


});
Route::middleware('admin')->group(function () {
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('index');
    });
});
