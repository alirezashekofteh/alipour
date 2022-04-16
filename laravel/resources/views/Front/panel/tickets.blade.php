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
                                                <th scope="col">شماره تیکت</th>
                                                <th scope="col">عنوان تیکت</th>
                                                <th scope="col">تاریخ ثبت تیکت</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تاریخ آخرین بروزرسانی</th>
                                                <th scope="col">جزئیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tikcets as $tikcet)
                                            <tr>
                                                <td class="order-code">{{$tikcet->id}}</td>
                                                <td class="order-code">{{$tikcet->name}}</td>
                                                <td>{{jdate($tikcet->created_at)}}</td>
                                                <td class="Waiting text-success">پرداخت شده</td>
                                                <td>{{jdate($tikcet->updated_at)->ago()}}</td>
                                                <td class="detail"><a href=""
                                                        class="btn btn-secondary d-block">نمایش</a></td>
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
