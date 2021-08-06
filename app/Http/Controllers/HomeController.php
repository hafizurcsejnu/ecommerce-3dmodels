<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    public function index()
    {
      //$data = Product::orderBy('id', 'desc')->get();
      $featured_products = DB::table('products')
        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as catName')        
        ->where('products.active', 'on')
        ->where('products.featured', 'on')
        ->get(); 
      $latest_products = DB::table('products')
        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as catName')        
        ->where('products.active', 'on')
        ->get(); 

      return view('home', ['featured_products'=>$featured_products, 'latest_products'=>$latest_products, 'menu'=>'home']);  
    }

    public function show($id)
    {
        $fetch = Product::find($id);  
        $data = new Product;
        $data->hit_count = $fetch->hit_count;        
        $data->save();
      
        return view('product_details', ['data' => $fetch]);       
    }  

      /*============================
       products
       ============================*/
       public function products()
       {     

        $fetch = DB::table('products')
        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as catName')
        ->get();        
        
        $data=view('admin.products')
        ->with('data',$fetch);

        return view('admin.master')
        ->with('main_content',$data);
      } 

      public function create()
      {        
        return view('admin.product_add');
      }

      public function store(Request $request)
      {        
        $data = new Product;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->price = $request->price;
        $data->msrp = $request->msrp;
        $data->measurement_unit = $request->measurement_unit;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->short_description = $request->short_description;
        $data->meta_description = $request->meta_description;

        if($request->file('image')!= null){
            $data->image = $request->file('image')->store('images');
        } 
        $data->active = $request->active;
        $data->featured = $request->featured;
        $data->created_by = session('user.id');
        $data->updated_by = '';
        $data->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been inserted successfully.'));    

      }

      public function edit($id)
      {
       
        $data = DB::table('products')
        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as catName', 'product_categories.id as catID')
        ->where('products.id',$id)
        ->first();
        return view('admin.product_edit', ['data'=>$data]);
      }

      public function update(Request $request)
      {       
                
          $data = Product::find($request->id);
          $data->title = $request->title;
          $data->slug = Str::slug($request->title);
          $data->price = $request->price;
          $data->msrp = $request->msrp;
          $data->measurement_unit = $request->measurement_unit;
          $data->category_id = $request->category_id;
          $data->description = $request->description;
          $data->short_description = $request->short_description;
          $data->meta_description = $request->meta_description;
          
          if($request->file('image')!= null){
              $data->image = $request->file('image')->store('images');
          }else{
              $data->image = $request->hidden_image;
          }
          $data->active = $request->active;
          $data->featured = $request->featured;
          $data->updated_by = session('user.id');
          $data->save(); 

          return redirect('/products')->with(session()->flash('alert-success', 'Data has been updated successfully.'));
    }

    public function destroy($id)
    {
      DB::table('products')
      ->where('id',$id)
      ->delete();

      Session::put('message', 'Post deleted successfully!');
      return Redirect::to('/products');
    }

    /*============================
       End News Post
       ============================*/

     

}
