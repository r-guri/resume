<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;

class GoogleController extends Controller
{
    // Redirect to Google for authentication
    public function redirectToGoogle()
    {
        \Log::info('Session Before Redirect:', session()->all());
        return Socialite::driver('google')->redirect();
    }
    

    // Handle Google callback and login
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            dd($googleUser);
            // Find or create a user
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(16)), // Random password for non-standard users
                ]
            );
    
            // Log the user in
            Auth::login($user);
            
            return redirect()->intended('dashboard'); // Redirect to intended page
        } catch (Exception $e) {
            // Log the error for debugging
            \Log::error('Google Login Error: ', ['message' => $e->getMessage()]);
            return redirect()->route('login')->withErrors(['error' => 'Failed to login using Google']);
        }
    }
    
}
