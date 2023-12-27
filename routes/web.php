<?php

use App\Livewire\RecordsHandler;
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

    Route::get('/sdf',function(){
        return view('components\layouts\app');
    });

    Route::get('/tasks',RecordsHandler::class)->name('tasks');


