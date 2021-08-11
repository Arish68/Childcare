@extends('admin.layouts.app')
   @section('main-content')

   <main class="main-content">
        <div class="card" style="overflow-x: auto;">
            <div class="card-body">
                @include('message.message')
                <table id="example1" class="table table-striped" style="width: 100%;">
                    <thead id="btncolor">
                    <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Intervals</th>
                        <th>Duration</th>
                        <th>Currency</th>
                        <th>Price</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                         $counter=1;
                        @endphp
                        @foreach($lists as $li)
                        <tr>
                                <td>{{$counter++}}</td>
                                <td>{{ucfirst($li->title)}}</td>
                                <td>{{$li->duration}}</td>
                                <td>{{ucfirst($li->plan_duration)}}</td>
                                <td>{{strtoupper($li->currency)}}</td>
                                <td>{{$li->price}}</td>
                                <td>{{createdAtDateFormate($li->created_at)}} </td>
                                <form id="delete-form-{{$li->id}}" action="{{route('delete-subscription',$li->id)}}" method="post" style="display:none">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                </form>

                                <td>
                                 <a href="{{route('show-subscription',$li->id)}}" id="colors">View /</a>
                                 <a href="{{route('edit-subscription',$li->id)}}" id="colors">Edit /</a>

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
