<?php

namespace App\Http\Controllers;

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
use App\Product;
use App\ContactUs;

use Exception;



class UserController extends Controller
{
    
    public function index(Request $request)
    {

        try{

            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            
            $fruits=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name','food-fruits&vegitable')
                        ->get();
            $ladies=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                            ->select("*","tbl_product.id as id","tbl_category.id as catid")
                            ->where('category_name','ladies clothing')
                            ->get();
            $gadgets=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                            ->select("*","tbl_product.id as id","tbl_category.id as catid")
                            ->where('category_name','gadget')
                            ->get();
            $events=DB::table('tbl_index')->get();
            
            return view('User.index')
            ->with('quantity',$quantity)
            ->with('carts',$carts)
            ->with('fruits',$fruits)
            ->with('ladies',$ladies)
            ->with('footers',$footers)
            ->with('events',$events)
            ->with('gadgets',$gadgets);

        }catch(Exception $e){

            return view('Error.error');

        }
        
    }
    public function newarrival(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('newarrival',1)
                        ->get();
        return view('User.allproduct')
            ->with('products',$products)
            ->with('footers',$footers)
            ->with('quantity',$quantity);
    }
    public function discount(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('discount','>','0')
                        ->get();
        return view('User.allproduct')
            ->with('products',$products)
            ->with('footers',$footers)
            ->with('quantity',$quantity);
    }

    public function ladiesIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=LadiesIndex::all();
        return view('User.ladies-index')
        ->with('events',$events)
        ->with('footers',$footers)
        ->with('quantity',$quantity);
    }
    public function ladiesClothing(Request $request,$name)
    {
         $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        
        $footers=ContactUs::all();
        return view('User.allproduct')
        ->with('footers',$footers)
        ->with('quantity',$quantity)
        ->with('products',$products);
    }
    public function ladiesJuwellay(Request $request,$name)
    {
         $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function ladiesCosmatic(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
        ->select("*","tbl_product.id as id","tbl_category.id as catid")
        ->where('category_name',$name)
        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function ladiesShoes(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function gentsIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=GentsIndex::all();
        return view('User.gents-index')
        ->with('events',$events)
        ->with('footers',$footers)
        ->with('quantity',$quantity);
    }
    public function gentsClothing(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function gentsCosmatic(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function gentsShoes(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function leatherIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=LeatherIndex::all();
        return view('User.leather-index')
        ->with('events',$events)
        ->with('footers',$footers)
        ->with('quantity',$quantity);
    }
    public function leatherBag(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function leatherBelt(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function leatherShoes(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function electricIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=ElectricIndex::all();
        return view('User.electrical&electronics-index')
        ->with('events',$events)
        ->with('footers',$footers)
        ->with('quantity',$quantity);
    }
    public function computerAccessories(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function electronics(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function securityServillance(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function gadgetPage(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function houseHoldIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=HouseholdIndex::all();
        return view('User.household-index')
        ->with('events',$events)
        ->with('footers',$footers)
        ->with('quantity',$quantity);
    }
    public function cushions(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function throwsBlankets(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function mirrors(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function curtains(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('footers',$footers)
        ->with('quantity',$quantity)
        ->with('products',$products);
    }
    public function furnitureIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=FurnitureIndex::all();
        return view('User.furniture-index')
        ->with('events',$events)
        ->with('footers',$footers)
        ->with('quantity',$quantity);
    }
    public function sofas(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function chairs(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function ottomans(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function tables(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function entertainmentCenter(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function bedRooms(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function toysShowIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=ToysIndex::all();
        return view('User.toys&showpiece-index')
        ->with('events',$events)
        ->with('footers',$footers)
        ->with('quantity',$quantity);
    }
    public function toys(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function showPieces(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function giftIndex(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function flowersIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=FlowerIndex::all();
        return view('User.flowers-index')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('events',$events);
    }
    public function romance(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function anniversary(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function roses(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
        ->select("*","tbl_product.id as id","tbl_category.id as catid")
        ->where('category_name',$name)
        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function birthday(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function thankyou(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function sympathy(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function booksIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=BooksIndex::all();
        return view('User.booksmagazine-index')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('events',$events);
    }
    public function books(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function magazine(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function foodIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=FoodIndex::all();
        return view('User.food-index')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('events',$events);
    }
    public function groceries(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function breadBakery(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function fruitsVegitables(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function meatFish(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function freshMilk(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function eventIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
    	$events=EventIndex::all();
    	return view('User.eventmanagement-index')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
    	->with('events',$events);
    }
    public function weddingEventPage(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
    	$events=EventWedding::all();
    	return view('User.event-page')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
    	->with('events',$events);
    }
    public function birthdayEventPage(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
    	$events=EventBirthday::all();
    	return view('User.event-page')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
    	->with('events',$events);
    }
    public function HospitalityEventPage(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
    	$events=EventHospitality::all();
    	return view('User.event-page')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
    	->with('events',$events);
    }
    public function othersEventPage(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
    	$events=EventOthers::all();
    	return view('User.event-page')
        ->with('footers',$footers)
        ->with('quantity',$quantity)
    	->with('events',$events);
    }
    public function lightIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
    	$events=Light::all();
    	return view('User.event-page')
        ->with('footers',$footers)
        ->with('quantity',$quantity)
    	->with('events',$events);
    }
    public function famousTradionalIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=FamousTraditional::all();
        return view('User.famous&traditional')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('events',$events);
    }
    public function nakshikatha(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function potteryTerracotta(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function shitalPati(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('footers',$footers)
        ->with('quantity',$quantity)
        ->with('products',$products);
    }
    public function partsAccessoriesIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=PartsAccessories::all();
        return view('User.parts&accessories')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('events',$events);
    }
    public function bikes(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function cars(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function medicineEmergencyIndex(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $events=MedicineEmergency::all();
        return view('User.medicineemergency')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('events',$events);
    }
    public function medicine(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function fastAidKit(Request $request,$name)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('category_name',$name)
                        ->get();
        return view('User.allproduct')
        ->with('quantity',$quantity)
        ->with('footers',$footers)
        ->with('products',$products);
    }
    public function searchItem(Request $request)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $search=$request->search;
        $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where('product_name','like','%'.$search.'%')
                        ->get();
        
        return view('User.allproduct')
            ->with('quantity',$quantity)
            ->with('footers',$footers)
            ->with('products',$products)
            ->with('search',$search);
    }
    public function productDetails(Request $request,$id)
    {
        try{

            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            
            $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                        ->select("*","tbl_product.id as id","tbl_category.id as catid")
                        ->where("tbl_product.id",$id)
                        ->first();
          
            $sizes = json_decode($products->size);
            return view('User.product-details')
            ->with('quantity',$quantity)
            ->with('products',$products)
            ->with('footers',$footers)
            ->with('sizes',$sizes);

        }catch(Exception $e){

            return view('Error.error');

        }
    }
    public function invoiceIndex(Request $request,$id)
    {
        $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $totalprice=0;
        $footers=ContactUs::all();
        $users=DB::table('view_order')
        ->where('user_id',$request->session()->get('loggedUser'))
        ->where('invoice_id',$id)->get();
        foreach ($users as $cart) {
                $totalprice=$cart->cart_totalprice;
            }
        return view('User.invoice')
            ->with('users',$users)
            ->with('footers',$footers)
            ->with('totalprice',$totalprice)
            ->with('id',$id)
            ->with('quantity',$quantity);
    }
    
    public function customerOrder(Request $request,$id)
    {
        $users = User::where('id',$request->session()->get('loggedUser'))->get();
         $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
        $quantity=0;
        foreach($carts as $cart){

            $quantity+=$cart->quantity;
        }
        $footers=ContactUs::all();
        $orders = DB::table('view_order')
                    ->where('user_id',$id)->get();
        return view('User.orderdetails')
                ->with('users',$users)
                ->with('quantity',$quantity)
                ->with('footers',$footers)
                ->with('orders',$orders);
    }
    public function aboutUs(Request $request)
    {

        try{

            $users = User::where('id',$request->session()->get('loggedUser'))->get();
            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            $footersitem=AboutUS::all();
            return view('User.footer')
                ->with('quantity',$quantity) 
                ->with('footersitem',$footersitem) 
                ->with('footers',$footers);

        }catch(Exception $e){

            return view('Error.error');
        }
         
    }
    public function policy(Request $request)
    {
        try{

            $users = User::where('id',$request->session()->get('loggedUser'))->get();
            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            $footersitem=Policy::all();
            return view('User.footer')
                ->with('quantity',$quantity) 
                ->with('footersitem',$footersitem)
                ->with('footers',$footers);

        }catch(Exception $e){

            return view('Error.error');

        }
    }
    public function contactus(Request $request)
    {
        try{

            $users = User::where('id',$request->session()->get('loggedUser'))->get();
            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            return view('User.contact')
                ->with('quantity',$quantity) 
                ->with('footers',$footers);

        }catch(Exception $e){

            return view('Error.error');

        }
    }
    public function eidSpecial(Request $request,$name)
    {
        try{

            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                            ->select("*","tbl_product.id as id","tbl_category.id as catid")
                            ->where('category_name',$name)
                            ->get();
            return view('User.allproduct')
            ->with('quantity',$quantity)
            ->with('footers',$footers)
            ->with('products',$products);

        }catch(Exception $e){

            return view('Error.error');

        }
    }
    public function other(Request $request,$name)
    {
        try{

            $carts =Cart::where('user_id',$request->session()->get('loggedUser'))->get();
            $quantity=0;
            foreach($carts as $cart){

                $quantity+=$cart->quantity;
            }
            $footers=ContactUs::all();
            $products=Product::leftjoin('tbl_category','tbl_category.id','tbl_product.category_fk')
                            ->select("*","tbl_product.id as id","tbl_category.id as catid")
                            ->where('category_name',$name)
                            ->get();
            return view('User.allproduct')
            ->with('quantity',$quantity)
            ->with('footers',$footers)
            ->with('products',$products);

        }catch(Exception $e){

            return view('Error.error');

        }
    }
}
