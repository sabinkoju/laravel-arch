<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title', 'content', 'file', 'user_id', 'notice_date', 'display_order', 'notice_status'
    ];

    public function userType()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
