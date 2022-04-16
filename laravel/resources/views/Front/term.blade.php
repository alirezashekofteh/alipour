@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('css-page')
<link type="text/css" href="/assets/buttom/css/ionicons.min.css" rel="stylesheet" />
<link type="text/css" href="/assets/buttom/css/style.css" rel="stylesheet" />
@endsection
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<!-- adplacement------------------------------->
<div class="main-row">
    <div id="breadcrumb">
        <i class="mdi mdi-home"></i>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">خانه</a></li>
                <li class="breadcrumb-item"><a href="#">دوره ها</a></li>
                <li class="breadcrumb-item active open" aria-current="page">{{$term->title}}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">

</div>
<section class="blog-home">
    <div class="row">
        <div class="col-md-12">
            <article class="post-item widget card p-md-5 mt-3">
                <div class="row">
                    <div class="col-md-12">
                        @if ($term->video)
                        <video width="100%" height="auto" controls poster="{{$term->pic}}" style="border-radius: 1rem">
                            <source src="{{$term->video}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @else
                        <div class="post-thumbnail">
                            <img src="{{$term->pic}}" alt="{{$term->name}}">
                        </div>
                        @endif

                    </div>
                    <div class="col-md-12">
                        <div class="content-blog mt-3">
                            {!!$term->content!!}
                        </div>
                    </div>
                </div>
            </article>
            <article class="w-100 mt-3">
                <div class="col-lg-12 col-12 d-flex align-content-center flex-wrap">
                    <div class="courses-meta">
                        <ul>
                            <li>
                                <i class="fa fa-support"></i>
                                <span>پشتیبانی</span>
                                {{$term->poshtibani}}</li>

                            <li>
                                <i class="fa fa-calendar"></i>
                                <span>سطح دوره</span>
                                {{$term->sath}} </li>
                            <li>
                                <i class="fa fa-graduation-cap"></i>
                                <span>مدرس دوره</span>
                                {{$term->teacher}}</li>

                            <li>
                                <i class="fa fa-hourglass-start"></i>
                                <span>نحوه ارائه</span>
                                {{$term->eraye}}
                            </li>
                            <li>
                                <i class="fa fa-list-alt"></i>
                                <span>تعداد جلسات</span>
{{$term->videos()->count()}} جلسه
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
            {{-- <article class="post-item widget card p-md-5 mt-3 tabs">
                <header class="card-header header-product">
                    <span class="title-one">ریز سر فصل ها</span>
                    <h3 class="card-title"></h3>
                </header>
                <div id="container">
                    <!-- start accordion -->
                    <ul class="accordion">
                        @foreach ($term->termcats as $item)
                        <li>
                            <a><i class="fa fa-laptop text-dark ml-1" ></i>{{$item->name}}</a>
            <p>
                @foreach ($item->videos as $item1)
                <span>{{$item1->title}}</span>
                <br>
                @endforeach
            </p>
            </li>
            @endforeach
            </ul>
            <!-- end accordion -->
        </div>
        </article> --}}
        <article class="post-item widget card p-md-5 mt-3 tabs">
            <div class="col-md-12">
                <div class="content-blog mt-3">
                    {!!$term->content_buttom!!}
                </div>
            </div>
<div class="fixedbutton d-none d-md-block" style="width: 200px">
    {{-- <div class="text-center">
        <div class="col-12"><div class="red-border"><span class="text-warning">قیمت اصلی دوره</span><del class="text-danger">{{number_format($term->Orginalprice())}} <small>تومان</small></del></div></div>
        <div class="col-12"><span class="text-success">قیمت ویژه شما</span><div class="text-dark"><div>{{number_format($term->Orginalprice()- $term->off)}} <small>تومان</small></div></div></div>
    </div> --}}
    <button class="snip0040 green btn-block btn"><span><a href="{{$term->linkkharid}}" class="text-white">دریافت مشاوره خرید</a></span><i class="ion-ios-cart"></i></button>
</div>



        </article>
        @if($term->questions->count()>1)
        <article class="post-item widget card p-md-5 mt-3 tabs">
            <header class="card-header header-product">
                <span class="title-one">سوالات متداول</span>
                <h3 class="card-title"></h3>
            </header>
            <div id="container">
                <!-- start accordion -->
                <ul class="accordion">
                    @foreach ($term->questions as $item)
                    <li class="first">
                        <span class="termcat"><i class="fa fa-laptop text-dark ml-1"></i>
                        {{$item->name}}</span>
                        <p>
                            {{$item->value}}
                        </p>
                    </li>
                    @endforeach
                </ul>
                <!-- end accordion -->
            </div>
        </article>
@endif

    </div>
    </div>
</section>
<div class="footer-menu circular d-md-none">
    <ul>
        <a href="{{$term->linkkharid}}" class="btn btn-success btn-block">دریافت مشاوره خرید</a>
    </ul>
</div>
@endsection
@section('js-page')
<script type="text/javascript">
    $(document).ready(function(){
        $('#lightgallery').lightGallery();
    });
    $('.accordion > li:eq(0) > span').addClass('active').next().slideDown();

(function($) {
   $('.accordion span.termcat').click(function(j) {
    var dropDown = $(this).closest('li').find('p');

    $(this).closest('.accordion').find('p').not(dropDown).slideUp();

    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).closest('.accordion').find('span.active').removeClass('active');
        $(this).addClass('active');
    }

    dropDown.stop(false, true).slideToggle();

    j.preventDefault();
});
})(jQuery);
</script>

<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="/assets/js/vendor/lightgallery-all.min.js"></script>
<script src="/assets/js/vendor/jquery.mousewheel.min.js"></script>
@endsection
