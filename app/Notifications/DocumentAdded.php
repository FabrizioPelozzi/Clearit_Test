<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DocumentAdded extends Notification
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
            'message' => "New documentation added to ticket '{$this->ticket->name}'",
        ];
    }
}
