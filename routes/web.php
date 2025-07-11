<?php

use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReunionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParticipantController;


use App\Http\Controllers\SalleController;


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

Route::get('/', function () {
    return view('users.reunions.home');
})->name('users.reunions.home');


Route::get('/users/reunions/documentation', function () {
    return view('users.reunions.documentation');
})->name('users.reunions.documentation');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// تعليم إشعار كمقروء
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::get('/notifications/index', [NotificationController::class, 'index'])->name('notifications.index');

// تعليم الكل كمقروء
Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
Route::middleware('preventIfAdminExists')->group(function () {
        Route::get('/register-admin', [AdminRegisterController::class, 'create'])->name('register.admin');
        Route::post('/register-admin', [AdminRegisterController::class, 'store'])->name('register.admin.store');
    });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users/reunions/semaine', [ReunionController::class, 'reunionsSemaine'])->name('users.reunions.semaine');
    Route::get('/users/reunions/semaine-prochaine', [ReunionController::class, 'reunionsSemaineProchaine'])->name('users.reunions.semaineProchaine');
    Route::get('/users/reunions/importantes', [ReunionController::class, 'reunionsImportantes'])->name('users.reunions.importantes');
Route::get('/users//reunions/search', [ReunionController::class, 'search'])->name('users.reunions.search');


});
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.Layout.app');
    })->name('dashboard');
    Route::resource('reunions', ReunionController::class);
    Route::resource('salles', SalleController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('participants', ParticipantController::class);
    Route::get('participants/create/{reunion_id}', [ParticipantController::class, 'create'])->name('participants.create');
  });



require __DIR__.'/auth.php';
