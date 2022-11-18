<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use App\Models\Attachment;

class QuizQuestionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {    
         $quizquestions =QuizQuestion::all();   
        return view('admin.quizquestions.index',);   
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $quizquestion = new QuizQuestion();  
        $quiztemplates = QuizTemplate::pluck('name','id');  

        return view('admin.quizquestions.create',compact('quiztemplates'));
    }
    public function store(Request $request)
    {
    $request->validate([
        'question' => 'required', 
        'description' => 'required'                  
    ]);  

    $question              = new QuizQuestion();
    $question->quiz_template_id = $request->quiz_template_id;
    $question->question    = $request->question;
    $question->description  = $request->description;    
    $question->option[]       = $request->option; 
    
    $question->save();
    $id        = $question->id;
    $attachment  = QuizQuestion::find($id);        
    $file        = new Attachment();
    $imageName   = time().'.'.$request->image->getClientOriginalExtension();  
    $imagestore  = $request->file('image')->storeAs('public/image', $imageName);
    $file->image = $imageName;
    $attachment->image()->save($file);

    return redirect()->route('admin.quizquestions.index')
    ->with('success', 'Question created successfully');  
    }
}
