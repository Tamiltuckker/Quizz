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
        $id = $request->quizTemplateId;
        $quizTemplate  = QuizTemplate::find($id);
        $optionsid = $request->quizOptionId;
        $optionid  = QuizOption::find($optionsid);

        $question                   = new QuizAnswer();
        $question->user_id          = Auth::user()->id;
        $question->category_id      = $quizTemplate->category_id;
        $question->quiz_template_id = $request->quizTemplateId;
        $question->quiz_question_id = $request->quizQuestion;    
        $question->quiz_option_id   = $request->quizOptionId;
        $question->point            = $optionid->is_correct;
        $question->save();

        return "succes";
    }
}
