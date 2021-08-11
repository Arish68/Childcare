
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Child Care</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendors/bundle.css')}}" type="text/css">
    <!-- end::global styles -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="{{asset('public/admin-assets/assets/css/app.min.css')}}" type="text/css">
    <!-- end::custom styles -->

</head>
<body class="bg-white h-100-vh p-t-0">





    <div class="container h-100-vh">
        <div class="row align-items-md-center h-100-vh">
            <div class="col-lg-6 d-none d-lg-block">
                <img class="img-fluid" src="{{asset('public/admin-assets/admin-panal-images/logo.png')}}" alt="...">
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="m-b-20">
                    <img src="{{asset('public/admin-assets/admin-panal-images/logo.png')}}" class="m-r-15" width="180" alt="">
                </div>
                <p>Password Reset Page</p>
                      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form  method="POST" action="{{ route('password.email') }}">
                   @csrf
                   <div class="form-group mb-4">
                    <input type="email" class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" autofocus placeholder="Your Email " required="" value="{{ old('email') }}" name="email">

                  @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                </div>
       
                <button class="btn btn-lg btn-block btn-uppercase mb-4" style="background: #0099D1;color: white;">Send Password Reset Link</button>
          
     
               
            </form>
        </div>
    </div>
</div>

<!-- begin::global scripts -->
<script src="{{asset('public/admin-assets/assets/vendors/bundle.js')}}"></script>
<!-- end::global scripts -->

<!-- begin::custom scripts -->
<script src="{{asset('public/admin-assets/assets/js/borderless.min.js')}}"></script>
<!-- end::custom scripts -->

</body>
</html>




