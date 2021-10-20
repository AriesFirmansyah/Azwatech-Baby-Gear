<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <!--Icon Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" type="text/css" href="Template Semantic/semantic.min.css">
    

    <title>@yield('title')</title>
    @yield('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif&family=Ubuntu:wght@300&family=Varela+Round&display=swap%27');
        .logo {
            width: 80px;
            border-radius: 50%
        }
        body {
            font-family: 'Ubuntu', sans-serif;
        }
        a {
            color: aliceblue;
            font-weight: bold
        }
        .bg {
            background:rgba(0,0,0,0.9);
        }
        .btnAuth {
            background: #12c2e9;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #f64f59, #c471ed, #12c2e9);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }
        .btnAuth:hover {
            transform: scale(1.04);
            transition: 0.09s;
            background: #36D1DC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #5B86E5, #36D1DC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #5B86E5, #36D1DC); 
          
        }
        .btnCart {
            background: #36D1DC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #5B86E5, #36D1DC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #5B86E5, #36D1DC); 
            border: none;
            font-weight: bold;
        }
        .btnCart:hover {
            transform: scale(1.01);
            transition: 0.2s;
            background: #59C173;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #5D26C1, #a17fe0, #59C173);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #5D26C1, #a17fe0, #59C173); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        footer {
            position: static;
            bottom: 0;
            width: 100%
        }
    </style>
  </head>
  <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg">
            <div class="container">
                <img class="logo"  src="{{asset("storage/assets/logo.png")}}" alt="Pandawa">
                <a class="navbar-brand" href="/">Azwatech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 30px">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('products') ? 'active' : '' }}" href="/products">PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('about') ? 'active' : '' }}" href="/about">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('contact') ? 'active' : '' }}" href="/contact">CONTACT US</a>
                        </li>
                        
                        @guest
                        
                        @else
                            @if (auth()->user()->level == "admin")
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">MENU ADMIN</a>
                                </li>
                            @elseif (auth()->user()->level == "user")
                                <li class="nav-item">
                                    <a class="nav-link {{request()->is('carts') ? 'active' : '' }}" href="/carts">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16" style="{{request()->is('carts') ? 'color: white' : 'color: #8b8b8b;' }}">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        <span class="badge bg-danger">{{$jumlah}}</span>
                                        
                                        {{-- CARTS --}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->is('order') ? 'active' : '' }}" href="/order">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16" style="{{request()->is('order') ? 'color: white' : 'color: #8b8b8b;' }}">
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                                          </svg>
                                        {{-- <span class="badge bg-danger">{{$jumlah}}</span> --}}
                                        
                                        {{-- ORDER --}}
                                    </a>
                                </li>
                            @endif
                        @endguest
                       
                        
                        
                    </ul>
                    <div class="d-flex">
                        @guest
                            @if (Route::has('login'))
                                <a class="btn btnAuth" href="/Login" style="margin-right: 10px;">
                                    Log in
                                </a>
                            @endif
                            
                            @if (Route::has('register'))
                                <a href="/SignUp"><button class="btn btnAuth" type="submit">Register</button></a>
                            @endif
                        @else
                            <h5 style="color: aliceblue;text-transform:capitalize;margin-right:20px;margin-top:5px">
                                Hallo, {{ Auth::user()->firstname }}
                            </h5>
                           
                            <a  class="btn btnAuth" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="width: 10px">
                                    @csrf
                                </form>
                        @endguest
                    </div>
                </div>
            </div>
          </nav>
      </header>
    @yield('body')
    <footer class="bg" style="padding-left:20px;padding-right:20px;padding-bottom: 80px;">
        <div class="container-fluid" style="color: aliceblue">
          <div class="row">
            <div class="col-lg-3 col-md-6 footer" style="margin-top: 40px">
              <h2>Pandawa Info</h2>
              <p><a href="/about">About Pandawa</a></p>
              <p><a href="/contact">Contact</a></p>
            </div>
            <div class="col-lg-3 col-md-6 footer" style="margin-top: 40px">
              <h2>Location</h2>
              <p>Jl. Pandawa No.23, East Jurang Manggu, South Tangerang City, Banten</p>
            </div>
            <div class="col-lg-3 col-md-6 footer" style="margin-top: 40px">
              <h2>Contact</h2>
              <p>089656195418 (Phone)</p>
              <p>aries.firmansyah@student.umn.ac.id (Email)</p>
              <p>089656195418 (Whatsapp)</p>
            </div>
          </div>
        </div>
      </footer>
      
      <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
      <script src="semantic.min.js"></script>
    <script>
        setTimeout(function(){ 
            $("#status").fadeOut(3000); 
        }, 3000);
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
  </body>
</html>