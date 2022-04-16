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
                                    <div class="col-md-6 col-12 mb-3 mt-3">
                                        <form action="" method="get">
                                            
                                        <label for="">شماره موبایل کاربر را وارد نمایید</label>
                                        <input type="number" min="" name="mobile" placeholder="شماره موبایل کاربر مورد نظر را وارد نمایید" class="form-control text-left" style="direction: ltr" value="{{old('mobile',request()->mobile)}}" required>
                                        <button type="submit" class="btn btn-success btn-block">
                                            <span class="text-nowrap">جستجو</span>
                                        </button>
                                    </form>
                                    </div>
                                </div> 
                                <div class="table-orders">
                                    <div class="alert alert-success">پیگیری اقساط پرداخت نشده</div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">جزییات</th>
                                                    <th scope="col">موعد پرداخت</th>
                                                    <th scope="col">شماره سند</th>
                                                    <th scope="col">مبلغ قسط</th>
                                                    <th scope="col">مربوط به دوره</th>
                                                    <th scope="col">قسط شماره</th>
                                                    <th scope="col">کاربر</th>
                                                    <th scope="col">موبایل</th>
                                                   
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wallets as $item)
                                                <tr>
                                                    <td> <a href="{{route('panel.agent.sendinstallment',$item)}}" class="btn btn-success">یادآوری قسط</a></td>
                                                    <td class="order-code">{{jdate($item->created_at)->format('Y/m/d')}}</td>
                                                    <td class="order-code">{{$item->id}}</td>
                                                    <td class="order-code">{{number_format($item->amount)}}</td>
                                                    <td class="order-code">{{$item->walletable->title}}</td>
                                                    <td class="order-code">{{$item->installments}}</td>
                                                    <td class="order-code">{{$item->user->nf}}</td>
                                                    <td class="order-code">{{$item->user->mobile}}</td>
                                                   
                                                   
                                                   

                                                  
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