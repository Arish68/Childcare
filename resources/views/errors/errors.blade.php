
@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible">
@foreach($errors->all() as $error)
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                   <p>{{$error}}</p>
  @endforeach  
</div>                           
@endif 

