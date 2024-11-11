<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>خدمات جنزور</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />

    @yield('css')

</head>

<body class="rtl">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo me-5" href="/"><img src="{{asset('admin/images/logo.png')}}" class="me-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('admin/images/logo.png')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="ti-layout-grid2"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset('admin/images/faces/face28.jpg')}}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                تغيير كلمة المرور
                            </a>
                            <form action="{{route('admin.logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="ti-power-off text-primary"></i>
                                    تسجيل الخروج
                                </button>
                            </form>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="ti-layout-grid2"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item {{ Request::route()->getName() == 'dash' ? 'active' : '' }}">
                        <a class="nav-link " href="{{route('dash')}}">
                            <i class="ti-home menu-icon"></i>
                            <span class="menu-title">لوحة التحكم</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::route()->getName() == 'treatmentCenters' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('treatmentCenters') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title">مراكز العلاج</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::route()->getName() == 'section' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('section') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title"> الاقسام</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::route()->getName() == 'doctors' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('doctors') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title"> الدكاترة</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::route()->getName() == 'specialties' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('specialties') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title"> التخصصات</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (Request::route()->getName() == 'patients' || Request::route()->getName() == 'patients_profile') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('patients') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title"> المرضي</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::route()->getName() == 'patients' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('patients') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title"> الادوية</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::route()->getName() == 'users' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('users') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title"> المستخدمين</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::route()->getName() == 'statstic' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('statistic') }}">
                            <i class="ti-settings menu-icon"></i>
                            <span class="menu-title"> الاحصائيات</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('content')


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>
    <script src="{{asset('admin/js/settings.js')}}"></script>
    <script src="{{asset('admin/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->

    @yield('js')
</body>

</html>