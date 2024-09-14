<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
      public function register(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        if(User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => Hash::make($data['password'])
        ]))
        {
          return redirect('/signup')->with('success','Successfully registered ')->withInput();
        }
        else{
            dd('error insert');
        }
        
      }
}
