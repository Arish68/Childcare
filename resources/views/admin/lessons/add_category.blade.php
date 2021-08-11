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
	                        <h5 class="card-title"><strong>Add Lesson Category</strong></h5>
							<form action="{{route('store-category')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}

					

	                            <div class="form-group">

	                                <label>Title</label>
	                                <input type="text" class="form-control"
								    placeholder="Title" name ="title" required value="{{old('title')}}">
								 </div>

								<div class="form-group">

	                                <label>Purpose</label>
	                                
								     <textarea rows="5" name ="purpose" required placeholder="Purpose" class="form-control" ></textarea>

								 </div>

									<div class="form-group">

	                                <label>Description</label>
	                                
								     <textarea rows="5" name ="description" required placeholder="Description" class="form-control" ></textarea>

								 </div>

				

								 </div>
 
                        </div>
                        <br>

								

	                         <button type="submit" class="btn  btn-block" id="btncolor">Submit</button>
	                        </form>
	                    </div>
	        </div>
       </div>


     </div> 

    </main> 
	
   @endsection