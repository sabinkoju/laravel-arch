<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class NavbarMenu extends Model
{
    protected $fillable = ['parent_id', 'navbar_menu_name', 'navbar_menu_type_id', 'page_slug_id', 'navbar_menus_status'];

    public function navbarMenuType()
    {
        return $this->belongsTo('App\Models\Backend\NavbarMenuType', 'navbar_menu_type_id', 'id');
    }

    public function pageSlug()
    {
        return $this->belongsTo('App\Models\Backend\Page', 'page_slug_id', 'id');
    }
}
