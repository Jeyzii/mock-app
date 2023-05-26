<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('employees')->group(function(){
    Route::get('/', [EmployeeController::class, 'index',])->name('employees.read');
    Route::get('/create', [EmployeeController::class, 'create',])->name('employees.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/edit/{id}', [EmployeeController::class, 'edit']);
    Route::put('/edit/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/delete/{id}', [EmployeeController::class, 'destroy']);
});

Route::prefix('companies')->group(function(){
    Route::get('/', [CompanyController::class, 'index',])->name('companies.read');
    Route::get('/create', [CompanyController::class, 'create',])->name('companies.create');
    Route::post('/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/edit/{id}', [CompanyController::class, 'edit']);
    Route::put('/edit/{id}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/delete/{id}', [CompanyController::class, 'destroy']);
});


