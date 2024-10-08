<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showData(){

        //lazy loading
        // $questions=Qoestion::all();
        //eager loading
        $questions=Question::with('answer')->get();
        return view('admin.dashboard')->with(['questions'=>$questions]);
    }
}
