<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_title', 'content', 'slug', 'file', 'user_id', 'pages_status'
    ];

    public function navbarMenu()
    {
        return $this->hasMany('App\Models\Backend\NavbarMenu');
    }

    public function userType()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
