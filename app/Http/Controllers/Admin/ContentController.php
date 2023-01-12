<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index()
   {
      $contents = Content::all();     
      return view('admin.contents.index',compact('contents'));  
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */

   public function edit(Content $content)
   {
      return view('admin.contents.edit', compact('content'));
   }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'slug' => 'required',
         'title' => 'required',
       ]);
      $content = Content::find($id);
      $input = $request->all();   
      if ($request->active == 'on') {
         $input['active'] = Content::ACTIVE;
      } else {
         $input['active'] = Content::INACTIVE;
      }       

      return redirect()->route('admin.contents.index')
      ->with('info', 'Content updated successfully');
   }

}
