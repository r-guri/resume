<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
        
    }
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $findUser=User::where('google_id',$user->id)->first();
        if($findUser)
        {
            Auth::Login($findUser);
            
        }
        else{
            $user=User::UpdateOrCreate(
           
                [
                    'email'=>$user->email,
                ],[
                    'name'=>$user->name,
                    'google_id'=>$user->id,
                    'password'=>encrypt('12345678'),
                ]
                );
                Auth::Login($user);
        }
        return redirect()->intended('dashboard');
    }
}
