<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'start_date', 'end_date', 'start_time', 'end_time', 'user_id', 'venue', 'events_status'
    ];

    public function userType()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
