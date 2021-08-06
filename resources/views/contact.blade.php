@extends('layouts.master2')
@section('main_content')


	<section id="services-2" class="wide-60 services-section division">
		<div class="container blog_details_page"> 	
            	
            
            <div class="row">	

              <div class="container flash-message mt-2">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }} text-center">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
              </div>
               
				<div class="col-md-12">
                    <h1 class="text-center">Contact Us</h1>	 
                    <form action="contact_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="">Full Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter your name">
                        </div>  
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        </div>  
      
                        <div class="form-group">
                          <label for="">Message</label>
                          <textarea name="message" class="form-control" rows="10"></textarea>  
                        </div>
                       
                        <br>                       
                        <button type="submit" class="btn btn-md btn-theme black-hover">Submit</button>
                      </form>
				</div>	
			
				
			</div>
		</div>
			
	</section>
			
			
 <br><br>
 <br><br>

 @endsection