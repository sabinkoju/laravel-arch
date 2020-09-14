<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class NavbarMenuType extends Model
{
    protected $fillable = ['type_name'];

    public function navbarMenu()
    {
        return $this->hasMany('App\Models\Backend\NavbarMenu');
    }
}
