<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Notifications\TicketStatusChanged;

class TicketController extends Controller
{
    public function create()
    {
        return view('user.createticket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'ticket_type' => 'required',
            'transport_mode' => 'required',
            'product' => 'required|string|max:250',
            'origin_country' => 'required|string|max:100',
            'destination_country' => 'required|string|max:100',
        ]);

        Ticket::create([
            'name' => $request->name,
            'ticket_type' => $request->ticket_type,
            'transport_mode' => $request->transport_mode,
            'product' => $request->product,
            'origin_country' => $request->origin_country,
            'destination_country' => $request->destination_country,
            'status' => 'new',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('user.dashboard')
            ->with('success', 'Ticket created successfully');
    }

    public function index()
    {
        $tickets = Ticket::with('user')->latest()->get();
        return view('agent.ticketsreview', compact('tickets'));
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,completed'
        ]);
    
        $ticket->update([
            'status' => $request->status
        ]);
    
        $ticket->user->notify(new TicketStatusChanged($ticket));
    
        return back()->with('success', 'Status updated');
    }

    public function myTickets()
{
        $tickets = auth()->user()
            ->tickets()
            ->with('documents')
            ->get();

        return view('user.mytickets', compact('tickets'));
    }
}
