
@extends('admin.master')
@section('main_content')    

  <div class="page-content container container-plus">
  

    <form action="{{route('update_price')}}" method="post">
      @csrf  
    <div class="row mt-3">
      <div class="col-12">
        <div class="card dcard">
          <div class="card-body px-1 px-md-3">                                   
            <div role="main" class="main-content">         
              <div class="page-content container container-plus">
                <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">              

                <h1 class="page-title text-primary-d2 text-140">Products</h1>  
                  
				  <a href="add-product" class="btn btn-white px-3 text-95 radius-round border-2 brc-black-tp10 float-right">
					<i class="fa fa-plus mr-1"></i>
					Add <span class="d-sm-none d-md-inline">New</span> Entry
				  </a>   
         
				  <button class="btn btn-white px-3 text-95 radius-round border-2 brc-black-tp10 float-right" type="button"  data-toggle="modal" data-target="#exampleModal">
					<i class="fa fa-plus mr-1"></i> Update Product Price
				  </button>     
          <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="price" class="form-control" placeholder="Set new price">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>           


                <div class="page-tools mt-3 mt-sm-0 mb-sm-n1">
                  <!-- dataTables search box will be inserted here dynamically -->
                </div>
              </div>

              <div class="card bcard h-auto">
               

                  <table id="datatable" class="d-style w-100 table text-dark-m1 text-95 border-y-1 brc-black-tp11 collapsed">
                    <!-- add `collapsed` by default ... it will be removed by default -->
                    <!-- thead with .sticky-nav -->
                    <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
                      <tr>
                        <th class="td-toggle-details border-0 bgc-white shadow-sm">
                          <i class="fa fa-angle-double-down ml-2"></i>
                        </th>
						<th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">SN</th>
						<th  class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Image </th>	
						<th  class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm"> Product Name </th>	
						<th  class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm"> Price</th>								
						<th  class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm"> Category</th>								
						<th  class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm"> Is Set</th>								
						<th  class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm"> Status </th>
						<th  class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm"> Action </th>                   

                        <th class="border-0 bgc-white shadow-sm w-2">
                          <!-- the TD will have edit icon -->
                        </th>
                      </tr>
                    </thead>

                    <tbody class="pos-rel">
                    @foreach($data as $item)                                   
                      <tr class="d-style bgc-h-default-l4">
                        <td class="td-toggle-details pos-rel">
                          <div class="position-lc h-95 ml-1px border-l-3 brc-purple-m1">
                          </div>
                        </td> 
                        <td class="pl-3 pl-md-4 align-middle pos-rel">
                          <input type="checkbox" name="product_id[]" value="{{$item->id}}">                         
                        </td>
                      
                        {{-- <td class="pl-3 pl-md-4 align-middle pos-rel"> {{$loop->iteration}} </td> --}}
						<td>								
              <?php if($images = $item->images) {
              $images = explode('|', $images);
              ?>             
							<img src="{{asset('images')}}/{{$images[0]}}" alt="" height="40px" width="60px;">
              <?php }?>
						</td>
						
						<td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
						<td>{{$item->catName}}</td>					
						<td class="center">
							@if($item->is_set == 'on') 
							<span class="label label-success">Set</span>
							@elseif ($item->active != 'on') 
							<span class="label label-warning"></span>
							@endif
						</td>
						<td class="center">
							@if($item->active == 'on') 
							<span class="label label-success">Active</span>
							@elseif ($item->active != 'on') 
							<span class="label label-warning">Inactive</span>
							@endif
						</td>

                        <td class="align-middle">
                          <span class="d-none d-lg-inline">
                              <a  title="Edit" href="edit-product/{{$item->id}}" class="v-hover">
                                  <i class="fa fa-edit text-blue-m1 text-120"></i>
                              </a>
                          </span>

                          <span class="d-lg-none text-nowrap">
                              <a title="Edit" href="edit-product/{{$item->id}}" class="btn btn-outline-info shadow-sm px-4 btn-bgc-white">
                                  <i class="fa fa-pencil-alt mx-1"></i>
                                  <span class="ml-1 d-md-none">Edit</span>
                          </a>
                          </span>
                                                                                        

                          <span class="d-none d-lg-inline">
                              <a data-rel="tooltip" title="Delete" href="/delete-product/{{$item->id}}" onclick="confirmDelete()" class="v-hover">
                                  <i class="fa fa-trash text-blue-m1 text-120"></i>
                              </a>
                          </span>

                          <span class="d-lg-none text-nowrap">
                              <a title="Edit" href="#" class="btn btn-outline-info shadow-sm px-4 btn-bgc-white">
                                  <i class="fa fa-trash-alt mx-1"></i>
                                  <span class="ml-1 d-md-none">Delete</span>
                          </a>
                          </span>
                        </td>
                        <td></td>
                      </tr>
                      @endforeach
                    </form>

                    
                    </tbody>
                  </table>

              </div>
            </div>


           
      </div>
    </div>

  </div>
 
@endsection