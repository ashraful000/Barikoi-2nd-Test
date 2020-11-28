<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Models\Word;

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
        //dd(Auth::user()->role);

        if (Auth::user()->role == "admin"){

            $panel = "Admin panel";

            return view('adminV',["panel" => $panel]);

        }else{

            $panel = "User panel";

            return view('home',["panel" => $panel]);
        }
        
    }

    public function storeAndSuggestion(Request $request){

        if (Auth::user()->role == "admin"){


            $data = $request->validate([
                'word' => 'required|unique:words', 
            ]);


            $word = new Word();
            $word -> word = request('word');
            $word -> save();
    
            return redirect('/home')->with('mssg','Word has been added into the database');
            
        }else{

            $results = array();
            $words = Word::Where('word', 'like', '%'. $request -> input('data') . '%')->get();
            foreach($words as $word){
                $results[] = $word -> word;
            }
            return response()->json($results);

        }


    }


}
