
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universal - All In 1 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    @yield('head')
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/user/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('assets/user/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->

    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('assets/user/vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/user/vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/user/css/custom.css')}}">
    <script src="{{ asset('assets/user/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>

    <div id="all">
      <!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p>Contact us on +420 777 555 333 or hello@universal.com.</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
                @if (! auth::user())
                <div class="login"><a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a><a href="{{route('auth.register')}}" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>
                @endif
                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
                @if (auth::user())

            <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle"> <img src="{{ asset('assets/dist/img/'.auth::user()->photo)}} " alt="" width="20" class="rounded-circle"> {{ auth::user()->name}}</a>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="contact.html" class="nav-link">my account</a></li>
                      <li class="dropdown-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a></li>
                    </ul>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Top bar end-->
      <!-- Login Modal-->

      <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Customer Login</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <p class="ml-3 text-danger" id="23" ></p>
            <div class="modal-body">
            <form action="{{route('auth.login')}}" method="post">
                @csrf

                <div class="form-group">
                  <input id="email_modal" type="text" name="email" placeholder="email" class="form-control">
                </div>
                <div class="form-group">
                  <input id="password_modal" type="password" name="password" placeholder="password" class="form-control">
                </div>
                <p class="text-center">
                  <button class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                </p>
              </form>
              <p class="text-center text-muted">Not registered yet?</p>
            <p class="text-center text-muted"><a href="{{route('auth.register')}}"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
            </div>
          </div>
        </div>
      </div>
      @if ($message = Session::get('success'))
        <script>
                var data='{{Session::get('success')}}';
                $(window).on('load',function(){
                $('#login-modal').modal('show');
                });
                $('#23').html(data);
        </script>
     @endif

      <!-- Login modal end-->
      <!-- Navbar Start-->

      @include('homePage.layouts.navbar')
        @yield('content')
      <!-- GET IT-->

      <!-- FOOTER -->
     @include('homePage.layouts.footer')
    </div>
    <!-- Javascript files-->
    @yield('footer')
    <script src="{{ asset('assets/user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/user/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('assets/user/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/user/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('assets/user/vendor/waypoints/lib/jquery.waypoints.min.js')}}"> </script>
    <script src="{{ asset('assets/user/vendor/jquery.counterup/jquery.counterup.min.js')}}"> </script>
    <script src="{{ asset('assets/user/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/user/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{ asset('assets/user/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/user/vendor/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/front.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
  </body>
</html>
