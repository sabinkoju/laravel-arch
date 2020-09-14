<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NavbarMenuTypeRequest;
use App\Models\Backend\NavbarMenuType;
use Illuminate\Http\Request;

class NavbarMenuTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navbarType = NavbarMenuType::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/NavbarMenuType/index', compact('navbarType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/MyBackend/NavbarMenuType/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NavbarMenuTypeRequest $request)
    {
        $create = NavbarMenuType::create($request->all());
        if ($create) {
            session()->flash('success', 'Navbar Menu Type successfully created!');
            return back();
        } else {
            session()->flash('error', 'Navbar Menu Type could not be created!');
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
        $navbarTypeEdit = NavbarMenuType::findOrFail($id);
        if ($navbarTypeEdit->count() > 0) {
            $navbarType = NavbarMenuType::all();
            return view('backend.MyBackend.NavbarMenuType.index', compact('navbarTypeEdit', 'gallery'));
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
    public function update(NavbarMenuTypeRequest $request, $id)
    {
        $navbarType = NavbarMenuType::find($id);

        $navbarType->type_name = $request->type_name;
        if ($navbarType) {
            $navbarType->fill($request->all())->save();
            session()->flash('success', 'Navbar Menu Type updated successfully!');

            return redirect(route('navbarMenuType.index'));
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
        $navbarType = NavbarMenuType::find($id);
        $navbarType->delete();
        session()->flash('success', 'Navbar Menu Type successfully deleted!');
        return back();
    }

    // public function navView()
    // {
    //     $navbarType = NavbarMenuType::all();
    //     return view('Frontend.layouts.nav');
    // }
}
