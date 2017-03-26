<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Illuminate\Support\MessageBag;
use Mail;
use App\Mail\ConfirmationEmail;
use Validator;
use Session;

class UserController extends Controller
{
    public function getSignup()
    {
    	return view('user.signup');
    }

    public function postSignup(Request $request)
    {
    	$rules = [
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8|confirmed',
           'g-recaptcha-response' => 'required|captcha'
    	];

    	$validator = Validator::make($request->all(), $rules);
    	if($validator->fails())
    	{
    		return back()->withInput()->withErrors($validator);
    	} else {
    	    $user = new User([
    	    	'name' => $request->name,
    	    	'email' => $request->email,
    	    	'password' => bcrypt($request->password)
    	    ]);

    	    $user->save();
    	    Mail::to($user->email)->send(new ConfirmationEmail($user));
    	    return back()->with('status', 'You need to confirm your email! Please');
      	}
    }

    public function confirm($token)
    {
    	$check = DB::table('users')->where('token', $token)->first();
    	if(!is_null($check)) {
    		$user = User::find($check->id);
    		if($user->verified == 1) {
    			return redirect('/user/sign-in')->with('status', 'You confirmed your email');
    		}

    		$user->update([
               'verified' => 1,
               'token' => null
    		]);
    	    return redirect('/user/sign-in')->with('status', 'You have confirmed your email1 Please sign in now');	
    	}

    	return redirect('/user/sign-up')->with('warning', 'Your confirmation info is incorrect');
    }

    public function getSignin()
    {
    	return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        $rules = [
           'email' => 'required|email',
           'password' => 'required|min:8'
    	];

    	$validator = Validator::make($request->all(), $rules);
    	if($validator->fails())
    	{
    		return back()->withInput()->withErrors($validator);
    	} else {
    		$email = $request->input('email');
    		$password = $request->input('password');

    		if(Auth::attempt(['email' => $email, 'password' => $password, 'verified' => 1])) {

    			if(Session::has('oldUrl')) {
    				$oldUrl = Session::get('oldUrl');
    				Session::forget($oldUrl);
    				return redirect()->to($oldUrl);
    			}
    			
    			return redirect()->route('user.profile');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Email or Password is incorrect']);
    			return back()->withInput()->withErrors($errors);
    		}
    	}
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('user.signin');
    }

    public function getProfile()
    {
    	return view('user.profile');
    }

    public function listUser(Request $request)
    {
        if($request->has('search')){

            $users = User::search($request->search)

                ->get();

        }else{

            $users = User::all();

        }
        return view('user.index', compact('users'));
    }
}
