<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrganisateurController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// _________________les pages le client peut consulter_________________
Route::group([], function() {
    
    Route::get('/all-event', [EventController::class, 'allEvantAffichage'])->name('all-event');
    Route::get('/event-detaille', [EventController::class, 'evantDetailleAffichage'])->name('event-detaille');
});


// ____________________client ticket_________________________

Route::group([], function() {

    Route::get('/client-tickets', [ClientController::class, 'clientTichketsAffichage'])->name('client-tickets');

});

// ______________________organisateur pages________________________
Route::group([], function() {

    Route::get('/organisateur-dashboard', [OrganisateurController::class, 'dashboard'])->name('organisateur-dashboard');
    Route::get('/confirmation-tickets', [OrganisateurController::class, 'confirmationTickets'])->name('confirmation-tickets');
    Route::get('/creat-event', [EventController::class, 'createEvent'])->name('creat-event');
    Route::get('/mes-events', [EventController::class, 'meEvents'])->name('me-events');

});