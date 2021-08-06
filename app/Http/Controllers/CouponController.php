<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkCoupon(Request $request)
    {
        $coupon = Coupon::orderBy('id', 'desc')
                ->where('code', $request->coupon_code)
                ->first();        
        // dd($sub_categories);
        // if($request->total_price < $coupon->discount_amount){
        //     return response()->json(['total_price'=>'less']);
        // }
        if($coupon != null){
            session()->put('coupon_discount', $coupon->discount_amount);
            return response()->json(['success'=>true,'data'=>$coupon]);
        }else{ 
            session()->put('coupon_discount', '');
            return response()->json(['success'=>false]);
        }
        
        
    }

    public function index()
    {
        $data = Coupon::orderBy('id', 'desc')->get();
        return view('admin.coupons', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = new Coupon;
        $data->title = $request->title;
        $data->code = $request->code;
        $data->discount_amount = $request->discount_amount;
        $data->applied_for = $request->category_id;
        $data->active = $request->active;

        $data->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been inserted successfully.'));        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    public function update(Request $request)    { 
        //dd($request);       
        
        $data = Coupon::find($request->id);
        $data->title = $request->title;
        $data->code = $request->code;
        $data->discount_amount = $request->discount_amount;
        $data->applied_for = $request->category_id;
        $data->active = $request->active;
        //$data->active = 'on';
        $data->save(); 

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been updated successfully.'));
    }

    public function destroy($id)
    {       
        $data = Coupon::find($id);
        $data->delete();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been deleted successfully.'));
    }
}
