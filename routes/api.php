<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return response()->json(["healty" => true]);
})->name('healthcheck');

Route::apiResource('tasks', TaskController::class);
