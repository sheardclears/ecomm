<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link href="/assets-old/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('slider/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('slider/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('slider/css/animate.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('slider/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('slider/css/style.css') }}">

    <title>Pharmease</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">      
          <div class="navbar-brand" style="justify-content: center">
            <img src="{{ asset('template/dist/img/pharmease.png') }}" alt="Logo" width="120">
          </div>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item float-sm-left">
              <a class="nav-link" href="{{ route('category') }}">{{ __('Category') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="/vieworder">My Order</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                  
                </ul>
              </li>    
            @endguest  
        </div>
      </nav>

      @yield('ecom') {{-- Sebagai pemanggil header dan footer, sehingga tidak perlu menuliskan kedua bagian tersebut berulang kali --}}
</div>
<footer class="footer-sm-space mt-5">
  <div class="main-footer">
      <div class="container">
          <div class="row gy-4">
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="footer-contact">
                      <div class="brand-logo">
                          <a href="index.htm" class="footer-logo float-start">
                              <img src="{{ asset('template/dist/img/logopm.png') }}" class="f-logo img-fluid blur-up lazyload"
                                  alt="logo">
                          </a>
                      </div>
                      <ul class="contact-lists" style="clear:both;">
                          <li>
                              <span><b>No. Telp:</b> <span class="font-light"> +1 0000000000</span></span>
                          </li>
                          <li>
                              <span><b>Alamat:</b><span class="font-light">Surabaya, Jawa Timur</span></span>
                          </li>
                          <li>
                              <span><b>Email:</b><span class="font-light"> contact@pharmease.org</span></span>
                          </li>
                      </ul>
                  </div>
              </div>
</footer>
    <script src="{{ asset('slider/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('slider/js/popper.min.js') }}"></script>
    <script src="{{ asset('slider/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('slider/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('slider/js/custom.js') }}"></script>
    <script src="{{ asset('slider/js/main.js') }}"></script>
          <!-- Sweetalert JS -->
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  </body>
  <script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:5
        },
        1000:{
            items:5
        }
    }
})
  </script>
</html>