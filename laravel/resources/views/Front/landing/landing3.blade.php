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
                    <div class="col-md-10 offset-md-1 mt-3">
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
                        <div class="col-md-10 offset-md-1 mt-1">
                        <img src="/land3/img/s3.png" width="100%" alt="shape">
                        </div>
                    </div>
                  
                    <div class="col-md-12 mt-1">
                        <div class="col-md-12">

                            <form method="POST" action="{{route('save.usercamp')}}" style="position: relative;">
                                @csrf
                                <input type="number" class="form-control inputs " name="mobile"
                                    placeholder="جهت دریافت هدیه تلفن همراه خود را وارد نمایید">
                                <button type="submit" class="button" id="button-addon1 ">
                                   دریافت هدیه
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
                <script src="/land3/js/customfe81.js?v=9874514 ">
                </script>   
                 <script src="/land3/js/jquery/preview.js"></script>
                 <script src="/land3/js/jquery.royal-timer.js"></script>
               
                <script src="/admins/assets/vendors/js/extensions/sweetalert2.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        royalCountdown = new RoyalCountdown(); 		//Add countdown as object
                        
                        //Holder
                        royalCountdown.container = ".royaltimer-container",
            
                        //Timezone
                        royalCountdown.timeZone = 4.5,					//Time zone of New York
                    
                        //Date & time to countdown
                        royalCountdown.year = 2022,
                        royalCountdown.month = 03,
                        royalCountdown.day = 07,
                        royalCountdown.hour = 00,
                        royalCountdown.minute = 00,
                        royalCountdown.second = 0,
                        
                        royalCountdown.flipCount = 7, 					//Number of flip-elements(from 1 to 9)
                        royalCountdown.animationTime = 950, 			//Time of flip animation in milliseconds(from 50 to 950)
                        royalCountdown.bgColor = "#f07000", 			//Flip-element back color
                        royalCountdown.digitColor = "#fff", 			//Digits color on flip-elements
                        royalCountdown.textColor = "#666", 				//Text color under flip elements(seconds, minutes and etc.)
                        
                        royalCountdown.Start(); 						//Start countdown
                    });
                </script>
                @include('sweet::alert')
</body>

</html>