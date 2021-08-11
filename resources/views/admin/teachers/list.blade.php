@extends('admin.layouts.app')
   @section('main-content')

   <main class="main-content">
       <div class="row">
           <div class="col-md-12 text-right p-b-10">
       <a href="{{route('show-pending-teachers')}}" style="background:#0099D1;" class="btn btn-primary " >Pending Teachers</a>
       </div>
       </div>
        <div class="card" style="overflow-x: auto;">
            <div class="card-body">
                @include('message.message')
                <table id="example1" class="table table-striped" style="width: 100%;">
                    <thead id="btncolor">
                    <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Register Date</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                        @php
                         $counter=1;
                        @endphp
                        @foreach($customers as $li)
                        <tr>
                                <td>{{$counter++}}</td>
                                <td>{{ucfirst($li->firstname)}}{{ucfirst($li->lastname)}}</td>
                                <td>{{createdAtDateFormate($li->created_at)}} </td>
                                <form id="delete-form-{{$li->id}}" action="{{route('delete-teachers',$li->id)}}" method="post" style="display:none">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                </form>
                            <form id="approve-form-{{$li->id}}" action="{{route('approve-teachers',$li->id)}}" method="post" style="display:none">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            </form>

                                <td>
                                    @if(isset($is_pending))
                                        <a class="text-success" href="" data-id='{{$li->firstname}}'
                                           onclick="
                                               if(confirm('Are You Sure You Want To Approve ?'+' {{ucfirst($li->firstname)}}')){
                                               event.preventDefault();
                                               document.getElementById('approve-form-{{$li->id}}').submit();
                                               }
                                               else{
                                               event.preventDefault();
                                               } "> Approve /</a>
                                    @endif
                                 <a href="{{route('show-teachers',$li->id)}}" id="colors">View /</a>
{{--                                 <a href="{{route('edit-teachers',$li->id)}}" id="colors">Edit /</a>--}}

                                   <a class="text-danger" href="" data-id='{{$li->firstname}}'
                                        onclick="
                         if(confirm('Are You Sure You Want To Delete ?'+' {{ucfirst($li->firstname)}}')){
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
