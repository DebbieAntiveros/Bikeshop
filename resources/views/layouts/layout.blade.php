<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kexy's Bikeshop </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <link href="/css/datepicker.css" rel="stylesheet" type="text/css">
        <script src="/js/datepicker.js"></script>
        <script src="/js/datepicker.en.js"></script>
        
    </head>
    <body>
    @yield('content')
    <footer>
            Copyright 2020 Kexy's Bike Shop
    </footer>
    <script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        $(document).ready( function () {
            $('#data-table').DataTable();
            $('#my-element').datepicker([options])
        } );

        

        
    </script>

    @yield('scripts')
    </body>
    
    </html>