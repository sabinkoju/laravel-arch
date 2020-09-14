<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['gallery_name'];

    public function galleryImage()
    {
        return $this->hasMany('App\Models\Backend\GalleryImage');
    }
}
