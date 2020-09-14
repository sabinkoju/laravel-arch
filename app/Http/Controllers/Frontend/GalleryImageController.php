<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\Gallery;
use App\Models\Backend\GalleryImage;
use App\Models\Backend\NavbarMenuType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function galleryView()
    {
        $navbarType = NavbarMenuType::all();
        $gallery_id = Gallery::orderBy('id', 'desc')->with('galleryImage')->get();
        $gallery = GalleryImage::paginate(5);
        return view('Frontend.Gallery.index', compact('gallery', 'navbarType', 'gallery_id'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
