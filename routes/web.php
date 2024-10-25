<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassportController;
use App\Http\Middleware\CheckAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');


Route::resource('passports', PassportController::class)->middleware('checkAuth');
Route::get('/passport', [PassportController::class, 'index'])->name('passport.index');
Route::get('/passport/create', [PassportController::class,'create'])->name('passport.create')->middleware('checkAuth');
Route::post('/passport', [PassportController::class, 'store'])->name('passport.store');
Route::get('passport/show', [PassportController::class, 'show'])->name('passport.show');
Route::get('/passport/edit/{id}',[PassportController::class,'edit'])->name('edit')->middleware('checkAuth');
Route::delete('/passport/destroy/{id}', [PassportController::class, 'destroy'])->name('passports.destroy')->middleware('checkAuth');
