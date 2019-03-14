<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\EventWeddingRequest;
use App\Http\Requests\EventIndexRequest;
use App\Http\Requests\PartsAccessoriesRequest;
use App\Http\Requests\ProductRequest;
use App\EventWedding;
use App\Product;
use App\EventBirthday;
use App\EventHospitality;
use App\EventOthers;
use App\EventIndex;
use App\Light;
use App\FamousTraditional;
use App\PartsAccessories;
use App\MedicineEmergency;
use App\Category;
use App\Admin;
use Image;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    	$events=EventIndex::all();
    	$catogories=Category::all();
      $admins=Admin::all();
    	return view('Admin.productadd')
      ->with('admins',$admins)
    	->with('catogories',$catogories)
    	->with('events',$events);
    }
    public function productStore(ProductRequest $request)
    {
      $sizes = [];
      foreach ($request->seze as $size) {
        if ($size != null) {
          $sizes = $size;
        }
      }
    	$product = new Product();
      $product->product_code = $request->product_code;
      $product->product_name = $request->product_name;
      $product->category_fk = $request->category;
      $product->size = json_encode($sizes);
      $product->price = $request->price;
      $product->discount = $request->discount;
      $product->quantity = $request->quantity;
      $product->newarrival = $request->newarrival;
      if ($request->hasFile('image1')) {
        $image1 = $request->file('image1');
        $filename1 = time() . 'product-1.' . $image1->getClientOriginalExtension();
        $location1 = public_path('images/product');
        // Image::make($image1->getRealPath())->resize(280, 280)->save(public_path('images/product'.$filename1));
        $image1->move($location1, $filename1);
        
        $product->image1 = $filename1;
      }
      if ($request->hasFile('image2')) {
        $image2 = $request->file('image2');
        $filename2 = time() . 'product-2.' . $image2->getClientOriginalExtension();
        $location2 = public_path('images/product');
        // Image::make($image2->getRealPath())->resize(280, 280)->save($filename2);
        $image2->move($location2, $filename2);
        $product->image2 = $filename2;
      }
      if ($request->hasFile('image3')) {
        $image3 = $request->file('image3');
        $filename3 = time() . 'product-3.' . $image3->getClientOriginalExtension();
        $location3 = public_path('images/product');     
        // Image::make($image3->getRealPath())->resize(280, 280)->save(public_path('images/product').$filename3);
        $image3->move($location3, $filename3);
        $product->image3 = $filename3;
      }
      $product->specifications =$request->specifications;
      $product->save();
      $request->session()->flash('message','Data Inserted');
	    return back();
    }
    public function viewAllproduct(Request $request)
    {
      $events=EventIndex::all();
      $products=DB::table('view_product')
      ->paginate(10);
      $admins=Admin::all();
      return view('Admin.viewproduct')
        ->with('admins',$admins)
        ->with('events',$events)
        ->with('products',$products);
    }
    public function productEdit(Request $request,$id)
    {
      $catogories=Category::all();
      $products=Product::where('id',$id)
                        ->first();
      $sizes=json_decode($products->size);
      $events=EventIndex::all();
      $admins=Admin::all();
      return view('Admin.updateproduct')
              ->with('catogories',$catogories)
              ->with('sizes',$sizes)
              ->with('admins',$admins)
              ->with('products',$products)
              ->with('events',$events);
    }
    public function editProductStore(Request $request,$id)
    {
      $product=Product::find($request->id);
      $sizes = [];
      foreach ($request->seze as $size) {
        if ($size != null) {
          $sizes = $size;
        }
      }
      $product->product_code = $request->product_code;
      $product->product_name = $request->product_name;
      $product->category_fk = $request->category;
      $product->size =($sizes);
      $product->price = $request->price;
      $product->discount = $request->discount;
      $product->quantity = $request->quantity;
      $product->newarrival = $request->newarrival;
      if ($request->hasFile('image1')) {
        $image1 = $request->file('image1');
        $filename1 = time() . 'product-1.' . $image1->getClientOriginalExtension();
        $location1 = public_path('images/product');
        // Image::make($image1->getRealPath())->resize(280, 280)->save(public_path('images/product'.$filename1));
        $image1->move($location1, $filename1);
        
        $product->image1 = $filename1;
      }
      if ($request->hasFile('image2')) {
        $image2 = $request->file('image2');
        $filename2 = time() . 'product-2.' . $image2->getClientOriginalExtension();
        $location2 = public_path('images/product');
        // Image::make($image2->getRealPath())->resize(280, 280)->save($filename2);
        $image2->move($location2, $filename2);
        $product->image2 = $filename2;
      }
      if ($request->hasFile('image3')) {
        $image3 = $request->file('image3');
        $filename3 = time() . 'product-3.' . $image3->getClientOriginalExtension();
        $location3 = public_path('images/product');     
        // Image::make($image3->getRealPath())->resize(280, 280)->save(public_path('images/product').$filename3);
        $image3->move($location3, $filename3);
        $product->image3 = $filename3;
      }
      $product->specifications =$request->specifications;
      $product->save();
      $request->session()->flash('message','Data Updated');
      return back();
    }
    public function deleteProduct(Request $request,$id)
    {
      $product=Product::find($request->id);
      $product->delete();
      return redirect()->route('product.viewAllproduct');
    }
}
