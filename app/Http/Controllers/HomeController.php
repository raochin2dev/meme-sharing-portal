<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    /* Welcome Page of the application */
    public function welcome(){
        
        $memes = Meme::latest()->get();

        return view('welcome',compact('memes'));
    
    }
    

}
