<?php

use App\Http\Controllers\NotebookController;
use Illuminate\Support\Facades\Route;

Route::get('/notebook', [NotebookController::class, 'index']);
Route::post('/v1/notebook', [NotebookController::class, 'store']);
Route::get('/v1/notebook/{id}', [NotebookController::class, 'show']);
Route::post('/v1/notebook/{id}', [NotebookController::class, 'update']);
Route::delete('/v1/notebook/{id}', [NotebookController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
