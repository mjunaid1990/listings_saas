<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Public routes
Route::get('/plans', \App\Http\Livewire\PlanList::class)->name('plans.index');
Route::get('/subscriptions/create/{plan}', \App\Http\Livewire\SubscriptionForm::class)->name('subscriptions.create');

// Protected routes
Route::middleware(['auth'])->prefix('app')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Property management
    Route::get('/properties', [\App\Http\Controllers\PropertiesController::class, 'index'])->name('properties.index');
    Route::get('/properties/create', [\App\Http\Controllers\PropertiesController::class, 'create'])->name('properties.create');
    Route::get('/properties/{property}/edit', [\App\Http\Controllers\PropertiesController::class, 'edit'])->name('properties.edit');
    // Route::get('/properties/{property}', \App\Http\Livewire\Property\PropertyList::class)->name('properties.show');

    Route::get('/properties/{property}/leads', \App\Http\Livewire\Property\PropertyList::class)->name('properties.leads.index');
    Route::get('/properties/{property}/leads/create', \App\Http\Livewire\LeadForm::class)->name('properties.leads.create');
    Route::get('/properties/{property}/leads/{lead}/edit', \App\Http\Livewire\LeadForm::class)->name('properties.leads.edit');

    Route::get('/properties/{property}/photos', \App\Http\Livewire\PropertyPhotoList::class)->name('properties.photos.index');
    Route::get('/properties/{property}', [\App\Http\Controllers\PropertiesController::class, 'show'])->name('properties.show');

    // Property creation with listing limit check
    // Route::post('properties', [PropertyController::class, 'store'])->middleware('check-listing-limit');

    // Lead management
    Route::get('/leads', \App\Http\Livewire\LeadList::class)->name('leads.index');
    Route::get('/leads/create', \App\Http\Livewire\LeadForm::class)->name('leads.create');
    Route::get('/leads/{lead}/edit', \App\Http\Livewire\LeadForm::class)->name('leads.edit');
    
});

require __DIR__.'/auth.php';
