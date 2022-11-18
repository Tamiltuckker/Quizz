<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use App\Models\QuizOption;

class QuizQuestionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {    
        // $quizquestions = QuizQuestion::all();   
        return view('admin.quizquestions.index',);   
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizTemplates = QuizTemplate::pluck('name','id');  

        return view('admin.quizquestions.create',compact('quizTemplates'));
    }
    public function store(Request $request)
    {
        
    $request->validate([
        'question' => 'required', 
        'description' => 'required'                  
    ]);  

    $question                   = new QuizQuestion();
    $question->quiz_template_id = $request->quiz_template_id;
    $question->question         = $request->question;
    $question->description      = $request->description;        
    $question->save();

    $id                             = $question->id;
    $quizOptions                    = QuizOption::find($id);  
    $quizOptions->quiz_question_id  = $question->id;
    // $quizOptions->quiz_question_id 

    return redirect()->route('admin.quizquestions.index')
    ->with('success', 'Question created successfully');  
    }
}
