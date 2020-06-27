<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extra;
use App\Cart;
use App\ContactUs;
use App\Invoice;
use Exception;

class ExtraController extends Controller
{
    public function getExtraOrder(Request $request)
    {
        try{

            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            return view('User.extraorder')
                ->with('footers',$footers)
                ->with('quantity',$quantity);

        }catch(Exception $e){

            return view('Error.error');

        }
    }
    public function getExtraOrderStore(Request $request)
    {
        try{

            
            $extra=new Extra();
            $extra->tbl_extra_name=$request->name;

            if ($request->hasFile('tbl_extra_image')) {

                $image1 = $request->file('tbl_extra_image');
                $filename1 = time() . 'extra-1.' . $image1->getClientOriginalExtension();
                $location1 = public_path('images/extra');
                $image1->move($location1, $filename1);
                // Image::make($image)->resize(800, 400)->save($location);
                $extra->tbl_extra_image = $filename1;
            }

            $extra->tbl_extra_quantity=$request->quantity;
            $extra->tbl_extra_user_id=$request->session()->get('loggedUser');
            $extra->tbl_extra_status=1;
            $extra->tbl_extra_data=date('Y-m-d H:i:s');;
            $extra->save();
            return redirect()->route('user.extraOrder');

        }catch(Exception $e){

            return view('Error.error');

        }
    }
}
