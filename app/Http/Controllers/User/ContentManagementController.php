<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;


class ContentManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gethome()
    {
        $home= Content::where('slug','home')->first();
        return view('users.contents.home',compact('home'));
    }

    public function getabout()
    {        
        $about= Content::where('slug','about-us')->first();
        return view('users.contents.about',compact('about'));
    }

    public function getcontact(Request $request)
    {
        $contact= Content::where('slug','contact')->first();
        
        return view('users.contents.contact',compact('contact'));
    }

}
