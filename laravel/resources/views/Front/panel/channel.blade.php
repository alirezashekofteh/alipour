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
                                <div class="row post-cat">
                                    @foreach ($channels as $item)
                                    <?php
$mem=auth()->user()->Channels()->where('channel_id', $item->id)->count();
                                                ?>
                           
                                    <div class="col-md-6 col-12 mb-3 mt-3">
                                        <div class="owl-item active tab-item">
                                            <div class="item">
                                                <a href="" class="d-block hover-img-link" dideo-checked="true">
                                                    <img src="{{$item->pic}}" class="img-fluid rounded" alt="">
                                                </a>
                                                <a href="" dideo-checked="true">
                                                    <h5 class="post-title text-dark p-2"><i
                                                            class="fa fa-check-square icontitle"></i>{{$item->name}}
                                                    </h5>

                                                </a>
                                                <hr>
                                                <?php
$mem=auth()->user()->Channels()->where('channel_id', $item->id)->where('expire_at', '>', Carbon\Carbon::now());
                                                ?>
                                                @if (!!$mem->count())
                                                <div class="price p-2"><span></span>
                                                    <ins class="text-danger" style="text-decoration: none">تاریخ انقضا
                                                        :<span>{{jdate($mem->first()->pivot->expire_at)->format('%d %B %Y')}}<span></span></span></ins>
                                                    <a href="{{route('panel.channel.view',$mem->first()->id)}}"
                                                        class="btn btn-success float-left" dideo-checked="true"><i
                                                            class="fa fa-eye" aria-hidden="true"></i>ورود به کانال</a>
                                                </div>
                                                <hr>
                                                @else
                                                @foreach ($item->membertimechannels as $member)
                                                <div class="price p-2"><span>{{$member->name}}</span>
                                                    <ins class="text-danger"
                                                        style="text-decoration: none"><span>{{number_format($member->cost)}}<span>تومان</span></span></ins>
                                                    <a href="https://app.didar.me/customer/form/7d1c6293-cff9-4dde-b6df-aaa87d306dec"
                                                        class="btn btn-success float-left" dideo-checked="true"><i
                                                            class="fa fa-eye" aria-hidden="true"></i>خرید عضویت</a>
                                                </div>
                                                <hr>
                                                @endforeach
                                                @endif




                                            </div>
                                        </div>
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
@include('Front.panel.layouts.footermenu')
@endsection