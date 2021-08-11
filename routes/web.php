<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/department', [DepartmentController::class, 'index'])->name('departments-index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('departments-create');
Route::post('/department/create', [DepartmentController::class, 'store'])->name('departments-store');
Route::get('/department/{id}', [DepartmentController::class, 'edit'])->name('departments-edit');
Route::patch('/department/{id}', [DepartmentController::class, 'update'])->name('departments-update');
Route::delete('/department/{id}', [DepartmentController::class, 'destroy'])->name('departments-destroy');