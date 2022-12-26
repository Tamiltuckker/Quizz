<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContentManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gethome()
    {
        $categories = Category::all();
        $home= Content::where('slug','home')->first();

        return view('users.contents.home',compact('home','categories'));
    }

    public function getabout()
    {    
        $categories = Category::all();    
        $about= Content::where('slug','about-us')->first();

        return view('users.contents.about',compact('about','categories'));
    }

    public function getcontact(Request $request)
    {
        $categories = Category::all();   
        $contact= Content::where('slug','contact')->first();
        
        return view('users.contents.contact',compact('contact','categories'));
    }

    public function sendcontact(Request $request)
    {  
        // $categories = Category::all();   
        $details = $request->except('_token');
        $adminEmail = "ud38852@gmail.com";
        Mail::to($adminEmail)->send(new ContactMail($details));
    
        return redirect()->back()
        ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }
}

