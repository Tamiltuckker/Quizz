<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function create()
    {
        return view('users.create');
    } 
    public function index()
    {
        return view('users.dashboard');
    }
    public function show()
    {
        return view('users.show');
    }
}
