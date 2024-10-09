<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserDashBoard(Request $request){

        // $questions=Question::with('answer')->get();
        $user=$request->user();

        $unAnswerQuestion=Question::whereDoesntHave('userAnswer', function(Builder $query) use ($user){
            $query->where('user_id',$user->id);
        })->get();

        $totalQuestionCount=Question::count();

        $correctAnswerCount=UserAnswer::where('user_id',$user->id)->where('is_correct',true)->count();

        return view('user.dashboard')->with(['questions'=>$unAnswerQuestion,
                                                        'totalQuestionCount'=> $totalQuestionCount,
                                                        'correctAnswerCount'=>$correctAnswerCount]);
    }
    public function userAnswer(string $questionId,Request $request){

        $validatedAnswer = $request->validate([
            'answer' => ['required', 'string'],
        ]);
      
       $userGetAnsewer=$validatedAnswer['answer'];
       $user=$request->user();
       $question=Question::findOrFail($questionId);
       $correctAnswer=$question->correct_answer;

       $answerCheck=trim($userGetAnsewer) === trim($correctAnswer);

       $userAnswer=UserAnswer::create(
        [
            'user_id'=>$user->id,
            'question_id'=>$question->id,
            'answer'=>$userGetAnsewer,
            'is_correct'=>$answerCheck,
        ]);

        $message=$answerCheck ? 'Your answer is correct' : 'Your answer is wrong' ; 
       return redirect()->route('user.dashboard')->with('message', $message);
    }
}
