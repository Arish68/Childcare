@extends('admin.layouts.app')

   @section('main-content')
 
   <main class="main-content">
     <div class="row">
     	<div class="col-lg-3">
     	</div>

     	<div class="col-lg-5">
			@include('errors.errors')
			
	       <div class="card">

	                    <div class="card-body">
	                        <h5 class="card-title"><strong>Edit Meetup</strong></h5>
							<form action="{{route('meetup-management.meetups.update',$meetup->id)}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								{{method_field('PUT')}}

	                            <div class="form-group">

	                                <label>Title</label>
	                                <input type="text" class="form-control"
								     name ="title" required value="{{$meetup->title}}">
								 </div>

								 <div class="form-group">

	                                <label>Meeting Date</label>
	                                <input type="date" class="form-control"
								     name ="meeting_date" required value="{{$meetup->meeting_date}}">
								 </div>

								 <div class="form-group">

	                                <label>Meeting Time</label>
	                                <input type="time" class="form-control"
								     name ="meeting_time" required value="{{$meetup->meeting_time}}">
								 </div>

								 <div class="form-group">

	                                <label>Address</label>
	                                <input type="text" class="form-control"
								     name ="address" required value="{{$meetup->address}}">
								 </div>

								<div class="form-group">

	                                <label>Description</label>	                                
								     <textarea rows="5" name ="description" required class="form-control" >{{$meetup->description}}</textarea>

								 </div>

								 <img id="blah" src="@if(empty($meetup->image)){{asset('public/admin-assets/admin-panal-images/default.jpg')}} @else {{asset('public/meetupImages/'.$meetup->image)}}@endif" alt="Course image" 
                        style="width:100%;height: 200px;" class="thumbnail img-responsive" />
                        <br><br>
                         <div class="input-group" id="removeFileOption">
                        
                          <div id="" class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
						  aria-describedby="inputGroupFileAddon01"  name="image" onchange="readURL(this);getImagVal();" value="{{old('image')}}">
						  <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                          </div>
                        </div><br>

								

	        <button type="submit" class="btn  btn-block" id="btncolor">Update</button>
	                        </form>
	                    </div>
	        </div>
       </div>


     </div> 

    </main> 
	
   @endsection