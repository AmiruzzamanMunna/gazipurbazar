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
use App\Extra;
use Exception;

class OrderController extends Controller
{
    public function orderShow(Request $request)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::table('tbl_invoice')
                    ->leftjoin('tbl_user','tbl_user.id','tbl_invoice.user_id')
                    ->select("*","tbl_invoice.id as id","tbl_user.id as userID")
                    ->orderBy('Order_date','desc')
                    ->paginate(10);
        return view('Admin.order')
            ->with('admins',$admins)
            ->with('events',$events)
            ->with('orders',$orders);
    }
    public function todayOrder(Request $request)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::table('tbl_invoice')
                    ->leftjoin('tbl_user','tbl_user.id','tbl_invoice.user_id')
                    ->select("*","tbl_invoice.id as id","tbl_user.id as userID")
                    ->where(DB::raw("Date(Order_date)"),date('Y-m-d'))
                    ->orderBy('Order_date','desc')
                    ->paginate(10);
        
        return view('Admin.order')
            ->with('admins',$admins)
            ->with('events',$events)
            ->with('orders',$orders);
    }
    public function searchOrder(Request $request)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::table('tbl_invoice')
                    ->leftjoin('tbl_user','tbl_user.id','tbl_invoice.user_id')
                    ->select("*","tbl_invoice.id as id","tbl_user.id as userID")
                    ->where(DB::raw("Date(Order_date)"),date('Y-m-d'))
                    ->orderBy('Order_date','desc')
                    ->paginate(10);

        $date=[];
        $name=[];
        
        return view('Admin.searchorder')
            ->with('admins',$admins)
            ->with('date',$date)
            ->with('name',$name)
            ->with('events',$events)
            ->with('orders',$orders);
    }
    public function searchOrderResult(Request $request)
    {
        $date=$request->search;
        $name=$request->name;
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::table('tbl_invoice')
                    ->leftjoin('tbl_user','tbl_user.id','tbl_invoice.user_id')
                    ->select("*","tbl_invoice.id as id","tbl_user.id as userID")
                    ->where(DB::raw("Date(Order_date)"),$date)
                    ->orWhere('name','like',"%$name%")
                    ->orderBy('Order_date','desc')
                    ->paginate(10);
        
        return view('Admin.searchorder')
            ->with('date',$date)
            ->with('name',$name)
            ->with('admins',$admins)
            ->with('events',$events)
            ->with('orders',$orders);
    }
    public function orderPending(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=DB::table('tbl_invoice')
                    ->leftjoin('tbl_user','tbl_user.id','tbl_invoice.user_id')
                    ->select("*","tbl_invoice.id as id","tbl_user.id as userID")
                    ->where('status',1)
                    ->orderBy('Order_date','desc')
                    ->paginate(10);
        return view('Admin.order')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('orders',$orders);
    }
    public function orderdelivered(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=DB::table('tbl_invoice')
                    ->leftjoin('tbl_user','tbl_user.id','tbl_invoice.user_id')
                    ->select("*","tbl_invoice.id as id","tbl_user.id as userID")
                    ->where('status',2)
                    ->orderBy('Order_date','desc')
                    ->paginate(10);
        
        return view('Admin.order')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('orders',$orders);
    }
    public function orderCanceled(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=DB::table('tbl_invoice')
                    ->leftjoin('tbl_user','tbl_user.id','tbl_invoice.user_id')
                    ->select("*","tbl_invoice.id as id","tbl_user.id as userID")
                    ->where('status',4)
                    ->orderBy('Order_date','desc')
                    ->paginate(10);
       
        return view('Admin.order')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('orders',$orders);
    }
    public function orderInfoShow(Request $request,$id)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::select("

                    SELECT 
                    name,
                    mobile1,
                    mobile2,
                    address,
                    email,
                    invoice_id,
                    tbl_order.user_id AS user_id,
                    product_name,
                    image1,
                    SUM(cart_quantity) AS cart_quantity,
                    cart_size,
                    SUM(cart_totalprice) AS cart_totalprice,
                    orderdate,
                    status
                FROM
                    tbl_order
                        LEFT JOIN
                    tbl_product ON tbl_product.id = tbl_order.cart_product_id
                        LEFT JOIN
                    tbl_invoice ON tbl_invoice.id = tbl_order.invoice_id
                WHERE
                    invoice_id = $id
                GROUP BY tbl_product.id
        ");
        
        
        return view('Admin.orderinfo')
            ->with('id',$id)
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
    public function adminExtraOrder(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=Extra::leftjoin('tbl_user','tbl_user.id','tbl_extra.tbl_extra_user_id')
                        ->orderBY('tbl_extra_data','desc')
                        ->paginate(10);
       
        return view('Admin.extraorder')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('orders',$orders);
    }
    public function adminExtraOrderInfo(Request $request,$id)
    {

        
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=Extra::leftjoin('tbl_user','tbl_user.id','tbl_extra.tbl_extra_user_id')
                        ->where('tbl_extra_id',$id)
                        ->get();
       
        return view('Admin.extraorderinfo')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('id',$id)
            ->with('orders',$orders);
    }
    public function updateOrderPrice(Request $request)
    {
        $id=$request->id;
        $amount=$request->amount;
        $data=Extra::where('tbl_extra_id',$id)->first();
        $data->tbl_extra_price=$data->tbl_extra_quantity*$amount;
        $data->save();

        return response()->json(array('status'=>'ok'));
    }
    public function extraStatusdelivered(Request $request,$id)
    {
        $orders=Extra::where('tbl_extra_id',$id)->first();
        if($orders){
            $orders->tbl_extra_status=2;
            // dd($orders);
            $orders->save();
        }
        return back();
    }
    public function extraStatusReceived(Request $request,$id)
    {
        $orders=Extra::where('tbl_extra_id',$id)->first();
        if($orders){
            $orders->tbl_extra_status=3;
            // dd($orders);
            $orders->save();
        }
        return back();
    }
    public function extraStatusCancel(Request $request,$id)
    {
        $orders=Extra::where('tbl_extra_id',$id)->first();
        if($orders){
            $orders->tbl_extra_status=4;
            // dd($orders);
            $orders->save();
        }
        return back();
    }
}
