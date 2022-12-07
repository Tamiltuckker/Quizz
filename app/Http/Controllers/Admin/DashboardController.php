<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizQuestion;
use App\Models\QuizTemplate;
use App\Models\Role;
use App\Models\User;

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

        return view('admin.dashboard',compact('data','categories','months','registerUsersCount'));
    }
}
