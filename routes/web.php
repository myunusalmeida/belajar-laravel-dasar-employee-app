<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
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
    return view('pages.home');
});

Route::get('position', [PositionController::class, 'index'])->name('position.index');
Route::get('position/tambah', [PositionController::class, 'create']);
Route::post('position/store', [PositionController::class, 'store']);
Route::get('position/edit/{id}', [PositionController::class, 'edit']);
Route::put('position/update/{id}', [PositionController::class, 'update']);
Route::delete('position/delete/{id}', [PositionController::class, 'delete']);

Route::resource('employees', EmployeeController::class);
