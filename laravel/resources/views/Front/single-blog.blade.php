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
                <li class="breadcrumb-item"><a href="/blog">وبلاگ</a></li>
                <li class="breadcrumb-item active open" aria-current="page">{{$post->name}}</li>
            </ol>
        </nav>
    </div>
</div>
<section class="blog-home">
    <div class="col-md-12">
        <article class="post-item p-md-5 mt-3">
            <div class="title">
                <a href="#">
                    <h1 class="title-tag"> <img class="ml-1" src="/images/icon/033-feather.png" style="width: 32px"
                            alt=""></i>{{$post->name}}</h1>
                </a>
            </div>
            <header class="entry-header mb-3">
                <div class="post-meta date">
                    <i class="mdi mdi-calendar-month"></i>{{jdate($post->created_at)->format('%A ,%d %B %Y ساعت %H:i
                    دقیقه')}}
                </div>
                <div class="post-meta category">
                    <i class="mdi mdi-folder"></i>
                    @foreach ($post->category as $item)
                    <a href="{{route('catblog',$item->slug)}}">{{$item->name}}</a>,
                    @endforeach

                </div>
                {{-- <div class="post-meta author">
                    <i class="mdi mdi-account-circle-outline"></i>
                    ارسال شده توسط <a href="#"> {{$post->user->nf}} </a>
                </div> --}}

                <div class="post-meta Visit">
                    {{-- <i class="mdi mdi-eye"></i> --}}

                </div>
            </header>
            @if ($post->video)
            <video width="100%" height="auto" controls poster="{{$post->cover}}">
                <source src="{{$post->video}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            @else
            <div class="post-thumbnail">
                <img src="{{$post->images->first()->pic}}" alt="{{$post->name}}">
            </div>
            @endif

            <div class="content-blog">
                {!!$post->fullcontent!!}
            </div>
            <div class="socialNetwork"> اشتراک گذاری :
                <a class="mr-3" target="_blank" rel="nofollow"
                    href="https://www.facebook.com/sharer.php?u={{url()->full()}}">
                    <i class="fa fa-facebook"></i>
                </a>
                <a class="mr-3" target="_blank" rel="nofollow" href="https://telegram.me/share/url?{{url()->full()}}">
                    <i class="fa fa-paper-plane"></i>
                </a>
                <a class="mr-3" target="_blank" rel="nofollow"
                    href="https://www.twitter.com/share?url={{url()->full()}}">
                    <i class="fa fa-twitter"></i>
                </a>
                <a class="mr-3" rel="nofollow" target="_blank"
                    href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->full()}}">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a class="mr-3" rel="nofollow" target="_blank" href="whatsapp://send?text={{url()->full()}}">
                    <i class="fa fa-whatsapp"></i>
                </a>
            </div>
        </article>
        @if ($post->traincat->count())
        <article class="post-item widget card traincat">
      
            <header class="card-header header-product">
                <span class="title-one">ترتیب مطالب  </span>
                <h3 class="card-title">{{$post->traincat->first()->name}} </h3>
            </header>
    
            <ul class="traincatul" class="list-unstyled row">
                @foreach ($post->traincat->first()->posts()->orderBy('tartib','ASC')->get() as $item )
              <li>
                  <span>{{$loop->index+1}}-</span>
                  <a  href="{{route('singleblog',$item->slug)}}" class="d-inline-block"
                    @if (url()->current()==route('singleblog',$item->slug))
                   style="color:red"
                    @endif
                     dideo-checked="true">{{$item->name}}</a>
                </li>
                @endforeach
            </ul>
        </article>  
        @endif
       
    @if ($post->images->count())
    <article class="post-item widget card">
        <header class="card-header header-product">
            <span class="title-one">گالری تصاویر</span>
            <h3 class="card-title"></h3>
        </header>

        <ul id="lightgallery" class="list-unstyled row">
            @foreach ($post->images as $images )
            <li class="col-md-3 mr-1 mb-2" data-src="{{$images->pic}}" data-sub-html="{{$images->name}}">
                <a href="{{$images->pic}}" data-src="{{$images->pic}}" data-sub-html="{{$images->name}}"">
                                    <img class=" img-fluid border rounded mx-auto d-block" src="{{$images->pic}}">
                </a>
            </li>
            @endforeach
        </ul>
    </article>
    @endif
    <article class="post-item widget card">
        <header class="card-header header-product">
            <span class="title-one">آخرین مقالات</span>
            <h3 class="card-title"></h3>
        </header>
        <div class="widget-product card">
            <div class=" widget post-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag post-item">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @foreach ($posts as $item)
                        <div class="owl-item tab-item">
                            <div class="item">
                                <a href="{{route('singleblog',$item->slug)}}" class="d-block hover-img-link">
                                    <img src="{{$item->images->first()->pic}}"" class=" img-fluid" alt="">
                                </a>

                                <h3 class="post-title">
                                    <a href="{{route('singleblog',$item->slug)}}"><i
                                            class="fa fa-laptop text-dark ml-1"></i> {{$item->name}}</a>
                                </h3>
                                <hr>

                                <div class="price pl text-dark">تاریخ انتشار
                                    :{{jdate($item->created_at)->format('%d %B %Y')}}</div>

                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

    </article>
    @if ($post->comment)
    <article class="post-comments">
        <div class="comments-area card widget">
            <header class="card-header header-product">
                <span class="title-one">نظرات کاربران({{$post->comments->where('approved','1')->count()}}
                    نظر)</span>
                <h3 class="card-title"></h3>
            </header>
            <p class="count-comment"></p>
            <ol class="comment-list card">
                @foreach ($post->comments()->where('approved','1')->where('parent_id',0)->latest()->get() as $comment)
                <li class="comment-even">
                    <div class="comment-body">
                        <header class="comment-meta">
                            <div class="comment-author">
                                توسط {{$comment->name}} در
                                {{jdate($comment->created_at)->format('%A ,%d %B %Y ساعت %H:i دقیقه')}}
                            </div>
                        </header>
                        <p>{{$comment->comment}}</p>
                        {{-- <div class="reply text-left">
                            <a href="#" class="comment-reply-link">پاسخ دادن</a>
                        </div> --}}
                    </div>
                    <ol class="comment-list card">
                        @foreach($post->comments()->where('approved','1')->where('parent_id',$comment->id)->latest()->get() as $parents)
                        <li class="comment-reply mr-5">
                            <div class="comment-body">
                                <header class="comment-meta">
                                    <div class="comment-author">
                                        توسط {{$parents->name}} در
                                        {{jdate($parents->created_at)->format('%A ,%d %B %Y ساعت %H:i دقیقه')}}
                                    </div>
                                </header>
                                <p>{{$parents->comment}}</p>
                                {{-- <div class="reply text-left">
                                    <a href="#" class="comment-reply-link">پاسخ دادن</a>
                                </div> --}}
                            </div>
                        </li>

                        @endforeach


                    </ol>
                </li>

                @endforeach


            </ol>
            <form action="{{route('send.comment')}}" method="post">
                @csrf
                <div class="form-comment">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-ui">
                            <div class="row">

                                <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                                <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">
                                <input type="hidden" name="parent_id" value="0">
                                <div class="col-12">
                                    <div class="form-row-title mb-2"> نام شما (اختیاری)</div>
                                    <div class="form-row">
                                        <input class="input-ui pr-2" type="text" @auth value="{{auth()->user()->nf}}"
                                            @endauth name="name" placeholder=" نام خود را بنویسید">
                                    </div>
                                    <div class="form-row-title mb-2">ایمیل شما (اختیاری)</div>
                                    <div class="form-row">
                                        <input class="input-ui pr-2 text-left" dir="ltr" type="text" @auth
                                            value="{{auth()->user()->email}}" @endauth name="email"
                                            placeholder="ایمیل خود را بنویسید">
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-row-title mb-2">متن نظر شما (اجباری)</div>
                                    <div class="form-row">
                                        <textarea class="input-ui pr-2 pt-2" name="comment" rows="5"
                                            placeholder="متن خود را بنویسید" style="height:120px;"></textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="col-12 mt-2 px-0">
                                    <button type="submit" class="btn btn-success">
                                        ثبت نظر
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </article>
    @endif
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