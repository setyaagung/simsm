<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
        'user_id', 'inbox_received_date', 'inbox_agenda_number',
        'inbox_date', 'inbox_address', 'inbox_number', 'subject',
        'description', 'file'
    ];
}
