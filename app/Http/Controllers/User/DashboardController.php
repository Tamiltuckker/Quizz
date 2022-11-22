<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $categories = Category::pluck('name','id');
        // dd($categories);        
        return view('users.dashboard',compact('categories'));
    }

    public function gettemplates(Category $categories)
    {       
        return view('users.gettemplates');
    } 
    
    public function getquestions()
    {
        return view('users.getquestions');
    }
}
