<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizOption;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('users.dashboard',compact('categories'));
    }

    public function gettemplates($id)
    {   
        $categoryId    =Category::where('name','=',$id)->first();
        $quizTemplates = QuizTemplate::where('category_id', $categoryId->id)->get();

        return view('users.gettemplates',compact('quizTemplates'));
    } 
    
    public function getquestions($id)
    {
        $quizTemplateIds =QuizTemplate::where('slug','=',$id)->first();
        $quizTemplateId =$quizTemplateIds->id;
        $quizQuestions  = QuizQuestion::where('quiz_template_id',$quizTemplateId)->get();

        return view('users.getquestions',compact('quizQuestions','quizTemplateId'));
    }
}
