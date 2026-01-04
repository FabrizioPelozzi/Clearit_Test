<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\DocumentAdded;

class DocumentController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        if ($ticket->status !== 'in_progress') {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
        ]);

        Document::create([
            'ticket_id' => $ticket->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $agents = User::where('role', 'agent')->get();

        foreach ($agents as $agent) {
            $agent->notify(new DocumentAdded($ticket));
        }


        return back()->with('success', 'Document added');
    }
}
