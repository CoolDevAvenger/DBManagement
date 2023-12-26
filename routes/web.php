<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AMPController;
use App\Http\Controllers\CRSController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\TaskReviewController;
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

Route::get('/', [ClientController::class, 'index']);

Route::resource('clients', ClientController::class);
Route::resource('amps', AMPController::class);
Route::resource('crs', CRSController::class);
Route::resource('work-order', WorkOrderController::class);
Route::resource('task-review', TaskReviewController::class);