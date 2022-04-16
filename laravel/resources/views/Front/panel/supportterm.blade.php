@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<div class="container">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('Front.panel.layouts.sidebar')
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="table-orders">
                                    <div class="alert alert-success">صفحه پشتیبانی دوره {{$term->title}}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
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
  data: {'goftino': '1','order_id':order},
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
  data: {'goftino': user_id,'order_id':order},
  success: function(data){
  alert(data.success);
  }
  
  });
  Goftino.setUserId('<?= $order->goftino ?>');
    });
  
</script>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection