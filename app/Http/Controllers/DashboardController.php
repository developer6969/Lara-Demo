<?php

namespace App\Http\Controllers;

use App\Clinic;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        // $data = array(
        //     'title' => 'Laravel Services',
        //     'clinics' => Clinic::all(),
            
        // );
        // return view('dashboard')->with($data);
        return view('dashboard');
    }
}
