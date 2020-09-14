<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Backend\Notice;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NoticeRequest;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = User::orderBy('id', 'desc')->with('notices')->get();
        $notice = Notice::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/Notice/index', compact('notice', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = User::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/Notice/add', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        $notice = new Notice;

        $file = $request->file('file');
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $file->move(public_path('/uploads/Notice'), $fileName);
        $notice->file = $fileName;

        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->user_id = $request->user_id;
        $notice->notice_date = $request->notice_date;
        $notice->display_order = $request->display_order;
        $notice->notice_status = $request->notice_status;
        $notice->save();

        if ($notice) {
            session()->flash('success', 'Notice successfully created!');
            return back();
        } else {
            session()->flash('error', 'Notice could not be created!');
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
        $noticeEdit = Notice::findOrFail($id);
        if ($noticeEdit->count() > 0) {
            $notice = Notice::all();
            return view('backend/MyBackend/Notice/index', compact('user_id', 'notice', 'noticeEdit'));
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
    public function update(NoticeRequest $request, $id)
    {
        $noticeEdit = Notice::find($id);
        $noticeEdit->title = $request->title;
        $noticeEdit->content = $request->content;
        $noticeEdit->user_id = $request->user_id;
        $noticeEdit->notice_date = $request->notice_date;
        $noticeEdit->display_order = $request->display_order;
        $noticeEdit->notice_status = $request->notice_status;

        if ($request->file('file')) {
            if ($noticeEdit->file != null) {
                unlink(public_path('/uploads/Notice/' . $noticeEdit->file));
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $file->move(public_path('/uploads/Notice'), $fileName);
            $noticeEdit->file = $fileName;
        } else {
            $noticeEdit->file = $noticeEdit->file;
        }

        if ($noticeEdit) {
            $noticeEdit->save();
            session()->flash('success', 'Notice updated successfully!');

            return redirect(route('notice.index'));
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
        $notice = Notice::findOrFail($id);
        $file_path = public_path() . '/uploads/Notice/' . $notice->file;
        unlink($file_path);
        $notice->delete();
        session()->flash('success', 'Notice successfully deleted!');
        return back();
    }

    public function status($id)
    {
        $notice = Notice::find($id);

        if ($notice->notice_status == 'inactive') {
            $notice->notice_status = 'active';
            $notice->save();
            session()->flash('success', 'Notice has been Activated!');
            return back();
        } else {
            $notice->notice_status = 'inactive';
            $notice->save();
            session()->flash('success', 'Notice has been Deactivated!');
            return back();
        }
    }
}
