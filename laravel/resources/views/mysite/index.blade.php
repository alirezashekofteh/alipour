@extends('Front.Layouts.master')
@section('title' , 'alireza')
@section('content')

<section id="above-page" class="container-fluid mb-5 mb-3 ">
    <div class="above-page-img">
        <img src="/Images/bg3.png" alt="" title="" class="d-lg-block d-none">
    </div>
    <div class="container">
        <div class="row">
            <div class="above-page-content m-auto">
                <div class="above-page-tagline">
                    <h1 class="main-tagline IRANSansWeb_Bold">با ما هم مسیر شو برای حرفه ای شدن</h1>
                </div>
                <div class="above-page-search">
                    <input type="text" class="srch-input" placeholder="جستجوی مقاله ،ویدئو، پادکست و ..." />
                    <a href="#" class="search-icon">
                        <i class="fas fa-search text-danger fa-2x"></i>
                    </a>
                </div>

                <div class="last-question-time d-lg-block d-none">
                    <div class="d-flex flex-row justify-content-center">
                        <a class="btn btn-danger text-white rad25 py-2 m-2"><i class="fa fa-gavel  ml-2"></i>گفتگو و
                            مشاوره با بخش حقوقی</a>
                        <a class="btn btn-purple text-white rad25 py-2 m-2"><i class="fa fa-stethoscope  ml-2"></i>گفتگو
                            و مشاوره با بخش روانشناسی</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<section class="container-fluid bg-white my-5 p-4 ">
    <div class="max_w mx-auto d-flex flex-lg-row flex-column text-lg-right text-center mt-lg-0 mt-5">
        <div>
            <img id="mo_pic" src="/Images/moshavere.png" />

        </div>
        <div class="pt-lg-5">

            <h4 class="IRANSansWeb_Medium">هدف از راه اندازی این وب سایت؟</h4>
            <p>
                سلام به همه برنامه نویس های خوب به خصوص اونهایی که با زبون لذت بخش phpکد زنی میکنندما اینجا دور هم میخواهیم اطلاعات و چالش های که تو 12 سال برنامه نویسی حرفه ای و ÷روژه هایی که روشون کار کردم روبا شما به اشتراک بزارم تا بتونید بهتر و راحتت تر این مسیر رو طی کنید
            </p>

        </div>
    </div>


</section>

<section class="container mt-5">
    <h5 class="IRANSansWeb_Medium  text-center bt-color">تازه ترین ویدئو های آموزشی</h5>
    <p class="text-center"> جدیدترین ویدئو های تک جلسه ای آموزشی</p>
    <div id="owl-toparticle" class="owl-carousel owl-theme text-right ">
        @php
$items = \App\Models\Video::offset(0)->limit(10)->get()
     //   $items = \App\Models\Post::where('active','1')->get();
    @endphp
       @foreach ($items as $item)
@include('Front.Layouts.video')
       @endforeach

    </div>

</section>

<section class="container my-4">
    <div id="foottop" class="row p-3 value-body grad-bg m-2 text-center">
        <div class="col-md-4 d-flex flex-sm-row  flex-wrap flex-column float-left text-md-left text-center">
            <a href="#"><img src="/Images/logo2.png" /></a><br />
        </div>
        <div class="col-md-8 pt-3 d-flex flex-md-row flex-wrap flex-column text-md-right text-center">
            <span class="mb-2 pl-3 IRANSansWeb_Medium text-white"><i class="fa fa-stethoscope fa-2x ml-2"></i>راهنمایی و
                مشاوره :</span>
            <a href="#" class="rounded-btn text-white support-phone IRANSansWeb_Bold">021-28425544 __ 09128538521</a>
        </div>
    </div>
</section>

<section class="container mt-5">
    <h5 class="IRANSansWeb_Medium  text-center bt-color">تازه ترین مقالات</h5>
    <p class="text-center"> جدیدترین مقالات و اطلاعات در زمینه برنامه نویسی php</p>
    <div id="owl-secondevent" class="owl-carousel owl-theme text-right ">

        @php
        $items = \App\Models\Post::offset(0)->limit(10)->get()
             //   $items = \App\Models\Post::where('active','1')->get();
            @endphp
               @foreach ($items as $item)
        @include('Front.Layouts.blogs')
               @endforeach


    </div>

</section>


@endsection
