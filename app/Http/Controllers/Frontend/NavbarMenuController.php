<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\News;
use App\Models\Backend\Post;
use App\Models\Backend\Page;
use App\Models\Backend\Event;
use App\Models\Backend\Notice;
use App\Models\Backend\Gallery;
use App\Models\Backend\NavbarMenu;
use App\Models\Backend\NavbarMenuType;
use App\Http\Controllers\Controller;
use App\Models\Backend\GalleryImage;
use Illuminate\Http\Request;

class NavbarMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function navbarMenu()
    // {
    //     $navbarMenu = NavbarMenuType::with('navbarMenu')->get();

    //     return view('Frontend.navbarMenuType', compact('navbarMenu'));
    // }

    public function index($slug)
    {
        if ($slug == 'News') {
            $navbarType = NavbarMenuType::with('navbarMenu')->get();
            $news = News::paginate(5);
            return view('Frontend.News.index', compact('news', 'navbarType'));
        } elseif ($slug == 'Post') {
            $navbarType = NavbarMenuType::with('navbarMenu')->get();
            $post = Post::paginate(5);
            return view('Frontend.Post.index', compact('post', 'navbarType'));
        } elseif ($slug == 'Event') {
            $navbarType = NavbarMenuType::with('navbarMenu')->get();
            $events = Event::paginate(3);
            return view('Frontend.Event.index', compact('events', 'navbarType'));
        } elseif ($slug == 'Notice') {
            $navbarType = NavbarMenuType::with('navbarMenu')->get();
            $notice = Notice::paginate(5);
            return view('Frontend.Notice.index', compact('notice', 'navbarType'));
        } elseif ($slug == 'Gallery') {
            $navbarType = NavbarMenuType::with('navbarMenu')->get();
            $gallery = GalleryImage::paginate(5);
            return view('Frontend.Gallery.index', compact('gallery', 'navbarType'));
        }
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
