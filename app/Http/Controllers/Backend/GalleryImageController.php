<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\GalleryImage;
use App\Models\Backend\Gallery;
use App\Http\Requests\Backend\GalleryImageRequest;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_id = Gallery::orderBy('id', 'desc')->with('galleryImage')->get();
        $galleryImage = GalleryImage::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/GalleryImage/index', compact('galleryImage', 'gallery_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery_id = Gallery::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/GalleryImage/add', compact('gallery_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryImageRequest $request)
    {
        $galleryImage = new GalleryImage;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $photo = time() . '.' . $image->getClientOriginalExtension();
            $resize = Image::make($image);
            $resize->save('uploads/Gallery/' . $photo);
            $galleryImage->image = $photo;
        }
        $galleryImage->title = $request->title;
        $galleryImage->display_order = $request->display_order;
        $galleryImage->gallery_id = $request->gallery_id;
        $galleryImage->gallery_image_status = $request->gallery_image_status;
        $galleryImage->save();

        if ($galleryImage) {
            session()->flash('success', 'Gallery Image successfully created!');
            return back();
        } else {
            session()->flash('error', 'Gallery Image could not be created!');
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
        // $id = (int)$id;
        $gallery_id = Gallery::orderBy('id', 'desc')->get();
        $galleryImageEdit = GalleryImage::findOrFail($id);
        if ($galleryImageEdit->count() > 0) {
            $galleryImage = GalleryImage::all();
            return view('backend.MyBackend.GalleryImage.index', compact('galleryImageEdit', 'galleryImage', 'gallery_id'));
        } else {
            session()->flash('error', 'Id could not be obtained!');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryImageRequest $request, $id)
    {
        $galleryImageEdit = GalleryImage::find($id);

        if ($request->hasFile('image')) {
            if ($galleryImageEdit->image != null) {
                unlink(public_path() . '/uploads/Gallery/' . $galleryImageEdit->image);
            }
            $featured = $request->file('image');
            $name = time() . '.' . $featured->getClientOriginalExtension();

            $resize = Image::make($featured);
            $resize->save('uploads/Gallery/' . $name);

            $galleryImageEdit->image = $name;
        } else {
            $galleryImageEdit->image = $galleryImageEdit->image;
        }

        $galleryImageEdit->title = $request->title;
        $galleryImageEdit->display_order = $request->display_order;
        $galleryImageEdit->gallery_id = $request->gallery_id;
        $galleryImageEdit->gallery_image_status = $request->gallery_image_status;

        if ($galleryImageEdit) {
            $galleryImageEdit->save();
            session()->flash('success', 'Gallery Image updated successfully!');

            return redirect(route('galleryImage.index'));
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
        $galleryImage = GalleryImage::findOrFail($id);
        $image_path = public_path() . '/uploads/Gallery/' . $galleryImage->image;
        unlink($image_path);
        $galleryImage->delete();
        session()->flash('success', 'Gallery Image successfully deleted!');
        return back();
    }

    public function status($id)
    {
        $galleryImage = GalleryImage::find($id);

        if ($galleryImage->gallery_image_status == 'inactive') {
            $galleryImage->gallery_image_status = 'active';
            $galleryImage->save();
            session()->flash('success', 'Gallery Image has been Activated!');
            return back();
        } else {
            $galleryImage->gallery_image_status = 'inactive';
            $galleryImage->save();
            session()->flash('success', 'Gallery Image has been Deactivated!');
            return back();
        }
    }
}
