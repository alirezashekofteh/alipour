@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('css-page')
<meta name="robots" content="noindex,follow" />
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
                <li class="breadcrumb-item"><a href="/blog">وبلاگ</a></li>
                <li class="breadcrumb-item active open" aria-current="page">حق عضویت</li>
            </ol>
        </nav>
    </div>
</div>
<section class="blog-home">
    <div class="row">
        <div class="col-md-12">
            <article class="post-item p-md-5 mt-3">
                <div class="alert alert-warning">برای دیدن این محتوا نیاز به اشتراک سالیانه می باشد</div>
                @include('Front.Layouts.subscription')
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
