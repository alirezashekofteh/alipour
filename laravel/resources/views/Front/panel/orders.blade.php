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
                                    <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">نام دوره</th>
                                                <th scope="col">تاریخ ثبت سفارش</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">مبلغ</th>
                                                <th scope="col">نوع پرداخت</th>
                                                <th scope="col">جزئیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td class="order-code"><a href="{{route('panel.order',$order->term->slug)}}" class="btn btn-secondary d-block">{{$order->term->title}}</a></td>
                                                <td>{{jdate($order->created_at)}}</td>
                                                <td class="Waiting text-success">پرداخت شده</td>
                                                <td class="totla">
                                                    <span class="amount">{{number_format($order->price)}}
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                                <td class="totla">
                                                   @if ($order->installments>0)
                                                       اقساطی
                                                       @else
                                                       نقدی
                                                   @endif
                                                </td>
                                                <td class=""><a href="{{route('panel.order',$order->term->slug)}}"
                                                        class="btn btn-secondary d-block">نمایش</a>

                                                        @if ($order->expire_support > now() and $order->term->sup_day >0)
                                                        <a href="{{route('panel.termgoftino',$order->term->slug)}}"
                                                            class="btn btn-info d-block">پشتیبانی</a>
                                                        @endif
                                               
                                                    
                                                    
                                                    </td>
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
