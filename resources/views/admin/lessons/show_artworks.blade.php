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
                        <th width="2%" style="width: 2%;">No</th>
                        <th  style="width: 10%;">Title</th>
                        <th  style="width: 10%;">Parent</th>
                        <th  style="width: 10%;">Teacher</th>
                        <th  style="width: 15%;">Lesson Title</th>
                        <th  style="width: 10%;">Category</th>
                        <th  style="width: 30%;">Remarks</th>
                        <th  style="width: 5%;">Published</th>
                        <th  style="width: 5%;">Date</th>
                        <th  style="width: 5%;">Action</th>                      
                      
                    </tr>
                    </thead>
                    <tbody>
                        @php
                         $counter=1;
                        @endphp
                        @foreach($artworks as $art)
                        <tr>
                                <td>{{$counter++}}</td>
                                <td>{{ucfirst($art->title)}}</td>
                                
                                <td>
                                    {{ucfirst($art->parant_title)}}
                                </td>
                                <td>
                                {{ucfirst($art->firstname)}} {{ucfirst($art->lastname)}}
                                  </td>
                                  <td>
                                {{ucfirst($art->lesson_title)}}
                                  </td>
                                  <td>
                                {{ucfirst($art->lesson_category)}}
                                  </td>
                                         <td>
                                {{ucfirst($art->remarks)}}
                                  </td>

                                <td>
                                  @if($art->art_status == 1)
                                  <?php echo 'Yes'; ?>
                                  @else
                                  <?php echo 'No'; ?>
                                    @endif
                                </td>
                                <td>{{createdAtDateFormate($art->art_created_at)}}</td>
                                
                                <form id="delete-form-{{$art->art_id}}" action="{{route('delete-art-works',$art->art_id)}}" method="post" style="display:none">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                </form>

                                <td>
                                
           

                                      <a class="text-danger" href="" data-id='{{$art->title}}' 
                                        onclick="
                         if(confirm('Are You Sure You Want To Delete ?'+' {{ucfirst($art->title)}}')){
                                          event.preventDefault();
                                          document.getElementById('delete-form-{{$art->art_id}}').submit();
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
