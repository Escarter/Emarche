<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use App\Http\Requests\RegisterRequest;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


   public function register(){
     return view('auth.register');
   }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(RegisterRequest  $request)
    {
 
         // User::create([
         //    'firstname' => $request->input('first_name'),
         //    'lastname' => $request->input('last_name'),
         //    'email' => $request->input('email'),
         //    'username' =>$request->input('username'),
         //    'password' => bcrypt($request->input('password')),
         //    'address' =>$request->input('address'),
         //    'city'=>$request->input('city'),
         //    'state'=>$request->input('state'),
         //    'zip'=>$request->input('zip'),
         //  ]);
         $planId = $request->input('plan');
         $token = 
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->username = $request->input('username');
        $user->save();
        $user->subscription($planId)->create($request->get('stripe_token'), [
            'email' => $request->input('email'),
            'metadata' => [
            'name' => $request->input('username'),
            ],
        ]);


         return redirect()->route('auth.login')->withInfo('Thanks for your Registration Now Login');
         
    }
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,['username'=>'required','password'=>'required']);
        $credentials = $request->only(['username','password']);
        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->route('home')->withError('Logged in');
        }
         return redirect()->route('auth.login')
                   ->withInput($request->only('username','remember'))
                   ->withErrors(['username'=>'These credentails do not match our records.']);
    }
 public function logout(){
    Auth::logout();
    return redirect()->route('home')->withInfo('You are Logged Out');
   }
}
