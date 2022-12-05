<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use App\Models\QuizAnswer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $route      = Route::currentRouteName();

        return view('users.dashboard',compact('categories','route'));
    }

    public function gettemplates($id)
    {   
        $categoryId    = Category::where('slug','=',$id)->first();
        $quizTemplates = QuizTemplate::where('category_id', $categoryId->id)->get();

        return view('users.gettemplates',compact('quizTemplates'));
    } 
    
    public function getquestions($id)
    {
        $quizTemplateIds = QuizTemplate::where('slug', '=' ,$id)->first();
        $quizTemplateId =  $quizTemplateIds->id;
        $quizQuestions  = QuizQuestion::where('quiz_template_id',$quizTemplateId)->get();

        return view('users.getquestions',compact('quizQuestions','quizTemplateId'));
    }

    public function viewquizanswer($id)
    {
        $quizAnswers = QuizAnswer::where('quiz_template_id','=',$id)->where('user_id', Auth::user()->id)->get();
        
        return view('users.viewanswered',compact('quizAnswers'));
    }
    
}
