<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/land3/css/bootstrap.rtl.css" type="text/css" rel="stylesheet">
    <link href="/land3/css/customize.css" type="text/css" rel="stylesheet">
    <link href="/land3/fonts/fonts.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/land3/css/odometer-theme-car.css" />
    <title>
      سرمایه گذاری به سبک آلفا
    </title>
    <style>
        .odometer {
            font-size: 25px;
        }
    </style>
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

<body data-anm=".anm">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLKDGMH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
   
    <section class="bg">
        <div class="container">
            <div class="row justify-content-center">
              
                <div class="col-md-6 mt-md-5 ">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="col-md-10 offset-md-1 mt-4">
                        <img src="/land3/img/s2.png" width="100%" alt="shape">
                    </div>
                
                </div>
                <div class="col-md-6 margindec" >
                    {{-- <div class="shape8 rotateme">
                        <img src="/land3/img/png/s1.png" alt="shape ">
                    </div>
                    <div class="shape2 rotateme ">
                        <img src="/land3/img/png/s2.png" alt="shape ">
                    </div> --}}

                    {{-- <img src="/land3/img/png/cercle-shape.png " class="bg-image rotateme " alt="shape "> --}}
                    <div class="col-md-10 offset-md-1">
                        <div class="animate_banner pt-3 pb-3">
                            <div class="core ">
                                <img src="/land3/img/s1.png " class="wow fadeInUp anm " data-wow-delay="0.6s "
                                    alt="main-pic "
                                    style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp; width: 100%; "
                                    data-speed-x="0 " data-speed-y="0
								" data-speed-scale="0 " data-speed-rotate="10 " id="layer_1 ">
                             
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1 mt-4">
                        <img src="/land3/img/s3.png" width="100%" alt="shape">
                        </div>
                    </div>
                  
                    <div class="col-md-12 mt-3">
                        <div class="col-md-12">
 <p class="kalameh-2 mt-3">
                     لطفا کد ارسال شده رو اینجا وارد نمایید
                       </p>
                            <form method="POST" action="{{route('token.usercamp.post')}}" style="position: relative;">
                                @csrf
                                <input type="number" class="form-control inputs " name="code" placeholder=" درج کد ارسال شده">
                                <button type="submit" class="button" id="button-addon1 ">
                                   تایید کد
                                </button>
                            </form>
                        </div>


                    </div>

                </div>
              

            </div>
        </div>
    </section>
                <script src="/land3/js/jquery.min.js ">
                </script>
                <script src="/land3/js/anm.min.js ">
                </script>
                <script src="/admins/assets/vendors/js/extensions/sweetalert2.min.js"></script>
                @include('sweet::alert')
</body>

</html>