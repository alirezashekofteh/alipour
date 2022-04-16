@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<!-- adplacement------------------------------->
<div class="container-main">

    <!-- slider-main--------------------------->
    <div class="col-lg-12 col-md-12 col-xs-12 mt-3 pr order-1 d-block">
        <div class="hero-slides owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage">
                    @foreach ($vipcats as $item)
                    <div class="owl-item active tab-item">
                        <div class="item">
                            <a href="{{route('catblog',$item->slug)}}" class="d-block hover-img-link">
                                <img src="{{$item->picslide}}" class="img-fluid rounded" alt="">
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="">
        <div class="adplacement-container-row">
            <div class="col-12">
                <form method="get" class="blogcat-search mt-3" data-aos="flip-up">
                    <div class="p-3">
                        <div class="col-lg-5 col-md-6 pr">
                            <div class="form-group">
                                <label for="search"><i class="bx bx-search"></i>جستجو</label>
                                <input name="s" type="text" value="" class="form-control" id="search"
                                    placeholder="دنبال چی میگردی؟">

                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pr">
                            <div class="form-group">
                                <label for="category"><i class="bx bx-list-check"></i>دسته بندی مطالب</label>
                                <select name="category" class="form-control" id="category">
                                    <option value="" style="font-weight: 800">همه</option>
                                    @foreach (\App\Models\Category::where('type','post')->where('parent','0')->get() as
                                    $item)
                                    <option value="{{$item->id}}" style="font-weight: 800">{{$item->name}}</option>
                                    @if($item->child()->count())
                                    @foreach ($item->child as $items)
                                    <option value="{{$items->id}}">  {{$items->name}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pr">
                            <div class="form-group">
                                <label for="level"><i class="bx bx-check"></i>سطح مطالب </label>
                                <select name="level" class="form-control" id="level">
                                    <option value="">همه</option>
                                    <option value="10">مقدماتی</option>
                                    <option value="11">متوسط</option>
                                    <option value="12">پیشرفته</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-6 pr">
                            <div class="form-group mt-4">
                                <button id="submit" type="button" class="btn btn-success btn-block">اعمال</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <ul class="list-unstyled related-topics mt-3">
            @foreach ($cats as $item )
            <div class="col-md-3 col-6 pl-3 mb-3 pr">
                <div class="saham-box">
                    <a href="{{route('catblog',$item->slug)}}" title="{{$item->name}}">
                        <img src="{{$item->pic}}" alt="{{$item->name}}">
                        <h2 class="title">{{$item->name}}</h2>
                    </a>
                </div>
            </div>
            @endforeach
        </ul>
    </div>
</div>
<!-- slider-product-------------------------------->
<section class="section-slider amazing-section col-md-12 pt-3">
    <div class="container">
        <div class="col-lg-2 display-md-none pull-right">
            <div class="amazing-product text-center">
                <a href="#">
                    <img src="/images/1643282.png" alt="">
                </a>
                <h4 class="amazing-heading-title amazing-size-default">انتخاب سردبیر</h3>
                    <a href="#" class="btn btn-success">
                        مشاهده همه
                        <i class="uil uil-angle-left"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 pull-left">
            <div class="">
                <div class="widget widget-product card">
                    <div class="terms-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($sardabirs as $post)
                                <div class="owl-item active tab-item">
                                    <div class="item">
                                        <a href="{{route('singleblog',$post->slug)}}" class="d-block hover-img-link">
                                            <img src="{{$post->images->first()->pic}}"" class="img-fluid rounded" alt="">
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
                </div>
            </div>
        </div>
</section>
<div class="container">
    <div class="col-md-12">
        <div class="post-cat">
            @foreach ($posts as $post)
            <div class="col-md-3 col-6 mb-3 mt-3 pr">
                <div class="tab-item col-md-12">
                    <a href="{{route('singleblog',$post->slug)}}" class="d-block hover-img-link">
                        <img src="{{$post->images->first()->pic}}" class="img-fluid rounded" alt="">
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
                        <a href="{{route('singleblog',$post->slug)}}" class="btn btn-success"><i class="fa fa-eye ml-1"
                                aria-hidden="true"></i>مشاهده</a>
                    </div>

                </div>
            </div>
            @endforeach
            <div class="pagination-product pr-3 pl-3 pr">
            {{ $posts->links() }}
            </div>
        </div>
      
    </div>
</div>

<div class="ngmnav d-md-none">
    <svg id="navbar" xml:space="preserve" width="100%" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 510.9 82.18" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css">

.fil0 {fill:#FFF}

</style>
</defs>
<g id="Layer_x0020_1">
<metadata id="CorelCorpID_0Corel-Layer"></metadata>
<path class="fil0" d="M255.45 54.78c8.15,0 16.3,-3.09 22.48,-9.27l33.46 -33.46c5.92,-5.96 11.44,-11.65 21.85,-12.05l177.66 0 0 82.18 -255.45 0 -255.45 0 0 -82.18 177.66 0c10.41,0.4 15.93,6.09 21.85,12.05l33.46 33.46c6.18,6.18 14.33,9.27 22.48,9.27z"></path>
</g>
</svg>
<a href="/" id="ngcall" dideo-checked="true">
 <div class="back"></div>
<div class="icon"></div>
</a>

<div class="state left">

 <a id="ng-notification" href="/panel" dideo-checked="true" class="bellanimate">
پنل کاربری</a>
<a id="" href="/register" dideo-checked="true" >
  ثبت نام
</a>


</div>
<div class="state right">
  <a id="ng-home" href="/" dideo-checked="true">
    تحلیل ها
</a>
 <a id="ng-menu" href="/blog" dideo-checked="true">
    وبلاگ
</a>
</div>
 </div>

@endsection
