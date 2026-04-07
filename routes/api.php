<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::middleware('api')->group(function () {
    Route::apiResource('recipes', RecipeController::class);
});
