<?php

use App\Http\Controllers\Images\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [ImageController::class, 'index']);
