
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Child Care</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendors/bundle.css')}}" type="text/css">
    <!-- end::global styles -->
    <link rel="shortcut icon" href="{{asset('public/admin-assets/admin-panal-images/logo.ico')}}" >
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
                    <img src="{{asset('public/admin-assets/admin-panal-images/logo-small.png')}}" width="100" class="m-r-15"  alt="">
                </div>
                <p>Sign in to continue.</p>
                <form method="POST" action="{{ route('login') }}">
                   @csrf
                   <div class="form-group mb-4">
                    <input type="email" class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" autofocus placeholder="Your Email " required="" value="{{ old('email') }}" name="email">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password" name="password" required="">

                       @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                </div>
                <button class="btn btn-lg btn-block btn-uppercase mb-4" style="background: #0099D1;color: white;">Sign In</button>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" {{ old('remember') ? 'checked' : '' }} name="remember">
                        <label class="custom-control-label" for="customCheck">Keep me signed in</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link text-info">Forgot password?</a>
                    @endif
                </div>
     
               {{-- <div class="text-center">
                    Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
                </div>
                --}} 
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











































