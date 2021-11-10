<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;

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
    return view('auth.login');
});
Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
Route::post('/auth/login', [AdminController::class, 'login'])->name('login.post');
Route::get('/create/department', function () {
    return view('department.create');
});
Route::post('/create/department', [DepartmentController::class, 'createDepartment'])->name('create.department.post');
Route::get('/view/department', [DepartmentController::class, 'viewDepartment'])->name('view.department');
Route::get('/edit/department/{id}', [DepartmentController::class, 'editDepartment'])->name('edit.department');
Route::post('/update/department/{id}', [DepartmentController::class, 'updateDepartment'])->name('update.department');



// Route::('lecturers', LecturerController::class);
Route::get('/lecturer/create', [LecturerController::class, 'create'])->name('lecturers.create');
Route::post('/lecturer/store', [LecturerController::class, 'store'])->name('lecturers.store');
Route::get('/lecturers', [LecturerController::class, 'index'])->name('lecturers.index');
Route::get('/lecturers/edit/{id}', [LecturerController::class, 'edit'])->name('lecturers.edit');
Route::post('/lecturers/update/{id}', [LecturerController::class, 'update'])->name('lecturers.update');

