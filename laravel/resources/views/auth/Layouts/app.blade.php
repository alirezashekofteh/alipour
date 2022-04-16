<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/logins/css/bootstrap-rtl.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/logins/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="/logins/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/logins/style.css">
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
</head>
<body>
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLKDGMH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @yield('content')

<script src="/logins/js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="/logins/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/logins/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="/logins/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="/logins/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="/logins/js/main.js"></script>
    <script src="/logins/js/otp-timer.js"></script>
    <script src="/admins/assets/vendors/js/extensions/sweetalert2.min.js"></script>
    <script src="/admins/assets/vendors/js/extensions/sweetalert2.min.js"></script>
    @yield('js-page')
    @include('sweet::alert')
</body>

</html>
