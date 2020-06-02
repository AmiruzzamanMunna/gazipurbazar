<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EventWeddingRequest;
use App\Http\Requests\EventIndexRequest;
use App\Http\Requests\PartsAccessoriesRequest;
use App\Http\Requests\LoginRequest;
use App\EventWedding;
use App\EventBirthday;
use App\EventHospitality;
use App\EventOthers;
use App\EventIndex;
use App\Light;
use App\FamousTraditional;
use App\PartsAccessories;
use App\MedicineEmergency;
use App\FoodIndex;
use App\BooksIndex;
use App\FlowerIndex;
use App\ToysIndex;
use App\FurnitureIndex;
use App\HouseholdIndex;
use App\Admin;
use App\ElectricIndex;
use App\LeatherIndex;
use App\GentsIndex;
use App\LadiesIndex;
use App\AboutUS;
use App\Policy;
use App\ContactUs;

class AdminController extends Controller
{
    
    public function adminEdit(Request $request,$id)
    {
      $events=EventIndex::all();
      $admins=Admin::where('id',$id)->get();
      return view('Admin.updateadmin')
        ->with('events',$events)
        ->with('admins',$admins);
    }
    public function adminUpdate(Request $request,$id)
    {
      $admin=Admin::find($request->id);
      $admin->name=$request->name;
      $admin->username=$request->username;
      $admin->password=Hash::make($request->password);
      $admin->confirm_password=Hash::make($request->confirm_password);
      $admin->save();
      $request->session()->flash('message','Data Updated');
      return back();
    }
    public function index(Request $request)
    {
        $current_order=0;
        $current_deliver=0;
        $current_cancel=0;
        $current_pending=0;
        $orders=DB::table('view_invoice')->get();
        foreach ($orders as $order){
            $current_order++;
        }
        $orders=DB::table('view_invoice')->where('status',1)->get();
        foreach ($orders as $pending){
            $current_pending++;
        }
        $orders=DB::table('view_invoice')->where('status',2)->get();
        foreach ($orders as $deliver){
            $current_deliver++;
        }
        $orders=DB::table('view_invoice')->where('status',4)->get();
        foreach ($orders as $cancel){
            $current_cancel++;
        }
        $admins=Admin::all();
        $events=EventIndex::all();
        $orders=DB::table('view_invoice')
                ->orderby('id','desc')
                ->paginate(10);
        
    	return view('Admin.index')
            ->with('admins',$admins)
            ->with('current_order',$current_order)
            ->with('current_deliver',$current_deliver)
            ->with('current_pending',$current_pending)
            ->with('current_cancel',$current_cancel)
            ->with('orders',$orders)
            ->with('events',$events);
    }
    public function orderPending(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=DB::table('view_invoice')->where('status',1)->paginate(10);
        return view('Admin.order')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('orders',$orders);
    }
    public function orderdelivered(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=DB::table('view_invoice')->where('status',2)->paginate(10);
        return view('Admin.order')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('orders',$orders);
    }
    public function orderCanceled(Request $request)
    {
        $events=EventIndex::all();
        $admins=Admin::all();
        $orders=DB::table('view_invoice')->where('status',4)->paginate(10);
        return view('Admin.order')
            ->with('events',$events)
            ->with('admins',$admins)
            ->with('orders',$orders);
    }
    public function ladiesIndexEdit(Request $request,$id)
    {
        $events=LadiesIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.ladiesindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function ladiesIndexUpdate(Request $request,$id)
    {
        $event=LadiesIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'ladies-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'ladies-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'ladies-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        if ($request->hasFile('image4')) {
          $image4 = $request->file('image4');
          $filename4 = time() . 'ladies-4.' . $image4->getClientOriginalExtension();
          $location4 = public_path('images/uploads');
          $image4->move($location4, $filename4);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image4 = $filename4;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function gentsIndexEdit(Request $request,$id)
    {
        $events=GentsIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.gentsindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function gentsIndexUpdate(Request $request,$id)
    {
        $event=GentsIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'gents-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'gents-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'gents-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function leatherIndexEdit(Request $request,$id)
    {
        $events=LeatherIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.leatherindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function leatherIndexUpdate(Request $request,$id)
    {
        $event=LeatherIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'leather-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'leather-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'leather-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function electricIndexEdit(Request $request,$id)
    {
        $events=ElectricIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.electricindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function electricIndexUpdate(Request $request,$id)
    {
        $event=ElectricIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'electric-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'electric-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'electric-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function houseIndexEdit(Request $request,$id)
    {
        $events=HouseholdIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.householdindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function houseIndexUpdate(Request $request,$id)
    {
        $event=HouseholdIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'houseindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'houseindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'houseindex-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        if ($request->hasFile('image4')) {
          $image4 = $request->file('image4');
          $filename4 = time() . 'houseindex-4.' . $image4->getClientOriginalExtension();
          $location4 = public_path('images/uploads');
          $image4->move($location4, $filename4);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image4 = $filename4;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function furnitureIndexEdit(Request $request,$id)
    {
        $events=FurnitureIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.furniture')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function furnitureIndexUpdate(Request $request,$id)
    {
        $event=FurnitureIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'flowerindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'flowerindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'flowerindex-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        if ($request->hasFile('image4')) {
          $image4 = $request->file('image4');
          $filename4 = time() . 'flowerindex-4.' . $image4->getClientOriginalExtension();
          $location4 = public_path('images/uploads');
          $image4->move($location4, $filename4);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image4 = $filename4;
        }
        if ($request->hasFile('image5')) {
          $image5 = $request->file('image5');
          $filename5 = time() . 'flowerindex-5.' . $image4->getClientOriginalExtension();
          $location5 = public_path('images/uploads');
          $image5->move($location5, $filename5);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image5 = $filename5;
        }
        if ($request->hasFile('image6')) {
          $image6 = $request->file('image6');
          $filename6 = time() . 'flowerindex-6.' . $image4->getClientOriginalExtension();
          $location6 = public_path('images/uploads');
          $image6->move($location6, $filename6);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image6 = $filename6;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function toysIndexEdit(Request $request,$id)
    {
        $events=ToysIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.toysindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function toyIndexUpdate(Request $request,$id)
    {
    $event=ToysIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'toyindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'toyindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();   
    }
    public function flowersIndexEdit(Request $request,$id)
    {
        $events=FlowerIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.flowerindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function flowersIndexUpdate(Request $request,$id)
    {
        $event=FlowerIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'flowerindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'flowerindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'flowerindex-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        if ($request->hasFile('image4')) {
          $image4 = $request->file('image4');
          $filename4 = time() . 'flowerindex-4.' . $image4->getClientOriginalExtension();
          $location4 = public_path('images/uploads');
          $image4->move($location4, $filename4);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image4 = $filename4;
        }
        if ($request->hasFile('image5')) {
          $image5 = $request->file('image5');
          $filename5 = time() . 'flowerindex-5.' . $image4->getClientOriginalExtension();
          $location5 = public_path('images/uploads');
          $image5->move($location5, $filename5);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image5 = $filename5;
        }
        if ($request->hasFile('image6')) {
          $image6 = $request->file('image6');
          $filename6 = time() . 'flowerindex-6.' . $image4->getClientOriginalExtension();
          $location6 = public_path('images/uploads');
          $image6->move($location6, $filename6);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image6 = $filename6;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function booksIndexEdit(Request $request,$id)
    {
        $events=BooksIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.booksindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function booksIndexUpdate(Request $request,$id)
    {
    $event=BooksIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'bookindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'bookindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();   
    }
    public function foodIndexEdit(Request $request,$id)
    {
        $events=FoodIndex::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.foodindex')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function foodIndexUpdate(EventIndexRequest $request,$id)
    {
        $event=FoodIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'foodindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'foodindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'foodindex-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        if ($request->hasFile('image4')) {
          $image4 = $request->file('image4');
          $filename4 = time() . 'foodindex-4.' . $image4->getClientOriginalExtension();
          $location4 = public_path('images/uploads');
          $image4->move($location4, $filename4);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image4 = $filename4;
        }
        if ($request->hasFile('image5')) {
          $image5 = $request->file('image5');
          $filename5 = time() . 'foodindex-5.' . $image4->getClientOriginalExtension();
          $location5 = public_path('images/uploads');
          $image5->move($location5, $filename5);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image5 = $filename5;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();

    }
    public function eventIndex(Request $request)
    {
        $events=EventIndex::all();
        return view('Admin.event-index')
        ->with('admins',$admins)
        ->with('events',$events);
    }
    public function eventIndexEdit(Request $request,$id)
    {
    	$events=EventIndex::where('id',$id)->get();
      $admins=Admin::all();
        return view('Admin.event-index')
        ->with('admins',$admins)
        ->with('id',$id)
        ->with('events',$events);
    }
    public function eventIndexUpdate(EventIndexRequest $request,$id)
    {
        $event=EventIndex::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'eventindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'eventindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'eventindex-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        if ($request->hasFile('image4')) {
          $image4 = $request->file('image4');
          $filename4 = time() . 'eventindex-4.' . $image4->getClientOriginalExtension();
          $location4 = public_path('images/uploads');
          $image4->move($location4, $filename4);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image4 = $filename4;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function eventWedding($value='')
    {
    	$events=EventWedding::all();
      $admins=Admin::all();
    	return view('Admin.event')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function weddingEdit(Request $request,$id)
    {
    	$events=EventWedding::where('id',$id)->get();
      $admins=Admin::all();
    	return view('Admin.event')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function weddingUpdate(EventWeddingRequest $request,$id)
    {
    	$event=EventWedding::find($request->id);
    	if ($request->hasFile('image1')) {
	      $image1 = $request->file('image1');
	      $filename1 = time() . 'wedding-1.' . $image1->getClientOriginalExtension();
	      $location1 = public_path('images/uploads');
	      $image1->move($location1, $filename1);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image1 = $filename1;
    	}
    	if ($request->hasFile('image2')) {
	      $image2 = $request->file('image2');
	      $filename2 = time() . 'wedding-2.' . $image2->getClientOriginalExtension();
	      $location2 = public_path('images/uploads');
	      $image2->move($location2, $filename2);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image2 = $filename2;
    	}
    	if ($request->hasFile('image3')) {
	      $image3 = $request->file('image3');
	      $filename3 = time() . 'wedding-3.' . $image3->getClientOriginalExtension();
	      $location3 = public_path('images/uploads');
	      $image3->move($location3, $filename3);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image3 = $filename3;
    	}
    	$event->heading1=$request->heading1;
    	$event->paragraph1=$request->paragraph1;
    	$event->heading2=$request->heading2;
    	$event->paragraph2=$request->paragraph2;
    	$event->heading3=$request->heading3;
    	$event->paragraph3=$request->paragraph3;
    	$event->heading4=$request->heading4;
    	$event->paragraph4=$request->paragraph4;
    	$event->heading5=$request->heading5;
    	$event->paragraph5=$request->paragraph5;
    	$event->save();

    	$request->session()->flash('message','Data Updated');
    	return back();
    }
    public function eventBirthday(Request $request)
    {
    	$events=EventBirthday::all();
      $admins=Admin::all();
    	return view('Admin.eventbirthday')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function eventBirthdayEdit(Request $request,$id)
    {
    	$events =EventBirthday::where('id',$id)->get();
      $admins=Admin::all();
    	return view('Admin.eventbirthday')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function eventBirthdayUpdate(EventWeddingRequest $request,$id)
    {
    	$event=EventBirthday::find($request->id);
    	if ($request->hasFile('image1')) {
	      $image1 = $request->file('image1');
	      $filename1 = time() . 'birthday-1.' . $image1->getClientOriginalExtension();
	      $location1 = public_path('images/uploads');
	      $image1->move($location1, $filename1);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image1 = $filename1;
    	}
    	if ($request->hasFile('image2')) {
	      $image2 = $request->file('image2');
	      $filename2 = time() . 'birthday-2.' . $image2->getClientOriginalExtension();
	      $location2 = public_path('images/uploads');
	      $image2->move($location2, $filename2);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image2 = $filename2;
    	}
    	if ($request->hasFile('image3')) {
	      $image3 = $request->file('image3');
	      $filename3 = time() . 'birthday-3.' . $image3->getClientOriginalExtension();
	      $location3 = public_path('images/uploads');
	      $image3->move($location3, $filename3);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image3 = $filename3;
    	}
    	$event->heading1=$request->heading1;
    	$event->paragraph1=$request->paragraph1;
    	$event->heading2=$request->heading2;
    	$event->paragraph2=$request->paragraph2;
    	$event->heading3=$request->heading3;
    	$event->paragraph3=$request->paragraph3;
    	$event->heading4=$request->heading4;
    	$event->paragraph4=$request->paragraph4;
    	$event->heading5=$request->heading5;
    	$event->paragraph5=$request->paragraph5;
    	$event->save();

    	$request->session()->flash('message','Data Updated');
    	return back();
    }
    public function eventHospitality(Request $request)
    {
    	$events=EventHospitality::all();
      $admins=Admin::all();
    	return view('Admin.eventhospitality')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function eventHospitalityEdit(Request $request,$id)
    {
    	$events =EventHospitality::where('id',$id)->get();
      $admins=Admin::all();
    	return view('Admin.eventhospitality')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function eventHospitalityUpdate(EventWeddingRequest $request,$id)
    {
    	$event=EventHospitality::find($request->id);
    	if ($request->hasFile('image1')) {
	      $image1 = $request->file('image1');
	      $filename1 = time() . 'hospitality-1.' . $image1->getClientOriginalExtension();
	      $location1 = public_path('images/uploads');
	      $image1->move($location1, $filename1);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image1 = $filename1;
    	}
    	if ($request->hasFile('image2')) {
	      $image2 = $request->file('image2');
	      $filename2 = time() . 'hospitality-2.' . $image2->getClientOriginalExtension();
	      $location2 = public_path('images/uploads');
	      $image2->move($location2, $filename2);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image2 = $filename2;
    	}
    	if ($request->hasFile('image3')) {
	      $image3 = $request->file('image3');
	      $filename3 = time() . 'hospitality-3.' . $image3->getClientOriginalExtension();
	      $location3 = public_path('images/uploads');
	      $image3->move($location3, $filename3);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image3 = $filename3;
    	}
    	$event->heading1=$request->heading1;
    	$event->paragraph1=$request->paragraph1;
    	$event->heading2=$request->heading2;
    	$event->paragraph2=$request->paragraph2;
    	$event->heading3=$request->heading3;
    	$event->paragraph3=$request->paragraph3;
    	$event->heading4=$request->heading4;
    	$event->paragraph4=$request->paragraph4;
    	$event->heading5=$request->heading5;
    	$event->paragraph5=$request->paragraph5;
    	$event->save();

    	$request->session()->flash('message','Data Updated');
    	return back();
    }
    public function eventOthers(Request $request)
    {
    	$events=EventOthers::all();
      $admins=Admin::all();
    	return view('Admin.eventothers')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function eventOthersEdit(Request $request,$id)
    {
    	$events =EventOthers::where('id',$id)->get();
      $admins=Admin::all();
    	return view('Admin.eventhospitality')
      ->with('admins',$admins)
    	->with('events',$events);
    }
    public function eventOthersUpdate(EventWeddingRequest $request,$id)
    {
    	$event=EventOthers::find($request->id);
    	if ($request->hasFile('image1')) {
	      $image1 = $request->file('image1');
	      $filename1 = time() . 'event-1.' . $image1->getClientOriginalExtension();
	      $location1 = public_path('images/uploads');
	      $image1->move($location1, $filename1);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image1 = $filename1;
    	}
    	if ($request->hasFile('image2')) {
	      $image2 = $request->file('image2');
	      $filename2 = time() . 'event-2.' . $image2->getClientOriginalExtension();
	      $location2 = public_path('images/uploads');
	      $image2->move($location2, $filename2);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image2 = $filename2;
    	}
    	if ($request->hasFile('image3')) {
	      $image3 = $request->file('image3');
	      $filename3 = time() . 'event-3.' . $image3->getClientOriginalExtension();
	      $location3 = public_path('images/uploads');
	      $image3->move($location3, $filename3);
	      // Image::make($image)->resize(800, 400)->save($location);
	      $event->image3 = $filename3;
    	}
    	$event->heading1=$request->heading1;
    	$event->paragraph1=$request->paragraph1;
    	$event->heading2=$request->heading2;
    	$event->paragraph2=$request->paragraph2;
    	$event->heading3=$request->heading3;
    	$event->paragraph3=$request->paragraph3;
    	$event->heading4=$request->heading4;
    	$event->paragraph4=$request->paragraph4;
    	$event->heading5=$request->heading5;
    	$event->paragraph5=$request->paragraph5;
    	$event->save();

    	$request->session()->flash('message','Data Updated');
    	return back();
    }
    public function lighIndex(Request $request)
    {
        $events=Light::all();
        $admins=Admin::all();
        return view('Admin.lighting')
        ->with('admins',$admins)
        ->with('events',$events);
    }
    public function lightIndexEdit(Request $request,$id)
    {
        $events=Light::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.lighting')
        ->with('admins',$admins)
        ->with('events',$events);
    }
    public function lightIndexUpdate(EventWeddingRequest $request,$id)
    {
        $event=Light::find($request->id);
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'lighting-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'lighting-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'lighting-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        $event->heading1=$request->heading1;
        $event->paragraph1=$request->paragraph1;
        $event->heading2=$request->heading2;
        $event->paragraph2=$request->paragraph2;
        $event->heading3=$request->heading3;
        $event->paragraph3=$request->paragraph3;
        $event->heading4=$request->heading4;
        $event->paragraph4=$request->paragraph4;
        $event->heading5=$request->heading5;
        $event->paragraph5=$request->paragraph5;
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function famousTraditionalEdit(Request $request,$id)
    {
        $events=FamousTraditional::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.famous&tradition-index')
        ->with('admins',$admins)
        ->with('events',$events);
    }
    public function famousTraditionalUpdate(EventIndexRequest $request,$id)
    {
        $event=FamousTraditional::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'famousindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'famousindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
          $image3 = $request->file('image3');
          $filename3 = time() . 'famousindex-3.' . $image3->getClientOriginalExtension();
          $location3 = public_path('images/uploads');
          $image3->move($location3, $filename3);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image3 = $filename3;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function partsAccessoriesEdit(Request $request,$id)
    {
        $events=PartsAccessories::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.parts&accessories-index')
        ->with('admins',$admins)
        ->with('events',$events);
    }
    public function partsAccessoriesUpdate(PartsAccessoriesRequest $request,$id)
    {
        $event=PartsAccessories::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'Bikescarsindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'Bikescarsindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function medicineAccessoriesEdit(Request $request,$id)
    {
        $events=MedicineEmergency::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.medicineemergency-index')
        ->with('admins',$admins)
        ->with('events',$events);
    }
    public function medicineAccessoriesUpdate(PartsAccessoriesRequest $request,$id)
    {
        $event=MedicineEmergency::find($request->id);
        $event->heading1=$request->heading1;
        $event->paragraph=$request->paragraph;
        if ($request->hasFile('image1')) {
          $image1 = $request->file('image1');
          $filename1 = time() . 'medicineindex-1.' . $image1->getClientOriginalExtension();
          $location1 = public_path('images/uploads');
          $image1->move($location1, $filename1);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
          $image2 = $request->file('image2');
          $filename2 = time() . 'medicineindex-2.' . $image2->getClientOriginalExtension();
          $location2 = public_path('images/uploads');
          $image2->move($location2, $filename2);
          // Image::make($image)->resize(800, 400)->save($location);
          $event->image2 = $filename2;
        }
        $event->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function aboutUsEdit(Request $request,$id)
    {
        $events=AboutUS::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.aboutus')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function aboutUsUpdate(Request $request,$id)
    {
        $events=AboutUS::find($request->id);
        $events->heading=$request->heading;
        $events->paragraph=$request->paragraph;
        $events->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function policyEdit(Request $request,$id)
    {
        $events=Policy::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.policy')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function policyUpdate(Request $request,$id)
    {
        $events=Policy::find($request->id);
        $events->heading=$request->heading;
        $events->paragraph=$request->paragraph;
        $events->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
    public function contactUsEdit(Request $request,$id)
    {
        $events=ContactUs::where('id',$id)->get();
        $admins=Admin::all();
        return view('Admin.contactus')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function contactUsUpdate(Request $request,$id)
    {
        $events=ContactUs::find($request->id);
        $events->heading=$request->heading;
        $events->contact=$request->paragraph;
        $events->save();

        $request->session()->flash('message','Data Updated');
        return back();
    }
}
