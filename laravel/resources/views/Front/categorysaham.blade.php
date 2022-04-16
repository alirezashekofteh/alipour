@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('css-page')
<link href="/assets/css/vendor/lightgallery.css" rel="stylesheet">
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
                <li class="breadcrumb-item"><a href="/saham">سهام</a></li>
                <li class="breadcrumb-item active open" aria-current="page">{{$sahm->name}}</li>
            </ol>
        </nav>
    </div>
</div>
<section class="blog-home">
    <div class="row">
        <div class="col-md-12">
            <article class="post-item widget card p-md-5 mt-3">
                <header class="card-header header-product">
                    <span class="title-one">{{$sahm->name}}</span>
                    <h3 class="card-title"></h3>
                </header>
                <div class="content-blog">
                    {!!$sahm->content!!}
                </div>
            </article>
            <article class="post-item widget card p-md-5 mt-3">
                <header class="card-header header-product">
                    <span class="title-one">سهم های این گروه</span>
                    <h3 class="card-title"></h3>
                </header>

                <ul class="list-unstyled row related-topics">
                    @foreach ($sahams as $item )
                    <div class="col-md-3 col-6">
                        <div class="saham-box">
                            <a href="{{route('sahms',$item->slug)}}" title="{{$item->name}}">
                                <img src="{{$item->pic}}" alt="{{$item->name}}">
                                <h2 class="title">{{$item->name}}</h2>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </ul>
                <!--Accordion wrapper-->

            </article>

        </div>
    </div>
</section>

@include('Front.Layouts.footermenu')
@endsection
@section('js-page')
<script type="text/javascript">
    $(document).ready(function(){
        $('#lightgallery').lightGallery();
    });
</script>

<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="/assets/js/vendor/lightgallery-all.min.js"></script>
<script src="/assets/js/vendor/jquery.mousewheel.min.js"></script>
@endsection
