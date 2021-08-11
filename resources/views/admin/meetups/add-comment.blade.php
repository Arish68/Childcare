@extends('admin.layouts.app')

   @section('main-content')
 
   <main class="main-content">
     <div class="row">
     	<div class="col-lg-3">
     	</div>

     	<div class="col-lg-5">
			 @include('message.message')
	       <div class="card">

	                    <div class="card-body">
	                        <h5 class="card-title"><strong>Add Comment</strong></h5>
							<form action="{{route('meetup-management.meetups.add-comment')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
	                                <input type="hidden" name ="admin_id" required value="{{Auth::user()->id}}">
	                                <input type="hidden" name ="meeting_id" required value="{{$meeting_id}}">
								<div class="form-group">
	                                <label>Write Comment</label>                             
								     <textarea rows="5" name ="message" required placeholder="Your Comment" class="form-control" ></textarea>
								 </div><br>
	                         <button type="submit" class="btn  btn-block" id="btncolor">Submit</button>
	                        </form>
	                    </div>
	        </div>
       </div>


     </div> 

    </main> 
	
   @endsection