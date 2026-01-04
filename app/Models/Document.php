<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'ticket_id',
        'title',
        'content',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
