<?php

use App\Livewire\Auth\Clients\ClientsList;
use App\Livewire\Auth\Dashboard\Dashboard;
use App\Livewire\Auth\Finances\Index;
use App\Livewire\Auth\Loans\LoanDetails;
use App\Livewire\Auth\Loans\LoansList;
use App\Livewire\Auth\Loans\Request;
use App\Livewire\Guest\AuthPages\Login;
use App\Livewire\Guest\AuthPages\LoginRegister;
use App\Livewire\Auth\Profile\Profile;
use App\Livewire\Guest\AuthPages\Register;
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
    return view('guest.welcome');
});

// Route pour l'authentification
Route::middleware(['guest'])->group(function () {
    Route::get('/auth', LoginRegister::class)->name('auth');
    Route::get('/register/{id?}', LoginRegister::class)->name('register');
});

Auth::routes(
    [
        'verify' => true
    ]
);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('verified');
    Route::get('/profile', Profile::class)->name('profile')->middleware('verified');
    Route::get('/loans', LoansList::class)->name('loans')->middleware('verified');
    Route::get('/clients', ClientsList::class)->name('clients')->middleware('verified');
    Route::get('/finances', Index::class)->name('finances')->middleware('verified');
    Route::get('/loans/request', Request::class)->name('loans.request')->middleware('verified');
    Route::get('/loans/loan/{id}', LoanDetails::class)->name('loans.loan')->middleware('verified');
});

Route::get('/logout', [Login::class, 'logout'])->name('logout');

Auth::routes();


