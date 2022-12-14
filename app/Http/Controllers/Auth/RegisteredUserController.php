<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Content;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->name            = $request->get('name');
        $user->email           = $request->get('email');
        $user->password        = Hash::make($request->get('password'));
        $user->save();
        $id        = $user->id;

        $attachment  = User::find($id);
        $file        = new Attachment();
        $imageName   = time().'.'.$request->image->getClientOriginalExtension();  
        $imagestore  = $request->file('image')->storeAs('public/image', $imageName);
        $file->image = $imageName;
        $attachment->image()->save($file);

        $user->roles()->detach($user->roles);
        $user->assignRole(Role::USER);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user.dashboard.index'));
    }   
 
    public function privacy(Request $request)
    {
        $privacy= Content::where('slug','privacy-policy')->first();
       
        return view('auth.privacy',compact('privacy'));
    }

}
