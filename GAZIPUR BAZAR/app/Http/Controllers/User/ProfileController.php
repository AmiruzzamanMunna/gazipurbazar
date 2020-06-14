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

class ProfileController extends Controller
{
    public function userAccount(Request $request)
    {

        try{

            $users = User::where('id',$request->session()->get('loggedUser'))->first();
            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            $orders=DB::table('view_order')
                        ->where('user_id',$request->session()->get('loggedUser'))->get();
            return view('layouts.profile')
                ->with('quantity',$quantity)
                ->with('footers',$footers)
                ->with('users',$users)
                ->with('orders',$orders);

        }catch(Exception  $e){

            return view('Error.error');
        }
        
    }
    public function todayOrder(Request $request)
    {
        try{

            $users = User::where('id',$request->session()->get('loggedUser'))->first();
            
            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $date=date('y-m-d');
            
            $footers=ContactUs::all();
            $orders=DB::select("

                    SELECT 
                    O.name as name,
                    O.mobile1,
                    O.mobile2,
                    O.address,
                    O.email,
                    O.invoice_id,
                    O.user_id AS userID,
                    image1,
                    product_name,
                    cart_totalprice,
                    cart_size,
                    cart_quantity,
                    DATE(O.orderdate) AS orderdate,
                    status
                FROM
                    tbl_order as O
                        LEFT JOIN
                    tbl_invoice ON tbl_invoice.id = O.invoice_id
                        LEFT JOIN
                    tbl_product ON tbl_product.id = O.cart_product_id
                WHERE
                    O.user_id = $users->id
                        AND DATE(O.orderdate) = '$date'
                
            ");

            return view('profile.today')
                ->with('quantity',$quantity)
                ->with('footers',$footers)
                ->with('users',$users)
                ->with('orders',$orders);

        }catch(Exception  $e){


            return view('Error.error');
        }
    }
    public function orderHistory(Request $request)
    {
        try{

            $users = User::where('id',$request->session()->get('loggedUser'))->first();
            
            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $date=date('y-m-d');
            
            $footers=ContactUs::all();
            $orders=DB::select("

                    SELECT 
                    O.name as name,
                    O.mobile1,
                    O.mobile2,
                    O.address,
                    O.email,
                    O.invoice_id,
                    O.user_id AS userID,
                    image1,
                    product_name,
                    cart_totalprice,
                    cart_size,
                    cart_quantity,
                    DATE(O.orderdate) AS orderdate,
                    status
                FROM
                    tbl_order as O
                        LEFT JOIN
                    tbl_invoice ON tbl_invoice.id = O.invoice_id
                        LEFT JOIN
                    tbl_product ON tbl_product.id = O.cart_product_id
                WHERE
                    O.user_id = $users->id
                        AND DATE(O.orderdate) <= '$date'
                
            ");

            return view('profile.history')
                ->with('quantity',$quantity)
                ->with('footers',$footers)
                ->with('users',$users)
                ->with('orders',$orders);

        }catch(Exception $e){

            return view('Error.error');
        }
    }
    public function updateProfile(Request $request)
    {
        try{

            $users = User::where('id',$request->session()->get('loggedUser'))->first();

            return view('profile.updateprofile')
                    ->with('users',$users);


        }catch(Exception $e){

            return view('Error.error');

        }
    }
    public function updateProfileUpdate(Request $request)
    {
        $rules=[
            'confirm_password'=>'required_with:password|same:password'
        ];
        $mess=[

            'confirm_password'=>'Password dont match'
        ];
        $this->validate($request,$rules,$mess);

        $user=User::where('id',$request->session()->get('loggedUser'))
                    ->update([

                        'name'=>$request->name,
                        'mobile'=>$request->mobile,
                        'mobile2'=>$request->mobile2,
                        'address'=>$request->address,
                        'password'=>($request->password)?Hash::make($request->password):$request->tokenVal,
                    ]);

        $request->session()->flash('message','Data Updated');
        return back();

    }
}
