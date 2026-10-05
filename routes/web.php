<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


Route::get('/', fn() => view('home'))->name('home');

Route::get('/about', fn() => view('about'))->name('about');

Route::get('/education', fn() => view('education'))->name('education');

Route::get('/projects', fn() => view('projects'))->name('projects');

Route::get('/projects/trash', [ProjectController::class, 'trash'])
    ->name('projects.trash');

Route::put('/projects/{id}/restore', [ProjectController::class, 'restore'])
    ->name('projects.restore');

Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])
    ->name('projects.forceDelete');

    
Route::resource('projects', ProjectController::class);

