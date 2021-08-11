@extends('admin.layouts.app')

@section('main-content')

<main class="main-content">
    <div class="row">

        <div class="col-lg-6" style="margin: 0px auto;">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title"><strong>Show User</strong></h5>
                    <div class="form-group">

                        <label>Name</label>
                        <input type="text" class="form-control"
                               readonly value="{{ucfirst($customers->firstname)}} {{ucfirst($customers->lastname)}}">
                    </div>

                    <div class="form-group">

                        <label>Register Date</label>
                        <input type="text" class="form-control"
                               readonly value="{{createdAtDateFormate($customers->created_at)}}">
                    </div>

                    <div class="form-group">

                        <label>Gender</label>
                        <input type="text" class="form-control"
                               readonly value="{{$customers->gender}}">
                    </div>
                    <div class="form-group">

                        <label>Phone</label>
                        <input type="text" class="form-control"
                               readonly value="{{$customers->phone_no}}">
                    </div>
                    <div class="form-group">

                        <label>Address</label>
                        <input type="text" class="form-control"
                               readonly value="{{$customers->address}}">
                    </div>
                  
<div class="form-group" style=" width: 50%;
    height: auto;
    margin: 0 auto;
    text-align: center;"> <img id="blah" src="{{asset('public/userImages/'.$customers->image)}}" alt="User image"
                         style="width:100%;height: 200px;" class="thumbnail img-responsive" />
                    <br><br></div>
                   

                    <a href="{{route('view-parents')}}" class="btn btn-block" id="btncolor">Back</a>

                </div>
            </div>
        </div>


    </div>
</main>

@endsection





