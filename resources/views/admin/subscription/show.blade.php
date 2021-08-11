@extends('admin.layouts.app')

@section('main-content')

<main class="main-content">
    <div class="row">

        <div class="col-lg-6" style="margin: 0px auto;">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title"><strong>Subscription Plan</strong></h5>
                    <div class="form-group">

                        <label>Name</label>
                        <input type="text" class="form-control"
                               readonly value="{{ucfirst($list->title)}}">
                    </div>
                     <div class="form-group">

                        <label>Duration</label>
                        <input type="text" class="form-control"
                               readonly value="{{ucfirst($list->plan_duration)}}">
                    </div>
                  <div class="form-group">

                        <label>Currency</label>
                        <input type="text" class="form-control"
                               readonly value="{{strtoupper($list->currency)}}">
                    </div>
                      <div class="form-group">

                        <label>Price</label>
                        <input type="text" class="form-control"
                               readonly value="{{$list->price}}">
                    </div>
                    <div class="form-group">

                        <label>Stripe Plan Id</label>
                        <input type="text" class="form-control"
                               readonly value="{{$list->stripe_plan}}">
                    </div>
                    <div class="form-group">

                        <label>Stripe Product Id</label>
                        <input type="text" class="form-control"
                               readonly value="{{$list->stripe_product_id}}">
                    </div>
                      <div class="form-group">

                        <label>Sort Order</label>
                        <input type="text" class="form-control"
                               readonly value="{{$list->sort_order}}">
                    </div>
                      <div class="form-group">

                        <label>Status</label>
                        <input type="text" class="form-control"
                               readonly value="{{$list->status}}">
                    </div>
                    <div class="form-group">

                        <label>Created Date</label>
                        <input type="date" class="form-control"
                               readonly value="{{createdAtDateFormate($list->created_at)}}">
                    </div>

                 

                    <a href="{{route('get-subPlan')}}" class="btn btn-block" id="btncolor">Back</a>

                </div>
            </div>
        </div>


    </div>
</main>

@endsection





