<!-- begin::sidebar -->
<div class="sidebar">
</div>
<!-- end::sidebar -->
<!-- begin::side menu -->
<div class="side-menu">
    <div class='side-menu-body'>
        <ul style="max-height:10%; padding-top: 5%; overflow: hidden;">
            <li class="">
                <i class="icon fa fa-home"></i>
                <span style="font-size: 15px;"><b> @if(Auth::check())  {{ ucwords (Auth::user()->name)}} @endif</b></span>
               </li>
            <li class="">
                <a href="{{route('/admin')}}">
                    <i class="icon fa fa-dashboard"></i>
                    <span style="font-size: 15px;">Dashboard</span>
                </a>
            </li>

        </ul>
        <ul style="max-height:20%; padding-top: 5%; overflow: hidden;">
            <li class="">
                <i class="icon fa fa-users"></i>
                <span style="font-size: 15px;"><b> Users</b></span>
            </li>

            <li class="">
                <a href="{{route('view-parents')}}">
                    <i class="icon fa fa-user"></i>
                    <span style="font-size: 15px;">All Parents</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('view-teachers')}}">
                    <i class="icon fa fa-user"></i>
                    <span style="font-size: 15px;">All Teachers</span>
                </a>
            </li>
        </ul>

        <ul style="max-height:20%,overflow: hidden;">
            <li class="">
                <i class="icon fa fa-comment"></i>
                <span style="font-size: 13px;"><b>Meetups</b></span>
            </li>
            <li class="">
                <a href="{{route('meetup-management.meetups.add')}}">
                    <i class="icon fa fa-link"></i>
                    <span>Add Meetup</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('meetup-management.meetups.index')}}">
                    <i class="icon fa fa-link"></i>
                    <span>All Meetups</span>
                </a>
            </li>
        </ul>


        <ul style="max-height:36%;overflow: hidden;">
            <li class="">
                <i class="icon fa fa-book"></i>
                <span style="font-size: 15px;"><b>Lessons</b></span>
            </li>
            <li class="">
                <a href="{{route('add')}}">
                    <i class="icon fa fa-link"></i>
                    <span>Add Lesson</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('all')}}">
                    <i class="icon fa fa-link"></i>
                    <span>All Lessons</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('art-works')}}">
                    <i class="icon fa fa-link"></i>
                    <span>Art & Works</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="">
                <i class="icon fa fa-list-alt"></i>
                <span style="font-size: 15px;"><b>Grade Level</b></span>
            </li>
            <li class="">
                <a href="{{route('add-category')}}">
                    <i class="icon fa fa-link"></i>
                    <span>Add Grade Level</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('all-categories')}}">
                    <i class="icon fa fa-link"></i>
                    <span>All Grade Level</span>
                </a>
            </li>
        </ul>
        
        
         <ul>
            <li class="">
                <i class="icon fa fa-credit-card "></i>
                <span style="font-size: 15px;"><b>Subscription</b></span>
            </li>
            <li class="">
                <a href="{{route('add-subscription')}}">
                    <i class="icon fa fa-link"></i>
                    <span>Add Subscription Plan</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('get-subPlan')}}">
                    <i class="icon fa fa-link"></i>
                    <span>All Subscription</span>
                </a>
            </li>
            
          
        </ul>
        
        
    </div>
</div>
<!-- end::side menu -->
