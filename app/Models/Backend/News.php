<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'detail', 'user_id', 'file', 'news_status'
    ];

    public function userType()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
