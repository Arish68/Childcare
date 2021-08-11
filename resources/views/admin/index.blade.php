
@extends('admin.layouts.app')

   @section('main-content')
       <!-- begin::main content -->
<main class="main-content">

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Dashboard</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>

                    </ol>
                </nav>
            </div>

        </div>
        <!-- end::page header -->


        <!-- First Row -->
        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Total Parents</h6>
                                <h4 class="m-b-0">
                                  {{$totalParents}}
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Total Teachers</h6>
                                <h4 class="m-b-0">
                                    {{$totalTeachers}}
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">All Meetups</h6>
                                <h4 class="m-b-0">
                                   {{$totalMeetings}}
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">All Lessons</h6>
                                <h4 class="m-b-0">
                                    {{$totalLesson}}
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- First Row end-->



    </div>

</main>
<!-- end::main content -->


   @endsection
