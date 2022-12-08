<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\QuizAnswer;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id   = Auth::user()->id;
        $user = User::find($id);

        $quizAnsweredTemplates = QuizAnswer::where('user_id', $user->id)->get()
                                 ->groupBy('quiz_template_id');

        $categoryAnsCounts = QuizAnswer::where('user_id', $user->id)->get()
                             ->groupBy('category_id');

        $quizpoints = QuizAnswer::where('point','=',1)->where('user_id', Auth::user()->id) ->get();

        return view('users.profile.show',compact('user','quizAnsweredTemplates','categoryAnsCounts','quizpoints'));
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
        ]);
 
        $user = User::find($id);
        $input = $request->all();
 
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
 
        $user->update($input);
 
        if ($uplaodImage = $request->file('image')) {
            Attachment::where('attachmentable_id', $user->id)->delete();
            $file        = new Attachment();
            $imageName   = time() . '.' . $request->image->getClientOriginalExtension();
            $imagestore  = $uplaodImage->storeAs('public/image', $imageName);
            $file->image = $imageName;
            $user->image()->save($file);
        } else {
            unset($input['image']);
        }
 
        return redirect()->route('user.dashboard.index')->with('info', 'Profile updated successfully');
 
    }
}
