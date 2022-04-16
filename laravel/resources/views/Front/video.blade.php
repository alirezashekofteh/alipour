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
    <div class="row">



        <div class="col-md-8 col-xs-12 offset-md-2  pl text-center">
            <script src="https://stream.rezaderakhshi.com/{{$video->kavimo}}/embed"></script>
            <script>
                window.onload = function() {
                                                var media_obj = window.Vis.libraryMedias.getByHash("{{$video->kavimo}}");

                                                media_obj.api.DRMText({
                                                  text : ["{{auth()->user()->mobile}}"],
                                                  time: 2.5,
                                                  color: "#777777",
                                                  fontSize: "20px",
                                                  fontStyle: "bold",
                                                  fontName: "tahoma",
                                                  opacity: 0.4,
                                                });
                                              };
            </script>

        </div>

        <div class="tabs">
            <div class="tab-box">
                <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item col-md-3 col-12">
                        <a class="nav-link" id="Review-tab" data-toggle="tab" href="#Review" role="tab"
                            aria-controls="Review" aria-selected="true">
                            <i class="mdi mdi-glasses"></i>
                            <span>توضیحات</span>
                        </a>
                    </li>
                    <li class="nav-item col-md-3 col-12">
                        <a class="nav-link active" id="Specifications-tab" data-toggle="tab" href="#Specifications" role="tab"
                            aria-controls="Specifications" aria-selected="false">
                            <i class="mdi mdi-format-list-checks"></i>
                            <span> ویدئو های دوره</span>
                        </a>
                    </li>
                    <li class="nav-item col-md-3 col-12">
                        <a class="nav-link" id="User-comments-tab" data-toggle="tab" href="#User-comments" role="tab"
                            aria-controls="User-comments" aria-selected="false">
                            <i class="mdi mdi-comment-text-multiple-outline"></i>

                            <span> نظرات کاربران</span>
                        </a>
                    </li>
                    <li class="nav-item col-md-3 col-12">
                        <a class="nav-link" id="question-and-answer-tab" data-toggle="tab" href="#question-and-answer"
                            role="tab" aria-controls="question-and-answer" aria-selected="false">
                            <i class="mdi mdi-comment-text-multiple-outline"></i>

                            <span> پرسش و پاسخ</span>
                        </a>
                    </li>

                </ul>

            </div>
           @include('Front.subvideo',['tab' => 'video'])
        </div>
        <div class="col-md-12">
            <article class="">
                <div class="fixedbutton d-none d-md-block" style="width: 200px">
                    <div class="text-center">
                        <div class="col-12">
                            <div class="red-border"><span class="text-warning">قیمت اصلی دوره</span><del
                                    class="text-danger">{{number_format($term->Orginalprice())}}
                                    <small>تومان</small></del></div>
                        </div>
                        <div class="col-12"><span class="text-success">قیمت ویژه شما</span>
                            <div class="text-dark">
                                <div>{{number_format($term->Orginalprice()- $term->off)}} <small>تومان</small></div>
                            </div>
                        </div>
                    </div>
                    <button class="snip0040 green btn-block btn"><span><a href="{{$term->linkkharid}}"
                                class="text-white">دریافت مشاوره خرید</a></span><i class="ion-ios-cart"></i></button>
                </div>



            </article>


        </div>


        <div class="footer-menu circular d-md-none">
            <ul>
                <a href="{{$term->linkkharid}}" class="btn btn-success btn-block">دریافت مشاوره خرید</a>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('js-page')
<script>
    $('.delete-buttom').on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            var id =$(this).attr("id");
            Swal.fire({
                title: 'آیا اطمینان دارید؟',
                text: "این عملیات برگشت پذیر نیست...",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله ،حذف شود!',
                cancelButtonText:'لغو عملیات'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form'+id).submit();
                }
            })
        });
</script>

<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="/assets/js/vendor/lightgallery-all.min.js"></script>
<script src="/assets/js/vendor/jquery.mousewheel.min.js"></script>
@endsection