<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class AdminLoginController extends Controller
{
    public function adminLogin(Request $request)
    {
      $admins=Admin::all();
        $events=EventIndex::all();
        return view('Admin.adminlogin')
            ->with('admins',$admins)
            ->with('events',$events);
    }
    public function adminLoginVerify(Request $request)
    {
        $admin=Admin::where('email',$request->email)
                      ->first();
        if ($admin && Hash::check($request->password,$admin->password)) {
            $request->session()->put('loggedAdmin',$admin->id);
            $request->session()->flash('message','Login Successfull');
            return redirect()->route('admin.index'); 
        }
        else{
            $request->session()->flash('message','Login UnSuccessfull');
            return back();
        }
    }
    public function logOut(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('admin.adminLogin');
    }
}
