<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend_asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontend_asset/css/shop-homepage.css')}}" rel="stylesheet">

  <style type="text/css">
    .bg-main{
      background-color: #b27832 !important;
    }
  </style>

  {{-- owl carousel --}}
  <link rel="stylesheet" href="{{ asset('frontend_asset/owlcarousel/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend_asset/owlcarousel/dist/assets/owl.theme.default.min.css')}}">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-main fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Furniture Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('mainpage')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('cartpage')}}">Cart</a>
          </li>
          @guest
              <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  @yield('content')
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-main">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend_asset/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend_asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('frontend_asset/owlcarousel/dist/owl.carousel.min.js')}}"></script>
  @yield('script')
</body>

</html>
