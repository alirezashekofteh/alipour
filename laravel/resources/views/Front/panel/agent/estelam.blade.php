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
                            <div class="profile-stats">
                                <div class="row post-cat"> 
                                    <div class="col-md-6 col-12 mb-3 mt-3">
                                        <form action="{{route('panel.agent.estelam')}}" method="post">
                                            @csrf
                                        <label for="">شماره موبایل کاربر را وارد نمایید</label>
                                        <input type="number" min="" name="mobile" placeholder="شماره موبایل کاربر مورد نظر را وارد نمایید" class="form-control text-left" style="direction: ltr" value="{{old('mobile',request()->mobile)}}" required>
                                        <button type="submit" class="btn btn-success btn-block">
                                            <span class="text-nowrap">استعلام</span>
                                        </button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            @if (!empty($user))
                                
                           
                            <div class="profile-stats">
                                <div class="alert alert-success">وضعیت کیف پول کاربر</div>
                                {{number_format($user->balance())}}تومان
                                @if ($orders->count())
                                <div class="alert alert-success">لیست دوره های کاربر</div>
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

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                <tr>
                                                    <td class="order-code"><a href=""
                                                            class="btn btn-secondary d-block">{{$order->term->title}}</a>
                                                    </td>
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
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                                @if ($channel->count())
                                <div class="alert alert-success">لیست کانال های کاربر</div>
                                <div class="table-orders">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">نام کانال</th>
                                                    <th scope="col">تاریخ انقضا</th>
                                                    <th scope="col">وضعیت</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($channel as $item)
                                                <?php
$mem=$user->Channels()->where('channel_id', $item->id)->where('expire_at', '>', now());
                                                ?>
                                                @if (!!$mem->count())
                                                <tr>
                                                    <td class="order-code"><a href=""
                                                            class="btn btn-secondary d-block">{{$item->name}}</a>
                                                    </td>
                                                    <td>{{jdate($mem->first()->pivot->expire_at)->format('%d %B %Y')}}
                                                    </td>
                                                    <td class="Waiting text-success">پرداخت شده</td>


                                                </tr>
                                                @endif
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif



                            </div>
                            @endif
                        </div>
                    </div>
                    @include('Front.panel.layouts.sidebar')
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection