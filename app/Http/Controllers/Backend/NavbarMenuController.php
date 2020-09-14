<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Page;
use App\Models\Backend\NavbarMenu;
use App\Models\Backend\NavbarMenuType;
use App\Http\Requests\Backend\NavbarMenuRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavbarMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navbarType = NavbarMenuType::orderBy('id', 'desc')->with('navbarMenu')->get();
        $pageSlug = Page::orderBy('id', 'desc')->get();
        $navbar = NavbarMenu::orderBy('id', 'desc')->get();
        $parentList = NavbarMenu::select('id', 'navbar_menu_name')->orderBy('id', 'DESC')->get();
        return view('backend/MyBackend/NavbarMenu/index', compact('navbar', 'navbarType', 'pageSlug', 'parentList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageSlug = Page::orderBy('id', 'desc')->get();
        $navbarType = NavbarMenuType::orderBy('id', 'desc')->get();
        return view('backend/MyBackend/NavbarMenu/add', compact('navbarType', 'pageSlug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NavbarMenuRequest $request)
    {
        // $navbar = new NavbarMenu;

        if ($request['parent_id'] == null) {
            $request['parent_id'] = 0;
        }
        // dd($request);

        $create = NavbarMenu::create($request->all());
        if ($create) {
            session()->flash('success', 'Navbar Menu successfully created');
            return back();
        } else {
            session()->flash('error', 'Navbar Menu could not be created');
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
        $navbarEdit = NavbarMenu::findOrFail($id);
        $pageSlug = Page::orderBy('id', 'desc')->get();
        $navbarType = NavbarMenuType::orderBy('id', 'desc')->get();

        if (!empty($navbarEdit)) {
            $parentList = NavbarMenu::select('id', 'navbar_menu_name')->orderBy('id', 'DESC')->get();
            $parentList[0]['id'] = 0;
            $parentList[0]['navbar_menu_name'] = 'Parent';
            $navbar = NavbarMenu::all();

            return view('backend/MyBackend/NavbarMenu/index', compact('navbar', 'parentList', 'navbarEdit', 'navbarType', 'pageSlug'));
        } else {
            session()->flash('error', 'Id could not be obtained');
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
    public function update(NavbarMenuRequest $request, $id)
    {
        $navbar = NavbarMenu::find($id);

        $navbar->navbar_menu_name = $request->navbar_menu_name;
        // dd($navbar->navbar_menu_name);
        $navbar->navbar_menu_type_id = $request->navbar_menu_type_id;
        $navbar->page_slug_id = $request->page_slug_id;
        $navbar->navbar_menus_status = $request->navbar_menus_status;

        if ($navbar) {
            $navbar->save();
            session()->flash('success', 'Navbar Menu updated successfully!');

            return redirect(route('navbarMenu.index'));
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
        $navbar = NavbarMenu::findOrFail($id);
        $navbar->delete();
        session()->flash('success', 'Navbar Menu successfully deleted!');
        return back();
    }

    public function status($id)
    {
        $navbar = NavbarMenu::find($id);

        if ($navbar->navbar_menus_status == 'inactive') {
            $navbar->navbar_menus_status = 'active';
            $navbar->save();
            session()->flash('success', 'Navbar Menu has been Activated!');
            return back();
        } else {
            $navbar->navbar_menus_status = 'inactive';
            $navbar->save();
            session()->flash('success', 'Navbar Menu has been Deactivated!');
            return back();
        }
    }
}
