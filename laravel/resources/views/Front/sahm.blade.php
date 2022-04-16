@extends('Front.Layouts.master')
@section('title' , 'وبلاگ')
@section('content')
<div class="container-main">
    <div class="d-block">
        <div class="page-content page-row">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active" aria-current="page">لیست سهم ها</li>
                        </ol>
                    </nav>
                </div>

                <!-- start sidebar--------------------->
                <div class="col-lg-12 col-md-12 col-xs-12 pl">
                    <div class="shop-archive-content mt-3 d-block">
                        <div class="product-items">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Most-visited" role="tabpanel" aria-labelledby="Most-visited-tab">
                                    <div class="row">
                      @foreach ($saham as $sahm)
                      <div class="col-lg-3 col-md-3 col-xs-12 order-1 d-block mb-3">
                        <section class="product-box product product-type-simple">
                            <div class="thumb">
                                <a href="{{route('sahms',$sahm->slug)}}" class="d-block">
                                    <div class="promotion-badge">{{$sahm->name}}</div>
                                    <img src="{{$sahm->pic}}">
                                </a>
                            </div>
                            <div class="title">
                                @php
                                   $test= $sahm->tahlilsahmes()->latest()->first();
                                @endphp
                                <a href="{{route('sahms',$sahm->slug)}}">{{$test->name ?? 'بدون تحلیل'}}</a>
                            </div>
                            <div class="price">

                                <span class="amount">تاریخ آخرین تحلیل
                                    <span dir="rtl">{{jdate($test->created_at ?? '')}}</span>
                                </span>
                            </div>
                        </section>
                    </div>
                      @endforeach
                                    </div>
                                </div>

                        <div class="pagination-product">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link active" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- arshive-product----------------------->
@endsection
