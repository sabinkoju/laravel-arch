<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Backend\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PageRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = User::orderBy('id', 'desc')->with('pages')->get();
        $pages = Page::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/Pages/index', compact('pages', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = User::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/Pages/add', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $pages = new Page;

        $file = $request->file('file');
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $file->move(public_path('/uploads/Pages'), $fileName);
        $pages->file = $fileName;

        $pages->page_title = $request->page_title;
        $pages->content = $request->content;
        $pages->slug = $request->slug;
        $pages->user_id = $request->user_id;
        $pages->pages_status = $request->pages_status;
        $pages->save();

        if ($pages) {
            session()->flash('success', 'Page successfully created!');
            return back();
        } else {
            session()->flash('error', 'Page could not be created!');
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
        $pagesEdit = Page::findOrFail($id);
        if ($pagesEdit->count() > 0) {
            $pages = Page::all();
            return view('backend/MyBackend/Pages/index', compact('user_id', 'pages', 'pagesEdit'));
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
    public function update(PageRequest $request, $id)
    {
        $pagesEdit = Page::find($id);
        $pagesEdit->page_title = $request->page_title;
        $pagesEdit->content = $request->content;
        $pagesEdit->slug = $request->slug;
        $pagesEdit->user_id = $request->user_id;
        $pagesEdit->pages_status = $request->pages_status;

        if ($request->file('file')) {
            if ($pagesEdit->file != null) {
                unlink(public_path('/uploads/Pages/' . $pagesEdit->file));
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $file->move(public_path('/uploads/Pages'), $fileName);
            $pagesEdit->file = $fileName;
        } else {
            $pagesEdit->file = $pagesEdit->file;
        }

        if ($pagesEdit) {
            $pagesEdit->save();
            session()->flash('success', 'Page updated successfully!');

            return redirect(route('pages.index'));
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
        $pages = Page::findOrFail($id);
        $file_path = public_path() . '/uploads/Pages/' . $pages->file;
        unlink($file_path);
        $pages->delete();
        session()->flash('success', 'Page successfully deleted!');
        return back();
    }

    public function status($id)
    {
        $pages = Page::find($id);

        if ($pages->pages_status == 'inactive') {
            $pages->pages_status = 'active';
            $pages->save();
            session()->flash('success', 'Page has been Activated!');
            return back();
        } else {
            $pages->pages_status = 'inactive';
            $pages->save();
            session()->flash('success', 'Page has been Deactivated!');
            return back();
        }
    }
}
