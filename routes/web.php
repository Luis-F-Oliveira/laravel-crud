<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

Route::get('/', [EventsController::class, 'index'])->name('index');
Route::get('/events/{event}/change-status', [EventsController::class, 'changeStatus'])->name('events.change-status');
Route::resource('events', EventsController::class)->except([
    'show'
]);