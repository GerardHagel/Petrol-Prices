<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function submitTicket(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $ticket = SupportTicket::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return response()->json(['message' => 'Zgłoszenie zostało utworzone.', 'ticket' => $ticket], 201);
    }

    public function getTickets()
    {
        $tickets = SupportTicket::latest()->get();

        return response()->json(['tickets' => $tickets]);
    }
}
