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
    public function index($quizTemplateId)
     {    
        $quizQuestions = QuizQuestion::with('quiz_template')
                            ->where('quiz_template_id', $quizTemplateId)
                            ->get();

        return view('admin.quizquestions.index',compact('quizQuestions','quizTemplateId'));   
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quizTemplateId)
    {
        $quizTemplate = QuizTemplate::find($quizTemplateId);

        return view('admin.quizquestions.create',compact('quizTemplate'));
    }
    public function store(Request $request,$quizTemplateId)
    {
        $question                   = new QuizQuestion();
        $question->quiz_template_id = $quizTemplateId;
        $question->question         = $request->question;
        $question->description      = $request->description;        
        $question->save();

        $id        = $question->id;

        foreach($request->quiz_option as $option)
        {
            if(!is_null($id)) {
                $quizOption = new QuizOption();
                $quizOption->quiz_question_id = $id;
                $quizOption->fill($option);
                $quizOption->save();
            }
        }

        return redirect()->route('admin.quizquestions.index',$quizTemplateId)
        ->with('success', 'Question created successfully');  

    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ QuizTemplate $quiztemplate
     * @return \Illuminate\Http\Response
     */

    public function edit($quizTemplateId, $quizQuestionId)
    {
        $quizQuestion  = QuizQuestion::find($quizQuestionId);
        $quizTemplate  = QuizTemplate::find($quizTemplateId);

        $quizOptions   = QuizOption::with('quiz_question')
                        ->where('quiz_question_id', $quizQuestionId)
                        ->get();

        return view('admin.quizquestions.edit', compact('quizQuestion','quizTemplate','quizOptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizTemplate $quiztemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quizTemplateId, $quizQuestionId)
    {
        $quizQuestion                   = QuizQuestion::find($quizQuestionId);
        $quizQuestion->quiz_template_id = $quizTemplateId;
        $quizQuestion->question         = $request->question;
        $quizQuestion->description      = $request->description;        
        $quizQuestion->update();

        $id        = $quizQuestion->id;

        foreach($request->quiz_option as $option)
        {
            if($option['option_id']) {
                $quizOption = QuizOption::find($option['option_id']);
                $quizOption->quiz_question_id = $id;
                $quizOption->fill($option);
                $quizOption->update();
            }
        }

        return redirect()->route('admin.quizquestions.index',$quizTemplateId)
            ->with('success', 'Quiz updated successfully');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($quizTemplateId, $quizQuestionId)
    {
        $quizQuestion = QuizQuestion::findOrFail($quizQuestionId);

                        QuizOption::with('quiz_question')
                        ->where('quiz_question_id', $quizQuestion->id)
                        ->delete();
                        
        $quizQuestion->delete();
      
        return redirect()->route('admin.quizquestions.index',$quizTemplateId)
            ->with('danger', 'Queston deleted successfully');
    }
}
