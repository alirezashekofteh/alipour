<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    <!---start GOFTINO code--->

<!---end GOFTINO code--->
</head>
{{-- <body id="home" onload="window.scrollTo(0,document.body.scrollHeight);"> --}}
  <body id="home" >
    @include('Front.Layouts.header')
<style>
html {
  scroll-behavior: smooth;
}
    .chatbox {
      border: 2px solid #dedede;
      background-color: #f1f1f1;
      border-radius: 5px;
      padding: 10px;
      margin: 10px 0;
    }

    .darker {
      border-color: #ccc;
      background-color: #ddd;
    }

    .chatbox::after {
      content: "";
      clear: both;
      display: table;
    }



    .chatbox img.right {
      float: right;
      margin-left: 20px;
      margin-right:0;
    }

    .time-right {
      float: right;
      color: #aaa;
    }

    .time-left {
      float: left;
      color: #999;
      direction: ltr;
    }
    .pin
    {
      box-shadow: 0 0 10px;
    }
    </style>
<div class="nav-categories-overlay"></div>
<div class="container-main">
    <div class="col-md-12 fixed-top pr-3 pt-3 pb-3 pin" style="background-color: #fff;z-index: 500;">
        @if (!empty($pins))
        <a href="#content{{$pins->id}}"><img src="/images/icon/011-label.png" width="32px" alt="" class="ml-2 mr-4"> {{$pins->name}}</a>
        @endif
    </div>
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block chat">
                    <div class="col-lg-6 col-md-6 col-xs-12 offset-md-3 pl">
                        <div class="p-5">
                            <div class="profile-stats">
                                <input id="myInput" type="text" name="keyword" class="form-control" placeholder="کلمه مورد نظر جهت جستجو را وارد نمایید">
                                <div class="row" id="myTable">
                                    @foreach ($contents as $item)
                                    <div class="col-lg-12 col-md-12 col-xs-12  pr chatbox" id="content{{$item->id}}">
                                      @if ($item->parent!=0)
                                      <div class="col-lg-12 p-3 mt-3" style="
                                      border-right: 2px solid #2cb278;
                                      margin-right: 30px;
                                  ">
                                            <a href="#content{{$item->parent}}"><img src="/images/icon/052-reply.png" width="48px" alt="" class="ml-2">{{$item->parents->name}}</a>
                                          </div>
                                      @endif
                                        <h5 class="mt-3">{{$item->name}}</h5>
                                       @if ($item->type=='video')
                                       <video width="100%" height="auto" controls>
                                        <source src="{{$item->file}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                       @endif
                                       @if ($item->type=='audio')
                                       <audio controls width="100%" height="auto">
                                        <source src="horse.ogg" type="audio/ogg">
                                        <source src="{{$item->file}}" type="audio/mpeg">
                                      Your browser does not support the audio element.
                                      </audio>
                                       @endif
                                       @if ($item->type=='image')
                                        <img src="{{$item->file}}" style="width: 100%" alt="{{$item->file}}">
                                       @endif

                                        <p class="mr-4">{!!$item->content!!}</p>

                                        @if ($item->type=='file')
                                       <a href="{{$item->file}}" class="btn btn-sm btn-success">دانلود</a>
                                      @endif
                                        <span class="time-left">{{jdate($item->created_at)}}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>

</body>
<!-- file js---------------------------------------------------->
<script src="/assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.es6.js" integrity="sha512-4PUcRoBmsfaiXPoigt+rm4mfuXpvvwfC7dFIhHkwVQGECJzaFDMR8HGTxNDLkwC4DlJq3/EYHL77YXFr34Jmog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/js/vendor/bootstrap.js"></script>
<!-- plugin----------------------------------------------------->
<script src="/assets/js/vendor/owl.carousel.min.js"></script>
<script src="/assets/js/vendor/jquery.countdown.js"></script>
<script src="/assets/js/vendor/jquery.nice-select.min.js"></script>
<script src="/admins/assets/vendors/js/extensions/sweetalert2.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="/assets/js/main.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val();
    $("#myTable div").filter(function() {
      $(this).toggle($(this).text().indexOf(value) > -1)
    });
  });
});
$(function() {

  var mark = function() {

    // Read the keyword
    var keyword = $("input[name='keyword']").val();

    // Determine selected options
    var options = {};
    $("input[name='opt[]']").each(function() {
      options[$(this).val()] = $(this).is(":checked");
    });

    // Remove previous marked elements and mark
    // the new keyword inside the context
    $(".profile-stats").unmark({
      done: function() {
        $(".profile-stats").mark(keyword, options);
      }
    });
  };

  $("input[name='keyword']").on("input", mark);

});

</script>
@if ($channel->id==7)
<script type="text/javascript">
  !function(){var i="bRMv9d",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<script>
  var goftinoid = '<?= $mem->pivot->goftino ?>';

    if(goftinoid=='')
    {
     window.addEventListener('goftino_ready', function () {
      var order= '<?=  $mem->pivot->id ?>';
      $.ajax({
type: "GET",
dataType: "json",
url: '/panel/savegoftino',
data: {'goftino': '1','order_id':order,'type':'channel'},
success: function(data){
alert(data.success);
}
});
      Goftino.unsetUserId();  
      });
    }
    
  window.addEventListener('goftino_ready', function (p) {
      // function or event
Goftino.setUser({
 email: '<?= $_SERVER['SERVER_NAME'] ?>',
 name: '<?= auth()->user()->nf ."-". $channel->name  ?>',
 about: '<?= $channel->name ?>',
 phone: '<?= auth()->user()->mobile ?>',
 avatar: 'https://twsms.ir/assets/images/user/683efc47fc1565242d80b6a4d7e4bdcb.png',
 forceUpdate : true
});
var order= '<?= $mem->pivot->id ?>'
var user_id = Goftino.getUserId();
$.ajax({
type: "GET",
dataType: "json",
url: '/panel/savegoftino',
data: {'goftino': user_id,'order_id':order,'type':'channel'},
success: function(data){
alert(data.success);
}

});
Goftino.setUserId('<?= $mem->pivot->goftino ?>');
  });

</script>
@endif

</html>
