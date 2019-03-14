<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Cart;
use App\User;
use App\ContactUs;
use App\Mail\SendMail;
use App\Mail\UserSendMail;
use App\Admin;
use App\EventIndex;
use App\ResetPassword;
use App\UserPasswordReset;
use Session;

class PasswordResetController extends Controller
{
    public function userResetForm(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        return view('User.showemail')
            ->with('quantity',$quantity)   
            ->with('footers',$footers);   
    }
    public function userResetMail(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
        ]);
        $useremail=$request->email;
        $user=User::where('email',$useremail)->first();
        if ($user) {
            $pass=new UserPasswordReset();
            $pass->email=$useremail;
            $pass->token=sha1(time());
            $pass->role=2;
            $pass->save();
            Mail::to($useremail)->send(new UserSendMail($pass));
            $request->session()->flash('message','Email is send to your Account');
            return back();
        }
        else{
            $request->session()->flash('message','Email is not exist');
            return back();
        }
    }
    public function userSendResetlink(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $token=$request->token;
        $user=UserPasswordReset::where('token',$token)->first();
        if(! is_null($user)){

            return view('User.userreset')
                ->with('quantity',$quantity)
                ->with('footers',$footers)
                ->with('user',$user)
                ->with('token',$token);
        }
        else{
            echo("Error 404");
        }
        
    }
    public function userResetPass(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'confirm_password' => 'same:password'
        ]);
        $token=$request->token;
        $users=UserPasswordReset::where('token',$token)->first();
        if (! is_null($users)) {
            UserPasswordReset::where('token', $request->token)
                            ->where('email', $users->email)
                            ->update(['token' => ""]);
            if (User::where('email', $users->email)->update(['password' => Hash::make($request->password)]) > 0) {
                $request->session()->flash('message', "password updated");
                return redirect()->route('user.login');
            }
        }
    }
    public function showResetForm(Request $request)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
    	return view('Admin.email')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
        ]);
    	$email=$request->email;
        $admin=Admin::where('email',$email)->first();
        if($admin){
            $pass= new ResetPassword();
            $pass->email=$email;
            $pass->token=sha1(time());
            $pass->role=1;
            $pass->save();
            Mail::to($email)->send(new SendMail($pass));
        $request->session()->flash('message','Email is send to your Account');
        return back();
        }
        else{
            $request->session()->flash('message','Email is not exist');
            return back();
        }
    }
    public function reset(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
    	$token = $request->token;
        $reset = ResetPassword::where('token', $token)->first();
        if (! is_null($reset)) {
            return view('Admin.reset')->with('token', $token)
                        ->with('events',$events)
                        ->with('admins',$admins);
        }
        else{
            echo "Error 404";
        }
    }
    public function resetPass(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'confirm_password' => 'same:password'
        ]);
        $user = ResetPassword::where('token', $request->token)->first();
        if (! is_null($user)) {
            ResetPassword::where('token', $request->token)
                            ->where('email', $user->email)
                            ->update(['token' => ""]);
            if (Admin::where('email', $user->email)->update(['password' => Hash::make($request->password)]) > 0) {
                $request->session()->flash('message', "password updated");
                return redirect()->route('admin.adminLogin');
            }
        }
    }
}
