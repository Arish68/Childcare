@extends('admin.layouts.app')

   @section('main-content')
 
   <main class="main-content">
     <div class="row">
     	<div class="col-lg-3">
     	</div>

     	<div class="col-lg-5">
			 
			
	       <div class="card">

	                    <div class="card-body">
	                        <h5 class="card-title"><strong>Comment Detail</strong></h5>

								<div class="form-group">                            
								     <textarea rows="50" class="form-control" readonly>{{$comment->message}}</textarea>
								 </div>

                        <br><br>

								

	        <a href="{{route('meetup-management.meetups.comments',$meeting_id)}}" class="btn btn-block" id="btncolor">Back</a>
	                        
	                    </div>
	        </div>
       </div>


     </div> 

    </main> 
	
   @endsection