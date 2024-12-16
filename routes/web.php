<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TimeTrackerController;
use App\Http\Controllers\TypeHourController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [AppController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login-post');

});

Route::get('/dashboard/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');  

Route::middleware(['auth'])->prefix('dashboard')->group(function () 
{
    Route::get('/', [AppController::class, 'home'])->name('home');
    // Route::get('/cambiar-contraseña', [UserController::class, 'changePasswordIndex'])->name('change-password-index');
    // Route::post('/cambiar-contraseña', [UserController::class, 'changePassword'])->name('change-password');


    Route::get('/usuarios', [UserController::class, 'index'])->middleware('role_or_permission:admin|read-users')->name('usuarios.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->middleware('role_or_permission:admin|create-users')->name('usuarios.create');
    Route::post('/usuarios', [UserController::class, 'store'])->middleware('role_or_permission:admin|create-users')->name('usuarios.store');
    Route::get('/usuarios/{usuario}/edit', [UserController::class, 'edit'])->middleware('role_or_permission:admin|update-users')->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->middleware('role_or_permission:admin|update-users')->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->middleware('role_or_permission:admin|delete-users')->name('usuarios.destroy');


    Route::get('/employees', [EmployeeController::class, 'index'])->middleware('role_or_permission:admin|read-employees')->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->middleware('role_or_permission:admin|create-employees')->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->middleware('role_or_permission:admin|create-employees')->name('employees.store');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->middleware('role_or_permission:admin|update-employees')->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->middleware('role_or_permission:admin|update-employees')->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->middleware('role_or_permission:admin|delete-employees')->name('employees.destroy');


    Route::get('/departments', [DepartmentController::class, 'index'])->middleware('role_or_permission:admin|read-departments')->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->middleware('role_or_permission:admin|create-departments')->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->middleware('role_or_permission:admin|create-departments')->name('departments.store');
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->middleware('role_or_permission:admin|update-departments')->name('departments.edit');
    Route::put('/departments/{department}', [DepartmentController::class, 'update'])->middleware('role_or_permission:admin|update-departments')->name('departments.update');
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->middleware('role_or_permission:admin|delete-departments')->name('departments.destroy');


    Route::get('/positions', [PositionController::class, 'index'])->middleware('role_or_permission:admin|read-positions')->name('positions.index');
    Route::get('/positions/create', [PositionController::class, 'create'])->middleware('role_or_permission:admin|create-positions')->name('positions.create');
    Route::post('/positions', [PositionController::class, 'store'])->middleware('role_or_permission:admin|create-positions')->name('positions.store');
    Route::get('/positions/{position}/edit', [PositionController::class, 'edit'])->middleware('role_or_permission:admin|update-positions')->name('positions.edit');
    Route::put('/positions/{position}', [PositionController::class, 'update'])->middleware('role_or_permission:admin|update-positions')->name('positions.update');
    Route::delete('/positions/{position}', [PositionController::class, 'destroy'])->middleware('role_or_permission:admin|delete-positions')->name('positions.destroy');

    Route::get('/type-hours', [TypeHourController::class, 'index'])->middleware('role_or_permission:admin|read-type_hours')->name('type_hours.index');
    Route::get('/type-hours/create', [TypeHourController::class, 'create'])->middleware('role_or_permission:admin|create-type_hours')->name('type_hours.create');
    Route::post('/type-hours', [TypeHourController::class, 'store'])->middleware('role_or_permission:admin|create-type_hours')->name('type_hours.store');
    Route::get('/type-hours/{typeHour}/edit', [TypeHourController::class, 'edit'])->middleware('role_or_permission:admin|update-type_hours')->name('type_hours.edit');
    Route::put('/type-hours/{typeHour}', [TypeHourController::class, 'update'])->middleware('role_or_permission:admin|update-type_hours')->name('type_hours.update');
    Route::delete('/type-hours/{typeHour}', [TypeHourController::class, 'destroy'])->middleware('role_or_permission:admin|delete-type_hours')->name('type_hours.destroy');

    Route::get('/time-tracker', [TimeTrackerController::class, 'index'])->middleware('role_or_permission:admin|employee|read-time_tracker')->name('time_tracker.index');
    Route::get('/time-tracker/create', [TimeTrackerController::class, 'create'])->middleware('role_or_permission:employee|create-time_tracker')->name('time_tracker.create');
    Route::post('/time-tracker', [TimeTrackerController::class, 'store'])->middleware('role_or_permission:employee|create-time_tracker')->name('time_tracker.store');
    Route::get('/time-tracker/{timeTracker}/edit', [TimeTrackerController::class, 'edit'])->middleware('role_or_permission:employee|edit-time_tracker')->name('time_tracker.edit');
    Route::put('/time-tracker/{timeTracker}', [TimeTrackerController::class, 'update'])->middleware('role_or_permission:employee|update-time_tracker')->name('time_tracker.update');
    Route::delete('/time-tracker/{timeTracker}', [TimeTrackerController::class, 'destroy'])->middleware('role_or_permission:employee|delete-time_tracker')->name('time_tracker.destroy');


    
});



