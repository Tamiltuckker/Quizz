<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use App\Models\QuizOption;
use App\Models\QuizTemplate;
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    public function store(Request $request)
    {
        foreach($request->quizanswers as $quizQuestion => $selectedOption) {
            
            $id                           = $request->quizTemplateId;
            $quizTemplate                 = QuizTemplate::find($id);
            $optionId                     = $selectedOption;
            $quizOpton                    = QuizOption::find($optionId);

            $quizAnswer                   = new QuizAnswer();
            $quizAnswer->user_id          = Auth::user()->id;
            $quizAnswer->category_id      = $quizTemplate->category_id;
            $quizAnswer->quiz_template_id = $request->quizTemplateId;
            $quizAnswer->quiz_question_id = $quizQuestion;    
            $quizAnswer->quiz_option_id   = $selectedOption;
            $quizAnswer->point            = $quizOpton->is_correct;

            $quizAnswer->save();
        }

        return redirect()->route('user.dashboard.index')->with('info', 'Quiz Complted');
    }
}
