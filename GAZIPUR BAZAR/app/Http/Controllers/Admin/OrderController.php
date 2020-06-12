<?php

namespace App\Http\Controllers\Admin;

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
use Exception;

class OrderController extends Controller
{
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
    public function statusreceived(Request $request,$id)
    {
        $orders=Invoice::where('id',$id)->first();
        if($orders){
            $orders->status=3;
            // dd($orders);
            $orders->save();

        }
        return back();
    }
    public function statuscancel(Request $request,$id)
    {
        $orders=Invoice::where('id',$id)->first();
        if($orders){
            $orders->status=4;
            $orders->save();

            $cancelOrder=Order::where('invoice_id',$id)->get();

            foreach($cancelOrder as $cancelOrder){

                $product=Product::find($cancelOrder->cart_product_id);

                $product->quantity=$product->quantity+$cancelOrder->cart_quantity;
                $product->save();
            }
        }
        return back();
    }
}
