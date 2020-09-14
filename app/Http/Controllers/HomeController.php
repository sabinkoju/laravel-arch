<?php

namespace App\Http\Controllers;

use App\Repository\Roles\MenuRepository;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * @var MenuRepository
     */
    private $menuRepository;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        return view('backend.dashboard');
    }
}
