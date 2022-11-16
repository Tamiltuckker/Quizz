<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\QuizTemplate;
use App\Models\Attachment;
class QuizTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiztemplates = QuizTemplate::latest()->paginate(5);

        return view('admin.quiztemplates.index',compact('quiztemplates'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiztemplate = new QuizTemplate();
        $quiztemplate = QuizTemplate::pluck('name','id');
        return view('admin.quiztemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("hai");
        $request->validate([
            'name' => 'required',
        ]);

        $quiztemplate = new QuizTemplate();
        $quiztemplate->name = $request->name;
        $quiztemplate->slug = $request->name;       
        $quiztemplate->save();       

        return redirect()->route('admin.quiztemplates.index')
            ->with('success', 'Category created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ QuizTemplate $quiztemplate
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $quiztemplate = QuizTemplate::find($id);

        return view('admin.quiztemplates.edit', compact('quiztemplate'));
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
        $quiztemplate = QuizTemplate::find($id);
        $input = $request->all();        
        $quiztemplate->update($input);
        return redirect()->route('admin.quiztemplates.index',compact('quiztemplate'))
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

