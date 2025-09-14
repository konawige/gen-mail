<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CopyController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CopyController::class, 'index']);
Route::post('/generate', [CopyController::class, 'generate']);
