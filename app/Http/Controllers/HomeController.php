<?php

namespace App\Http\Controllers;

use App\Models\CeoTeam;
use App\Models\ContactUs;
use App\Models\Images;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Study;
use App\Models\User;
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
        $user=User::whereNot('email','masud@diu.ac')->count();
        $contact=ContactUs::count();
        $slider=Slider::count();
        $study=Study::count();
        $gallery=Images::whereNull('study_id')->count();
        $image=Images::count();
        $team=CeoTeam::where('type','TEAM')->count();
        $service=Service::count();
        return view('home',compact('user','contact','slider','study','gallery','image','team','service'));
    }
}
