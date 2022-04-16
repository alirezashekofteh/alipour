<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! SEO::generate() !!}
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/nice-select.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-186730058-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-186730058-2');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WLKDGMH');
    </script>
    <!-- End Google Tag Manager -->
    @yield('css-page')
</head>

<body id="home">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLKDGMH" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('Front.Layouts.header')
    @yield('content')
    @include('Front.Layouts.Footer')
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- scroll_Progress------------------------->

</body>
<!-- file js---------------------------------------------------->
<script src="/assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/assets/js/vendor/bootstrap.js"></script>
<!-- plugin----------------------------------------------------->
<script src="/assets/js/vendor/owl.carousel.min.js"></script>
<script src="/assets/js/vendor/jquery.countdown.js"></script>
<script src="/assets/js/vendor/jquery.nice-select.min.js"></script>
<script src="/admins/assets/vendors/js/extensions/sweetalert2.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="/assets/js/main.js"></script>
<script src="/logins/js/otp-timer.js"></script>

</html>
@yield('js-page')
@include('sweetalert::alert')


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</body>
</html>