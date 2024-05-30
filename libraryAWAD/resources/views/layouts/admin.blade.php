<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kamunting Library</title>

    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png"/>
    <link rel="stylesheet" href="../assets/css/styles.min.css"/>

    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
{{--                <a href="{{route('home')}}" class="text-nowrap logo-img">--}}
{{--                    <img src="../assets/images/logos/dark-logo.svg" width="180" alt=""/>--}}
{{--                </a>--}}
                <h4><a class="text-nowrap nav-item" href="{{route('home')}}">Kamunting Library</a></h4>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    @auth
                    @if(isset(\Illuminate\Support\Facades\Auth::user()->role))
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Supervisor')

                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">SUPERVISOR</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{route('user.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                                    <span class="hide-menu">Volunteer</span>
                                </a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">ACTIONS</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('book.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                            <span class="hide-menu">Books</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('member.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                            <span class="hide-menu">Membership</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('record.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                            <span class="hide-menu">Borrowing Record</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('search.keyword')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-search"></i>
                </span>
                            <span class="hide-menu">Search</span>
                        </a>
                    </li>
                    @endauth
                    @guest
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        @if (Route::has('login'))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                                    <span>
                                         <i class="ti ti-login"></i>
                                    </span>
                                    <span class="hide-menu">{{ __('Login') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('register') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                    <span class="hide-menu">{{ __('Register') }}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">USER</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('user.profile')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">{{ __('Logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </a>

                        </li>
                    @endguest
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
                @auth
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        <a href="{{route('record.create')}}"
                           class="btn btn-primary">Add New Borrowing Record</a>
                    </ul>
                </div>
                @endauth
            </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
            @yield('content')

            <div class="invisible py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by
                    <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">
                        AdminMart.com
                    </a>
                    Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
            </div>
        </div>
    </div>
</div>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>
</body>

</html>
