
@extends('admin.master')
@section('main_content')  
<style>
  .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
  .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
  .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
</style>



  <div class="page-content container container-plus">
    <div class="page-header pb-2">
      <h1 class="page-title text-primary-d2 text-150">
        Add New Product     
      </h1> 
      <a href="products"class="btn btn-default px-3 text-95 radius-round border-2 brc-black-tp10 float-left">
        <i class="fa fa-plus mr-1"></i>
        <span class="d-sm-none d-md-inline">All</span> Products
      </a>
    </div>   


    <div class="row mt-3">
      <div class="col-12">
        <div class="card dcard">
          <div class="card-body px-1 px-md-3">                                   
            <div role="main" class="main-content">         
              <div class="page-content container container-plus">               

                <form method="POST"  action="{{route('save_product')}}" enctype="multipart/form-data">
                  @csrf              

                  <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="name" class="form-control" id="" required  placeholder="Enter product name">
                  </div>                 

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                          <?php                            
                             $category=DB::table('product_categories')
                                ->where('id', $last_item->category_id)
                                ->first();                                
                            ?>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            <?php                            
                             $categories=DB::table('product_categories')->where('parent_id', null)->get();
                             
                            ?>
                            @foreach($categories as $category) 
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach  
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">     
                      <label for="exampleInputPassword1">Sub Category</label>                       
                        <select class="form-control" name="sub_category_id" id="sub_category_id" >
                        @if($last_item->sub_category_id)
                          <?php                            
                             $category=DB::table('product_categories')->where('id', $last_item->sub_category_id)->first();
                             //dd($category); 
                            ?>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" required="true"  value="{{$last_item->price}}"> 
                      </div>    
                    </div>

                  </div>

                 
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Faces</label>
                        <input type="text" name="faces" class="form-control" id="" value="{{$last_item->faces}}">
                      </div>    
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Style</label>
                        <select class="form-control" name="style" id="">
                            <option value="{{$last_item->style}}">{{$last_item->style}}</option>                          
                            <?php                            
                            $collection=DB::table('data_lookups')
                               ->where('data_type','Style')
                               ->get();                                
                            ?>
                            @foreach ($collection as $item)
                              <option value="{{$item->title}}">{{$item->title}}</option>
                            @endforeach
                            <option value="N/A">N/A</option> 
                        </select>                        
                      </div>    
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Usage</label>                        
                        <select class="form-control" name="usages" id="">
                            <option value="{{$last_item->usages}}">{{$last_item->usages}}</option>                          
                            <?php                            
                            $collection=DB::table('data_lookups')
                               ->where('data_type','Usage')
                               ->get();                                
                            ?>
                            @foreach ($collection as $item)
                              <option value="{{$item->title}}">{{$item->title}}</option>
                            @endforeach
                            <option value="N/A">N/A</option>
                        </select>     
                      </div>    
                    </div>                   
                  
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Materials</label>
                        <select class="form-control" name="materials" id="">
                            <option value="{{$last_item->materials}}">{{$last_item->materials}}</option>                          
                            <?php                            
                             $collection=DB::table('data_lookups')
                                ->where('data_type','Materials')
                                ->get();                                
                            ?>
                            @foreach ($collection as $item)
                              <option value="{{$item->title}}">{{$item->title}}</option>
                            @endforeach
                            <option value="N/A">N/A</option>     

                      </select>         
                      </div>    
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Brand</label>                       
                        <select class="form-control" name="brand" id="">
                          <option value="{{$last_item->brand}}">{{$last_item->brand}}</option>                          
                          <?php                            
                          $collection=DB::table('data_lookups')
                             ->where('data_type','Brand')
                             ->get();                                
                          ?>
                          @foreach ($collection as $item)
                            <option value="{{$item->title}}">{{$item->title}}</option>
                          @endforeach
                          <option value="N/A">N/A</option>
                      </select>     
                      </div>    
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Designer</label>                       
                        <select class="form-control" name="brand" id="">
                          <option value="{{$last_item->designer}}">{{$last_item->designer}}</option>                          
                          <?php                            
                          $collection=DB::table('data_lookups')
                             ->where('data_type','Designer')
                             ->get();                                
                          ?>
                          @foreach ($collection as $item)
                            <option value="{{$item->title}}">{{$item->title}}</option>
                          @endforeach
                          <option value="N/A">N/A</option>
                      </select>     
                      </div>    
                    </div>
                 
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea id="summernote" name="description" rows="25"> 
                    <ul>
                      <li>High quality properly scaled model.</li>
                      <li>All models are created with utmost care and attention to detail.</li>
                      <li>High quality easy to manage shaders used.</li>
                      <li>Clean UV Chunks.</li>
                      <li>Centimeter is used as System unit setup.</li>
                      <li>Models are properly named and grouped for easy selection.</li>
                      <li>No additional plugin is required to open the model.</li> 
                    </ul>
                    </textarea>   
                   
                  </div>                 


                  <div class="form-group d-none">
                    <label for="">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="10"></textarea>  
                  </div>
                  <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{$last_item->meta_description}}</textarea>  
                  </div>                  

                  <div class="form-group">
                    <label for="">Product images: </label>
                      <div class="input-images-1" style="padding-top: .5rem;"></div>
                        <input type="hidden" id="images" name="excludeImages" value="" multiple/>
                      <div id="drag-drop-area"></div>
    
                      <script>
                        $('.input-images-1').imageUploader();
                      </script>  
                  </div>                 

                  
                  <div class="form-group">
                    <label for="">Source files: </label>
                      <div class="" style="padding-top: .5rem;"></div>
                        {{-- <input type="file" id="source" required multiple/> --}}
                        <input type="hidden" name="source_files" id="source_files" value="">
 
                        <div class="form-group">
                          <input type="text" name="source_max" class="form-control" placeholder="MAX">
                        </div>
                        <div class="form-group">
                          <input type="text" name="source_fbx" class="form-control" placeholder="FBX">
                        </div>
                        <div class="form-group">
                          <input type="text" name="source_obj" class="form-control" placeholder="OBJ">
                        </div>
                        <div class="form-group">
                          <input type="text" name="source_blend" class="form-control" placeholder="Blend">
                        </div>
                        <div class="form-group">
                            <input type="text" name="source_c4d" class="form-control" placeholder="c4d">
                        </div>
                        

                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="">
                         Active
                        </label>
                        <input type="checkbox" name="active" checked class="form-check-input" id="">
                      </div>  
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="">
                         Featured
                        </label>
                        <input type="checkbox" name="featured" class="form-check-input" id="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="">
                         Is Set
                        </label>
                        <input type="checkbox" name="is_set" class="form-check-input" id="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="">
                          Freebee
                        </label>
                        <input type="checkbox" name="freebee" class="form-check-input" id="">
                      </div>
                    </div>
                  </div>
                  
                  <br>
                  <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                  <button type="button" class="btn btn-default">Cancel</button>
                </form>
                
             </div>
            </div>
          </div>
        </div>           
      </div>
    </div>

  </div>


  <script>
    $(document).ready(function() {

      var input_file = $("#source");
      input_file.on("change", function () {
          var files = input_file.prop("files")
          var names = $.map(files, function (val) { return val.name; });
          //console.log(names);
          $.each(names, function (i, name) {
                //console.log(name);               
          });

          var separator = '|';
          implodedArray = names.join(separator);  
          //console.log(implodedArray);
          $("#source_files").val(implodedArray);

      });
     
     
      // var files = $('#source').prop("file");
      // var names = $.map(files, function(val) { return val.name; });
      console.log('names');

        $("#category_id").change(function(){
          var category_id = $(this).val();
          $.ajax({
            url: "find_subcategory",
            data: {
              _token: '{{csrf_token()}}',
              category_id: category_id
            },
            type: 'POST',
            success: function (response) {
                //console.log(response.data);
                if(response.total>0){
                    $('#sub_category_id').empty();
                    $('#sub_category_id').focus;
                    $('#sub_category_id').append('<option value="">-- Select Sub Category --</option>'); 
                    $.each(response.data, function(key, value){
                        $('select[name="sub_category_id"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
                    });
                  }else{
                    $('#sub_category_id').empty();
                  }
            }
          });
        });
    });
    </script>

 
@endsection