@extends('admin.layouts.app')

   @section('main-content')
 
   <main class="main-content">
     <div class="row">
     	<div class="col-lg-3">
     	</div>

     	<div class="col-lg-5">
			 

	
	       <div class="card">

	                    <div class="card-body">
	                        <h5 class="card-title"><strong>Show/Edit Lesson Category</strong></h5>
	                        <form action="{{route('update-category',$lesson_categories->id)}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								{{method_field('PUT')}}


	                            <div class="form-group">

	                                <label>Title</label>
	                                <input name="title" type="text" class="form-control"
								       value="{{$lesson_categories->title}}">
								 </div>

								 <div class="form-group">

	                                <label>Purpose</label>
	                                
								     <textarea rows="5" name ="purpose" required placeholder="Purpose" class="form-control" >{{$lesson_categories->purpose}}</textarea>

								 </div>

								<div class="form-group">

	                                <label>Description</label>
	                                
								     <textarea rows="5" name ="description" required class="form-control" >{{$lesson_categories->description}}</textarea>

								 </div>

								
             <button type="submit" class="btn  btn-block" id="btncolor">Update</button>
         </form>
	                <br />
	        <a href="{{route('all-categories')}}" class="btn btn-block" id="btncolor">Back</a>
	                        
	                    </div>
	        </div>
	   
       </div>


     </div> 

    </main> 
	
   @endsection