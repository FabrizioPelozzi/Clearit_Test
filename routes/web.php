<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

// Login Routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Agent Dashboard
Route::get('/agent/dashboard', function () {
    return view('agent.dashboard');
})->middleware('auth')->name('agent.dashboard');

// Agent Routes
Route::middleware('auth')->group(function () {
    Route::get('/agent/ticketsreview', [TicketController::class, 'index'])
        ->name('agent.ticketsreview');

    Route::post('/agent/ticket/{ticket}/status', [TicketController::class, 'updateStatus'])
        ->name('agent.ticket.status');
});

// User Dashboard
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/user/createticket', [TicketController::class, 'create'])
        ->name('user.createticket');

    Route::post('/user/ticket', [TicketController::class, 'store'])
        ->name('user.ticket.store');

    Route::get('/user/mytickets', [TicketController::class, 'myTickets'])
    ->middleware('auth')
    ->name('user.mytickets');

    Route::post('/ticket/{ticket}/document', [DocumentController::class, 'store'])
        ->middleware('auth')
        ->name('ticket.document.store');

});
