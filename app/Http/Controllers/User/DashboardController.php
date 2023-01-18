<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use App\Models\QuizAnswer;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $route      = Route::currentRouteName();
        $quizpoints = QuizAnswer::select(DB::raw("user_id, SUM(point) as count"))
        -> orderBy('count','DESC')
        ->groupBy('user_id')
        ->get();

        return view('users.dashboard',compact('categories','route'));
    }

    public function gettemplates($id)
    {   
        $categories = Category::all();
        $categoryId    = Category::where('slug','=',$id)->first();

        $startDate = Carbon::createFromFormat('Y-m-d', '2022-12-01');        
        $endDate   = Carbon::createFromFormat('Y-m-d', '2023-01-31');       
        
        $quizTemplates = QuizTemplate::where('category_id', $categoryId->id)->whereBetween('published_date',[$startDate, $endDate])->get();               
        // dd( $quizTemplates);
        return view('users.gettemplates',compact('quizTemplates','categories'));
    }   
    
    public function getquestions($id)
    {
        $categories = Category::all();
        $quizTemplateIds = QuizTemplate::where('slug', '=' ,$id)->first();
        $quizTemplateId =  $quizTemplateIds->id;
        $quizQuestions  = QuizQuestion::where('quiz_template_id',$quizTemplateId)->get();

        return view('users.getquestions',compact('quizQuestions','quizTemplateId','categories'));
    }

    public function viewquizanswer($id)
    {
        $categories = Category::all();
        $quizAnswers = QuizAnswer::where('quiz_template_id','=',$id)->where('user_id', Auth::user()->id)->get();
        
        return view('users.viewanswered',compact('quizAnswers','categories'));
    }
    
}
