<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class AllUsersController extends Controller
{
    public function premiumUsers(Request $request)
    {
        $admins=Admin::all();
        $events=EventIndex::all();
        
        return view('Admin.premiumusers')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function premiumUsersData(Request $request)
    {
        $admins=Admin::all();
        $events=EventIndex::all();

        $from=$request->from;
        $to=$request->to;
        $orders=DB::select("

        SELECT 
            tbl_user.name,
            tbl_user.mobile,
            tbl_user.mobile2,
            tbl_user.address,
            tbl_user.email,
            tbl_user.id,
            COUNT(user_id) AS count,
            SUM(cart_totalprice) AS cart_totalprice
        FROM
            tbl_order
                LEFT JOIN
            tbl_user ON tbl_user.id = tbl_order.user_id
        WHERE
            DATE(orderdate) BETWEEN '$from' AND '$to'
        GROUP BY user_id
        ORDER BY count DESC
        ");
        
        return response()->json(array('data'=>$orders));
    }
}
