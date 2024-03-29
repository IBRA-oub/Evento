<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\CheckRole;

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

Route::group([], function() {
    Route::get('/', [EventController::class, 'closlyEvent'])->name('welcome');

    
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
    Route::get('/event-detaille/{id}', [EventController::class, 'evantDetailleAffichage'])->name('event.detaille');
    Route::get('/banned', [ClientController::class, 'banned'])->name('banned');
    Route::get('/filter-by-category', [EventController::class, 'filterByCategory'])->name('category.filter');
    Route::get('/search', [EventController::class, 'searchByTitle'])->name('category.search');
});


// ____________________client ticket_________________________

Route::middleware(['auth', CheckRole::class . ':client'])->group(function () {

    
    Route::get('/client-tickets', [ReservationController::class, 'clientTichketsAffichage'])->name('client-tickets');
    Route::get('/client-reservation', [ReservationController::class, 'clientReservation'])->name('client-reservation');
    Route::post('/reservation', [ReservationController::class, 'createReservation'])->name('reservation.create');
    Route::delete('/destroy-reservation/{id}/{eventId}', [ReservationController::class, 'destroy'])->name('destroy.reservation');

});

// ______________________organisateur pages________________________
Route::middleware(['auth', CheckRole::class . ':organisateur'])->group(function () {

    Route::get('/confirmation-tickets', [ReservationController::class, 'confirmationTickets'])->name('confirmation-tickets');
    Route::put('/accepted-reservation/{id}', [ReservationController::class, 'acceptedReservation'])->name('accepted.reservation');
    Route::put('/refused-event/{id}/{eventId}', [ReservationController::class, 'refusedReservation'])->name('refused.reservation');
    
    Route::get('/organisateur-dashboard', [OrganisateurController::class, 'dashboard'])->name('organisateur-dashboard');
    Route::get('/creat-event', [CategoryController::class, 'redCategoriesOrga'])->name('creat-event');
    
    Route::post('/event-store', [EventController::class, 'storeEvent'])->name('event.store');
    Route::get('/mes-events', [EventController::class, 'meEvents'])->name('me-events');
    Route::get('/edit-event/{id}', [EventController::class, 'editEvent'])->name('edit-event');
    Route::put('/update-event/{id}', [EventController::class, 'updateEvent'])->name('event.update');

});

// ________________________admin pages__________________________
Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/add-category', [AdminController::class, 'addCategories'])->name('add-category');
    Route::get('/users', [AdminController::class, 'allUsers'])->name('users');
    Route::put('/banned-user/{id}', [AdminController::class, 'banneUsers'])->name('banned.user');
    Route::put('/debanned-user/{id}', [AdminController::class, 'debanneUsers'])->name('debanned.user');
    Route::delete('/destroy-user/{id}', [AdminController::class, 'destroy'])->name('destroy.user');
    
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategories'])->name('edit-category');
    Route::post('/creat-category', [CategoryController::class, 'creatCategories'])->name('category.create');
    Route::put('/update-category/{id}', [CategoryController::class, 'updateCategories'])->name('category.update');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'destroyCategory'])->name('category.delete');
    Route::get('/categories', [CategoryController::class, 'redCategoriesAdmin'])->name('categories');
    
    Route::get('/confirmation-event', [EventController::class, 'confirmationEventPage'])->name('confirmation-event');
    Route::put('/accepted-event/{id}', [EventController::class, 'acceptedEvent'])->name('accepted.event');
    Route::put('/refused-event/{id}', [EventController::class, 'refusedEvent'])->name('refused.event');
});