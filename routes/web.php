<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if (!Auth::user()) {
        return view('login');
    } else {
        return redirect()->route('departments');
    }
});

Route::middleware('auth')->group(function () {

    Route::get('/departments', function () {
        return view('sections.departments', ['title' => 'Departments']);
    })->name('departments');

    Route::get('/sites', function () {
        return view('sections.sites', ['title' => 'Sites']);
    })->name('sites');

    Route::get('/customers', function () {
        return view('sections.customers', ['title' => 'Customers']);
    })->name('customers');














    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});
