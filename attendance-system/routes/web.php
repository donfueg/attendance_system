<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redirect root URL to dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Authentication routes
Auth::routes();

// Protected routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AttendanceController::class, 'index'])->name('dashboard');
    Route::post('/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.checkin');
    Route::post('/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.checkout');
});
