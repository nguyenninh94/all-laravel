<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Social;
use Socialite;
use Auth;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();
        //dd($user);
        
        $account = Social::where('provider_user_id', $user->id)->where('provider', 'google')->first();
        if($account) {
            $u = User::where('email', $user->email)->first();
            Auth::login($u);
            if(Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget($oldUrl);
                    return redirect()->to($oldUrl);
                }
            return redirect()->route('user.profile');
        } else {
            $social = new Social();
            $social->provider_user_id = $user->id;
            $social->provider = 'google';

            $u = User::where('email', $user->email)->first();
            if(!$u) {
                $u = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                ]);

                $social->user_id = $u->id;
                $social->save();
                Auth::login($u);
                if(Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget($oldUrl);
                    return redirect()->to($oldUrl);
                }
                return redirect()->route('user.profile');
            }
        }
    }

    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        //dd($user);
        
        $account = Social::where('provider_user_id', $user->id)->where('provider', 'facebook')->first();
        if($account) {
            $u = User::where('email', $user->email)->first();
            Auth::login($u);
            if(Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget($oldUrl);
                    return redirect()->to($oldUrl);
                }
            return redirect()->route('user.profile');
        } else {
            $social = new Social();
            $social->provider_user_id = $user->id;
            $social->provider = 'facebook';

            $u = User::where('email', $user->email)->first();
            if(!$u) {
                $u = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                ]);

                $social->user_id = $u->id;
                $social->save();
                Auth::login($u);
                if(Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget($oldUrl);
                    return redirect()->to($oldUrl);
                }
                return redirect()->route('user.profile');
            }
        }
    }

    public function redirectToProviderTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallbackTwitter()
    {
        $user = Socialite::driver('twitter')->user();
        
        $account = Social::where('provider_user_id', $user->id)->where('provider', 'twitter')->first();
        if($account) {
            $u = User::where('email', $user->email)->first();
            Auth::login($u);
            if(Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget($oldUrl);
                    return redirect()->to($oldUrl);
                }
            return redirect()->route('user.profile');
        } else {
            $social = new Social();
            $social->provider_user_id = $user->id;
            $social->provider = 'twitter';

            $u = User::where('email', $user->email)->first();
            if(!$u) {
                $u = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                ]);

                $social->user_id = $u->id;
                $social->save();
                Auth::login($u);
                if(Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget($oldUrl);
                    return redirect()->to($oldUrl);
                }
                return redirect()->route('user.profile');
            }
        }
    }
}
