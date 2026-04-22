<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\MenuitemController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Staff\MenuItemController as StaffMenuItemController;


Route::get('/', function () {
    return redirect('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/staff-dashboard', function () {
    return view('staff-dashboard');
})->middleware(['auth']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {

    Route::get('/menu', [MenuitemController::class, 'index'])
        ->name('dashboard-order');

    Route::post('/order', [OrderController::class, 'store']);

    Route::get('/my-orders', [OrderController::class, 'myOrders']);
});



Route::prefix('staff')->middleware('auth')->group(function () {

    
    Route::get('/menu', [StaffMenuItemController::class, 'index'])->name('staff.menu.index');
    Route::get('/menu/create', [StaffMenuItemController::class, 'create']);
    Route::post('/menu', [StaffMenuItemController::class, 'store']);
    Route::get('/menu/{id}/edit', [StaffMenuItemController::class, 'edit']);
    Route::put('/menu/{id}', [StaffMenuItemController::class, 'update']);
    Route::delete('/menu/{id}', [StaffMenuItemController::class, 'destroy']);

    
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus']);
});



require __DIR__.'/auth.php';