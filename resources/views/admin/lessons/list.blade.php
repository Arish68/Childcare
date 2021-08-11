@extends('admin.layouts.app')
<?php use App\Models\Lesson;?>
   @section('main-content')
 
   <main class="main-content">
        
        <div class="card" style="overflow-x: auto;">
            <div class="card-body">
                @include('message.message')
                <table id="example1" class="table table-striped" style="width: auto;">
                    <thead id="btncolor">
                    <tr>
                        <th style="width: 2%;">No</th>
                        <th  style="width: 10%;">Title</th>
                        <th  style="width: 10%;">Category</th>
                        <th  style="width: 20%;">Purpose</th>
                        <th  style="width: 15%;">Supplies</th>
                        <th  style="width: 15%;">Lesson Schedule</th>
                        <th  style="width: 5%;">Published</th>
                        <th  style="width: 10%;">Date/Time</th>
                        <th  style="width: 13%;">Action</th>                      
                      
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
                                <td>{{ucfirst($li->lesson_category)}}</td>
                                
                                <td>
                                    {{ucfirst($li->purpose)}}
                                </td>
                                <td>
                                {{ucfirst($li->supplies_1)}}
                                  </td>
                                  <td>
                                {{ucfirst($li->supplies_2)}}
                                  </td>
                                <td>
                                  @if($li->status == 1)
                                  <?php echo 'Yes'; ?>
                                  @else
                                  <?php echo 'No'; ?>
                                    @endif
                                </td>
                                <td>{{createdAtDateFormate($li->created_at)}}</td>
                                
                                <form id="delete-form-{{$li->id}}" action="{{route('delete',$li->id)}}" method="post" style="display:none">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                </form>

                                <td>
                                
                                   <a href="{{route('edit',$li->id)}}" id="colors">Edit /</a>
                                 @if($li->status == 1)
                                  <a style="color: red;"  href="{{route('publish',$li->id)}}" id="colors">Unpublish</a>
                                  @elseif($li->status == 0)
                                     <a style="color: green;"  href="{{route('publish',$li->id)}}" id="colors">Publish</a>
                                  @endif
                                
                             /

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
</main>
  
@endsection
