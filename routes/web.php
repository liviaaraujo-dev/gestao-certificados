<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/register-student', [StudentController::class, 'registerStudentForm'])->name('student.register');
    Route::post('/store-student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/students', [StudentController::class, 'listStudents'])->name('student.students');

    Route::get('/generateForm', [CertificateController::class, 'certificateForm'])->name('generateForm');

    Route::get('/certificate/{certificateId}', [CertificateController::class, 'showCertificate'])->name('certificate.show');
});

require __DIR__.'/auth.php';
