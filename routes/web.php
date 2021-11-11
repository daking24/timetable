<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\SmsController;

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

Route::get('/admin/auth/login', function () {return view('auth.login');});
Route::post('/auth/login', [AdminController::class, 'login'])->name('login.post');


Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');


Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/store', [DepartmentController::class, 'createDepartment'])->name('department.store');
Route::get('/department/view', [DepartmentController::class, 'viewDepartment'])->name('view.department');
Route::get('/department/view/edit/{id}', [DepartmentController::class, 'editDepartment'])->name('edit.department');
Route::post('/department/view/update/{id}', [DepartmentController::class, 'updateDepartment'])->name('update.department');

// Route::('lecturers', LecturerController::class);
Route::get('/lecturers/create', [LecturerController::class, 'create'])->name('lecturers.create');
Route::post('/lecturers/store', [LecturerController::class, 'store'])->name('lecturers.store');
Route::get('/lecturers/view', [LecturerController::class, 'index'])->name('lecturers.index');
Route::get('/lecturers/view/edit/{id}', [LecturerController::class, 'edit'])->name('lecturers.edit');
Route::post('/lecturers/view/update/{id}', [LecturerController::class, 'update'])->name('lecturers.update');


Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/view', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/view/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('/courses/view/update/{id}', [CourseController::class, 'update'])->name('courses.update');

Route::post('/student/store', [StudentController::class, 'createStudent'])->name('create.student.post');
Route::get('/student/create', [StudentController::class, 'CreateForm'])->name('create.student');
Route::get('/student/view', [StudentController::class, 'viewStudent'])->name('view.student');
Route::get('/student/view/edit/{id}', [StudentController::class, 'editStudent'])->name('edit.student');
Route::post('/student/view/update/{id}', [StudentController::class, 'updateStudent'])->name('update.student');

Route::get('venue/create', [VenueController::class, 'create'])->name('venues.create');
Route::post('venue/store', [VenueController::class, 'store'])->name('venues.store');
Route::get('/venue/view', [VenueController::class, 'index'])->name('venues.index');
Route::get('/venue/view/edit/{id}', [VenueController::class, 'edit'])->name('venues.edit'); 
Route::post('/venues/view/update/{id}', [VenueController::class, 'update'])->name('venues.update');

Route::get('/timetable/create', [TimeTableController::class, 'showCreateForm'])->name('create.timetable');
Route::post('/timetable/store', [TimeTableController::class, 'generate'])->name('create.timetable.post');
Route::get('/setting/create', [SettingController::class, 'showCreateFormSetting'])->name('create.setting');
Route::post('/setting/store', [SettingController::class, 'store'])->name('create.setting.post');


// SMS Controller
Route::get('/sms/send', [SmsController::class, 'sendSms'])->name('sms.send');