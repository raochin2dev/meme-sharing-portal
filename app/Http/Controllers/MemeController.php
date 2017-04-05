<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Meme;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MemeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth'); // Authorize the user
    }

    /* Show All User Specific Memes */
    public function index()
    {
        $memes = User::find(Auth::user()->id)->memes;

        return view('memes.index',compact('memes'));
    }

    /* Show Dashboard for a User */
    public function dashboard()
    {   
        $memes = User::find(Auth::user()->id)->memes;

        return view('memes.dashboard',compact('memes'));
    }


    /* Save Single Meme */
    public function store(Request $request)
    {
        
         $this->validate($request,[
            'title'=>'required',
            'meme_img' =>'required'
        ]);

        $file = $request->file('meme_img');
        $meme = Meme::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request['title'],
            'meme_img'=>$file->getClientOriginalName()
        ]);

        $destinationPath = 'image/'.Auth::user()->id;
        $file->move($destinationPath,$file->getClientOriginalName());

        $meme->saveTags($request['tag1']);


        return redirect('/memes'); 
    }

    /* Show Single Meme */
    public function show(Meme $meme)
    {
        return view('memes.show',compact('meme'));
    }

    /* Edit Single Meme Content */
    public function edit(Meme $meme)
    {
        return view('memes.edit',compact('meme'));
    }


    /* Update Single Meme content */
    public function update(Request $request, $id)
    {
        $meme = Meme::find($id);
        $meme->title = $request['title'];
        $meme->saveTags($request['tag1']);
        $meme->save();
        return redirect('/memes');
    }


    /* Delete Single Meme */
    public function destroy(Meme $meme)
    {   
        File::delete('image/'. Auth::user()->id .'/'. $meme->meme_img);
        $meme->delete();

        return back();
    }
}
