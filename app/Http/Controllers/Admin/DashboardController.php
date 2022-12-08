<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $getUsers =  Role::withCount('users')->where('name', '!=', 'Admin')->get();
        foreach($getUsers as $getUser)
        {
            $data['usersCount']  = count($getUser->users);
        }
        $data['categoriesCount'] = Category::all()->count();
        $data['templatesCount']  = QuizTemplate::all()->count();
        $data['questionsCount']  = QuizQuestion::all()->count();

        $latestCategories =  $categories = Category::with(['quiz_templates','quiz_questions'])->latest()->take(5)->get();
        $categories =[];
        foreach($latestCategories as $latestCategories) 
        {
            $categories[] = $latestCategories;
        }
        $quizpoints = QuizAnswer::select(DB::raw("user_id, SUM(point) as count"))
                        ->orderBy('count','DESC')
                        ->groupBy('user_id')
                        ->get();
        
        return view('admin.dashboard',compact('data','categories','quizpoints'));
    }
}
