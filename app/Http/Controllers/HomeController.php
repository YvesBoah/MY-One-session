<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flashy;
use App\User;
use Auth;
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

            $a = Auth::user()->session_id;
            // dd($a);
        if ($a = '') {
           Flashy::message('vous allez etre déconnecté car vous êtes connecté sur un autre navigateur !');
           return redirect()->to('/login');

        } else {
                         Flashy::message('Tout vas bien !');
        return view('home');
        }
        // Flashy::message('Vous êtes connecté!');
        // return Redirect()->route('home');
    }

     public function session(Request $request)
    {

            $msg = Auth::user()->session_id;
       
        if ($msg != ''){

       return response()->json(['msg'=>$msg]);
        }else{
       return response()->json(['msg'=>'Vous serrez déconnecté dans quelques instants']);

        }
    }


}