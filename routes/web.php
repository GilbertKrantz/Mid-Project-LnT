<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/welcome', [EmployeeController::class, 'index'])->name('index');

Route::get('/create-employee', [EmployeeController::class, 'create'])->name('create');
Route::post('store-employee', [EmployeeController::class, 'store'])->name('store');

Route::get('/editEmployee/{id}', [EmployeeController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [EmployeeController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
