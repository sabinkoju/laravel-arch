<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Backend\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PostRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = User::orderBy('id', 'desc')->with('news')->get();
        $posts = Post::orderBy('id', 'desc')->get();
        return view('backend.MyBackend.Posts.index', compact('posts', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = User::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/Posts/add', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $posts = new Post;

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $photo = time() . '.' . $image->getClientOriginalExtension();
            $resize = Image::make($image);
            $resize->resize('600', '600')->save('uploads/Post/' . $photo);
            $posts->banner_image = $photo;
        }

        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->user_id = $request->user_id;
        $posts->posts_status = $request->posts_status;
        $posts->save();

        if ($posts) {
            session()->flash('success', 'Post successfully created!');
            return back();
        } else {
            session()->flash('error', 'Post could not be created!');
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
        $user_id = User::orderBy('id', 'desc')->get();
        $postEdit = Post::findOrFail($id);
        if ($postEdit->count() > 0) {
            $posts = Post::all();
            return view('backend/MyBackend/Posts/index', compact('user_id', 'posts', 'postEdit'));
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
    public function update(PostRequest $request, $id)
    {
        $postEdit = Post::find($id);
        $postEdit->title = $request->title;
        $postEdit->content = $request->content;
        $postEdit->user_id = $request->user_id;
        $postEdit->posts_status = $request->posts_status;

        if ($request->hasFile('banner_image')) {
            if ($postEdit->image != null) {
                unlink(public_path() . '/uploads/Post/' . $postEdit->banner_image);
            }
            $featured = $request->file('banner_image');
            $name = time() . '.' . $featured->getClientOriginalExtension();

            $resize = Image::make($featured);
            $resize->resize('600', '600')->save('uploads/Post/' . $name);

            $postEdit->banner_image = $name;
        } else {
            $postEdit->banner_image = $postEdit->banner_image;
        }

        if ($postEdit) {
            $postEdit->save();
            session()->flash('success', 'Post updated successfully!');

            return redirect(route('posts.index'));
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
        $posts = Post::findOrFail($id);
        $image_path = public_path() . '/uploads/Post/' . $posts->banner_image;
        unlink($image_path);
        $posts->delete();
        session()->flash('success', 'Post successfully deleted!');
        return back();
    }

    public function status($id)
    {
        $posts = Post::find($id);

        if ($posts->posts_status == 'inactive') {
            $posts->posts_status = 'active';
            $posts->save();
            session()->flash('success', 'Post has been Activated!');
            return back();
        } else {
            $posts->posts_status = 'inactive';
            $posts->save();
            session()->flash('success', 'Post has been Deactivated!');
            return back();
        }
    }
}
