<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemMateriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home', [
        'title' => 'Beranda',
        'active' => 'Home',
    ]);
});

Route::get('/login', function () {
    return view('login', [
        'title' => 'Login',
    ]);
})->middleware('guest')->name('login');

Route::get('/register', function () {
    return view('register', [
        'title' => 'Register',
    ]);
})->middleware('guest')->name('register');
Route::get('/aboutus', function () {
    return view('aboutus', [
        'title' => 'About Us | Teman Ambis',
    ]);
});

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/register', [UserController::class, 'insert'])->middleware('guest')->name('register');

Route::get('/materi/{materi:id}', [MateriController::class, 'index']);

Route::get('/tryout', function () {
    return view('tryout', [
        'title' => 'Tryout',
    ]);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/event', function () {
        return view('dashboard.event', [
            'events' => auth()->user()->event,
        ]);
    })->name('dashboard');

    Route::get('/admin/event/add/{user:id}', [AdminController::class, 'addEvent']);
    Route::post('/admin/event/add/{user:id}', [AdminController::class, 'addEventSubmit']);

    Route::get('/admin/event/edit/{event:id}', [AdminController::class, 'editEvent']);
    Route::post('/admin/event/edit/{event:id}', [AdminController::class, 'editEventSubmit']);

    Route::get('/admin/event/delete/{event:id}', [AdminController::class, 'deleteEvent']);

    Route::get('/admin/materi/{materi:id}', [ItemMateriController::class, 'index']);

    Route::get('/admin/materi/{materi:id}/add', [ItemMateriController::class, 'addItemMateri']);
    Route::post('/admin/materi/{materi:id}/add', [ItemMateriController::class, 'addItemMateriSubmit']);

    Route::get('/admin/materi/{materi:id}/edit/{itemmateri:id}', [ItemMateriController::class, 'editItemMateri']);
    Route::post('/admin/materi/{materi:id}/edit/{itemmateri:id}', [ItemMateriController::class, 'editItemMateriSubmit']);

    Route::get('/admin/materi/{materi:id}/delete/{itemmateri:id}', [ItemMateriController::class, 'deleteItemMateri']);

    Route::get('admin/users', [AdminController::class, 'index']);

    Route::get('/admin/users/add/', [AdminController::class, 'addUser']);
    Route::post('/admin/users/add/', [AdminController::class, 'addUserSubmit']);

    Route::get('/admin/users/edit/{user:id}', [AdminController::class, 'editUser']);
    Route::post('/admin/users/edit/{user:id}', [AdminController::class, 'editUserSubmit']);

    Route::get('/admin/users/delete/{user:id}', [AdminController::class, 'deleteUser']);
});
