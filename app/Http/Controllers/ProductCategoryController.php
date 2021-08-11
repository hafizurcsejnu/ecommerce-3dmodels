<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
   
    
    public function index()
    {
        $data = ProductCategory::orderBy('id', 'desc')->where('parent_id', null)->get();
        return view('admin.product_categories', ['data'=>$data]);
    }     
    
    
    public function store(Request $request)
    {
        $data = new ProductCategory;
        $data->name = $request->name;
        $data->parent_id = $request->parent_id;
        if($request->file('image')!= null){
            $data->image = $request->file('image')->store('images');
        } 
        $data->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been inserted successfully.'));        
    }

    public function update(Request $request)    {        
        
        $data = ProductCategory::find($request->id);
        $data->name = $request->name;
        $data->parent_id = $request->parent_id;

        if($request->file('image')!= null){
            $data->image = $request->file('image')->store('images');
            //dd($data->image); 
        }else{
            $data->image = $request->hidden_image;
            //dd($data->image); 
        }
        $data->save(); 

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been updated successfully.'));
    }

    public function destroy($id)
    {       
        $data = ProductCategory::find($id);
        $data->delete();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been deleted successfully.'));
    }


    
    
}
