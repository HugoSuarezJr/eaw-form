<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/clients', function () {
        return view('clients.index');
    })->name('clients');

    Route::get('/clients/form', function () {
        // validation

        Client::create([
            'name' => request('first-name') . request('last-name'),
            'email' => request('email'),
            'country' => request('country'),
            'street_address' => request('street-address'),
            'city' => request('city'),
            'region' => request('region'),
            'postal_code' => request('postal-code'),
            'heating_system' => request('heating-system'),
        ]);
    })->name('form');

    Route::post('/clients', function () {
        dd(request()->all());
    })->name('form');

    Route::get('/clients/{id}', function ($id) {
        dd($id);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
