@extends('admin.layouts.app')

   @section('main-content')
 
   <main class="main-content">
     <div class="row">
     	<div class="col-lg-3">
     	</div>

     	<div class="col-lg-5">

@if($lessons)			 
@foreach($lessons as $lesson)	
@endforeach		
	       <div class="card">

	                    <div class="card-body">
	                        <h5 class="card-title"><strong>Show/Edit Lesson</strong></h5>
	                        <form action="{{route('update',$lesson->id)}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								{{method_field('PUT')}}


	                        <div class="form-group">


	                               <label>Cetogory</label>
	                               <select name="category_id" class="form-control">
	                               	<option value="{{$lesson->category_id}}">{{$lesson->cat_title}}</option>
	                           
	                               </select>
								 </div>
	                            <div class="form-group">

	                                <label>Title</label>
	                                <input name="title" type="text" class="form-control"
								       value="{{$lesson->title}}">
								 </div>

								 <div class="form-group">

	                                <label>Purpose</label>
	                                
								     <textarea rows="5" name ="purpose" required placeholder="Purpose" class="form-control" >{{$lesson->purpose}}</textarea>

								 </div>

									<div class="form-group">

	                                <label>Supplies</label>
	                                
								     <textarea rows="5" name ="supplies_1" required class="form-control" >{{$lesson->supplies_1}}</textarea>

								 </div>

								<div class="form-group">

	                                <label>Lesson Schedule</label>
	                                
								     <textarea rows="5" name ="supplies_2" required  class="form-control" >{{$lesson->supplies_2}}</textarea>

								 </div>
								 
								  	<div class="form-group">

	                                <label>Month</label>
                              <select class="form-control" id='gMonth1' name="lesson_month">
                                    <option value='' >--Select Month--</option>
                                    <option value='01' @if($lesson->lesson_month == "1") selected @endif>Janaury</option>
                                    <option value='02' @if($lesson->lesson_month == "2") selected @endif >February</option>
                                    <option value='03' @if($lesson->lesson_month == "3") selected @endif>March</option>
                                    <option value='04' @if($lesson->lesson_month == "4") selected @endif>April</option>
                                    <option value='05' @if($lesson->lesson_month == "5") selected @endif>May</option>
                                    <option value='06' @if($lesson->lesson_month == "6") selected @endif>June</option>
                                    <option value='07' @if($lesson->lesson_month == "7") selected @endif>July</option>
                                    <option value='08' @if($lesson->lesson_month == "8") selected @endif>August</option>
                                    <option value='09' @if($lesson->lesson_month == "9") selected @endif>September</option>
                                    <option value='10' @if($lesson->lesson_month == "10") selected @endif>October</option>
                                    <option value='11' @if($lesson->lesson_month == "11") selected @endif>November</option>
                                    <option value='12' @if($lesson->lesson_month == "12") selected @endif>December</option>
                               </select> 
                               </div>

						<img id="blah" src="@if(empty($lesson->image)){{asset('public/admin-assets/admin-panal-images/default.jpg')}} @else {{asset('public/lessonImages/'.$lesson->image)}}@endif" alt="Lesson image" 
                        style="width:100%;height: 200px;" class="thumbnail img-responsive" />
                        <br><br>
                         <div class="input-group" id="removeFileOption">
                        
                          <div id="" class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
						  aria-describedby="inputGroupFileAddon01"  name="image" onchange="readURL(this);getImagVal();" value="{{old('image')}}">
						  <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                          </div>


								

					

				

								
             <button type="submit" class="btn  btn-block" id="btncolor">Update</button>
         </form>
	                
	        <a href="{{route('all')}}" class="btn btn-block" id="btncolor">Back</a>
	                        
	                    </div>
	        </div>

	        @else

	        <p>No Record!</p>

	        @endif
       </div>


     </div> 

    </main> 
	
   @endsection