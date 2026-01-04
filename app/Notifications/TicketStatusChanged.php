<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TicketStatusChanged extends Notification
{
    use Queueable;

    public function __construct(public Ticket $ticket) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'ticket_id' => $this->ticket->id,
            'status' => $this->ticket->status,
            'message' => "Your ticket '{$this->ticket->name}' is now {$this->ticket->status}",
        ];
    }
}
