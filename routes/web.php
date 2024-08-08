<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will  
  Route::get('d',[PostController::class, 'index']);
| be assigned to the "web" middleware group. Make something great!
|
*/
//

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
