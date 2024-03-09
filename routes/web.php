<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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
    Route::get('/creat-event', [CategoryController::class, 'redCategoriesOrga'])->name('creat-event');
    Route::post('/event-store', [EventController::class, 'storeEvent'])->name('event.store');
    Route::get('/mes-events', [EventController::class, 'meEvents'])->name('me-events');
    Route::get('/edit-event/{id}', [EventController::class, 'editEvent'])->name('edit-event');
    Route::put('/update-event/{id}', [EventController::class, 'updateEvent'])->name('event.update');

});

// ________________________admin pages__________________________
Route::group([], function() {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/confirmation-event', [AdminController::class, 'confirmationEvent'])->name('confirmation-event');
    Route::get('/add-category', [AdminController::class, 'addCategories'])->name('add-category');
    Route::get('/users', [AdminController::class, 'allUsers'])->name('users');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategories'])->name('edit-category');
    Route::post('/creat-category', [CategoryController::class, 'creatCategories'])->name('category.create');
    Route::put('/update-category/{id}', [CategoryController::class, 'updateCategories'])->name('category.update');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'destroyCategory'])->name('category.delete');
    Route::get('/categories', [CategoryController::class, 'redCategoriesAdmin'])->name('categories');
    
});