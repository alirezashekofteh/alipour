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
                                <div class="table-orders">
                                    <div class="alert alert-success">پیگیری اقساط پرداخت نشده</div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">شماره سند</th>
                                                    <th scope="col">پرداخت</th>
                                                    <th scope="col">مبلغ قسط</th>
                                                    <th scope="col">مربوط به دوره</th>
                                                    <th scope="col">قسط شماره</th>
                                                    <th scope="col">مهلت پرداخت</th>
                                                    <th scope="col">پرداخت</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                @foreach ($wallets as $item)
                                                <tr>
                                                    <td class="order-code">{{$item->id}}</td>
                                                    <td class="order-code"><a href="{{route('walletdirect',[$item->code]). '?ref=' . $item->agents->refcode}}" class="btn btn-success d-block">پرداخت</a></td>
                                                    <td class="order-code">{{number_format($item->amount)}}</td>
                                                    <td class="order-code">{{$item->walletable->title}}</td>
                                                    <td class="order-code">{{$item->installments}}</td>
                                                    <td class="order-code">{{jdate($item->created_at)}}</td>
                                                    <td class="order-code"><a href="{{route('walletdirect',[$item->code]). '?ref=' . $item->agents->refcode}}" class="btn btn-success d-block">پرداخت</a></td>

                                                  
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                  
                                </div>
                            </div>
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