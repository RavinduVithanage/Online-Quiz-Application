<?php

namespace App\Http\Controllers;
use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Question;


class QuestionController extends Controller
{

    public function createQuestion(){
        return view('admin.question.create');
    }
    public function addQuestion(QuestionRequest $request){

      $validateQuestionRequest=$request->validated();
      $question=Question::create([

        'question'=> $validateQuestionRequest['question'],
        'correct_answer'=>$validateQuestionRequest['correct_answer']
      ]);

      if(!$question){
        return redirect()->route('dashboard'); 
      }
      $answers= [
        'answer1'=>$validateQuestionRequest['answer1'],
        'answer2'=>$validateQuestionRequest['answer2'],
        'answer3'=>$validateQuestionRequest['answer3'],
      ];

      foreach($answers as $answer){
        Answer::create([
            'question_id'=>$question->id,
            'answer'=>$answer,
        ]);
      }
      return redirect()->route('dashboard'); 
    }

    
}
