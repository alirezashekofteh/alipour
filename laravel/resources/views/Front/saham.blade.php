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
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item"><a href="/saham">سهام</a></li>
                {{-- <li class="breadcrumb-item"><a href="{{route('catsaham',$sahm->category->slug)}}">{{$sahm->category->name}}</a></li> --}}
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
                <div class="post-thumbnail text-center">
                    <img src="{{$sahm->pic}}" style="max-width: 350px" alt="{{$sahm->name}}">
                </div>
                <div class="post-thumbnail">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">توضیحات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sahm->metas()->get() as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->value}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
            <article class="post-item widget card p-md-5 mt-3">
                <div class="content-blog">
                    {!!$sahm->content!!}
                </div>
                <div class="socialNetwork"> اشتراک گذاری :
                    <a class="mr-3" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u={{url()->full()}}">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="mr-3" rel="nofollow" target="_blank" href="https://telegram.me/share/url?{{url()->full()}}">
                        <i class="fa fa-paper-plane"></i>
                    </a>
                    <a class="mr-3" rel="nofollow" target="_blank" href="http://www.twitter.com/share?url={{url()->full()}}">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="mr-3" rel="nofollow" target="_blank"
                        href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->full()}}">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <a class="mr-3" rel="nofollow" target="_blank" href="whatsapp://send?text={{url()->full()}}">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </div>
            </article>
            <article class="post-item widget card bg-aqua">
                <header class="card-header header-product">
                    <span class="title-one">تحلیل های این سهم</span>
                    <h3 class="card-title"></h3>
                </header>

                <ul class="list-unstyled row related-topics">
                    @foreach ($sahm->tahlilsahmes as $images )
                    <li class="col-md-12 mr-1 mb-2">
                        <a href="{{route('tahlil',$images->slug)}}">
                            <i class="mdi mdi-comment-text-multiple-outline"></i>
                            {{$images->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
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
