<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\CategoryTrait;
use App\Models\ProductCategory;
use DB;


class ProductController extends Controller
{
    use CategoryTrait;
  
    public function shop(Request $request)
    {
      $categories = $this->getCategories();
      // $data = DB::table('products') 
      // ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
      // ->select('products.*', 'product_categories.name as catName', 'product_categories.id as catId')        
      // ->where('products.active', 'on')
      // ->where('products.freebee', null)
      // ->get(); 

      $data = Product::withCount('popularity')->orderBy('created_at', 'desc')->paginate(30);
      $total = Product::count();
      if($request->ajax()){
        $query = Product::query()->with('category');
        if($request->has('filter')){
          $form_data = [];
          parse_str($request->filter, $form_data);
          if(array_key_exists("size", $form_data) && count($form_data["size"])>0){
            // foreach($form_data->size as $key => $size){
            //   if($key==0){
            //     $query->where('size',$size);
            //   }else{
            //     $query->orWhere('size',$size);
            //   }
            // }
          }
          if(array_key_exists("brand", $form_data) && count($form_data["brand"])>0){
            foreach($form_data["brand"] as $key => $brand){
              if($key==0){
                $query->where('brand',$brand);
              }else{
                $query->orWhere('brand',$brand);
              }
            }
          }

          if(array_key_exists("materials", $form_data) && count($form_data["materials"])>0){
            foreach($form_data["materials"] as $key => $materials){
              if($key==0){
                $query->where('materials',$materials);
              }else{
                $query->orWhere('materials',$materials);
              }
            }
          }
          if(array_key_exists("style", $form_data) && count($form_data["style"])>0){
            foreach($form_data["style"] as $key => $style){
              if($key==0){
                $query->where('style',$style);
              }else{
                $query->orWhere('style',$style);
              }
            }
          } 

          if(array_key_exists("usages", $form_data) && count($form_data["usages"])>0){
            foreach($form_data["usages"] as $key => $usages){
              if($key==0){
                $query->where('usages',$usages);
              }else{
                $query->orWhere('usages',$usages);
              }
            }
          }
          
          return response()->json(["total"=>$query->count(),"items"=>json_encode($query->orderBy('created_at', 'desc')->paginate(20)),"form_data"=>$form_data]);
        }
        return response()->json(json_encode($data));
      }
      else{
        return view('shop', ['data'=>$data, 'menu'=>'shop','categories'=>$categories, 'total'=>$total]);
      }
    }
    public function shopCategory(Request $request,$id)
    {
      // $data = DB::table('products')
      // ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
      // ->select('products.*', 'product_categories.name as catName')        
      // ->where('products.category_id', $id)
      // ->orWhere('products.sub_category_id', $id)
      // ->where('products.active', 'on')
      // ->where('products.is_set', null)
      // ->where('products.freebee', null)
      // ->get(); 
      $data = Product::where("category_id",$id)
                        ->orWhere("sub_category_id",$id)
                        ->where('active','on')
                        ->where('freebee',null)
                        ->where('is_set',null)
                        ->with('category','sub_category');
      $category_name = ProductCategory::where('id',$id)->pluck('name')[0];
      $total = $data->count();
      $data = $data->paginate(20);
      if($request->ajax()){
        $query = Product::query()->with('category');
        $query->where('category_id',$id)->where('active','on')->where('freebee',null)->where('is_set',null)->orWhere('sub_category_id',$id);
        if($request->has('filter')){
          $form_data = [];
          parse_str($request->filter, $form_data);

          if(array_key_exists("size", $form_data) && count($form_data["size"])>0){
            // foreach($form_data->size as $key => $size){
            //   if($key==0){
            //     $query->where('size',$size);
            //   }else{
            //     $query->orWhere('size',$size);
            //   }
            // }
          }
          if(array_key_exists("brand", $form_data) && count($form_data["brand"])>0){
            foreach($form_data["brand"] as $key => $brand){
              if($key==0){
                $query->where('brand',$brand);
              }else{
                $query->orWhere('brand',$brand);
              }
            }
          }

          if(array_key_exists("materials", $form_data) && count($form_data["materials"])>0){
            foreach($form_data["materials"] as $key => $materials){
              if($key==0){
                $query->where('materials',$materials);
              }else{
                $query->orWhere('materials',$materials);
              }
            }
          }
          if(array_key_exists("style", $form_data) && count($form_data["style"])>0){
            foreach($form_data["style"] as $key => $style){
              if($key==0){
                $query->where('style',$style);
              }else{
                $query->orWhere('style',$style);
              }
            }
          }

          if(array_key_exists("usages", $form_data) && count($form_data["usages"])>0){
            foreach($form_data["usages"] as $key => $usages){
              if($key==0){
                $query->where('usages',$usages);
              }else{
                $query->orWhere('usages',$usages);
              }
            }
          }
          
          return response()->json(["total"=>$query->count(),"items"=>json_encode($query->paginate(20)),"form_data"=>$form_data]);
        }
        return response()->json(json_encode($data));
      }
      else{

        return view('shop_category', ['data'=>$data, 'menu'=>'shop','total'=>$total,'category'=>$category_name]);
      }
    }
    public function freebies()
    {
      $data = DB::table('products')
      ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
      ->select('products.*', 'product_categories.name as catName', 'product_categories.id as catId')  
      ->where('products.active', 'on')
      ->where('products.is_set', null)
      ->where('products.freebee', 'on')
      ->get(); 
      $total = $data->count();
      //dd($total);
      return view('freebies', ['data'=>$data, 'menu'=>'freebies']);
    }
    public function shopSubCategory($id)
    {
      $data = DB::table('products')
      ->join('product_categories', 'products.sub_category_id', '=', 'product_categories.id')
      ->select('products.*', 'product_categories.name as catName', 'product_categories.id as catId')        
      ->where('products.sub_category_id', $id)
      ->where('products.active', 'on')
      ->where('products.is_set', null)
      ->where('products.freebee', null)
      ->orderBy('created_at', 'desc')
      ->get(); 
      $total = $data->count();
      //dd($total);

      return view('shop_category', ['data'=>$data, 'menu'=>'shop']);
    }
    public function index()
    {
      //$data = Product::orderBy('id', 'desc')->get();
      $data = DB::table('products')
        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as catName', 'product_categories.id as catId')        
        ->where('products.active', 'on')
        ->get(); 

      return view('product', ['data'=>$data]);  
    }

    public function show($id)
    {      
        $fetch = Product::find($id);         
        //dd($fetch);
        // $data = new Product;
        // $data->hit_count = $fetch->hit_count + 1;        
        // $data->update();      
        return view('product', ['item' => $fetch, 'menu'=>'shop']);       
    }  

    public function quickView($id)
    {      
        $fetch = Product::find($id);  
        return view('quick_view', ['item' => $fetch]);       
    }  
    public function sets()
    {      
      $data = DB::table('products')
      ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
      ->select('products.*', 'product_categories.name as catName', 'product_categories.id as catId')        
      ->where('products.is_set', 'on')
      ->where('products.active', 'on')
      ->where('products.freebee', null)
      ->get(); 
      $total = $data->count();

      return view('sets', ['data'=>$data, 'menu'=>'shop', 'total'=>$total]);   
    }  
    public function download($id, $source)
    {  
      $product = DB::table('products')     
                ->where('id', $id)
                ->first();
      if($product->$source == null){        
        return redirect('my-account#tab-downloads')->with(session()->flash('alert-danger', 'The source file is not available! Please contact system admin.'));  
      }
      // checking purchase log 
      $purchase = DB::table('order_details')     
                ->where('product_id', $id)
                ->where('user_id', session('user.id'))
                ->first();  
      if($purchase){
          $data = Product::find($id); 
          return redirect($data->$source);
      }else{
          return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong'));
      }
      
    }  
    public function freebeesDownload($id)
    {           
      $data = Product::find($id); 
      return redirect($data->source);
    }  
    public function downloadMax($id)
    {      
        $fetch = Product::find($id);   
        dd($fetch->source_max);      
        
        return redirect('https://7cgionline.ml/s/EJAPC9sCKSfnZaE/download/Asus_ROG_Zephyrus_S.rar');
    }  

    

      /*============================
       products
       ============================*/
       public function products()
       {    
        $fetch = DB::table('products')
        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.*', 'product_categories.name as catName', 'product_categories.id as catId') 
        ->orderby('products.id', 'desc')
        ->get();        
        
        $data=view('admin.products')
        ->with('data',$fetch);

        return view('admin.master')
        ->with('main_content',$data);
      } 

      public function create()
      {        
        $last_item = DB::table('products')->orderBy('id', 'DESC')->first();
        //dd($last_item);
        return view('admin.product_add', ['last_item' => $last_item]);
      }

      public function store(Request $request)
      {        
       // dd($request->file('source_files'));
        $input=$request->all();
        $all_images=array();

        $removed_images =$request->excludeImages;   
        $removed_items= explode("*",$removed_images);
        if($request->file('productImages') == null){
          return redirect('add-product')->with(session()->flash('alert-danger', 'Product images can not be null.'));    
        }
        
        if($files=$request->file('productImages')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                //need to check which is removed and skip those
                //$name = time().rand(100,999).'_'.$name;                
                $file->move('images',$name);                
                $all_images[]=$name;   
            }
        }
        if($removed_images){          
          $final_images_array = array_diff($all_images, $removed_items);  
          $final_images = implode('|', $final_images_array);          
        }else{
          $final_images = implode('|', $all_images);          
        }      
      

        $data = new Product;
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        //dd($data->slug);
        $data->price = $request->price;
        //$data->msrp = $request->msrp;

        //if($request->sub_category_id != null){
          //$data->category_id = $request->sub_category_id;
        //}else{
          $data->category_id = $request->category_id;
        //}        
        $data->sub_category_id = $request->sub_category_id;
        $data->description = $request->description;
        $data->short_description = $request->short_description;
        $data->meta_description = $request->meta_description;
        
        $data->faces = $request->faces;
        $data->style = $request->style;
        $data->usages = $request->usages;
        $data->materials = $request->materials;
        $data->detail_level = $request->detail_level;
        $data->brand = $request->brand;
        $data->designer = $request->designer;
        $data->renderer = $request->renderer;
        $data->images = $final_images;

        $data->source_max = $request->source_max;
        $data->source_fbx = $request->source_fbx;
        $data->source_obj = $request->source_obj;
        $data->source_blend = $request->source_blend;
        $data->source_c4d = $request->source_c4d;
  
        $file_formats=array();
       
        if($request->source_max != null){
              $file_formats[]='MAX'; 
        }
        if($request->source_fbx != null){
              $file_formats[]='FBX'; 
        }
        if($request->source_obj != null){
              $file_formats[]='OBJ'; 
        }
        if($request->source_blend != null){
          $file_formats[]='Blend'; 
        }
        if($request->source_c4d != null){
              $file_formats[]='c4d'; 
        }

        $data->file_formats = implode(',', $file_formats);

        $data->active = $request->active;
        $data->featured = $request->featured;
        $data->is_set = $request->is_set;
        $data->freebee = $request->freebee;
        $data->created_by = session('user.id');
        $data->updated_by = '';
        $data->save();

        return redirect('products')->with(session()->flash('alert-success', 'Data has been inserted successfully.'));    

      }

      public function search_product(Request $request){

        $output='';
        $data = DB::table('products')
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('materials', 'like', '%' . $request->search . '%')
            ->orWhere('style', 'like', '%' . $request->search . '%')
            ->orWhere('usages', 'like', '%' . $request->search . '%')
            ->orWhere('brand', 'like', '%' . $request->search . '%')
            ->get();
        $row_count = $data->count();
        //return $row_count;
        
        if ($row_count>0) {
          foreach($data as $item)
                {
          if($images = $item->images) $images = explode('|', $images);
          $output .= '<div class="col-6 col-md-4 col-lg-4 col-xl-3 search_item">
          <div class="product">
              <figure class="product-media">
                  <span class="product-label label-new">New</span>
                  <a href="product/'.$item->id.'">
                      <img src="'.asset('images').'/'.$images[0].'" alt="'.$images[0].'" class="product-image">
                  </a>
      
                  <div class="product-action action-icon-top">
                     
                      <a href="javascript:void(0)" class="btn-product btn-cart add-to-cart" data-id="'.$item->id.'"><span class="add-to-cart-btn">Add to cart</span></a>
      
                      <a href="quick-view/'.$item->id.'" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                     
      
      
                  </div>
              </figure>
      
              <div class="product-body">
                  <div class="product-cat">
                      <a href="#">'.$item->name.'</a>
                  </div>
                  <h3 class="product-title"><a href="product/'.$item->id.'">'.$item->name.'</a></h3>
                  <div class="product-price">
                      $'.$item->price.'
                  </div>
                  <div class="ratings-container">
                      <div class="ratings">
                          <div class="ratings-val" style="width: 0%;"></div>
                      </div>
                      <span class="ratings-text">( 0 Reviews )</span>
                  </div>
                  
              </div>
          </div>
      </div>';
          
                }
          echo $output;
    
    
        }
        else
        {
          //echo "<h3 style=\"color:red; text-align:center;margin-top:5px;\">No item is found with this keyword!</h3>";
          echo "not found";
        }

      }

      public function find_subcategory(Request $request){
        $sub_categories = DB::table('product_categories')
            ->where('parent_id', $request->category_id)
            ->get();
        $total = $sub_categories->count();
        // dd($sub_categories);
        return response()->json(['success'=>true,'data'=>$sub_categories, 'total'=>$total]);
        
    }
      public function find_product_id(Request $request){
        $data = DB::table('products')
            ->where('name', $request->product_name)
            ->get();
        $total = $data->count();
        // dd($sub_categories);
        return response()->json(['success'=>true,'data'=>$data, 'total'=>$total]);
        
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
                $file->move('images',$name);
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
       
          // echo "before<br/>";
          // print("<pre>".print_r($removed_image_array,true)."</pre>");
          // ;
          // echo "<br/>After<br/>";
          // print("<pre>".print_r($removed_image_name,true)."</pre>");
          //print_r($removed_image_name);

          // $removed_images =$request->excludeImages;   
          // $removed_items_to_delete= explode("*",$removed_images);
          // dd($removed_items_to_delete); 
          //delete all from folder 


          // $removed_items= explode("*http://127.0.0.1:8000/images/",$removed_images);
          // print_r($removed_items);
          // echo "<br/>";

          $final_images =  array_diff($all_selected_images, $removed_image_name);          
          $final_images = implode('|', $final_images);
          // dd($final_images);         


          $data = Product::find($request->id);
          $data->name = $request->name;
          $data->slug = Str::slug($request->name);
          $data->images = $final_images;
          $data->price = $request->price;
          //$data->msrp = $request->msrp;
          $data->measurement_unit = $request->measurement_unit;
          
          //if($request->sub_category_id != null){
            //$data->category_id = $request->sub_category_id;
          //}else{
            $data->category_id = $request->category_id;
          //}     
          $data->sub_category_id = $request->sub_category_id;
          $data->description = $request->description;
          $data->short_description = $request->short_description;
          $data->meta_description = $request->meta_description;

          $data->faces = $request->faces;
          $data->style = $request->style;
          $data->usages = $request->usages;
          $data->materials = $request->materials;
          $data->detail_level = $request->detail_level;
          $data->brand = $request->brand;
          $data->designer = $request->designer;
          $data->renderer = $request->renderer;          
          
          $data->source_max = $request->source_max;
          $data->source_fbx = $request->source_fbx;
          $data->source_obj = $request->source_obj;
          $data->source_blend = $request->source_blend;
          $data->source_c4d = $request->source_c4d;
  
          $file_formats=array();
          if($request->source_blend != null){
                $file_formats[]='Blend'; 
          }
          if($request->source_c4d != null){
                $file_formats[]='c4d'; 
          }
          if($request->source_max != null){
                $file_formats[]='MAX'; 
          }
          if($request->source_fbx != null){
                $file_formats[]='FBX'; 
          }
          if($request->source_obj != null){
                $file_formats[]='OBJ'; 
          }        

          $data->file_formats = implode(',', $file_formats);

          $data->active = $request->active;
          $data->featured = $request->featured;
          $data->is_set = $request->is_set;
          $data->freebee = $request->freebee;
          $data->updated_by = session('user.id');
          $data->save(); 

          return redirect('/products')->with(session()->flash('alert-success', 'Data has been updated successfully.'));
    }


    public function updatePrice(Request $request)
    {
      $price = $request->price;
      foreach($request->product_id as $product){
          $data = Product::find($product);
          $data->price = $price;
          $data->save(); 
      }
      return redirect('/products')->with(session()->flash('alert-success', 'Price has been updated successfully.'));
    }
    public function destroy($id)
    {
      DB::table('products')
      ->where('id',$id)
      ->delete();

      return redirect()->back()->with(session()->flash('alert-success', 'Item has been deleted successfully.'));
    }

    
     

}
