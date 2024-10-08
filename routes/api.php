<?php

use App\Http\Controllers\Api\ProjectController as ApiProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/projects", [ApiProjectController::class, "index"])->name("api.projects.index");
Route::get("/projects/search", [ApiProjectController::class, "userSearch"])->name("api.projects.show");
Route::get("/projects/{project}", [ApiProjectController::class, "show"])->name("api.projects.show");

