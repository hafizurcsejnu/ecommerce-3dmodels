@extends('admin.master')
@section('main_content')    

  <div class="page-content container container-plus">
    <div class="page-header pb-2">
      <h1 class="page-title text-primary-d2 text-150">
        Users      
      </h1> 
     
    </div>

    <div class="row mt-3">
      <div class="col-12">
        <div class="card dcard">
          <div class="card-body px-1 px-md-3">                                   
            <div role="main" class="main-content">         
              <div class="page-content container container-plus">
                <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">              

                <h1 class="page-title text-primary-d2 text-140">
                    All users 
                  <small class="page-info text-dark-m3">
                    <i class="fa fa-angle-double-right text-80"></i>
                    you can add, edit and delete any of these data.
                  </small>
                </h1>                     


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

                        <th class="border-0 bgc-white pl-3 pl-md-4 shadow-sm"> SN </th>
                        <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Name </th> 
                        <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Email</th>                     
                        <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Status</th>                     

                        <th class="border-0 bgc-white shadow-sm w-2">
                          Action
                        </th>
                        <th class="border-0 bgc-white shadow-sm w-2">
                          Delete
                        </th>
                      </tr>
                    </thead>  

                    <tbody class="pos-rel">
                    @foreach($data as $item)                                   
                    <tr class="d-style bgc-h-default-l4">
                      <td class="pl-3 pl-md-4 align-middle pos-rel"> {{$loop->iteration}} </td>
                     
                        <td class="pl-3 pl-md-4 align-middle pos-rel"> {{$loop->iteration}} </td>
                        <td> <span class="text-105"> {{$item->name}} </span> </td>
                        <td> <span class="text-105"> {{$item->email}} </span> </td>
                        <td> <span class="text-105"> {{$item->active}} </span> </td>
                    
                      
                        <td> 
                          <form action="change_user_status" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$item->id}}">
                            <input type="hidden" name="active" value="{{$item->active}}">
                            <span class="text-105"> <button class="btn btn-default" type="submit"  title="click to change user status."> 
                              @if ($item->active != 'disable')
                                Disable
                              @elseif ($item->active == 'disable')
                                Active
                              @endif 
                          </button> </span> 
                          </form>
                        </td>

                        <td class="align-middle">
                          {{-- <span class="d-none d-lg-inline">
                              <a data-rel="tooltip"  data-toggle="modal" data-target="#item{{$item->id}}"  title="Edit" href="#" class="v-hover">
                                  <i class="fa fa-edit text-blue-m1 text-120"></i>
                              </a>
                          </span>

                          <span class="d-lg-none text-nowrap">
                              <a title="Edit" href="#" class="btn btn-outline-info shadow-sm px-4 btn-bgc-white">
                                  <i class="fa fa-pencil-alt mx-1"></i>
                                  <span class="ml-1 d-md-none">Edit</span>
                          </a>
                          </span> --}}

                                                                                           

                          <span class="d-none d-lg-inline">
                              <a data-rel="tooltip" title="Delete" href="/delete-user/{{$item->id}}" onclick="confirmDelete()" class="v-hover">
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
                      </tr> 


                      @endforeach

                    
                    </tbody>
                  </table>

              </div>
            </div>


           
      </div>
    </div>

  </div>
 
@endsection