<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

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
        $categories = DB::table('categories')->get();
        return view('home1', compact('categories'));
    }

    public function categories()
    {
        return view('categories');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function admin() 
    {
        return view('admin');
    }
}
