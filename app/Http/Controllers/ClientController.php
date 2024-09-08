<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of clients.
     */
    public function index()
    {
        $clients = Client::latest()->paginate(3);
        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view('clients.form');
    }

    /**
     * Store a newly created client in MYSQL database.
     */
    public function store()
    {
        // Data validation proccess
        request()->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'string ', 'email', 'unique:users,email'],
            'country' => ['required', 'max:255'],
            'street_address' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'region' => ['required', 'max:255'],
            'postal_code' => ['required', 'max:255'],
            'heating_system' => ['required', Rule::in(['Hot Water', 'Steam'])],
        ]);

        // Eloquent ORM for creating and storing client data
        Client::create([
            'name' => request('first_name') . " " . request('last_name'),
            'email' => request('email'),
            'country' => request('country'),
            'street_address' => request('street_address'),
            'city' => request('city'),
            'region' => request('region'),
            'postal_code' => request('postal_code'),
            'heating_system' => request('heating_system'),
        ]);

        return redirect('/clients')->with('success', 'New Client has been added!');
    }

    /**
     * Display the specified client.
     */
    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Future Feature
     * Show the form for editing the specified client.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Future Feature
     * Update the specified client in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Future Feature
     * Remove the specified client from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
