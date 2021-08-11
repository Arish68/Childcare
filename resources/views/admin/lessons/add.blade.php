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
	                        <h5 class="card-title"><strong>Add Lesson</strong></h5>
							<form action="{{route('store')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}

								 <div class="form-group">

	                                <label>Cetogory</label>
	                               <select name="category_id" class="form-control">
	                               	<option value="0">Select Category</option>
	                               	@foreach($list as $li)
	                              	<option value="{{$li->id}}">{{$li->title}}</option>
	                              	@endforeach
	                               </select>
								 </div>

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

	                                <label>Supplies 1</label>
	                                
								     <textarea rows="5" name ="supplies_1" required placeholder="Supplies 1" class="form-control" ></textarea>

								 </div>

								<div class="form-group">

	                                <label>Supplies 2</label>
	                                
								     <textarea rows="5" name ="supplies_2" required placeholder="Supplies 2" class="form-control" ></textarea>

								 </div>


						<!-- 		<div class="form-group">

	                                <label>Description</label>
	                                
								     <textarea rows="5" name ="description" required placeholder="Description" class="form-control" ></textarea>

								 </div>
                             -->
                        	<div class="form-group">

	                                <label>Month</label>
                              <select class="form-control" id='gMonth1' name="lesson_month">
                                    <option value='' selected disabled>--Select Month--</option>
                                    <option value='01'>Janaury</option>
                                    <option value='02'>February</option>
                                    <option value='03'>March</option>
                                    <option value='04'>April</option>
                                    <option value='05'>May</option>
                                    <option value='06'>June</option>
                                    <option value='07'>July</option>
                                    <option value='08'>August</option>
                                    <option value='09'>September</option>
                                    <option value='10'>October</option>
                                    <option value='11'>November</option>
                                    <option value='12'>December</option>
                               </select> 
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