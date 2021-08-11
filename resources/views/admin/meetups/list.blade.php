@extends('admin.layouts.app')
<?php use App\Models\Meeting;?>
   @section('main-content')
 
   <main class="main-content">
        
        <div class="card" style="overflow-x: auto;">
            <div class="card-body">
                @include('message.message')
                <table id="example1" class="table table-striped" style="width: 100%;">
                    <thead id="btncolor">
                    <tr>
                        <th>Sr.</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Total Members</th>
                        <th>Date/Time</th>
                        <th>Unread</th>
                        <th>Action</th>                      
                      
                    </tr>
                    </thead>
                    <tbody>
                        @php
                         $counter=1;
                        @endphp
                        @foreach($list as $li)
                        <tr>
                                <td>{{$counter++}}</td>
                                <td>{{ucfirst($li->title)}}</td>
                                
                                <td>
                                    {{dateFormate($li->meeting_date)}}
                                </td>
                                <td>
                        {{getTime($li->meeting_time)}} {{getHours($li->meeting_time) >= 12 ? 'PM' : 'AM'}}
                                  </td>
                                <td>{{Meeting::getTotalMembers($li->id)}}</td>
                                <td>{{createdAtDateFormate($li->created_at)}}</td>
                                <td>@foreach($comment_count as $comment_counts)
                                          @if($comment_counts->meet_id == $li->id)
                                           <span class="badge badge-pill badge-primary">{{$comment_counts->total}}</span>
                                          @else
                                          @endif
                                          @endforeach</td>
                                <form id="delete-form-{{$li->id}}" action="{{route('meetup-management.meetups.delete',$li->id)}}" method="post" style="display:none">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                </form>

                                <td>
                                 <a href="{{route('meetup-management.meetups.show',$li->id)}}" id="colors">View /</a>
                                   <a href="{{route('meetup-management.meetups.edit',$li->id)}}" id="colors">Edit /</a>
                                   <!--<a href="{{route('meetup-management.meetups.comments',$li->id)}}" id="colors">Comments /</a>-->
                                   <a class="text-danger" href="" data-id='{{$li->title}}' 
                                        onclick="
                         if(confirm('Are You Sure You Want To Delete ?'+' {{ucfirst($li->title)}}')){
                                          event.preventDefault();
                                          document.getElementById('delete-form-{{$li->id}}').submit();
                                       }
                                         else{
                                           event.preventDefault();
                                         } "> Delete</a>
                                     
                                </td>
                               
                        </tr>
                        @endforeach
                 

              
                    
                  
                    </tbody>
                  
                </table>
            </div>
        </div>

</div>
</div>
<script type="text/javascript">
window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
</script>
@endsection
