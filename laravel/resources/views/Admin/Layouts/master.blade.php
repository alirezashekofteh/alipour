<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="/admins/assets/images/ico/favicon.ico">
	<meta name="theme-color" content="#5A8DEE">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/admins/assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/admins/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/admins/assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/admins/assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/admins/assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/admins/assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/admins/assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admins/assets/css/core/menu/menu-types/horizontal-menu.css">
    <!-- END: Page CSS-->
    @yield('css-page')
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu dark-layout navbar-sticky 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

    <!-- BEGIN: Header-->
    @include('Admin.Layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('Admin.Layouts.sidebar')
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('Admin.Layouts.footer')
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="/admins/assets/vendors/js/vendors.min.js"></script>
    <script src="/admins/assets/fonts/liviconsevo/js/liviconsevo.tools.min.js"></script>
    <script src="/admins/assets/fonts/liviconsevo/js/liviconsevo.defaults.js"></script>
    <script src="/admins/assets/fonts/liviconsevo/js/liviconsevo.min.js"></script>
    <script src="/admins/assets/vendors/js/extensions/sweetalert2.min.js"></script>

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/admins/assets/vendors/js/ui/jquery.sticky.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/admins/assets/js/scripts/configs/horizontal-menu.js"></script>
    <script src="/admins/assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="/admins/assets/js/core/app-menu.js"></script>
    <script src="/admins/assets/js/core/app.js"></script>
    <script src="/admins/assets/js/scripts/components.js"></script>
    <script src="/admins/assets/js/scripts/footer.js"></script>
    <script src="/admins/assets/js/scripts/customizer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->

    @yield('js-page')
 @include('sweetalert::alert')

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
