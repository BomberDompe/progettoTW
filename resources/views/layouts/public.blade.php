<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Progetto TWeb">
        <meta name="author" content="Gruppo 24">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

        <title>ApartaRent - @yield('title', 'Home')</title>

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

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
            <div class="container">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
        </footer>
        <!-- Footer Ends Here -->
        
        <!-- PopUp Start -->    
        <div id="popuplog" class="overlayppu">
            <div class="popup">
                <h2>Here i am</h2>
                <a class="close" href="#">&times;</a>
                <div class="contentpu">
                  @include('auth/login')
                </div>
            </div>
        </div>
        
        <div id="popupreg" class="overlayppu">
            <div class="popup">
                <h2>Here i am</h2>
                <a class="close" href="#">&times;</a>
                <div class="contentpu">
                 @include('auth/register') 
                </div>
            </div>
        </div>
        <!-- PopUp End -->


    </body>
</html>
