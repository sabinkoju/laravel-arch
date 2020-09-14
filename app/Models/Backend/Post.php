<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id', 'banner_image', 'posts_status'
    ];

    public function userType()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
