<!-- begin::navbar -->

<nav class="navbar" >
    <div class="container-fluid">

        <div class="header-logo">
            <a href="{{route('/admin')}}" style="  text-decoration:none;
   color: inherit;">
                <img class="d-none d-lg-block" src="{{asset('public/admin-assets/admin-panal-images/logo-small.png')}}" style="width: 22%;
    height: auto;margin-top: -9px;"><span class="childcare_log" >The Village Childcare</span>
                <img class="d-lg-none d-sm-block" src="{{asset('public/admin-assets/admin-panal-images/two.png')}}" alt="..." style="width: 43%;">
            </a>
        </div>

        <div class="header-body">
            <form class="search">
                <div class="row">
                    <div class="col-md-4">
                       
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="d-lg-none d-sm-block nav-link search-panel-open">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        @if(Auth::check())
                                {{ Auth::user()->name }} 
                         @endif<i class="fa fa-user-o"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title text-center"
                             data-backround-image="">
                           
                            <h6 class="text-uppercase font-size-12 m-b-0">
                                @if(Auth::check())
                                {{ Auth::user()->name }} 
                                @endif
                            </h6>
                        </div>
                        <div class="dropdown-menu-body">
                         
                            <ul class="list-group list-group-flush">
                                
                                    

                                <a class="list-group-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-lg-none d-sm-block">
                    <a href="#" class="nav-link side-menu-open">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- end::navbar -->