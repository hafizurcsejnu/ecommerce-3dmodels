
@extends('admin.master')
@section('main_content')    

  <div class="page-content container container-plus">
    <div class="page-header pb-2">
      <h1 class="page-title text-primary-d2 text-150">
        Add New Page     
      </h1> 
      <a href="pages"class="btn btn-default px-3 text-95 radius-round border-2 brc-black-tp10 float-left">
        <i class="fa fa-plus mr-1"></i>
        <span class="d-sm-none d-md-inline">All</span> Pages
      </a>
    </div>   


    <div class="row mt-3">
      <div class="col-12">
        <div class="card dcard">
          <div class="card-body px-1 px-md-3">                                   
            <div role="main" class="main-content">         
              <div class="page-content container container-plus">               

                <form action="save_page" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" id=""  placeholder="Enter title here">
                  </div>                 
                  <div class="form-group">
                    <label for="">Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" id=""  placeholder="Enter sub title here">
                  </div>                 

                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Category</label>
                    <select class="form-control" name="parent" required="">
                        <option value="">Select page category</option>                        
                        <option value="Basic">Basic</option>
                        <option value="">Not Defined</option>                        
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea id="summernote" name="description" rows="25">
                    </textarea>  
                  </div>

                  <div class="form-group">
                    <label for="">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="10"></textarea>  
                  </div>
                  <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4"></textarea>  
                  </div>

                  <div class="link_area">
                    <div class="form-group col-6 float-left">
                        <label for="">Link Title</label>
                        <input type="text" name="link_title" class="form-control" id=""  placeholder="Enter link title">
                    </div>

                    <div class="form-group col-6 float-left">
                        <label for="">Link Action</label>
                        <input type="text" name="link_action" class="form-control" id=""  placeholder="Enter link action url here">
                    </div>
                    </div>

                  <div class="form-group">
                    <label for="">Image: </label>
                    <img id="uploadPreview" style="width: 200px; height: 150px; display:none" />
                    <input id="uploadImage"  type="file" name="image" onchange="PreviewImage();" />
                  </div>

                  <div class="form-check">                    
                    <label class="form-check-label" for="exampleCheck1">
                     Active
                    </label>
                    <input type="checkbox" name="active" checked class="form-check-input" id="exampleCheck1">
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-default">Cancel</button>
                </form>
                
             </div>
            </div>
          </div>
        </div>           
      </div>
    </div>

  </div>
 
@endsection