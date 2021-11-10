<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

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


Route::get('/create/courses', [CourseController::class, 'create'])->name('courses.create');
Route::post('/store/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');

Route::post('/create/student', [StudentController::class, 'createStudent'])->name('create.student.post');
Route::get('/create/student', [StudentController::class, 'CreateForm'])->name('create.student');
Route::get('/view/student', [StudentController::class, 'viewStudent'])->name('view.student');
Route::get('/edit/student/{id}', [StudentController::class, 'editStudent'])->name('edit.student');
Route::post('/update/student/{id}', [StudentController::class, 'updateStudent'])->name('update.student');

