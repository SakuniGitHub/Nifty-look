<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Nifty Look</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/fav.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{ url('admin/dashboard') }}" class="logo">
                    <img src="{{ asset('assets/img/logo2.png') }}" alt="">
                </a>
                <a href="{{ url('admin/dashboard') }}" class="logo-small">
                    <img src="{{ asset('assets/img/logo-small.png') }}" alt="">
                </a>

                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="{{ asset('assets/img/icons/search.svg') }}"
                                    alt="img"></a>
                        </form>
                    </div>
                </li>



                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ asset('assets/img/profiles/avator1.jpg') }}"
                                alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="{{ asset('assets/img/profiles/avator1.jpg') }}"
                                        alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">

                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href=""> <i class="me-2" data-feather="user"></i> My
                                Profile</a>
                            <a class="dropdown-item" href=""><i class="me-2"
                                    data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST') <!-- Include method for POST request -->
                                <button type="submit" class="dropdown-item logout pb-0">
                                    <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2"
                                        alt="img">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>



            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <form action="{{ route('logout') }}" method="POST" style="height: 40px; display: flex; justify-content: center; align-items: center;">
                        @csrf
                        @method('POST') <!-- Include method for POST request -->
                        <button type="submit" class="dropdown-item" style="padding: 0 10px;">
                            Logout
                        </button>
                    </form>

                </div>
            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="">
                            <a href="{{ url('/admin/dashboard') }}">
                                <img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img">
                                <span> Dashboard</span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <img src="{{ asset('assets/img/icons/product.svg') }}" alt="img">
                                <span> Product</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <!-- Use route or url helpers properly -->
                                <li>
                                    <a href="{{ url('admin/add_products') }}"
                                        class="{{ request()->is('admin/add_products') ? 'active' : '' }}">
                                        Product Add
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/all-products') }}"
                                        class="{{ request()->is('admin/all-products') ? 'active' : '' }}">
                                        Product List
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <img src="{{ asset('assets/img/icons/product.svg') }}" alt="img">
                                <span> Suppliers</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <!-- Use route or url helpers properly -->
                                <li>
                                    <a href="{{ url('admin/suppliers/add') }}"
                                        class="{{ request()->is('admin/suppliers/add') ? 'active' : '' }}">
                                        Supplier Add
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/all-suppliers') }}"
                                        class="{{ request()->is('admin/all-suppliers') ? 'active' : '' }}">
                                        Supplier List
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <img src="{{ asset('assets/img/icons/product.svg') }}" alt="img">
                                <span> Discounts</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <!-- Use route or url helpers properly -->
                                <li>
                                    <a href="{{ url('admin/seasonal-discounts/add') }}"
                                        class="{{ request()->is('admin/seasonal-discounts/add') ? 'active' : '' }}">
                                        Seasonal Offers
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
