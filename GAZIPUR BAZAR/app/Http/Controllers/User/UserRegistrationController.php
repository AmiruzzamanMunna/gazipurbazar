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
use Exception;

class UserRegistrationController extends Controller
{
    public function signUP(Request $request)
    {
        
        try{

            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            return view('User.signup')
                ->with('footers',$footers)
                ->with('quantity',$quantity);

        }catch(Exception $e){

            return view('Error.error');
        }
    }
    public function signUPStore(SignupRequest $request)
    {
        try{

            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->mobile=$request->mobile;
            $user->mobile2=$request->mobile2;
            $user->address=$request->address;
            $user->password=Hash::make($request->password);
            $user->save();
            $request->session()->flash('message','Registered Successsfully');
            return redirect()->route('user.login');

        }catch(Exception $e){

            return view('Error.error');

        }
    }
    public function emailValidate(Request $request)
    {

        try{

            $email=$request->email;

            $checkEmail=User::where('email',$email)->first();

            if($checkEmail){

                return response()->json(array('status'=>'exist'));

            }else{

                return response()->json(array('status'=>'ok'));

            }

        }catch(Exception $e){

            $html=view('Error.error')->render();

			return response()->json(array('status'=>'error','error'=>$html));
        }
        
    }
}
