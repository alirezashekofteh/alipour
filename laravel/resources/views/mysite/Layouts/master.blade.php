<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="fa" />
    <meta name="document-type" content="Public" />
    <meta name="document-rating" content="General" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Shamim Ofoghata" />

    <link href="/Css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Css/bootstrap-rtl.min.css" rel="stylesheet" />
    <link href="/Css/animate.css" rel="stylesheet" />
    <link href="/Css/Style.css" rel="stylesheet" />
    <link href="/Css/owl-carousel/owl.carousel.min.css" rel="stylesheet" />
    <link href="/Css/sina-nav.min.css" rel="stylesheet" />
</head>
<body id="home">
@include('Front.Layouts.header')
@yield('content')
@include('Front.Layouts.Footer')
<script src="/Js/jquery-2.0.0.min.js"></script>
<script src="/Js/bootstrap.min.js"></script>
<script src="/Js/owl.carousel.js"></script>
<script src="/Js/custom.js"></script>
<script src="/Js/sina-nav.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
@yield('js-page')

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</body>
</html>
