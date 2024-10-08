<?php

namespace App\Http\Controllers;
use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use DB;


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
    public function editQuestion(string $questionId){

      $question=Question::with('answer')->findOrFail($questionId);

      $answer1=$question->answer[0]->answer;
      $answer2=$question->answer[1]->answer;
      $answer3=$question->answer[2]->answer;

      $editData=[
        'question'=>$question->question,
        'question_id' => $question->id,
        'correct_answer'=>$question->correct_answer,
        'answer1'=>$answer1,
        'answer2'=>$answer2,
        'answer3'=>$answer3,
      ];
      return view('admin.question.update')->with($editData);
  }
  public function updateQuestion(string $questionId,QuestionRequest $request){
    $validateQuestionRequest=$request->validated();
    
    $question=Question::with('answer')->findOrFail($questionId);

    DB::transaction(function () use($question,$validateQuestionRequest){
      $question->update([

      'question'=> $validateQuestionRequest['question'],
      'correct_answer'=>$validateQuestionRequest['correct_answer']
    ]);
    $answers= [
      'answer1'=>$validateQuestionRequest['answer1'],
      'answer2'=>$validateQuestionRequest['answer2'],
      'answer3'=>$validateQuestionRequest['answer3'],
    ];
    foreach($question->answer as $index=>$answer ){
      $answer->update([
        'answer'=>$answers['answer'.($index+1)]
      ]);
    }

    });
    return redirect()->route('dashboard'); 
  }

    
}
