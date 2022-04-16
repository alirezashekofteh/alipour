@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<div class="main-row">
    <div id="breadcrumb">
        <i class="mdi mdi-home"></i>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">خانه</a></li>
                <li class="breadcrumb-item"><a href="#">دوره ها</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- slider-product-------------------------------->
<section class="section-slider amazing-section pt-3">
    <div class="container">
        <div class="col-lg-3 display-md-none pull-right">
            <div class="amazing-product text-center">
                <a href="#">
                    <img src="/images/1643282.png" alt="">
                </a>
                <h4 class="amazing-heading-title amazing-size-default">دوره ویژه</h3>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 pull-left">
            <div class="">
                    <div class="curses-slides owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($vipcats as $item)
                                <div class="owl-item active tab-item">
                                    <div class="item">
                                        <a href="{{route('catblog',$item->slug)}}" class="d-block hover-img-link">
                                            <img src="{{$item->picslider}}" class="img-fluid rounded" alt="">
                                        </a>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
            </div>
        </div>
</section>
<div class="container">
    <div class="col-md-12">
        <div class="row post-cat">
            @foreach ($terms as $term)
            <div class="col-md-4 col-6 mb-3 mt-3">
                <div class="owl-item active tab-item">
                    <div class="item">
                        <a href="{{route('termtak',$term->slug)}}" class="d-block hover-img-link">
                            <img src="{{$term->pic}}" class="img-fluid rounded" alt="">
                        </a>
                        <a href="{{route('termtak',$term->slug)}}">
                            <h5 class="post-title text-dark p-2"><i
                                    class="fa fa-check-square icontitle"></i>{{$term->title}}</h5>
                            <div class="product-rate p-1">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                            </div>
                            <hr>
                            <div class="price text-center pl text-dark p-2">
                                <del><span>{{number_format($term->Orginalprice())}}<span>تومان</span></span></del>
                                <ins class="text-danger"
                                    style="text-decoration: none"><span>{{number_format($term->Orginalprice()- $term->off)}}<span>تومان</span></span></ins>
                            </div>
                            <div class="price p-2">
                                <a href="{{route('termtak',$term->slug)}}" class="btn btn-success"><i
                                        class="fa fa-eye" aria-hidden="true"></i>مشاهده دوره</a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container">
    <div class="tabs">
        <div class="col-lg">
            <div class="tabs-content">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Review" role="tabpanel" aria-labelledby="Review-tab">
                        <section class="content-expert-summary">
                            <div class="mask pm-3">
                                <div class="mask-text" style="text-align: justify;">
                                    {!!$mainpage->blogtext!!}
                                </div>
                                <a href="#" class="mask-handler">
                                    <span class="show-more">+ ادامه مطلب</span>
                                    <span class="show-less">- بستن</span>
                                </a>
                                <div class="shadow-box"></div>
                            </div>
                        </section>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@include('Front.Layouts.footermenu')
@endsection
