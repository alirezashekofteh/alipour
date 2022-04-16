@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<!-- adplacement------------------------------->
<div class="container">
    <div class="">
        <!-- slider-main--------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pr  d-none d-md-block">
            <div class="slider-main-container d-block mt-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($slideshows as $slideshow)
                        <div class="carousel-item  @if ($loop->first)
                              active
                            @endif">
                            <a href="{{$slideshow->link}}" target="_blank"><img src="{{$slideshow->pic}}"
                                    class="d-block w-100" alt="..."></a>

                        </div>
                        @endforeach


                    </div>

                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 pr  d-md-none">
            <div class="slider-main-container d-block mt-1 mb-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($slideshows as $slideshow)
                        <div class="carousel-item  @if ($loop->first)
                              active
                            @endif">
                            <a href="{{$slideshow->link}}" target="_blank"><img src="{{$slideshow->pic}}"
                                    class="d-block w-100" alt="..."></a>

                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12 mt-5 pr order-1 d-block">
            <h4 class="thead">آخرین دوره ها</h4>
            <p class="des">با یادگیری بازار های مالی، در کنار هم بهترین سال بورسی را می سازیم</p>
            <div class="hr-services"><span></span></div>
            <div class="slider-widget-products slider-content-tabs">
                <div class="widget widget-product card slider-content-tabs">
                    <div class="terms-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($terms as $term)
                                <div class="owl-item active tab-item">
                                    <div class="item">
                                        <a href="{{route('termtak',$term->slug)}}" class="d-block hover-img-link">
                                            <img src="{{$term->pic}}" class="img-fluid rounded" alt="{{$term->title}}">
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
                                            {{-- <div class="price text-center pl text-dark p-2">
                                                <del><span>{{number_format($term->Orginalprice())}}<span>تومان</span></span></del>
                                                <ins class="text-danger"
                                                    style="text-decoration: none"><span>{{number_format($term->Orginalprice()- $term->off)}}<span>تومان</span></span></ins>
                                            </div> --}}
                                            <div class="price p-2">
                                                <a href="{{route('termtak',$term->slug)}}" class="btn btn-success"><i
                                                        class="fa fa-eye" aria-hidden="true"></i>مشاهده دوره</a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    {{-- <div><a href="/blog" class="btn btn-article float-left" style="border: 1px solid #2cb278;color:#2cb278"><i class="fa fa-calendar ml-2"></i>مشاهده همه دوره ها</a></div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="adplacement-container-row">
            <div class="col-12">
                <a href="#" class="adplacement-item mb-4">
                    <div class="adplacement-sponsored_box">
                        <img src="{{$mainpage->banner1}}">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- slider-product-------------------------------->
<section class="section-slider amazing-section pt-3">
    <div class="container">
        <div class="col-lg-2 display-md-none pull-right">
            <div class="amazing-product text-center">

                <h4 class="amazing-heading-title amazing-size-default">آخرین تحلیل ها</h3>
                    <a href="#" class="btn btn-success">
                        مشاهده همه
                        <i class="uil uil-angle-left"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 pull-left">
            <div class="">
                <div class="widget widget-product card">
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($tahlilsahms as $tahlilsahm)
                                <div class="owl-item tab-item">
                                    <div class="item">
                                        <a href="{{route('tahlil',$tahlilsahm->slug)}}"
                                            class="d-block hover-img-link">
                                            <img src="{{$tahlilsahm->saham->pic}}" class="img-fluid" alt="{{$tahlilsahm->name}}">
                                        </a>

                                        <h3 class="post-title text-dark mr-2">
                                        <a href="{{route('tahlil',$tahlilsahm->slug)}}">
                                            <i class="fa fa-laptop text-dark ml-1"></i> {{$tahlilsahm->name}}
                                        </a></h3>

                                        <hr>
                                        <div class="price text-danger pr font-small-1 mr-2"><i
                                                class="mdi mdi-comment-text-multiple-outline"></i>
                                           <a href="{{route('sahms',$tahlilsahm->saham->slug)}}"> {{$tahlilsahm->saham->name}}</a>
                                        </div>

                                        <div class="price text-dark">| بروزرسانی
                                            :{{jdate($tahlilsahm->created_at)->format('Y/m/d')}}</div>


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
<div class="container">
    <div class="d-block">
        <div class="adplacement-container-row">
            <div class="col-12">
                <a href="#" class="adplacement-item mb-4">
                    <div class="adplacement-sponsored_box">
                        <img src="{{$mainpage->banner2}}">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-lg-12 col-md-12 col-xs-12  pr order-1 d-block">
        <h4 class="thead">آخرین مقالات</h4>
        <div class="hr-services" style="margin-top: 100px"><span></span></div>

        <div class="slider-widget-products slider-content-tabs">
            <div class="widget widget-product card slider-content-tabs">
                <div class="post-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach ($posts as $post)
                            <div class="owl-item active tab-item">
                                <div class="item">
                                    <a href="{{route('singleblog',$post->slug)}}" class="d-block hover-img-link">
                                        <img src="{{$post->images->first()->pic}}" class="img-fluid rounded" alt="{{$post->name}}">
                                    </a>
                                    <a href="{{route('singleblog',$post->slug)}}">
                                        <h5 class="post-title text-dark p-2"><i class="fa fa-list-alt icontitle"></i>
                                            </i>{{$post->name}}</h5>
                                    </a>

                                    <hr>
                                    <div class="price text-center pl text-dark p-2">
                                        <i class="fa fa-calendar text-info"></i>
                                        :{{jdate($post->created_at)->format('%d %B %Y')}}
                                    </div>
                                    <div class="p-2">
                                        <a href="{{route('singleblog',$post->slug)}}" class="btn btn-success"><i
                                                class="fa fa-eye ml-1" aria-hidden="true"></i>مشاهده</a>
                                    </div>

                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div><a href="/blog" class="btn btn-article float-left" style="border: 1px solid #2cb278;color:#2cb278"><i class="fa fa-calendar ml-2"></i>مشاهده همه مقالات</a></div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Phone Ads--------------------------------->
<aside class="main-row-bg d-block d-md-block">
    <div class="bg-cover"></div>
    <div class="container-main">
        <div class="d-block">
            <section class="content-title section-title mt-5">
                <div class="align-items-center">
                    <div class="col-auto">
                        <div class="title">
                            <h2>رضا درخشی</h2>
                        </div>
                        <div class="subtitle">
                            <span>نکته های جامع از رضا درخشی</span>
                        </div>
                    </div>
                </div>
            </section>
            <div class="mb-3">

            </div>
        </div>
    </div>
</aside>
<div class="container">
    <div class="tabs">
        <div class="col-lg">
            <div class="tabs-content">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Review" role="tabpanel" aria-labelledby="Review-tab">
                        <h2 class="params-headline">رضا درخشی</h2>
                        <section class="content-expert-summary">
                            <div class="mask pm-3">
                                <div class="mask-text" style="text-align: justify;">
                                    {!!$mainpage->seotext!!}
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
