<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;


class CollectionController extends Controller
{
   
  
    public function shop()
    {
      $data = DB::table('collections')  
      ->where('active', 'on')
      ->get(); 

      return view('collections', ['data'=>$data]);
    }

    public function index()
    {
      //$data = Product::orderBy('id', 'desc')->get();
      $data = DB::table('collections')  
        ->where('active', 'on')
        ->get(); 

      return view('admin.collections', ['data'=>$data]);  
    }

    public function show($id)
    {      
        $fetch = Collection::find($id);         
        //dd($fetch);
        // $data = new Product;
        // $data->hit_count = $fetch->hit_count + 1;        
        // $data->update();      
        return view('collection', ['item' => $fetch]);       
    }  
   
    public function download($id)
    {      
        $fetch = Product::find($id);         
        
        return redirect('https://7cgionline.ml/s/EJAPC9sCKSfnZaE/download/Asus_ROG_Zephyrus_S.rar');
    }  

      /*============================
       products
       ============================*/
       public function products()
       {    
        $fetch = DB::table('products')
        ->join('collection_categories', 'products.category_id', '=', 'collection_categories.id')
        ->select('products.*', 'collection_categories.name as catName')
        ->get();        
        
        $data=view('admin.products')
        ->with('data',$fetch);

        return view('admin.master')
        ->with('main_content',$data);
      } 

      public function create()
      {        
        $last_item = DB::table('collections')->orderBy('id', 'DESC')->first();
        return view('admin.collection_add', ['last_item' => $last_item]);
      }

      public function store(Request $request)
      {        
       // dd($request->file('source_files'));
        $input=$request->all();
        $all_images=array();

        $removed_images =$request->excludeImages;   
        $removed_items= explode("*",$removed_images);
        
        if($files=$request->file('productImages')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('images/collection',$name);
                $all_images[]=$name; 
            }
        }
        if($removed_images){          
          $final_images = array_diff($all_images, $removed_items);  
          $final_images = implode('|', $final_images);          
        }else{
          $final_images = implode('|', $all_images);          
        }
       

        $data = new Collection;
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->price = $request->price;
        $data->msrp = $request->msrp;       
        
        $data->description = $request->description;
        $data->short_description = $request->short_description;
        $data->meta_description = $request->meta_description;
        
        $data->images = $final_images;        

        $data->product_ids = implode(',', $request->product_id);

        $data->active = $request->active;
        $data->featured = $request->featured;
        $data->created_by = session('user.id');
        $data->updated_by = '';
        $data->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Data has been inserted successfully.'));    

      }

      public function find_subcategory(Request $request){
        $sub_categories = DB::table('collection_categories')
            ->where('parent_id', $request->category_id)
            ->get();
        $total = $sub_categories->count();
        // dd($sub_categories);
        return response()->json(['success'=>true,'data'=>$sub_categories, 'total'=>$total]);
        
    }


      public function edit($id)
      {
       
        $data = DB::table('collections')        
        ->where('id',$id)
        ->first();
        return view('admin.collection_edit', ['data'=>$data]);
      }

      public function update(Request $request)
      {       
          //dd($request); 
          $input=$request->all();
          $new_images=array();
  
          $hidden_image =$request->hidden_image;   
          $hidden_image_array= explode("|",$hidden_image);
          //print_r($hidden_image_array);
          // echo "<br/>";

          if($files=$request->file('productImages')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('images/collection',$name);
                $new_images[]=$name;
              }
          }         
        
        $all_selected_images = array_merge($hidden_image_array,$new_images);
        //print_r($all_selected_images);       

        // getting all removed items
        $removed_image = $request->excludeImages;
        $removed_image_array = explode('*',$removed_image);
        $removed_image_name = Array();
        
        foreach($removed_image_array as $image){       
          if($image!=""){
            if(filter_var($image,FILTER_VALIDATE_URL)){
              $pathinfo = pathinfo($image);
              $filename = $pathinfo['basename'];                       
              array_push($removed_image_name,$filename);                
            }
            else{                
                $filtered_image_path = explode('/images/',$image);                
                $filtered_image_path = $filtered_image_path[1];
                array_push($removed_image_name, $filtered_image_path);
            } 
          }            
        }

        // delete removed items
        foreach($removed_image_name as $filename){
          if($filename!=""){
            if (file_exists("images/".$filename)) {              
              // dd("images/".$filename);
              $status = unlink("images/".$filename);
            }
          }
        }
      

          $final_images =  array_diff($all_selected_images, $removed_image_name);          
          $final_images = implode('|', $final_images);
          // dd($final_images);

          $data = Collection::find($request->id);
          $data->name = $request->name;
          $data->images = $final_images;
          $data->slug = Str::slug($request->title);
          $data->price = $request->price;
          $data->msrp = $request->msrp;
        
          $data->description = $request->description;
          $data->short_description = $request->short_description;
          $data->meta_description = $request->meta_description;

          $data->product_ids = implode(',', $request->product_id);
            
          $data->active = $request->active;
          $data->featured = $request->featured;
          $data->updated_by = session('user.id');
          $data->save(); 

          return redirect('/collections')->with(session()->flash('alert-success', 'Data has been updated successfully.'));
    }

    public function destroy($id)
    {
      DB::table('collections')
      ->where('id',$id)
      ->delete();

      return redirect()->back()->with(session()->flash('alert-success', 'Item has been deleted successfully.'));
    }     

}
