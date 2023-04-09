<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href=" {{asset('assets/css/fontawesome.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href=" {{asset('assets/css/fontawesome.css')}}">
<link rel="stylesheet" href=" {{asset('assets/css/templatemo-sixteen.css')}}">
<link rel="stylesheet" href=" {{asset('assets/css/owl.css')}}">


<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/"><h2>EGY <em>STORE</em> <i class="fas fa-store"></i></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{url('men')}}">Men</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('women')}}">Women</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('kids')}}">Kids</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{url('our_product')}}">shose</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{url('about')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contact')}}">Contact Us</a>
            </li>

            <li class="nav-item ">
            @if (Route::has('login'))
                  @auth

                  <li  class="nav-item">
                    <a class="nav-link" href="{{url('showcart')}}">

                      <i class="fas fa-shopping-cart"></i>
                      <em style="color: rgb(4, 196, 116)">{{$count}}</em></a>
                  </li>

                    <x-app-layout>
                    </x-app-layout>
                    
                  


                  @else
                  <li> <a class="nav-link" href="{{ route('login') }}">Log in</a></li>

                      @if (Route::has('register'))
                      <li> <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                      @endif
                  @endauth
              </div>
          @endif
            </li>

          </ul>
        </div>
      </div>
    </nav>
    @if(session()->has('message'))
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">x</button>
{{session()->get('message')}}
</div>
@endif
  </header>

    