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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function resetPas(Request $request)
    {
        $email = $request->email;
        $isExist = User::where('email', $request->email)->first();
        if ($isExist) {
            $token = random(); //sudo code
            $role = 1;
            $passRes->save();
        }
    }
    public function setPassword(Request $request, $token)
    {
        email, created, token
    }
    public function __construct()
    {
        $this->middleware('guest');
    }
}
