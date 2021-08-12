<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;

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



Auth::routes();


Route::group(['middleware'=>['auth', 'has.permission']], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/department', [DepartmentController::class, 'index'])->name('departments-index');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('departments-create');
    Route::post('/department/create', [DepartmentController::class, 'store'])->name('departments-store');
    Route::get('/department/{id}', [DepartmentController::class, 'edit'])->name('departments-edit');
    Route::patch('/department/{id}', [DepartmentController::class, 'update'])->name('departments-update');
    Route::delete('/department/{id}', [DepartmentController::class, 'destroy'])->name('departments-destroy');
    
    
    Route::get('/role', [RoleController::class, 'index'])->name('roles-index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('roles-create');
    Route::post('/role/create', [RoleController::class, 'store'])->name('roles-store');
    Route::get('/role/{id}', [RoleController::class, 'edit'])->name('roles-edit');
    Route::patch('/role/{id}', [RoleController::class, 'update'])->name('roles-update');
    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('roles-destroy');
    
    Route::get('/user', [UserController::class, 'index'])->name('users-index');
    Route::get('/user/create', [UserController::class, 'create'])->name('users-create');
    Route::post('/user/create', [UserController::class, 'store'])->name('users-store');
    Route::get('/user/{id}', [UserController::class, 'edit'])->name('users-edit');
    Route::patch('/user/{id}', [UserController::class, 'update'])->name('users-update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users-destroy');

    Route::get('/permission', [PermissionController::class, 'index'])->name('permissions-index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permissions-create');
    Route::post('/permission/create', [PermissionController::class, 'store'])->name('permissions-store');
    Route::get('/permission/{id}', [PermissionController::class, 'edit'])->name('permissions-edit');
    Route::patch('/permission/{id}', [PermissionController::class, 'update'])->name('permissions-update');
    Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('permissions-destroy');
});




