<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
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

Route::get('/staff/create', [AdminController::class, 'createStaffGet'])->name('staff.create');

Route::get('/create/courses', [CourseController::class, 'showCreateForm'])->name('create.courses');
Route::post('/create/student', [StudentController::class, 'createStudent'])->name('create.student.post');
Route::get('/create/student', [StudentController::class, 'CreateForm'])->name('create.student');
Route::get('/view/student', [StudentController::class, 'viewStudent'])->name('view.student');
Route::get('/edit/student/{id}', [StudentController::class, 'editStudent'])->name('edit.student');
Route::post('/update/student/{id}', [StudentController::class, 'updateStudent'])->name('update.student');

