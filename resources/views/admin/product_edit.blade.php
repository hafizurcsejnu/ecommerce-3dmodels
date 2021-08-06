
@extends('admin.master')
@section('main_content')    

  <div class="page-content container container-plus">
    <div class="page-header pb-2">
      <h1 class="page-title text-primary-d2 text-150">
        Update Product     
      </h1> 
      <a href="products"class="btn btn-default px-3 text-95 radius-round border-2 brc-black-tp10 float-left">
        <i class="fa fa-plus mr-1"></i>
        <span class="d-sm-none d-md-inline">All</span> Product
      </a>
    </div>   


    <div class="row mt-3">
      <div class="col-12">
        <div class="card dcard">
          <div class="card-body px-1 px-md-3">                                   
            <div role="main" class="main-content">         
              <div class="page-content container container-plus">               

                <form action="update_product" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="">Product Title</label>
                    <input type="text" name="name"  class="form-control" required aria-describedby="emailHelp" value="{{$data->name}}">
                  </div>          
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                          <option value="{{$data->category_id}}">{{$data->catName}}</option>
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
                        <label for="">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="sub_category_id" >

                          @if ($data->sub_category_id != null)
                          <?php                         
                            $sub_category=DB::table('product_categories')->where('id', $data->sub_category_id)->first();
                          ?>
                            <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                          @endif            
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" id="" aria-describedby="emailHelp" value="{{$data->price}}">
                      </div>    
                    </div>
                  </div>
                

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Faces</label>
                        <input type="text" name="faces" class="form-control" id="" value="{{$data->faces}}">
                      </div>    
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Style</label>
                        <select class="form-control" name="style" id="">
                          <option value="{{$data->style}}">{{$data->style}}</option>                          
                          <option value="Antique">Antique</option>
                          <option value="Bauhaus">Bauhaus</option>
                          <option value="Classical design">Classical design</option>
                          <option value="Contemporary design">Contemporary design</option>
                          <option value="Geometric design">Geometric design</option>
                          <option value="Industrial/Vintage design">Industrial/Vintage design</option>
                          <option value="Mid-Century Modern">Mid-Century Modern</option>
                          <option value="Minimalist design">Minimalist design</option>
                          <option value="Modern luxury">Modern luxury</option>
                          <option value="New reeditions">New reeditions</option>
                          <option value="Scandinavian design">Scandinavian design</option>
                          <option value="Sculptural design">Sculptural design</option>
                          <option value="Wicker design">Wicker design</option>
                          <option value="N/A">N/A</option>
                      </select>          
                      </div>    
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Usage</label>
                        <select class="form-control" name="usages" id="">
                          <option value="{{$data->usages}}">{{$data->usages}}</option>                          
                          <option value="Bathroom">Bathroom</option><option value="Bedroom">Bedroom</option><option value="Contract">Contract</option><option value="Dining">Dining</option><option value="Kids">Kids</option><option value="Kitchen">Kitchen</option><option value="Living">Living</option><option value="Office">Office</option><option value="Outdoor">Outdoor</option><option value="Poolside">Poolside</option><option value="Retail">Retail</option><option value="Urban">Urban</option>
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
                          <option value="{{$data->materials}}">{{$data->materials}}</option>                          
                          <option value="Aluminum">Aluminum</option>
                          <option value="Brass">Brass</option>
                          <option value="Cement and concrete">Cement and concrete</option>
                          <option value="Ceramic and porcelain">Ceramic and porcelain</option>
                          <option value="Chrome">Chrome</option>
                          <option value="Colored glass">Colored glass</option>
                          <option value="Copper">Copper</option>
                          <option value="Cork">Cork</option>
                          <option value="Crystal">Crystal</option>
                          <option value="Fabric">Fabric</option>
                          <option value="Felt">Felt</option>
                          <option value="Glass">Glass</option>
                          <option value="Gold">Gold</option>
                          <option value="Leather">Leather</option>
                          <option value="Natural stone">Natural stone</option>                           
                          <option value="Net and wire">Net and wire</option>                           
                          <option value="Oak">Oak</option>                           
                          <option value="Painted metal">Painted metal</option>                           
                          <option value="Painted wood">Painted wood</option>                           
                          <option value="Paper">Paper</option>                           
                          <option value="Plastic">Plastic</option>                           
                          <option value="Polywood">Polywood</option>                           
                          <option value="Solid wood">Solid wood</option>                           
                          <option value="Stell">Stell</option>                           
                          <option value="Transparent">Transparent</option>                           
                          <option value="Upholstery">Upholstery</option>                           
                          <option value="Wicker and rattan">Wicker and rattan</option>                           
                          <option value="Wood veneer">Wood veneer</option>                   
                          <option value="N/A">N/A</option>        
                      </select>   
                      </div>    
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Brand</label>
                        <input type="text" name="brand" class="form-control" id=""  value="{{$data->brand}}">
                      </div>    
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Designer</label>
                        <input type="text" name="designer" class="form-control" id=""  value="{{$data->designer}}">
                      </div>    
                    </div>
                 
                  </div>


                  <div class="form-group">
                    <label for="">Product Description</label>
                    <textarea id="summernote" name="description" rows="25">{{$data->description}}</textarea>  
                  </div>

                  <div class="form-group d-none">
                    <label for="">Short Description</label>
                    <textarea name="short_description"  class="form-control"  rows="10">{{$data->short_description}}</textarea>  
                  </div>
                  <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description"  class="form-control"  rows="3">{{$data->meta_description}}</textarea>  
                  </div>

                  <div class="form-group">  
                    <label for="">Product images: </label>
                    <input type="hidden" name="hidden_image" value="{{$data->images}}">
                    <input type="hidden" name="id" value="{{$data->id}}">

                    <div class="uloaded_images" style="border: 1px solid #ddd;">
                    <?php                        
                      if($images = $data->images){
                        $images = explode('|', $images);
                      }
                        ?>                      
                    </div>

                      <div class="input-images-1" style="padding-top: .5rem;"></div>                     
                        <input type="hidden" id="images" name="excludeImages" value="" multiple/>
                      <div id="drag-drop-area"></div>
     
                  </div> 

                  <div class="source">
                    <label for="">Source files: </label>
                      <div class="" style="padding-top: .5rem;"></div>
                        {{-- <input type="file" id="source" required multiple/> --}}
                        <input type="hidden" name="source_files" id="source_files" value="">

                        <div class="form-group">
                          <label for="">MAX</label>
                          <input type="text" name="source_max" class="form-control" value="{{$data->source_max}}"> 
                        </div>
                        <div class="form-group">
                          <label for="">FBX</label>
                          <input type="text" name="source_fbx" class="form-control" value="{{$data->source_fbx}}">
                        </div>
                        <div class="form-group">
                          <label for="">OBJ</label>
                          <input type="text" name="source_obj" class="form-control" value="{{$data->source_obj}}">
                        </div>
                        <div class="form-group">
                          <label for="">Blend</label>
                          <input type="text" name="source_blend" class="form-control" value="{{$data->source_blend}}">
                        </div>
                        <div class="form-group">
                          <label for="">c4d</label>
                            <input type="text" name="source_c4d" class="form-control" value="{{$data->source_c4d}}">
                        </div>
                       

                  </div>
                  <hr>
                  

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="exampleCheck1">
                         Active
                        </label>
                        <input type="checkbox" name="active" @if($data->active == 'on') checked
                        @endif class="form-check-input" id="exampleCheck1">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="">
                         Featured
                        </label> 
                        <input type="checkbox" name="featured" @if($data->featured == 'on') checked
                        @endif class="form-check-input" id="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="">
                         Is set?
                        </label>
                        <input type="checkbox" name="is_set" @if($data->is_set == 'on') checked
                        @endif class="form-check-input" id="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">                    
                        <label class="form-check-label" for="">
                          Freebee
                        </label>
                        <input type="checkbox" name="freebee" @if($data->freebee == 'on') checked
                        @endif class="form-check-input" id="">
                      </div>
                    </div>
                  </div>                
                 

                  <br>
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{URL::to('products')}}" class="btn btn-default">Cancel</a>
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
      let preloaded = new Array();
        <?php foreach($images as $key => $val){ ?>
            preloaded.push({id:'<?php echo $key; ?>',src:'<?php echo asset('images')."/".$val; ?>'});
        <?php } ?>
          console.log(preloaded);
        $('.input-images-1').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old'
        });
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