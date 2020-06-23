<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
		$img=asset('images/2mar/coming.jpg');
		
    	echo"<img height='800px' width='1330px' src=".$img.">";
    }
    public function testadd(Request $request)
    {
    	$rules=[
    		'test'=>'required',
    		'test1'=>'required',
    		'test2'=>'required',
    	];
    	 $mess=[
    	 	'test.required'=>'Name can not be null',
    	 	'test1.required'=>'Email can not be null',
    	 	'test2.required'=>'Phone can not be null',
    	 ];
    	$request->validate($rules,$mess);
    }
}
