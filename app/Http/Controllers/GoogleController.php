<?php 
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    // Redirect to Google for authentication
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback and login
    public function handleGoogleCallback()
    {
        try {
            // Get the user information from Google
            $googleUser = Socialite::driver('google')->user();

            $findUser = User::where('google_id', $googleUser->id)->first(); // Use ->id to find the user
    
            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('form'); // Redirect to intended page
            } else {
                $user = User::updateOrCreate(
                    ['email' => $googleUser->email],
                    [
                        'name' => $googleUser->name,
                        'google_id' => $googleUser->id,
                        'password' => encrypt('8053615639'), 
                    ]
                );
                Auth::login($user);
                return redirect()->intended('form'); // Redirect to intended page
            }
        } catch (Exception $e) {
           
            return redirect()->route('login')->withErrors(['error' => 'Failed to login using Google']);
        }
    }
}
