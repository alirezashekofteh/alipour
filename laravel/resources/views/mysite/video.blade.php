@extends('Front.Layouts.master')
@section('title' , 'alireza')
@section('content')

<section id="blog" class="container-fluid mb-sm-5 mb-3 ">
    <div class="above-page-img">
        <img src="/Images/bg3.png" alt="" title=""  class="d-lg-block d-none">
    </div>
    <div class="container">
        <div class="row">
            <div class="above-page-content m-auto text-white text-center">
                <div class="above-page-tagline">
                    <h1 class="main-tagline IRANSansWeb_Medium">ویدئو های آموزشی</h1>
                    <h6 class="IRANSansWeb_Medium text-white text-shadow"></h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container quickico">
    <div class="row value-body m-3 text-center">
        <a href="#" class="col-sm-2 col-4">
            <img src="/Images/Svg/world.svg" />
            <p>اقتصاد</p>
        </a>
        <a href="#" class="col-sm-2 col-4">
            <img src="/Images/Svg/breakfast.svg" />
            <p>تغذیه</p>
        </a>
        <a href="#" class="col-sm-2 col-4">
            <img src="/Images/Svg/mortarboard.svg" />
            <p>آکادمی</p>
        </a>
        <a href="#" class="col-sm-2 col-4">
            <img src="/Images/Svg/sunbed.svg" />
            <p>گردشگری</p>
        </a>
        <a href="#" class="col-sm-2 col-4">
            <img src="/Images/Svg/shop.svg" />
            <p>دکوراسیون</p>
        </a>
        <a href="#" class="col-sm-2 col-4">
            <img src="/Images/Svg/stethoscope.svg" />
            <p>سلامت</p>
        </a>

    </div>
</section>

<section class="container mt-5 grad-bg px-md-5 pt-3 pb-5 rad25">
    <h5 class="IRANSansWeb_Medium  text-white pb-3">محبوب ترین ها</h5>

    <div id="owl-secondevent" class="owl-carousel owl-theme text-right ">
        <div class="mx-2">
            <a href="Blogdetails.html">
                <img src="/Images/topblog2.jpg" class="img-fluid rad25 bigpic " />
                <div class="blogdiv">
                    <h6 class="IRANSansWeb_Medium text-white text-shadow">لورم ایپسوم</h6>
                </div>

            </a>

        </div>
        <div class="mx-2">
            <a href="Blogdetails.html">
                <img src="/Images/topblog8.jpg" class="img-fluid rad25 bigpic " />
                <div class="blogdiv">
                    <h6 class="IRANSansWeb_Medium text-white text-shadow">لورم ایپسوم</h6>
                </div>

            </a>

        </div>
        <div class="mx-2">
            <a href="Blogdetails.html">
                <img src="/Images/topblog13.jpg" class="img-fluid rad25 bigpic " />
                <div class="blogdiv">
                    <h6 class="IRANSansWeb_Medium text-white text-shadow">لورم ایپسوم</h6>
                </div>

            </a>

        </div>
        <div class="mx-2">
            <a href="Blogdetails.html">
                <img src="/Images/topblog7.jpg" class="img-fluid rad25 bigpic" />
                <div class="blogdiv">
                    <h6 class="IRANSansWeb_Medium text-white text-shadow">لورم ایپسوم</h6>
                </div>

            </a>

        </div><div class="mx-2">
            <a href="Blogdetails.html">
                <img src="/Images/topblog1.jpg" class="img-fluid rad25 bigpic" />
                <div class="blogdiv">
                    <h6 class="IRANSansWeb_Medium text-white text-shadow">لورم ایپسوم</h6>
                </div>
            </a>

        </div>
        <div class="mx-2">
            <a href="Blogdetails.html">
                <img src="/Images/topblog8.jpg" class="img-fluid rad25 bigpic" />
                <div class="blogdiv">
                    <h6 class="IRANSansWeb_Medium text-white text-shadow">لورم ایپسوم</h6>
                </div>
            </a>

        </div>
    </div>

</section>

<section class="container mt-5">
   <div class="row">
           @foreach ($video as $item)
           <div class="col-md-3">
    @include('Front.Layouts.blogs')
            </div>
           @endforeach

   </div>
   {{ $video->links() }}
</section>


@endsection

