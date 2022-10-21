<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Category $category)
    {        
        $categories = Category::latest()->paginate(5);        

        return view('admin.categories.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $category = new Category();
        $status = Category::$status;
        return view('admin.categories.create',compact('status'));
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
    
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if ($request->active == 'on') {
            $category->active = 1;
        } else {
            $category->active = 0;
        }    

        $category->save();

        return redirect()->route('categories.index')
        ->with('success', 'Category created successfully');         
    }   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */     

    public function edit(Category $category)
    {        
        $categories=  Category::pluck('name', 'id');

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
     {            
        $request->validate([
            'name' => 'required',          
        ]); 

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);   

        if ($request->active == 'on') {
            $category->active = 1;
        } else {
            $category->active = 0;
        } 

        $category->save();

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    } 
}
