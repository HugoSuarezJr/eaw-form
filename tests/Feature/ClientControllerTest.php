<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_the_clients_list()
    {

        // Create some clients
        Client::factory()->count(5)->create();

        $user = User::factory()->create();

        // Send a GET request to the clients index route
        $response = $this->actingAs($user)->get(route('clients.index'));

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the view contains the clients data
        $response->assertViewHas('clients');
    }

    public function test_it_displays_the_create_client_form()
    {
        $user = User::factory()->create();


        // Send a GET request to the clients create route
        $response = $this->actingAs($user)->get('/clients/create');

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the correct view is rendered
        $response->assertViewIs('clients.form');
    }

    public function test_it_stores_a_new_client_and_redirects()
    {
        // Prepare valid client data
        $clientData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'country' => 'USA',
            'street_address' => '123 Main St',
            'city' => 'New York',
            'region' => 'NY',
            'postal_code' => '10001',
            'heating_system' => 'Hot Water',
        ];

        $user = User::factory()->create();

        // Send a POST request to the clients store route
        $response = $this->actingAs($user)->post('/clients', $clientData);

        // Assert that the client was successfully added to the database
        $this->assertDatabaseHas('clients', [
            'email' => 'john.doe@example.com',
        ]);

        // Assert that the user is redirected to the clients index page with a success message
        $response->assertRedirect('/clients');
        $response->assertSessionHas('success', 'New Client has been added!');
    }

    public function test_it_validates_client_data_before_storing()
    {
        // Prepare invalid client data (missing required fields)
        $invalidClientData = [
            'first_name' => '', // Required field
            'email' => 'invalid-email', // Invalid email format
        ];

        $user = User::factory()->create();

        // Send a POST request to the clients store route with invalid data
        $response = $this->actingAs($user)->post('/clients', $invalidClientData);

        // Assert that validation errors exist for the required fields
        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'country']);
    }

    public function test_it_displays_a_single_client()
    {
        // Create a new client
        $client = Client::factory()->create();

        $user = User::factory()->create();

        // Send a GET request to the clients show route
        $response = $this->actingAs($user)->get('/clients/' . $client->id);

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the view contains the client data
        $response->assertViewHas('client', $client);
    }
}
