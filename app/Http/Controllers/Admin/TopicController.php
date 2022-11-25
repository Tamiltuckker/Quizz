<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\Attachment;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        
        return view('admin.topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        $status     = Topic::$status;
       
        return view('admin.topics.create',compact('categories','status'));
        // return response()->json($data);
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
            'name' => 'required|unique:topics|max:255', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',                
        ]);  
    
        $topic              = new Topic();
        $topic->name        = $request->name;
        $topic->category_id = $request->category_id;
        $topic->slug        = $request->name; 

        if ($request->active == 'on') {
            $topic->active = Topic::ACTIVE;
        } else {
            $topic->active = Topic::INACTIVE;
        }   
        $topic->save();
        $id        = $topic->id;
        $attachment  = Topic::find($id);        
        $file        = new Attachment();
        $imageName   = time().'.'.$request->image->getClientOriginalExtension();  
        $imagestore  = $request->file('image')->storeAs('public/image', $imageName);
        $file->image = $imageName;
        $attachment->image()->save($file);

        return redirect()->route('admin.topics.index')
        ->with('success', 'topic created successfully');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic      = Topic::find($id);
        $categories = Category::pluck('name','id');

        return view('admin.topics.edit',compact('topic','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
        $this->validate($request, [
            'name' => 'required|unique:topics|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',       
        ]); 
        $topic       =  Topic::find($id);        
        $input = $request->all();  

        if ($request->active == 'on') {
            $input['active'] = Topic::ACTIVE;
        } else {
            $input['active'] = Topic::INACTIVE;
        }
        $topic->update($input);
        if ($uplaodImage = $request->file('image')) {
            Attachment::where('attachmentable_id', $topic->id)->delete();
            $file        = new Attachment();
            $imageName   = time() . '.' . $request->image->getClientOriginalExtension();
            $imagestore  = $uplaodImage->storeAs('public/image', $imageName);
            $file->image = $imageName;
            $topic->image()->save($file);
        } else {
            unset($input['image']);
        }

        return redirect()->route('admin.topics.index')
            ->with('success', 'Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->image()->delete();
        $topic->delete();

        return redirect()->route('admin.topics.index')
            ->with('danger', 'Topic deleted successfully');
    }
}