<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = '/dashboard';

    public function authenticated($request , $user){
        if($user->roles->name=='SuperAdmin'){
            return redirect()->route('superadmin.dashboard.index') ;
        }
        elseif($user->roles->name=='Admin'){
            return redirect()->route('admin.dashboard.index') ;
        }
        elseif($user->roles->name=='Teachers'){
            return redirect()->route('teacher.dashboard.index') ;
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
