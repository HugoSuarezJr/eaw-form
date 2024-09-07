<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/clients/form', function () {
        return view('clients.form');
    })->name('form');

    Route::post('/clients', function () {
        request()->validate([
            'first-name' => ['required', 'max:255'],
            'last-name' => ['required', 'max:255'],
            'email' => ['required', 'string ', 'email', 'unique:users,email'],
            'country' => ['required', 'max:255'],
            'street-address' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'region' => ['required', 'max:255'],
            'postal-code' => ['required', 'max:255'],
            'heating-system' => ['required', Rule::in(['Hot Water', 'Steam'])],
        ]);

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

        return redirect('/clients');
    });

    Route::get('/clients', function () {
        $clients = Client::latest()->paginate(3);
        return view('clients.index', [
            'clients' => $clients
        ]);
    })->name('clients');

    Route::get('/clients/{id}', function ($id) {
        $client = Client::find($id);

        return view('clients.show', ['client' => $client]);
    });


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
