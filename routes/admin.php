<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DataHandleController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\User\RegisterAppointmentController;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Sensor;
use App\Models\User;
use App\Notifications\AppointmentResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'prevent_back_history'])->group(function () {
        Route::view('login', 'dashboard.admin.login', ['title' => 'Admin login'])->name('login');
        Route::post('check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::prefix('home')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('home');
            Route::get('calendar-table', [AdminController::class, 'appointmentCalendar'])->name('calendar-table');
            Route::get('calendar-table/{appointment}/edit', [PanelController::class, 'editCalendarView'])->name('edit-calendar-view');
            Route::get('filter-user', [DataHandleController::class, 'userFilter'])->name('filter-user');
            Route::get('filte-appointment', [DataHandleController::class, 'appointmentFilter'])->name('filter-appointment');
            Route::get('check-appointment/{appointment}', [AdminController::class, 'appointmentCheck'])->name('check-appointment');
            Route::get('appointment-confirm', [AdminController::class, 'appointmentConfirm'])->name('appointment-confirm');
            Route::get('user-table', [AdminController::class, 'manageUsers'])->name('user-table');
            Route::post('appointment-confirm', [AdminController::class, 'appointmentConfirmHandle'])->name('appointment-confirm-handle');
            Route::put('calendar-table/{appointment}', [PanelController::class, 'editCalendar'])->name('edit-calendar');
            Route::delete('calendar-table/{appointment}', [PanelController::class, 'deleteCalendar'])->name('del-calendar');
            Route::delete('user-table/{sensor}', [PanelController::class, 'delete'])->name('del-user');
        });
        Route::post('logout', [AdminController::class,'logout'])->name('logout');
    });
});
