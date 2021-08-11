@extends('admin.layouts.app')

@section('main-content')

<main class="main-content">
    <div class="row">

        <div class="col-lg-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title"><strong>Show Meetup</strong></h5>
                    <div class="form-group">

                        <label>Title</label>
                        <input type="text" class="form-control"
                               readonly value="{{$meetup->title}}">
                    </div>

                    <div class="form-group">

                        <label>Meeting Date</label>
                        <input type="date" class="form-control"
                               readonly value="{{$meetup->meeting_date}}">
                    </div>

                    <div class="form-group">

                        <label>Meeting Time</label>
                        <input type="time" class="form-control"
                               readonly value="{{$meetup->meeting_time}}">
                    </div>

                    <div class="form-group">

                        <label>Address</label>
                        <input type="text" class="form-control"
                               readonly value="{{$meetup->address}}">
                    </div>

                    <div class="form-group">

                        <label>Description</label>

                        <textarea rows="5" name ="description" class="form-control" readonly>{{$meetup->description}}</textarea>

                    </div>

                    <img id="blah" src="@if(empty($meetup->image)){{asset('public/admin-assets/admin-panal-images/default.jpg')}} @else {{asset('public/meetupImages/'.$meetup->image)}}@endif" alt="Course image"
                         style="width:100%;height: 200px;" class="thumbnail img-responsive" />
                    <br><br>



                    <a href="{{route('meetup-management.meetups.index')}}" class="btn btn-block" id="btncolor">Back</a>

                </div>
            </div>
        </div>
        <div class="col-lg-5">

            <style>
                @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
                *, *:before, *:after {
                    box-sizing: border-box;
                }

                .people-list {
                    width: 260px;
                    float: left;
                }
                .people-list .search {
                    padding: 20px;
                }
                .people-list input {
                    border-radius: 3px;
                    border: none;
                    padding: 14px;
                    color: white;
                    background: #6A6C75;
                    width: 90%;
                    font-size: 14px;
                }
                .people-list .fa-search {
                    position: relative;
                    left: -25px;
                }
                .people-list ul {
                    padding: 20px;
                    height: 770px;
                }
                .people-list ul li {
                    padding-bottom: 20px;
                }
                .people-list img {
                    float: left;
                }
                .people-list .about {
                    float: left;
                    margin-top: 8px;
                }
                .people-list .about {
                    padding-left: 8px;
                }
                .people-list .status {
                    color: #92959E;
                }

                .chat {
                    width: 490px;
                    float: left;
                    background: #F2F5F8;
                    border-top-right-radius: 5px;
                    border-bottom-right-radius: 5px;
                    color: #434651;
                }
                .chat .chat-header {
                    padding: 20px;
                    border-bottom: 2px solid white;
                }
                .chat .chat-header img {
                    float: left;
                }
                .chat .chat-header .chat-about {
                    float: left;
                    padding-left: 10px;
                    margin-top: 6px;
                }
                .chat .chat-header .chat-with {
                    font-weight: bold;
                    font-size: 16px;
                }
                .chat .chat-header .chat-num-messages {
                    color: #92959E;
                }
                .chat .chat-header .fa-star {
                    float: right;
                    color: #D8DADF;
                    font-size: 20px;
                    margin-top: 12px;
                }
                .chat .chat-history {
                    padding: 30px 30px 20px;
                    border-bottom: 2px solid white;
                    overflow-y: scroll;
                    height: 575px;
                }
                .chat .chat-history .message-data {
                    margin-bottom: 15px;
                }
                .chat .chat-history .message-data-time {
                    color: #a8aab1;
                    padding-left: 6px;
                }
                .chat .chat-history .message {
                    color: white;
                    padding: 18px 20px;
                    line-height: 26px;
                    font-size: 16px;
                    border-radius: 7px;
                    margin-bottom: 30px;
                    width: 90%;
                    position: relative;
                }
                .chat .chat-history .message:after {
                    bottom: 100%;
                    left: 7%;
                    border: solid transparent;
                    content: " ";
                    height: 0;
                    width: 0;
                    position: absolute;
                    pointer-events: none;
                    border-bottom-color: #5a97d0;
                    border-width: 10px;
                    margin-left: -10px;
                }
                .chat .chat-history .my-message {
                    background: #5a97d0;
                }
                .chat .chat-history .other-message {
                    background: #94C2ED;
                }
                .chat .chat-history .other-message:after {
                    border-bottom-color: #94C2ED;
                    left: 93%;
                }
                .chat .chat-message {
                    padding: 30px;
                }
                .chat .chat-message textarea {
                    width: 100%;
                    border: none;
                    padding: 10px 20px;
                    font: 14px/22px "Lato", Arial, sans-serif;
                    margin-bottom: 10px;
                    border-radius: 5px;
                    resize: none;
                }
                .chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
                    font-size: 16px;
                    color: gray;
                    cursor: pointer;
                }
                .chat .chat-message button {
                    float: right;
                    color: #94C2ED;
                    font-size: 16px;
                    text-transform: uppercase;
                    border: none;
                    cursor: pointer;
                    font-weight: bold;
                    background: #F2F5F8;
                }
                .chat .chat-message button:hover {
                    color: #75b1e8;
                }

                .online, .offline, .me {
                    margin-right: 3px;
                    font-size: 10px;
                }

                .online {
                    color: #86BB71;
                }

                .offline {
                    color: #E38968;
                }

                .me {
                    color: #94C2ED;
                }

                .align-left {
                    text-align: left;
                }

                .align-right {
                    text-align: right;
                }

                .float-right {
                    float: right;
                }

                .clearfix:after {
                    visibility: hidden;
                    display: block;
                    font-size: 0;
                    content: " ";
                    clear: both;
                    height: 0;
                }
                .message-photo {
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    object-fit: cover;
                    object-position: center center;
                    display: inline-block;
                }
                .right-side
                {
                    float: right;
                }
              .left-side
                {
                    float: left;
                }
            </style>



            <div class="chatbox container clearfix">

                <div class="chat">

                    <div class="chat-history">
                        <ul class="chatlist">
                            @php
                            $counter=0
                            @endphp
                            @foreach($list as $li)
                            <?php
                            if(empty($li->admin_name))
                            {
                            $x = 'clearfix';
                            $v= 'align-right';
                            $z= 'other-message float-right';
                            $d = 'left-side';
                            }
                            else
                            {
                            $d = 'right-side';
                            $z='my-message';
                            $v = '';
                            }
                                ?>
                            <li class="<?php echo $x; ?>">
                                <div class="message-data <?php echo $v; ?>">
                                    <span class="message-data-time <?php echo $d; ?>"  >{{createdAtDateFormate($li->created_at)}}</span> &nbsp; &nbsp;
                                    @if(empty($li->admin_name))
                                    {{$li->firstname}} {{$li->lastname}}
                                    <img class="message-photo" src=" @if(!empty($li->image)){{asset('public/userImages/'.$li->image)}}@else{{asset('public/admin-assets/admin-panal-images/default.jpg')}}@endif" width="50" height="50" class="message-photo">
                                    @else
                                    <img class="message-photo" src=" @if(!empty($li->image)){{asset('public/userImages/'.$li->image)}}@else{{asset('public/admin-assets/admin-panal-images/default.jpg')}}@endif" width="50" height="50" class="message-photo">
                                    {{ucfirst($li->admin_name)}}
                                    @endif
                                    <!--</span> <i class="fa fa-circle me"></i>-->

                                </div>
                                <div class="message  <?php echo $z; ?>">
                                    {{$li->message}}
                                </div>
                            </li>


                            <?php

                            $x = '';
                            $v= '';
                            $z='';
                            $d='';
                            ?>

                            @endforeach
                        </ul>

                    </div> <!-- end chat-history -->

                    <div class="chat-message clearfix">
                        <form action="" id="ChatForm" method="post">
                            <input type="hidden" name ="admin_id" required value="{{Auth::user()->id}}">
                            <input type="hidden" name ="meeting_id" required value="{{$meetup->id}}">
                        <textarea name="message" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>


                        <button id="saveBtn">Send</button>
                        </form>
                    </div> <!-- end chat-message -->

                </div> <!-- end chat -->

            </div> <!-- end container -->



        </div>

    </div>
</main>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.chat-history').animate({ scrollTop: 10000 }, 1200);

        $('body').on('submit', '#ChatForm', function (e) {
            e.preventDefault();
            $('#saveBtn').html('Sending..');
            var message = $('textarea#message-to-send').val();
            var formData = new FormData(this);
              var fullDate = new Date();
            
                var twoDigitMonth = fullDate.toLocaleString('en-us', { month: 'short' }); 
                var twoDigitDate = fullDate.getDate();
                var currentDate = twoDigitDate + "-" + twoDigitMonth + "-" + fullDate.getFullYear();
            
            $.ajax({
                data: formData,
                url: "{{ route('meetup-management.meetups.add-comment') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data) {
                    $(".chatlist").append('<li class=""><div class="message-data "><span class="message-data-time right-side">'+currentDate+'</span> &nbsp; &nbsp;<img class="message-photo" src=" https://intechsol.co/childcare/public/admin-assets/admin-panal-images/default.jpg" width="50" height="50">Admin <i class="fa fa-circle me"></i> </div><div class="message  my-message">'+message+'</div></li>');
                    $('#saveBtn').html('Send');
                    $('#ChatForm').trigger("reset");
                    $('.chat-history').animate({ scrollTop: 10000 }, 1200);
                    
                },
                error: function (data) {
                    alert('Chat already entered');
                    console.log('Error:', data);
                    $('#saveBtn').html('Send');
                }
            });
        });

    });

</script>
@endsection





