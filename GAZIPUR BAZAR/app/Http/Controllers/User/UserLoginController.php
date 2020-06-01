<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\QuantityRequest;
use App\User;
use App\EventWedding;
use App\EventBirthday;
use App\EventHospitality;
use App\EventOthers;
use App\EventIndex;
use App\Cart;
use App\Light;
use App\FoodIndex;
use App\BooksIndex;
use App\FamousTraditional;
use App\PartsAccessories;
use App\MedicineEmergency;
use App\FlowerIndex;
use App\ToysIndex;
use App\FurnitureIndex;
use App\HouseholdIndex;
use App\ElectricIndex;
use App\LeatherIndex;
use App\GentsIndex;
use App\LadiesIndex;
use App\AboutUS;
use App\Policy;
use App\ContactUs;

class UserLoginController extends Controller
{
    public function login(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        return view('User.login')
        ->with('footers',$footers)
        ->with('quantity',$quantity)
        ->with('carts',$carts);
    }
    public function loginCheck(LoginRequest $request)
    {
        $users=User::where('email', $request->email)
                    ->first();

        if($users && Hash::check($request->password,$users->password)) {

            $request->session()->put('loggedUser', $users->id);
            $request->session()->flash('message','Login Successfull');
        
            return redirect()->route('user.index');

        }
        else{
            $request->session()->flash('message','Login Unseccessfull');
            return back();
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route('user.index'));
    }
}
