<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\PageIndex;
use Image;

class PageIndexController extends Controller
{
    public function pageIndex(Request $request)
    {
        $events=EventIndex::all();
    	$catogories=Category::all();
        $admins=Admin::all();
    	return view('Admin.pageindex')
                ->with('admins',$admins)
    	->with('catogories',$catogories)
    	->with('events',$events);
        
    }
    public function pageIndexAdd(Request $request)
    {
        $event=new PageIndex();
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $filename1 = time() . 'pageIndex-1.' . $image1->getClientOriginalExtension();
            $location1 = public_path('images/index');
            $image1->move($location1, $filename1);
            // Image::make($image)->resize(800, 400)->save($location);
            $event->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
        $image2 = $request->file('image2');
        $filename2 = time() . 'pageIndex-2.' . $image2->getClientOriginalExtension();
        $location2 = public_path('images/index');
        $image2->move($location2, $filename2);
        // Image::make($image)->resize(800, 400)->save($location);
        $event->image2 = $filename2;
        }
        $event->save();
        $request->session()->flash('message','Data Inserted');
        return back();
    }
}
