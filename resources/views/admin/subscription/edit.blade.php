@extends('admin.layouts.app')

   @section('main-content')

   <main class="main-content">
     <div class="row">
     	<div class="col-lg-3">
     	</div>

     	<div class="col-lg-5">
			@include('errors.errors')

	       <div class="card">
                    <style>
                        .card-body span {
                        font-size: 12px;
                        color: red;
                        display: flex;
                        margin-bottom: 20px;
                    }
                    </style>
	                    <div class="card-body">
	                        <h5 class="card-title"><strong>Edit Subscription</strong></h5>
	                        <span>These fields are change only for App purpose <br> There will be nothing change on stripe</span>
							<form action="{{route('update-subscription',$list->id)}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								{{method_field('PUT')}}
	                            <div class="form-group">
	                                <label>Name</label>
	                                <input type="text" class="form-control"
								     name ="title" required value="{{$list->title}}">
								 </div>
                              <div class="form-group">
	                                <label>Sub Title</label>
	                                <input type="text" class="form-control"
								     name ="sub_title" required value="{{$list->sub_title}}">
								 </div>
							
								<div class="form-group">
	                                <label>Description</label>
								     <textarea rows="5" name ="description" required class="form-control" >{{$list->description}}</textarea>
								 </div>
                              <div class="form-group">
	                                <label>Sort Order</label>
                                <input type="number" class="form-control" placeholder="sort_order" name ="sort_order" required value="{{$list->sort_order}}">
								</div>
								<div class="form-group">
	                                <label>Status</label>
                               <label class="radio-inline"><input type="radio" name="status" @if($list->status == 1) checked @endif value="1">Active</label>
                               <label class="radio-inline"><input type="radio" name="status" @if($list->status == 0) checked @endif value="0">Draft</label>

								</div>
                                <input type="hidden" class="form-control" placeholder="stripe_product_id" name ="stripe_product_id" required value="{{$list->stripe_product_id}}">
                                <input type="hidden" class="form-control" placeholder="stripe_plan" name ="stripe_plan" required value="{{$list->stripe_plan}}">
                                <input type="hidden"  step="any" class="form-control" name ="price" required value="{{$list->price}}">


	        <button type="submit" class="btn  btn-block" id="btncolor">Update</button>
	                        </form>
	                    </div>
	        </div>
       </div>


     </div>

    </main>

   @endsection
