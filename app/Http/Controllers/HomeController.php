<?php

namespace App\Http\Controllers;

use App\Models\Voters;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $voters = Voters::get();
        return view('home',[
            'data'=>$voters
        ]);
    }
}
