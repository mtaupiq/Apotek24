<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apotek;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apotek = Apotek::all();
        return view('home', compact('apotek'));
    }
    public function tentang()
    {
        return view('about');
    }
}
