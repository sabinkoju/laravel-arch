<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['title', 'image', 'display_order', 'gallery_id', 'gallery_image_status'];

    public function galleryType()
    {
        return $this->belongsTo('App\Models\Backend\Gallery', 'gallery_id', 'id');
    }
}
