<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Backend\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NewsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = User::orderBy('id', 'desc')->with('news')->get();
        $news = News::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/News/index', compact('news', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = User::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/News/add', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News;

        $file = $request->file('file');
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $file->move(public_path('/uploads/News'), $fileName);
        $news->file = $fileName;

        $news->title = $request->title;
        $news->detail = $request->detail;
        $news->user_id = $request->user_id;
        $news->news_status = $request->news_status;
        $news->save();

        if ($news) {
            session()->flash('success', 'News successfully created!');
            return back();
        } else {
            session()->flash('error', 'News could not be created!');
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
        $newsEdit = News::findOrFail($id);
        if ($newsEdit->count() > 0) {
            $news = News::all();
            return view('backend/MyBackend/News/index', compact('user_id', 'news', 'newsEdit'));
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
    public function update(NewsRequest $request, $id)
    {
        $newsEdit = News::find($id);
        $newsEdit->title = $request->title;
        $newsEdit->detail = $request->detail;
        $newsEdit->user_id = $request->user_id;
        $newsEdit->news_status = $request->news_status;

        if ($request->file('file')) {
            if ($newsEdit->file != null) {
                unlink(public_path('/uploads/News/' . $newsEdit->file));
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $file->move(public_path('/uploads/News'), $fileName);
            $newsEdit->file = $fileName;
        } else {
            $newsEdit->file = $newsEdit->file;
        }

        if ($newsEdit) {
            $newsEdit->save();
            session()->flash('success', 'News updated successfully!');

            return redirect(route('news.index'));
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
        $news = News::findOrFail($id);
        $file_path = public_path() . '/uploads/News/' . $news->file;
        unlink($file_path);
        $news->delete();
        session()->flash('success', 'News successfully deleted!');
        return back();
    }

    public function status($id)
    {
        $news = News::find($id);

        if ($news->news_status == 'inactive') {
            $news->news_status = 'active';
            $news->save();
            session()->flash('success', 'News has been Activated!');
            return back();
        } else {
            $news->news_status = 'inactive';
            $news->save();
            session()->flash('success', 'News has been Deactivated!');
            return back();
        }
    }
}
