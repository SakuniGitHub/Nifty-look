<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/fav.png" type="image/png" />
    <title>Nifty look</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="vendors/linericon/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
    <header class="header_area">
        <div class="top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="float-left">
                            <p>Phone: +94 11 999 990</p>
                            <p>email: info@niftylook.com</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="float-right">
                            <ul class="right_side">
                                <li>
                                    <a href="">
                                        gift card
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        track order
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <a class="navbar-brand logo_h" href="{{ route('welcome') }}">
                        <img src="img/logo2.png" alt="" style="width:80%; height:80%;" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                        <div class="row w-100 mr-0">
                            <div class="col-lg-7 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li class="nav-item {{ Request::routeIs('welcome') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                                    </li>
                                    <li class="nav-item {{ Request::routeIs('products.index') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('products.index') }}">products</a>
                                    </li>
                                    <li class="nav-item {{ Request::routeIs('rentals.index') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('rentals.index') }}">rentals</a>
                                    </li>
                                    <li class="nav-item {{ Request::routeIs('contact') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                    <li class="nav-item {{ Request::routeIs('about') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('about') }}">About us</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-5 pr-0">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="ti-search" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        @guest
                                            <a href="{{ route('login') }}" class="icons">
                                                <i class="ti-user" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('profile.show') }}" class="icons">
                                                <i class="ti-user" aria-hidden="true"></i>
                                            </a>
                                        @endguest
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cart.show') }}" class="icons">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('wishlist') }}" class="icons">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        @guest
                                            <a href="{{ route('login') }}" class="icons">
                                                <i class="ti-lock" aria-hidden="true"></i> Log in
                                            </a>
                                        @else
                                            <!-- Display logout icon when the user is logged in -->
                                            <a href="#" class="icons"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="ti-power-off" aria-hidden="true"></i> Log out
                                            </a>
                                            <!-- Hidden logout form -->
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        @endguest
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
