<?php

use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/projects',[GuestProjectController::class, 'index'])->name('projects.index');
// Route::get('/projects/create',[GuestProjectController::class, 'create'])->name('projects.create');
// Route::post('/projects',[GuestProjectController::class, 'store'])->name('projects.store');
// Route::get('/projects/trash-index',[GuestProjectController::class, 'softDeleteIndex'])->name('projects.trash-index');
// Route::get('/projects/{project}/edit',[GuestProjectController::class, 'edit'])->name('projects.edit');
// Route::get('/projects/{project}/index',[GuestProjectController::class, 'show'])->name('projects.show');
// Route::put('/projects/{project}/update',[GuestProjectController::class, 'update'])->name('projects.update');
// Route::delete('/projects/{project}/soft-delete',[GuestProjectController::class, 'softDelete'])->name('projects.softDelete');
// Route::delete('/projects/{project}/perma-delete',[GuestProjectController::class, 'permaDelete'])->name('projects.permaDelete');
// Route::patch('/projects/{project}/restore',[GuestProjectController::class, 'restore'])->name('projects.restore');

Route::resource('projects', GuestProjectController::class);














Route::middleware('auth')->name('admin.')->prefix('admin/')->group(
    function(){
        //Le Varie rotte
        Route::get('/projects',[AdminProjectController::class, 'index'])->name('projects.index');
        Route::post('/projects',[AdminProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/create',[AdminProjectController::class, 'create'])->name('projects.create');
        Route::get('/projects/trash-index',[AdminProjectController::class, 'softDeleteIndex'])->name('projects.trash-index');
        Route::get('/projects/{project}/edit',[AdminProjectController::class, 'edit'])->name('projects.edit');
        Route::get('/projects/{project}/index',[AdminProjectController::class, 'show'])->name('projects.show');
        Route::put('/projects/{project}/update',[AdminProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}/soft-delete',[AdminProjectController::class, 'softDelete'])->name('projects.softDelete');
        Route::delete('/projects/{project}/perma-delete',[AdminProjectController::class, 'permaDelete'])->name('projects.permaDelete');
        Route::patch('/projects/{project}/restore',[AdminProjectController::class, 'restore'])->name('projects.restore');
    }
);
