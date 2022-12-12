<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
  
class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        // dd('hii');
        return Socialite::driver('facebook')->redirect();
    }
           
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        // dd('hii');
        try {
            // dd(Socialite::driver('facebook')->user());
        
            $user = Socialite::driver('facebook')->user();
        //  dd($user->id);

         
            $finduser = User::where('facebook_id', $user->id)->first();
            // dd($finduser);
      
        //  dd('hii');\5432
            if($finduser){
         dd( Auth::login($finduser));
                Auth::login($finduser);
       
                return redirect()->intended('dashboard');
         
            }else{
                dd('dhf');
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'facebook_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('dashboard');
            }
       
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}