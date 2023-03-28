<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\quarter;
use App\Models\type;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function enjaz()
    {
        $company=DB::table('brokers')->first();
        $quarters=quarter::all();
        $units=Units::where('status','empty')
        ->take(3)->get();
          $types=type::all();
      return view ('main')->with(['units'=>$units,'quarters'=>$quarters,'company'=>$company,'types'=>$types,]);
    }
    public function property_search(Request $request)
    {
        $types=type::all();
        $company=DB::table('brokers')->first();
        $quarters=quarter::all();
        $s1=$request->type;
        $s3=$request->location;
        $s4=$request->cost;
        if($s1!=""){$s1=$request->type;}else{$s1="%";}
        if($s3!=""){$s3=$request->location; }else{$s3="%";}
        if($s4!=""){$s4=$request->cost;}else{$s4="%";}
        //return $request->month;

        $units=Units::where('status','empty')->where([
            ['type_id','LIKE',$s1],
            ['quarter','LIKE',$s3],
            ['rent_cost','LIKE',$s4],])
        ->paginate(6);

       return view ('search_result')->with(['units'=>$units,'quarters'=>$quarters,'s1'=>$s1,'s3'=>$s3,'s4'=>$s4,'company'=>$company,'types'=>$types]);
    }
      public function autocomplete(Request $request)
    {
        $data = quarter::select("name")
                    ->where('name', 'LIKE', '%'. $request->get('query'). '%')
                    ->get();

        return response()->json($data);
    }
    public function categories($key)
    {
         $types=type::all();
        $company=DB::table('brokers')->first();
        $quarters=quarter::all();
        $units=Units::where('status','empty')
        ->where([
                'units.type_id'=>$key,
            ])
        ->paginate(6);


        return view('categories')->with([
            'key'=>$key,
            'quarters'=>$quarters,
            'units'=>$units,
            'company'=>$company,
                'types'=>$types
        ]);
    }
    public function all_units()
    {
         $types=type::all();
        $company=DB::table('brokers')->first();
        $quarters=quarter::all();
       $units=Units::where('status','empty')->paginate(6);
      return view ('units')->with(['units'=>$units,'quarters'=>$quarters,'company'=>$company,'types'=>$types]);

    }
}
