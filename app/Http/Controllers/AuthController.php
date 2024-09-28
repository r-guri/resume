<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\FormStep;
use Auth;
use Hash;
use Validator;
class AuthController extends Controller
{
  public function dashboard(Request $request){
  if (Auth::check()) 
  {

// return view('form');
return redirect('/form');
  }
  else
  {
   return redirect('/sa')->with('error','')->withInput();
     }
    }

    public function logout(Request $request)
    {       
Auth::logout();
    return redirect('/sa')->with('success','Succesfully logged out')->withInput();
        
    }
   
      public function login(Request $request){
        $v = Validator::make($request->all(),
        [
           'email' => 'required|exists:users',
          'password' => 'required|min:3'
       ],  [
           'email.exists'=> 'Invalid Email',
           'password.min' => 'Password must be 8 character',
           
       ]);   
      
       if($v->fails()){
           return redirect()->back()->withErrors($v)->withInput();
          }
       else{
        // echo $request->input('password');

            if(Auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            
               return redirect('form') ;
          //  
          }
           else{
              return redirect('/sa')->with('error','Invalid Email or Password ')->withInput();
           }
          
          }
      }

      public  function signup(){
        return View('admin.signup');
      }
      public  function forgotpassword(){
        return View('admin.forgotpassword');
      }
      public function register(Request $request)
{
    // Validate request data with custom messages
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8',
    ], [
        'email.unique' => 'The email address is already registered. Please use a different email.',
    ]);

    // Create the user and check if successful
    if (User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ])) {
        // Redirect with success message
        return redirect('/signup')->with('success', 'Successfully registered')->withInput();
    } else {
        // Handle error in case user creation fails
        return back()->with('success', 'Failed to register. Please try again.');
    }
}

     
public function forgotPasswordAction(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email',
    ]);
    $user = User::where('email', $data['email'])->first();
    
    if ($user) {
        $randomPassword = Str::random(10); // You can adjust the length
        $user->password = Hash::make($randomPassword);
        $user->save();
        Mail::send('emails.password_reset', ['password' => $randomPassword, 'username' => $user->name,'email' => $user->email], function ($message) use ($user) {
          $message->to($user->email);
          $message->subject('Password Reset Notification');
      });
      
        return redirect('/forgot-password')->with('success','A new password has been sent to your email ')->withInput();
        // return response()->json(['success' => 'A new password has been sent to your email.']);
      } else {
      return redirect('/forgot-password')->with('error','Email not found.')->withInput();
        // return response()->json(['error' => 'Email not found.'], 404);
    }
}
public function showPasswordChangeForm()
{
  if (Auth::check()) 
  {
$formStep = FormStep::where('user_id', Auth::id())->first();
if ($formStep) {
  return view('admin.changePassword',['image' => $formStep->image]);

}else{
  $image=[];
}
}
}

public function passwordchangeAction(Request $request)
{
      // Validate form inputs
      $request->validate([
          'oldpassword' => 'required',
          'newpassword' => 'required|min:6',
          'confirmpassword' => 'required|same:newpassword'
      ], [
          'oldpassword.required' => 'Please enter the old password.',
          'newpassword.required' => 'Please enter the new password.',
          'newpassword.min' => 'The new password must be at least 6 characters.',
          'confirmpassword.required' => 'Please confirm the new password.',
          'confirmpassword.same' => 'The confirm password does not match the new password.'
      ]);
      $oldpassword = $request->input('oldpassword');
      $newpassword = $request->input('newpassword');
      $user = auth()->user(); 
  if (Hash::check($oldpassword, $user->password)) {
          $user->password = Hash::make($newpassword);
          $user->save();
    return back()->with('success', 'Password changed successfully.');
      } else {
        
          return back()->withErrors(['error' => 'The old password does not match our records.']);
      }
  }

}
