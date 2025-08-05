<?php
// routes/web.php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleAssignmentController;
use App\Http\Controllers\PermissionAssignmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', \App\Http\Middleware\ScopeBouncer::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('can:manage-users')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('roles', RoleController::class)->except(['show']);
        Route::resource('permissions', PermissionController::class)->except(['show']);
        Route::get('/role-assignments', [RoleAssignmentController::class, 'index'])->name('role-assignments.index');
        Route::post('/role-assignments/assign', [RoleAssignmentController::class, 'assign'])->name('role-assignments.assign');
        Route::post('/role-assignments/revoke', [RoleAssignmentController::class, 'revoke'])->name('role-assignments.revoke');
        Route::get('/permission-assignments', [PermissionAssignmentController::class, 'index'])->name('permission-assignments.index');
        Route::match(['get', 'post'], '/permission-assignments/assign', [PermissionAssignmentController::class, 'assign'])->name('permission-assignments.assign');
        Route::post('/permission-assignments/revoke', [PermissionAssignmentController::class, 'revoke'])->name('permission-assignments.revoke');
    });

    Route::get('/rooms/search', [RoomController::class, 'search'])->middleware('can:book-rooms');
    Route::post('/bookings', [BookingController::class, 'store'])->middleware('can:book-rooms');
});

require __DIR__.'/auth.php';