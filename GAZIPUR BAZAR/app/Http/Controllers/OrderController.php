<?php

namespace App\Http\Controllers;

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

class OrderController extends Controller
{
    public function checkOut(Request $request)
    {
    	$carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
    	return view('User.order')
        ->with('footers',$footers)
    			->with('quantity',$quantity);
    }
    public function checkOutStore(OrderRequest $request)
    {
    	$userid=$request->session()->get('loggedUser');
    	$carts=Cart::where('user_id',$userid)->get();
    	$carttotal=0;
    	foreach ($carts as $cart) {
    		
    		$carttotal+=$cart->total_price;
    	}
    	$invoice= new Invoice();
    	$invoice->user_id=$userid;
    	$invoice->Order_date=date('Y-m-d');
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
    			$order->cart_totalprice=$carttotal;
    			$order->orderdate=date('Y-m-d');
    			if ($order->save()>0) {
    				$cart=Cart::where('user_id',$request->session()->get('loggedUser'))
    							->delete();
    			}
    		}
    	}
    	return redirect()->route('user.invoice',[$invoice->id]);
    }
    public function orderShow(Request $request)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::table('view_invoice')->paginate(10);
        return view('Admin.order')
            ->with('admins',$admins)
            ->with('events',$events)
            ->with('orders',$orders);
    }
    public function orderInfoShow(Request $request,$id)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::table('view_order')
                ->where('invoice_id',$id)->get();
        return view('Admin.orderinfo')
            ->with('admins',$admins)
            ->with('events',$events)
            ->with('orders',$orders);
    }
    public function statusdelivered(Request $request,$id)
    {
        $orders=Invoice::where('id',$id)->first();
        if($orders){
            $orders->status=2;
            // dd($orders);
            $orders->save();
        }
        return back();
    }
    public function statuscancel(Request $request,$id)
    {
        $orders=Invoice::where('id',$id)->first();
        if($orders){
            $orders->status=3;
            $orders->save();
        }
        return back();
    }
}
