<?php

use App\Builder\ReturnApi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ReturnApi::success([], 'API is running.');
});

Route::prefix('/images')->group(base_path('routes/api/image.php'));

Route::prefix('/cats')->group(base_path('routes/api/cat.php'));
