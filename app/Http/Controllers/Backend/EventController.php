<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Backend\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = User::orderBy('id', 'desc')->with('events')->get();
        $events = Event::orderBy('id', 'desc')->get();
        return view('backend.MyBackend.Event.index', compact('events', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = User::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/Event/add', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $events = new Event;

        $events->title = $request->title;
        $events->start_date = $request->start_date;
        $events->end_date = $request->end_date;
        $events->start_time = $request->start_time;
        $events->end_time = $request->end_time;
        $events->venue = $request->venue;
        $events->user_id = $request->user_id;
        $events->events_status = $request->events_status;
        $events->save();

        if ($events) {
            session()->flash('success', 'Event successfully created!');
            return back();
        } else {
            session()->flash('error', 'Event could not be created!');
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
        $eventEdit = Event::findOrFail($id);
        if ($eventEdit->count() > 0) {
            $events = Event::all();
            return view('backend/MyBackend/Event/index', compact('user_id', 'events', 'eventEdit'));
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
    public function update(EventRequest $request, $id)
    {
        $eventEdit = Event::find($id);
        $eventEdit->title = $request->title;
        $eventEdit->start_date = $request->start_date;
        $eventEdit->end_date = $request->end_date;
        $eventEdit->start_time = $request->start_time;
        $eventEdit->end_time = $request->end_time;
        $eventEdit->venue = $request->venue;
        $eventEdit->user_id = $request->user_id;
        $eventEdit->events_status = $request->events_status;

        if ($eventEdit) {
            $eventEdit->save();
            session()->flash('success', 'Event updated successfully!');

            return redirect(route('events.index'));
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
        $events = Event::find($id);
        $events->delete();
        session()->flash('success', 'Event successfully deleted!');
        return back();
    }

    public function status($id)
    {
        $events = Event::find($id);

        if ($events->events_status == 'inactive') {
            $events->events_status = 'active';
            $events->save();
            session()->flash('success', 'Event has been Activated!');
            return back();
        } else {
            $events->events_status = 'inactive';
            $events->save();
            session()->flash('success', 'Event has been Deactivated!');
            return back();
        }
    }
}
