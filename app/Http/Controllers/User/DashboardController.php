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
        $quizTemplates = QuizTemplate::where('category_id', $id)->get();

        return view('users.gettemplates',compact('quizTemplates'));
    } 
    
    public function getquestions($id)
    {
        $quizQuestions = QuizQuestion::where('quiz_template_id', $id)->get();

        return view('users.getquestions',compact('quizQuestions'));
    }
}
