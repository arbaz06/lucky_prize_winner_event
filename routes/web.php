<?php

use App\Http\Controllers\PrizesController;
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


Route::get('/prizes', [PrizesController::class, 'index'])->name('prizes.index');
Route::get('/prizes/create', [PrizesController::class, 'create'])->name('prizes.create');
Route::post('/prizes', [PrizesController::class, 'store'])->name('prizes.store');
Route::get('/prizes/{id}/edit', [PrizesController::class, 'edit'])->name('prizes.edit');
Route::put('/prizes/{id}', [PrizesController::class, 'update'])->name('prizes.update');
Route::delete('/prizes/{id}', [PrizesController::class, 'destroy'])->name('prizes.destroy');

// Additional routes for prize simulation and reset
Route::post('/simulate', [PrizesController::class, 'simulate'])->name('simulate');
Route::post('/prizes/reset', [PrizesController::class, 'reset'])->name('reset');


// Route::resource('prizes', PrizesController::class);


// Route::get('/', function () {
//     return redirect()->route('prizes.index');
// });
// Route::post('/simulate', '\App\Http\Controllers\PrizesController@simulate')->name('simulate');
// Route::post('/reset', '\App\Http\Controllers\PrizesController@reset')->name('reset');
