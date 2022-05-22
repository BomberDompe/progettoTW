<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Progetto TWeb">
        <meta name="author" content="Gruppo 24">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

        <title>ApartaRent - @yield('title', 'Home')</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

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
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="footer-heading">
                                <h2>About Us</h2>
                            </div>
                            <p>Host Cloud is provided by TemplateMo for free of charge. Anyone can download and use this CSS Bootstrap template for commercial purposes.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="footer-heading">
                                <h2>Hosting Plans</h2>
                            </div>
                            <ul class="footer-list">
                                <li><a href="#">Basic Cloud 5X</a></li>
                                <li><a href="#">Cloud VPS 10X</a></li>
                                <li><a href="#">Advanced Cloud</a></li>
                                <li><a href="#">Custom Designs</a></li>
                                <li><a href="#">Special Solutions</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="footer-heading">
                                <h2>Useful Links</h2>
                            </div>
                            <ul class="footer-list">
                                <li><a href="#">Cloud Hosting Platform</a></li>
                                <li><a href="#">Light Speed Zone</a></li>
                                <li><a href="#">Content Delivery Network</a></li>
                                <li><a href="#">Customer Support</a></li>
                                <li><a href="#">Latest News</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="footer-heading">
                                <h2>More Information</h2>
                            </div>
                            <ul class="footer-list">
                                <li>Phone: <a href="#">010-020-0560</a></li>
                                <li>Email: <a href="#">mail@company.com</a></li>
                                <li>Support: <a href="#">support@company.com</a></li>
                                <li>Website: <a href="#">www.company.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="sub-footer">
                            <p>Copyright &copy; 2020 Cloud Hosting Company
                                - Designed by <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Ends Here -->
        
        <!-- PopUp Start -->    
        <div id="popuplog" class="overlayppu">
            <div class="popup">
                <h2>Here i am</h2>
                <a class="close" href="">&times;</a>
                <div class="contentpu">
                  @include('auth/login')
                </div>
            </div>
        </div>
        
        <div id="popupreg" class="overlayppu">
            <div class="popup">
                <h2>Here i am</h2>
                <a class="close" href="">&times;</a>
                <div class="contentpu">
                 @include('auth/register') 
                </div>
            </div>
        </div>
        <!-- PopUp End -->

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>





    </body>
</html>