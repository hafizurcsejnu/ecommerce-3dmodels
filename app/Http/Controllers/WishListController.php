<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;
use Auth;
use DB;

class WishListController extends Controller
{
    public function addToWishlist(Request $request)
      {
          $product_id = $request->id;   

          $data_available = DB::table('wish_lists')    
                ->where('product_id', $product_id)
                ->where('user_id', session('user.id'))
                ->first(); 

        if($data_available != null)
        return response()->json(['success'=>false,'data'=>'Item already avaibale in your wishlist.', 'product_id'=>$product_id]);
        

          $data = new WishList;
          $data->product_id = $product_id;
          $data->user_id = session('user.id');
          $data->status = 'Added';
          $data->save();
          return response()->json(['success'=>true,'data'=>'Item is added to your wishlist.', 'product_id'=>$product_id]);
  
      }

    public function myWishlist()
    {
        //$data = WishList::where('user_id',session('user.id'))->get(); 
       
        $data = DB::table('products')
        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->join('wish_lists', 'products.id', '=', 'wish_lists.product_id')
        ->select('products.*', 'product_categories.name as catName')        
        ->where('products.active', 'on')
        ->where('wish_lists.user_id', session('user.id'))
        ->get(); 
        //dd($data);
        return view('wish_list', ['data'=>$data]); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function show(WishList $wishList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function edit(WishList $wishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WishList $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WishList $wishList)
    {
        //
    }
}
