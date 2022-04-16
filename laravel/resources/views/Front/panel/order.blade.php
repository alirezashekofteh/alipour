@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<div class="container">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">

                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="alert alert-info">{{$term->title}}</div>
                    
                            <div class="profile-stats">
                                <ul class="accordion">
                                    @foreach ($termcat as $item)
                                    <li class="first">
                                        <span class="termcat"><i class="fa fa-laptop text-dark ml-1"></i>{{$item->name}}</span>
                                        <p>

                                            @foreach ($item->videos()->orderBy('part','ASC')->get() as $video)

                                            <a href="{{route('panel.course.video',[$video->term->slug,$video->part])}}" class="d-block second text-black"><span class="count badge-success ml-3 font-medium-1">{{$video->part}}</span><span class="">{{$video->title}}</span></a>
                                            @endforeach

                                        </p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- @else
تایید قوانین
<form action="{{route('panel.orderghavanin',$order)}}" method="POST">
@csrf
<div class="form-auth-row">
    <label for="#" class="ui-checkbox mt-1">
        <input type="checkbox" value="1" name="ghavanin" value="1" id="remember">
        <span class="ui-checkbox-check"></span>
    </label>
    <label for="remember" class="remember-me mr-0"><a href="#">حریم خصوصی</a> و <a href="#">شرایط قوانین </a>استفاده از دوره های سایت رضا درخشی را مطالعه نموده و با کلیه موارد آن موافقم.</label>
</div>
<div class="form-row-account">
    <button class="btn btn-primary btn-register" type="submit">تایید</button>
</div>
</form>
                            @endif --}}
                            
                        </div>
                    </div>
                    @include('Front.panel.layouts.sidebar')
                </div>
            </div>
        </section>
    </div>
</div>
@if ($order->expire_support > now() and $order->term->sup_day>0)
<script type="text/javascript">
    !function(){var i="bRMv9d",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<script>
    var goftinoid = '<?= $order->goftino ?>';
 
      if(goftinoid=='')
      {
       window.addEventListener('goftino_ready', function () {
        var order= '<?= $order->id ?>';
        $.ajax({
  type: "GET",
  dataType: "json",
  url: '/panel/savegoftino',
  data: {'goftino': '1','order_id':order,'type':'order'},
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
   name: '<?= auth()->user()->nf ."-". $term->title  ?>',
   about: '<?= $term->title ?>',
   phone: '<?= auth()->user()->mobile ?>',
   avatar: 'https://twsms.ir/assets/images/user/683efc47fc1565242d80b6a4d7e4bdcb.png',
   forceUpdate : true
  });
  var order= '<?= $order->id ?>'
  var user_id = Goftino.getUserId();
  $.ajax({
  type: "GET",
  dataType: "json",
  url: '/panel/savegoftino',
  data: {'goftino': user_id,'order_id':order,'type':'order'},
  success: function(data){
  alert(data.success);
  }
  
  });
  Goftino.setUserId('<?= $order->goftino ?>');
    });
  
</script>
@endif
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection
@section('js-page')
<script type="text/javascript">

(function($) {
   $('.accordion span.termcat').click(function(j) {
    var dropDown = $(this).closest('li').find('p');

    $(this).closest('.accordion').find('p').not(dropDown).slideUp();

    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).closest('.accordion').find('span.active').removeClass('active');
        $(this).addClass('active');
    }

    dropDown.stop(false, true).slideToggle();

    j.preventDefault();
});
})(jQuery);
</script>
@endsection
