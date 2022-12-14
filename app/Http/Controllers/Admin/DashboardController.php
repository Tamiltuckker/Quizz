<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use App\Models\Role;
use App\Models\User;
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

        $userDatas = User::all()->groupBy('created_at');

        $months             = [];
        $registerUsersCount = [];
        foreach($userDatas as $key => $userData)
        {
            $months[]             = $key;
            $registerUsersCount[] = $userData->count();
        }
        $months = implode("','",$months);
        $months = "'".$months."'";
        $registerUsersCount = implode(",",$registerUsersCount);

        $quizpoints = QuizAnswer::select(DB::raw("user_id, SUM(point) as count"))
                        ->orderBy('count','DESC')
                        ->groupBy('user_id')
                        ->get();

        foreach ($quizpoints as $key => $quizPoint) {
            $counts[]     = $quizPoint->count;
            $sliced_array = array_slice($counts, 0, 5);
            $quizCounts[] = $quizPoint->count;
            $userList     = \App\Models\User::find($quizPoint->user_id);

            if ($sliced_array === $quizCounts) {
                $userName [] = $userList->name;
                $userPoints[] = $quizPoint->count;
            }
        }
        $topUserNames = implode("','",$userName);
        $topUserNames = "'".$topUserNames."'";
        $topUserPoints = implode(",",$userPoints);
    
        return view('admin.dashboard',compact('data','categories','months','registerUsersCount','topUserNames','topUserPoints','quizpoints')); 
    }
}
