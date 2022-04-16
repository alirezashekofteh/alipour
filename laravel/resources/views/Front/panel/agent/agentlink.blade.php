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
                                    <div class="alert alert-success">لینک بازاریابی دوره ها</div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">نام دوره</th>
                                                    <th scope="col">مبلغ</th>

                                                    <th scope="col">جزئیات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($terms as $term)
                                                <tr>
                                                    <td class="order-code">{{$term->title}}</td>
                                                    <td class="totla">
                                                        <span class="amount">{{number_format($term->price)}}
                                                            <span>تومان</span>
                                                        </span>
                                                    </td>

                                                    <td class="detail"><a
                                                            href="{{ route('term.purchase',$term->slug) . '?ref=' . auth()->user()->refcode }}"
                                                            class="btn btn-secondary d-block copy_text">لینک بازاریابی</a></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="alert alert-success">لینک بازاریابی کانال</div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>نام</th>
                                                    
                                                    <th>مربوط به کانال</th>
                                                    <th>مبلغ</th>
                                                    <th>لینک</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($membertimechannel as $key=>$value)
                                                <tr>
                                                    <td class="order-code">{{$value->name}}</td>
                                                    <td>{{ $value->channel->name}}</td>
                                                    <td class="totla">
                                                        <span class="amount">{{number_format($value->cost)}}
                                                            <span>تومان</span>
                                                        </span>
                                                    </td>
                                                    <td class="detail"><a
                                                            href=" {{ route('panel.channel.purchase',$value->id) . '?ref=' . auth()->user()->refcode }}" class="btn btn-secondary d-block copy_text">لینک
                                                            بازاریابی</a></td>



                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
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
@include('Front.panel.layouts.footermenu')
@endsection
@section('js-page')
<script>
$('.copy_text').click(function (e) {
   e.preventDefault();
   var copyText = $(this).attr('href');

   document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
   }, true);

   document.execCommand('copy');
   $(this).text("لینک کپی شد");
 });
</script>
@endsection