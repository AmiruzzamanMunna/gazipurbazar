<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Cart;
use App\Order;
use App\Admin;
use App\Invoice;
use App\Product;
use App\EventIndex;
use App\ContactUs;
use App\User;
use Redirect;
use Exception;

class CheckOutController extends Controller
{
    public function checkOut(Request $request)
    {
    	try{

            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            $user=User::where('id',$request->session()->get('loggedUser'))->first();
            return view('User.order')
            ->with('footers',$footers)
                    ->with('quantity',$quantity)
                    ->with('user',$user);

        }catch(Exception $e){

            return view('Error.error');
        }
    }
    public function checkOutStore(OrderRequest $request)
    {
    	$userid=$request->session()->get('loggedUser');
    	$carts=Cart::where('user_id',$userid)->get();
    	$invoice= new Invoice();
    	$invoice->user_id=$userid;
    
    	$invoice->status=1;
    	if($invoice->save()>0)
    	{
    		foreach($carts as $cart){

    			$order= new Order();
    			$order->name=$request->name;
    			$order->mobile1=$request->mobile1;
    			if ($request->mobile2) {
                    $order->mobile2=$request->mobile2;
                }
    			$order->address=$request->address;
    			$order->email=$request->email;
    			$order->invoice_id=$invoice->id;
    			$order->cart_id=$cart->id;
    			$order->user_id=$userid;
    			$product=Product::find($cart->product_id);
    			$order->cart_product_id=$cart->product_id;
    			$order->cart_size=$cart->size;
    			$order->cart_quantity=$cart->quantity;
    			$product->quantity=$product->quantity-$cart->quantity;
    			$product->save();
    			$order->cart_totalprice=$cart->total_price;
    			if ($order->save()>0) {
					
    				$cart=Cart::where('user_id',$request->session()->get('loggedUser'))
    							->delete();
    			}
    		}
    	}
		// return redirect()->route('user.invoice',[$invoice->id]);
		$request->session()->flash('message','Data Stored');
		$url=route('user.todayOrder');
    	return Redirect::away($url);
    }
}
