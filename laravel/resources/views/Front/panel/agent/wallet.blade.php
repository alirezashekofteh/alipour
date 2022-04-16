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
                                    <div class="alert alert-success">سود های واریزی</div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">شماره سند</th>
                                                    <th scope="col">مبلغ پورسانت</th>
                                                    <th scope="col">تاریخ واریز</th>
                                                    <th scope="col">مربوط به تراکنش</th>
                                                   
                                                    <th scope="col">مبلغ خرید</th>
                                                    <th scope="col">کاربر</th>
                                                    <th scope="col">توضیحات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wallets as $item)
                                                <tr>
                                                    <td class="order-code">{{$item->id}}</td>
                                                    <td class="order-code">{{number_format($item->amount)}}</td>
                                                    <td class="order-code">{{jdate($item->created_at)}}</td>
                                                    <td class="order-code">{{$item->walletable->id}}</td>
                                                 
                                                    <td class="order-code">{{number_format($item->walletable->amount)}}</td>
                                                    <td class="order-code">{{$item->walletable->user->nf}}</td>
                                                    <td class="order-code">{{$item->walletable->description}}</td>
                                                  

                                                  
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