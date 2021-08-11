@if(session('msg'))
<div class="alert  alert-dismissible" id="btncolor">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{session('msg')}}
</div>
 @endif