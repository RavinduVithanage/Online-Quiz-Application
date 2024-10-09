<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserDashBoard(){

        $questions=Question::with('answer')->get();
 
        return view('user.dashboard')->with(['questions'=> $questions]);
    }
   
}
