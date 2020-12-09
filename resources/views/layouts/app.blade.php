<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Inventory Management System </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/css/datepicker.css" rel="stylesheet" type="text/css">
    <script src="/js/datepicker.js"></script>

    <!--Icons -->
    <link rel = "icon" href="https://www.flaticon.com/svg/static/icons/svg/3456/3456373.svg" type = "image/x-icon"> 

<style>
.dataTables_filter{
  margin-top: 20px;
}
table {
  text-align: left;
  position: relative;
  border-collapse: collapse; 
}
th, td {
  padding: 0.25rem;
}
th {
  position: sticky;
  top: 0; /* Don't forget this, required for the stickiness */
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}
.dataTable_length{
  margin-bottom: 100px;
  justify-content: center;
}
.dataTables_paginate{
    margin-bottom: 50px;
}
html,body {
	margin:0;
    background-color: #f1f2f6;
    color:black;
}
#btn{
  transition-duration: 0.4s;
}

#btn:hover {
  background-color: gray;
  color: white;
}

</style>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="bakcground-color: transparent;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                Home
                </a>
                <a class="navbar-brand" href="{{ url('/items') }}">
                Product
                </a>
                <a class="navbar-brand" href="{{ url('/inventories') }}">
                Inventory
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
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
        <main class="py-4">
        
    @include('sweetalert::alert')
            @yield('content')
        </main>
    </div>
    <footer>
             Copyright 2020 Kexy's Bike Shop
    </footer>
    <script src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"> </script>
    <script src="/js/datepicker.en.js"></script>    
    <script>
    $(document).ready( function () {
        $.noConflict();
        
        $('#data-table').DataTable({
        ordering: false,
        lenghtMenu: [[5,10,25,50,1],[5,10,25,50,"All"]],
        pagingType: 'full_numbers'
    });
    } );
    
    </script>
     @yield('scripts')

</body>
</html>
