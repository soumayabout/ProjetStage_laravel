<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashbordsController;
use App\Http\Controllers\divisionController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilsController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\SettingsController;

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

Route::get('/home', function () {
    return view('home');
});

Route::redirect('/','/login');
Route::redirect('/home', '/dashboard');


Auth::routes();

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//dashboard
Route::get('/dashboard', [DashbordsController::class, 'index'])->middleware(['auth', 'role:admin'])->name('log');
Route::get('/dashboard', [DashbordsController::class, 'index'])->middleware(['auth', 'role:user'])->name('log');

//profilUsers
Route::get('/Profil', [ProfilsController::class, 'index'])->name('profil');

// Routes pour les réunions
Route::get('/reunions', [ReunionController::class, 'index'])->name('reuniones.index');
Route::get('/reunions/create', [ReunionController::class, 'create'])->name('reuniones.create');
Route::post('/reunions', [ReunionController::class, 'store'])->name('reuniones.store');
Route::get('/reunions/{reunion}', [ReunionController::class, 'show'])->name('reuniones.show');
Route::get('/reunions/{reunion}/edit', [ReunionController::class, 'edit'])->name('reuniones.edit');
Route::put('/reunions/{reunion}', [ReunionController::class, 'update'])->name('reuniones.update');
Route::delete('/reunions/{reunion}', [ReunionController::class, 'destroy'])->name('reuniones.destroy');
Route::delete('/reuniones/{id}', [ReunionController::class, 'destroy'])->name('reuniones.destroy');
Route::post('/reunions/rechercher', [ReunionController::class, 'rechercher'])->name('reuniones.rechercher');
// Route::get('/reuniones/fichier/{id}', [ReunionController::class, 'fichier'])->name('reuniones.fichier');
Route::get('/reunions/{reunionId}/datafichier', [ReunionController::class, 'datafichier'])->name('reuniones.datafichier');
Route::get('/reunions/{reunion}/download', [ReunionController::class, 'download'])->name('download');
Route::post('/reuniones/upload', [ReunionController::class, 'upload'])->name('upload');

Route::get('/app-calendar', [ReunionController::class, 'calendar'])->name('reuniones.calendar');
Route::get('/divisiones', [divisionController::class, 'index'])->name('divisiones.index');
Route::post('/divisiones', [DivisionController::class, 'store'])->name('divisions.store');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::put('/languages/update', [SettingsController::class, 'update'])->name('languages.update');
Route::get('/facture', [FactureController::class, 'index'])->name('factures.index');



