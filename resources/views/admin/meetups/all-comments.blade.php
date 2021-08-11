@extends('admin.layouts.app')

<?php 
   use App\Models\Meeting;
   use Illuminate\Support\Str;
?>

   @section('main-content')
 
   <main class="main-content">
        <a href="{{route('meetup-management.meetups.commentForm',['meeting_id'=>$meeting_id])}}" class="btn btn-info btn-sm ">Add Comment</a><br><br>
        <div class="card" style="overflow-x: auto;">

            <div class="card-body">
               @include('message.message')
                <table id="example1" class="table table-striped ">
                    <thead id="btncolor">
                    <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>User Image</th>
                        <th>Date/Time</th>
                        <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                        @php
                         $counter=0
                        @endphp
                        @foreach($list as $li)
                        <tr>
                                <td>{{++$counter}}</td>
                                <td>@if(empty($li->admin_name))

                                  {{$li->firstname}} {{$li->lastname}} <br><br>
                                  <label class="badge badge-success">user</label>
                                  @else 

                                  {{ucfirst($li->admin_name)}} 

                                  <br><br><label class="badge badge-secondary">admin</label>

                                @endif</td>
                                <td>{{Str::limit($li->message,60)}}</td>
                                <td>
                                  <img src=" @if(!empty($li->image))
                                  {{asset('public/userImages/'.$li->image)}}
                                  @else
                                  {{asset('public/admin-assets/admin-panal-images/default.jpg')}}
                                  @endif
                                  "style="width:30%;" class="img-thumbnail">
                                </td>
                                <td>{{createdAtDateFormate($li->created_at)}}</td>
                                 <td>
                                 <a href="{{route('meetup-management.meetups.comment-detail',$li->id)}}" id="colors">View /</a>
                                   <form id="delete-form-{{$li->id}}" action="{{route('meetup-management.meetups.delete-comment',$li->id)}}" method="post" style="display:none">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                   </form>
                                      <a class="text-danger" href=""  
                                        onclick="
                                      if(confirm('Are You Sure You Want To Delete ?')){
                                          event.preventDefault();
                                          document.getElementById('delete-form-{{$li->id}}').submit();
                                       }
                                         else{
                                           event.preventDefault();
                                         } "> Delete </a>

                                </td>

                        </tr>
                        @endforeach         
                    </tbody>
                  
                </table>
            </div>
        </div>

</div>
</div>

</main>
   
@endsection
