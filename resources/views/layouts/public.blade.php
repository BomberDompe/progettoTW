
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Progetto TWeb">
        <meta name="author" content="Gruppo 24">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

        <title>ApartaRent - @yield('title', 'Home')</title>
        
        <!-- Icona -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

         <!-- Include file JavaScript -->
        @stack('custom-scripts')

    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    @include('layouts/_navpublic')
                </div>
            </nav>
        </header>
        <!-- end #header/menù --> 

        <!--Start content-->

        <div class ="content">
            @yield('content')
        </div>

        <!-- Footer Starts Here -->
        <footer>
            <div class="container" style="height: 40px;">
                <h2 style="color: white;">ApartaRent </h2>
                <h4 style="color: whitesmoke;position: relative;left: 350px;font-size: small;font-style: oblique;font-family: cursive;">l'appartamento giusto per voi</h4>
            </div>
            <div class="container" style="border-top: outset;">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
        </footer>
        <!-- Footer Ends Here -->

    </body>
</html>
