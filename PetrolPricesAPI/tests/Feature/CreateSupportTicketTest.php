<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SupportTicket;

class CreateSupportTicketTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateSupportTicket()
    {
        // Przygotowanie danych zgłoszenia
        $ticketData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'Test Message',
        ];

        // Utworzenie zgłoszenia
        $ticket = SupportTicket::create($ticketData);

        // Pobranie utworzonego zgłoszenia
        $createdTicket = SupportTicket::find($ticket->id);

        // Sprawdzenie, czy zgłoszenie zostało poprawnie utworzone
        $this->assertEquals($ticketData['name'], $createdTicket->name);
        $this->assertEquals($ticketData['email'], $createdTicket->email);
        $this->assertEquals($ticketData['subject'], $createdTicket->subject);
        $this->assertEquals($ticketData['message'], $createdTicket->message);
    }
}
