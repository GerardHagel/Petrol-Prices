<?php

namespace Tests\Feature;

use App\Http\Controllers\SupportTicketController;
use App\Models\SupportTicket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class SupportTicketControllerTest extends TestCase
{
    use RefreshDatabase;


    public function testSubmitSupportTicket()
    {
        $requestData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'Test Message',
        ];

        $response = $this->json('POST', '/submit-ticket', $requestData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Zgłoszenie zostało utworzone.',
            ])
            ->assertJsonStructure([
                'message',
                'ticket' => [
                    'name',
                    'email',
                    'subject',
                    'message',
                ],
            ]);
    }


    public function testGetsSupportTicket()
    {
        $tickets = SupportTicket::factory(3)->create();

        $response = $this->json('GET', '/get-tickets');

        $response->assertStatus(200)
            ->assertJson([
                'tickets' => $tickets->toArray(),
            ]);
    }
}


