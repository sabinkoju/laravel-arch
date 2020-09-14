<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GalleryRequest;
use App\Models\Backend\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/Gallery/index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/MyBackend/Gallery/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $create = Gallery::create($request->all());
        if ($create) {
            session()->flash('success', 'Gallery successfully created!');
            return back();
        } else {
            session()->flash('error', 'Gallery could not be created!');
            return back();
        }
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
        $id = (int)$id;
        $galleryEdit = Gallery::findOrFail($id);
        if ($galleryEdit->count() > 0) {
            $gallery = Gallery::all();
            return view('backend.MyBackend.Gallery.index', compact('galleryEdit', 'gallery'));
        } else {
            session()->flash('error', 'Id could not be obtained!');
            return back();
        }

        // $gallery = Gallery::findOrFail($id);
        // return view('backend/MyBackend/Gallery/edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::find($id);

        $gallery->gallery_name = $request->gallery_name;
        if ($gallery) {
            $gallery->fill($request->all())->save();
            session()->flash('success', 'Gallery updated successfully!');

            return redirect(route('gallery.index'));
        } else {

            session()->flash('error', 'No record with given id!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        session()->flash('success', 'Gallery successfully deleted!');
        return back();
    }
}
