<?php

use App\Http\Controllers\TheCat\TheCatController;
use Illuminate\Support\Facades\Route;

Route::post('/add-photo', [TheCatController::class, 'fetchOneCat']);