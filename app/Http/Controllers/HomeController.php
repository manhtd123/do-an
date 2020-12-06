<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->department_id == 4) {
            return redirect()->route('booking.index');
        } else if (Auth::user()->department_id == 3) {
            return redirect()->route('chief.index');
        } else {
            return redirect()->route('menu.index');
        }
    }
}
