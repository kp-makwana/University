<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\StudentController;
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


Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('userList', function () {
    return view('pages.userList');
})->name('userList');
Route::get('profile', function () {
    return view('pages.profile');
})->name('profile');
Route::get('profile', function () {
    return view('pages.profile');
})->name('profile');


Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/add_student', [StudentController::class, 'student_form'])->name('student_form');
Route::post('/add_student', [StudentController::class, 'add_student'])->name('add_student');

Route::get('/certificate', [CertificateController::class, 'index'])->name('certificates');
Route::get('/add-certificate', [CertificateController::class, 'certificate_form'])->name('certificate_form');
Route::post('/add-certificate', [CertificateController::class, 'addCertificate'])->name('addCertificate');
