<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tnc;

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
        $users=User::all();
        $terms=Tnc::all();
        $cont=User::count();
        $contt=Tnc::count();
        return view('home', compact('users','terms','cont','contt'));
    }
}
