<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\QuizTemplate;
class QuizTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('category_id')) {
            $quizTemplates = QuizTemplate::with('category')->where('category_id', request()->input('category_id'))->get();        
        } else {
            $quizTemplates = QuizTemplate::with('category')->get();        
        }
        $quizQuestions = QuizQuestion::withCount('quiz_template')->get(); 
        $categories    = Category::pluck('name','id');
            
        return view('admin.quiztemplates.index',compact('quizTemplates','categories'));   
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');

        return view('admin.quiztemplates.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $quizTemplate              = new QuizTemplate();
        $quizTemplate->category_id = $request->category_id;
        $quizTemplate->name        = $request->name;
        $quizTemplate->slug        = $request->name;       
        $quizTemplate->save();       

        return redirect()->route('admin.quiztemplates.index')
            ->with('success', 'Category created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ QuizTemplate $quiztemplate
     * @return \Illuminate\Http\Response
     */

    public function edit(QuizTemplate $quizTemplate)
    {
        $categories   = Category::pluck('name','id');

        return view('admin.quiztemplates.edit', compact('quizTemplate','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizTemplate $quiztemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $quizTemplate = QuizTemplate::find($id);
        $input        = $request->all();        
        $quizTemplate->update($input);

        return redirect()->route('admin.quiztemplates.index')
            ->with('success', 'Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizTemplate $quiztemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuizTemplate::find($id)->delete();

        return redirect()->route('admin.quiztemplates.index')
            ->with('danger', 'Quiz deleted successfully');
    }
}

