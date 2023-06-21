<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;

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
    public function dashbord_user()
    {
        return redirect('/get_info_profil');
    }

    public function registered_activation()
    {
        return view('registered');
    }
    
}