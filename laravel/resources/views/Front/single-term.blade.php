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
            
            <article class="p-md-5 mt-3">
              <div class="col-md-12">
                    <div class="col-md-8 col-xs-12 offset-md-2">
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
                    <div class="col-md-8 col-xs-12  offset-md-2">
                        <div class="post-item">
                            <div class="col-12 text-justify">
                                {!!$term->content!!}
                            </div>
                           
                        </div>
                        <button class="snip0040 green btn-block btn col-md-6 pr"><span><a href="{{$term->linkkharid}}"
                            class="text-white">خرید دوره</a></span><i
                        class="ion-ios-cart"></i></button>
                        </button>
                        <button class="snip0040 blue btn-block btn col-md-6 pr"><span><a href="{{$term->linkkharid}}"
                            class="text-white">اشتراک گزاری</a></span><i
                        class="ion-ios-cart"></i></button>
                        
                        <div class="text-center post-item mt-3 col-md-12 pr">
                            <div class="col-12">
                                <span class="icon">
                                    <i class="fa fa-link"></i>
                                </span>
                                <span class="info">لینک کوتاه :</span>
                                <!-- The text field -->


                                <!-- The button used to copy the text -->

                                <span class="scshort-link" style="display: block">https://rezaderakhshi.com/?p=64<span
                                        class="sc_autocopy hint--top" aria-label="کپی لینک"
                                        onclick="sc_auto_copy_text('https://studiaretheme.ir/?p=64')"><i
                                            class="fa fa-clone"></i></span></span>
                            </div>

                        </div>
                       

                    </div>
                </div>
            </article>
            <div class="flex-row col-md-12 col-xs-12">
                <!-- <h6>ویژگی های دوره</h6> -->
                                 <div class="col-md-2 col-xs-6">
                     <div class="meta-info-unit-box">
                         <div class="icon"><i class="fa  fa-users"></i></div>
                         <div class="value hint--top" aria-label="تعداد دانشجویان">{{$term->orders->where('status',1)->count()}} دانشجو</div>
                     </div>
                     </div>
                                 <div class="col-md-2 col-xs-6">
                     <div class="meta-info-unit-box">
                         <div class="icon"><i class="fa fa-language"></i></div>
                           <div class="value hint--top" aria-label="زبان آموزش">زبان: فارسی</div>
                     </div>
                     </div>
                 
                                 <div class="col-md-2 col-xs-6">
                     <div class="meta-info-unit-box">
                         <div class="icon"><i class="fa fa-clock-o"></i></div>
                           <div class="value hint--top" aria-label="مدت زمان آموزش">2:15:18</div>
                     </div>
                     </div>
                             
                                 <div class="col-md-2 col-xs-6">
                     <div class="meta-info-unit-box">
                         <div class="icon"><i class="fa fa-signal"></i></div>
                           <div class="value hint--top" aria-label="نوع دوره">  {{$term->eraye}}</div>
                     </div>
                     </div>
                             
                                 <div class="col-md-2 col-xs-6">
                     <div class="meta-info-unit-box">
                         <div class="icon"><i class="fa fa-list-alt"></i></div>
                           <div class="value hint--top" aria-label="تعداد سرفصل ها"> {{$term->termcats()->count()}} مبحث</div>
                     </div>
                     </div>
                             
                                 <div class="col-md-2 col-xs-6">
                     <div class="meta-info-unit-box">
                         <div class="icon"><i class="fa fa-list"></i></div>
                           <div class="value hint--top" aria-label="تعداد جلسات"> {{$term->videos()->count()}} جلسه</div>
                     </div>
                     </div>
                 
             </div>
            <div class="tabs">
                <div class="tab-box">
                    <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item col-md-3 col-12">
                            <a class="nav-link active" id="Review-tab" data-toggle="tab" href="#Review" role="tab"
                                aria-controls="Review" aria-selected="true">
                                <i class="mdi mdi-glasses"></i>
                                <span>توضیحات</span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3 col-12">
                            <a class="nav-link" id="Specifications-tab" data-toggle="tab" href="#Specifications"
                                role="tab" aria-controls="Specifications" aria-selected="false">
                                <i class="mdi mdi-format-list-checks"></i>
                                <span> ویدئو های دوره</span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3 col-12">
                            <a class="nav-link" id="User-comments-tab" data-toggle="tab" href="#User-comments"
                                role="tab" aria-controls="User-comments" aria-selected="false">
                                <i class="mdi mdi-comment-text-multiple-outline"></i>

                                <span> نظرات کاربران</span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3 col-12">
                            <a class="nav-link" id="question-and-answer-tab" data-toggle="tab"
                                href="#question-and-answer" role="tab" aria-controls="question-and-answer"
                                aria-selected="false">
                                <i class="mdi mdi-comment-text-multiple-outline"></i>

                                <span> پرسش و پاسخ</span>
                            </a>
                        </li>

                    </ul>
               
            </div>
            @include('Front.subvideo',['tab' => 'content'])
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
                                    class="text-white">دریافت مشاوره خرید</a></span><i
                                class="ion-ios-cart"></i></button>
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