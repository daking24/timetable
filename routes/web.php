<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('/staff/create', [AdminController::class, 'createStaffGet'])->name('staff.create');