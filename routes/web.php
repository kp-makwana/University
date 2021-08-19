<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\StudentController;
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


Route::get('/login', [CollageController::class, 'login'])->name('index');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {

    Route::get('/index', function () {
        return view('pages.collage.index');
    })->name('index');

    Route::get('/logout', [CollageController::class, 'logout'])->name('logout');
    Route::get('/students', [CollageController::class, 'index'])->name('students');
    Route::get('/add_student', [CollageController::class, 'student_form'])->name('student_form');
    Route::post('/add_student', [CollageController::class, 'add_student'])->name('add_student');

    Route::get('/certificate', [CertificateController::class, 'index'])->name('certificates');
    Route::get('/add-certificate', [CertificateController::class, 'certificate_form'])->name('certificate_form');
    Route::post('/add-certificate', [CertificateController::class, 'addCertificate'])->name('addCertificate');

    Route::get('profile', function () {
        return view('pages.collage.profile');
    })->name('profile');

    Route::get('/profile', function () {
        return view('pages.collage.profile');
    })->name('profile');
});
