<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use Illuminate\Http\Request;

class QuizAnsweredController extends Controller
{
    public function getansweredtemplates($userId)
    {
        $quizAnsweredTemplates = QuizAnswer::where('user_id', $userId)
                                 ->get()
                                 ->groupBy('quiz_template_id');

        $answeredTemplates = [];
        foreach($quizAnsweredTemplates as $id => $val)
        {
           $answeredTemplates[] = QuizTemplate::find($id);
        }

        return view('admin.quizanswers.templates',compact('answeredTemplates','userId'));
    }
    public function getansweredquestions($userId,$quizTemplateId)
    {
        $answeredQuestions = QuizQuestion::with('quiz_template')
                            ->where('quiz_template_id', $quizTemplateId)
                            ->get();

        return view('admin.quizanswers.questions',compact('answeredQuestions','quizTemplateId','userId'));

    }
    
}
