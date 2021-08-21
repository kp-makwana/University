<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\LoginController;
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

Route::middleware(['no-auth'])->group(function () {
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

Route::middleware(['auth','check.type'])->group(function () {
    Route::get('/index', [CollageController::class, 'index'])->name('index');

    #student
    Route::get('/studentList', [StudentController::class, 'studentList'])->name('studentList');
    Route::get('/add_student', [StudentController::class, 'student_form'])->name('student_form');
    Route::post('/add_student', [StudentController::class, 'add_student'])->name('add_student');

    Route::get('/certificate', [CertificateController::class, 'index'])->name('certificates');
    Route::get('/add-certificate', [CertificateController::class, 'certificate_form'])->name('certificate_form');
    Route::post('/add-certificate', [CertificateController::class, 'addCertificate'])->name('addCertificate');

    Route::get('/help-support', [CollageController::class, 'helpSupport'])->name('helpSupport');
    Route::get('/profile', [CollageController::class, 'profile'])->name('profile');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('index');

        #school
        Route::get('/schoolList', [AdminController::class, 'schoolList'])->name('schoolList');
        Route::get('/add_school', [AdminController::class, 'schoolForm'])->name('schoolForm');
        Route::post('/add_school', [AdminController::class, 'addSchool'])->name('addSchool');

        #collage
        Route::get('/collageList', [AdminController::class, 'collageList'])->name('collageList');
        Route::get('/add_collage', [AdminController::class, 'collageForm'])->name('collageForm');
        Route::post('/add_collage', [AdminController::class, 'addCollage'])->name('addCollage');

        #university
        Route::get('/universitiesList', [AdminController::class, 'universitiesList'])->name('universitiesList');
        Route::get('/add_university', [AdminController::class, 'universityForm'])->name('universityForm');
        Route::post('/add_university', [AdminController::class, 'addUniversity'])->name('addUniversity');

        #student
        Route::get('/studentList', [AdminController::class, 'studentList'])->name('studentList');
        Route::get('/add_student', [AdminController::class, 'student_form'])->name('student_form');
        Route::post('/add_student', [StudentController::class, 'add_student'])->name('add_student');

        #certificate
        Route::get('/certificate', [AdminController::class, 'certificates'])->name('certificates');
        Route::get('/help-support', [AdminController::class, 'helpSupport'])->name('helpSupport');

        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });

});
