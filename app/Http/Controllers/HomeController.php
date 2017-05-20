<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Session;
use Illuminate\Support\Facades\Input;
use App\Models\Company;

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
        if($_POST){
            Session::put('company', Input::get('empresa'));
            return view('home');
        }
        return view('home');
    }

    public function welcome(){

        $companies = Company::orderBy('id', 'ASC')->pluck('name', 'id');
        return view('welcome')->with('empresas', $companies);
    }

    public function mainConfigMenu(){
        return view('config_menu');
    }
}
