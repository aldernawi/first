<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Define routes for admin authentication
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dash');

    Route::get('/statstic', [App\Http\Controllers\HomeController::class, 'statistic'])->name('statistic');

    // التصميفات
    Route::get('/treatment-centers', [App\Http\Controllers\TreatmentCentersController::class, 'index'])->name('treatmentCenters');
    Route::get('/add-treatment-centers', [App\Http\Controllers\TreatmentCentersController::class, 'add'])->name('treatmentCenters_add');
    Route::post('/save-treatment-centers', [App\Http\Controllers\TreatmentCentersController::class, 'save'])->name('treatmentCenters_save');
    Route::get('/edit-treatment-centers/{id}', [App\Http\Controllers\TreatmentCentersController::class, 'edit'])->name('treatmentCenters_edit');
    Route::post('/update-treatment-centers', [App\Http\Controllers\TreatmentCentersController::class, 'update'])->name('treatmentCenters_update');
    Route::get('/delete-treatment-centers/{id}', [App\Http\Controllers\TreatmentCentersController::class, 'delete'])->name('treatmentCenters_delete');
    // 
    Route::get('/sections', [App\Http\Controllers\SectionsController::class, 'index'])->name('section');
    Route::get('/add-sections', [App\Http\Controllers\SectionsController::class, 'add'])->name('section_add');
    Route::post('/save-sections', [App\Http\Controllers\SectionsController::class, 'save'])->name('section_save');
    Route::get('/edit-sections/{id}', [App\Http\Controllers\SectionsController::class, 'edit'])->name('section_edit');
    Route::post('/update-sections', [App\Http\Controllers\SectionsController::class, 'update'])->name('section_update');
    Route::get('/delete-sections/{id}', [App\Http\Controllers\SectionsController::class, 'delete'])->name('section_delete');

    // 
    Route::get('/specialties', [App\Http\Controllers\SpecialtiesController::class, 'index'])->name('specialties');
    Route::get('/add-specialties', [App\Http\Controllers\SpecialtiesController::class, 'add'])->name('specialties_add');
    Route::post('/save-specialties', [App\Http\Controllers\SpecialtiesController::class, 'save'])->name('specialties_save');
    Route::get('/edit-specialties/{id}', [App\Http\Controllers\SpecialtiesController::class, 'edit'])->name('specialties_edit');
    Route::post('/update-specialties', [App\Http\Controllers\SpecialtiesController::class, 'update'])->name('specialties_update');
    Route::get('/delete-specialties/{id}', [App\Http\Controllers\SpecialtiesController::class, 'delete'])->name('specialties_delete');

    // 
    Route::get('/doctors', [App\Http\Controllers\DoctorsController::class, 'index'])->name('doctors');
    Route::get('/add-doctors', [App\Http\Controllers\DoctorsController::class, 'add'])->name('doctors_add');
    Route::post('/save-doctors', [App\Http\Controllers\DoctorsController::class, 'save'])->name('doctors_save');
    Route::get('/edit-doctors/{id}', [App\Http\Controllers\DoctorsController::class, 'edit'])->name('doctors_edit');
    Route::post('/update-doctors', [App\Http\Controllers\DoctorsController::class, 'update'])->name('doctors_update');
    Route::get('/delete-doctors/{id}', [App\Http\Controllers\DoctorsController::class, 'delete'])->name('doctors_delete');

    // 
    Route::get('/patients', [App\Http\Controllers\PatientsController::class, 'index'])->name('patients');
    Route::get('/add-patients', [App\Http\Controllers\PatientsController::class, 'add'])->name('patients_add');
    Route::post('/save-patients', [App\Http\Controllers\PatientsController::class, 'save'])->name('patients_save');
    Route::get('/edit-patients/{id}', [App\Http\Controllers\PatientsController::class, 'edit'])->name('patients_edit');
    Route::post('/update-patients', [App\Http\Controllers\PatientsController::class, 'update'])->name('patients_update');
    Route::get('/delete-patients/{id}', [App\Http\Controllers\PatientsController::class, 'delete'])->name('patients_delete');
    Route::get('/profile-patients/{id}', [App\Http\Controllers\PatientsController::class, 'profile'])->name('patients_profile');
    Route::post('/save-save_appoiments', [App\Http\Controllers\PatientsController::class, 'save_appoiments'])->name('patients_app_save');

    // 
    Route::post('/save-save_dignses', [App\Http\Controllers\PatientsController::class, 'save_dignses'])->name('save_dignses');

// 
Route::post('/save-patients_mid_save', [App\Http\Controllers\PatientsController::class, 'patients_mid_save'])->name('patients_mid_save');

    
    
    // المستخدمين
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/add-user', [App\Http\Controllers\UserController::class, 'add'])->name('user_add');
    Route::post('/save-user', [App\Http\Controllers\UserController::class, 'save'])->name('user_save');
    Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user_edit');
    Route::post('/update-user', [App\Http\Controllers\UserController::class, 'update'])->name('user_update');
    Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user_delete');


    Route::post('admin/logout', [App\Http\Controllers\auth\LoginController::class, 'logout'])->name('admin.logout');
});
