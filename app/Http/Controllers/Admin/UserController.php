<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUsers =  Role::with('users')->where('name', '!=', 'Admin')->get();

        foreach($getUsers as $getUser)
        {
            $users['users'] = $getUser->users;
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));       
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
            'name' =>  'required',
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

        if ($request->active == 'on') {
            $input['active'] = User::ACTIVE;
        } else {
            $input['active'] = User::INACTIVE;
        }

        $user->update($input);

        if ($uplaodImage = $request->file('image')) {
            Attachment::where('attachmentable_id', $user->id)->delete();
            $file        = new Attachment();
            $imageName   = time() . '.' . $request->image->getClientOriginalExtension();
            $imagestore  = $uplaodImage->storeAs('public/image', $imageName);
            $file->image = $imageName;
            $user->image()->save($file);
        }  else {
          unset($input['image']);
        } 

        return redirect()->route('admin.users.index')->with('info', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->image()->delete();
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('danger', 'Users deleted successfully');
    }
}
