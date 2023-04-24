<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;

Route::get('movies', [MovieController::class, 'index']);

Route::get('movies/{movie}', [MovieController::class, 'show']);
