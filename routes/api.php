<?php

use App\Http\Controllers\PersonController;

Route::get('/people', [PersonController::class, 'index']);
