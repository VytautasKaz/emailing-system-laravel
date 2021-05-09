<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TemplateController;

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
    return view('home');
})->name('home');

// Route::get('/preview', [CustomerController::class, 'preview'])->name('customers.preview');
// Route::get('/test-email', [MailController::class, 'sendEmail'])->name('test-email');
// Route::resource('customers', CustomerController::class);
// Route::resource('templates', TemplateController::class);

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/preview', [CustomerController::class, 'preview'])->name('customers.preview');
    Route::get('/test-email', [MailController::class, 'sendEmail'])->name('test-email');
    Route::resource('customers', CustomerController::class);
    Route::resource('templates', TemplateController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/{any}', function () {
    return view('404');
})->where('any', '.*');
