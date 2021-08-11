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
	                        <h5 class="card-title"><strong>Add Meetup</strong></h5>
							<form action="{{route('meetup-management.meetups.store')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}

	                            <div class="form-group">

	                                <label>Title</label>
	                                <input type="text" class="form-control"
								    placeholder="Title" name ="title" required value="{{old('title')}}">
								 </div>

								 <div class="form-group">

	                                <label>Meeting Date</label>
	                                <input type="date" class="form-control"
								    placeholder="Date" name ="meeting_date" required value="{{old('meeting_date')}}">
								 </div>

								  <div class="form-group">

	                                <label>Meeting Time</label>
	                                <input type="time" class="form-control"
								    placeholder="Time" name ="meeting_time" required value="{{old('meeting_time')}}">
								 </div>

								 <div class="form-group">

	                                <label>Address</label>
	                                <input type="text" class="form-control"
								    placeholder="Address" name ="address" required value="{{old('address')}}">
								 </div>

								<div class="form-group">

	                                <label>Description</label>
	                                
								     <textarea rows="5" name ="description" required placeholder="Description" class="form-control" ></textarea>

								 </div>

					<img id="blah" src="{{asset('public/admin-assets/admin-panal-images/default.jpg')}}" alt="Course image" 
                        style="width:100%;height: 200px;" class="thumbnail img-responsive" />
                        <br><br>
                         <div class="input-group" id="removeFileOption">
                        
                          <div id="" class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
						  aria-describedby="inputGroupFileAddon01"  name="image" required="" onchange="readURL(this);getImagVal();" value="{{old('image')}}">
						  <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                          </div>
                        </div><br>

								

	                         <button type="submit" class="btn  btn-block" id="btncolor">Submit</button>
	                        </form>
	                    </div>
	        </div>
       </div>


     </div> 

    </main> 
	
   @endsection