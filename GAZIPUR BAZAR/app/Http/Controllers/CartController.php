<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\QuantityRequest;
use App\Cart;
use App\Product;
use App\User;
use App\Order;
use App\ContactUs;

class CartController extends Controller
{
	public function cartIndex(Request $request)
    {
    	$user = $request->session()->get('loggedUser');
    	$carts=Cart::where('user_id',$user)->get();
    	$totals=0;
    	$quantity=0;
    	foreach($carts as $cart){
    		$totals+=$cart->unit_price*$cart->quantity;
    		$quantity+=$cart->quantity;
    	}
        $footers=ContactUs::all();
        return view('User.cart')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('totals',$totals)
        ->with('carts',$carts)
        ->with('user',$user);
	}
	public function getAllCart(Request $request)
	{
		$user = $request->session()->get('loggedUser');
		$carts=Cart::where('user_id',$user)->get();
		$dataArray=[];
		$total=0;
		$count=count($carts);
		foreach($carts as $key=>$data){

			$dataArray[]=[

				'id'=>$data->id,
				'key'=>$key+1,
				'image'=>asset('images/product/'.$data->productimage),
				'name'=>$data->productname,
				'size'=>$data->size,
				'quantity'=>$data->quantity,
				'unit_price'=>$data->unit_price,
				'subtotal'=>$data->quantity*$data->unit_price,
				
			];
			$total+=$data->total_price;
		}
		return response()->json(array('data'=>$dataArray,'total'=>$total,'count'=>$count));
	}
    public function addCart(Request $request)
    {
		
    	$user=$request->session()->get('loggedUser');
    	if (!$user) {
    		$request->session()->flash('message','Sorry ! You Need to login');
    		return response()->json(array('status'=>'login'));
		}
		$quantity=0;
    	$product=Product::find($request->product_id);
    	$cart= new Cart();
    	$cart->user_id= $user;
    	$cart->product_id=$request->product_id;
    	$cart->productimage=$request->productimage;
		$cart->productname=$request->productname;
		
    	if ($request->product_size) {
    		$cart->size=$request->product_size;
    	}
    	
    	if ($request->quantity<=$product->quantity && $request->quantity>0) {

    		$cart->quantity = $request->quantity;
    	}
    	else{

    		$request->session()->flash('message','Sorry ! Product is Out of Stock');
    		return back();
		}
		
		
    	if($product->discount>0){
    		$result=0;
			$result=$product->price-($product->price*$product->discount/100);
			$cart->unit_price=$result;
    	}else{
    		$cart->unit_price=$product->price;
		}
		
		$cart->total_price=$cart->unit_price*$cart->quantity;
		$cart->save();
		
    	$carts=Cart::where('user_id',$user)->get();
		
		$quantity=0;
    	foreach($carts as $cart){
    		
    		$quantity+=$cart->quantity;
    	}
		return response()->json($quantity);
    }
    public function cartEdit(Request $request)
    {

		$id=$request->id;
		
		$cart=Cart::where('id',$id)
					->where('user_id',$request->session()->get('loggedUser'))
					->first();

		$available=Product::find($cart->product_id);
		
		return response()->json(array('data'=>$cart,'available'=>$available));
    }
    public function cartUpdate(Request $request)
    {
    	$carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        
        $cart=Cart::find($request->id);
    	$product=Product::find($cart->product_id);
    	if ($request->upquantity<=$product->quantity) {
    		$cart->quantity = $request->upquantity;
    	}
    	else{
    		$request->session()->flash('message','Sorry ! Product is Out of Stock');
    		return back();
    	}
    	$cart->total_price=$cart->unit_price*$cart->quantity;
    	$cart->save();
    
    }
    public function cartRemove(Request $request)
    {
    	
        $quantity=0;
        
		$carts=Cart::where('id',$request->id)
					->where('user_id',$request->session()->get('loggedUser'))
					->delete();

		$carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();

		$total=0;

		foreach($carts as $cart){

			$quantity+=$cart->quantity;
			$total+=$cart->total_price;
        }
		
		return response()->json(array('data'=>$quantity,'total'=>$total));
    }
}
