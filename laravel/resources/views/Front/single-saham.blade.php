<!-- arshive-product----------------------->
@extends('Front.Layouts.master')
@section('title' , 'وبلاگ')
@section('css-page')
<link href="/assets/css/vendor/lightgallery.css" rel="stylesheet">
@endsection
@section('content')

<div class="container-main">
    <div class="d-block">
        <div class="page-content page-row">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="tabs">
                <div class="tab-box">
                    <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Review-tab" data-toggle="tab" href="#Review" role="tab" aria-controls="Review" aria-selected="true">
                                <i class="mdi mdi-glasses"></i>
                               تحلیل سهام
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Specifications-tab" data-toggle="tab" href="#Specifications" role="tab" aria-controls="Specifications" aria-selected="false">
                                <i class="mdi mdi-format-list-checks"></i>
                                تصاویر
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="User-comments-tab" data-toggle="tab" href="#User-comments" role="tab" aria-controls="User-comments" aria-selected="false">
                                <i class="mdi mdi-comment-text-multiple-outline"></i>
                               ویدئو
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="question-and-answer-tab" data-toggle="tab" href="#question-and-answer" role="tab" aria-controls="question-and-answer" aria-selected="false">
                                <i class="mdi mdi-comment-question-outline"></i>
                              نظرات
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg">
                    <div class="tabs-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Review" role="tabpanel" aria-labelledby="Review-tab">
                                <h2 class="params-headline">{{$sahm->name}}</h2>
                                <section class="content-expert-summary">
                                    <div class="mask pm-3">
                                        <div class="mask-text">
        {!!$sahm->content!!}
                                        </div>

                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="Specifications" role="tabpanel" aria-labelledby="Specifications-tab">
                                <article>
                                    <h2 class="params-headline">تصاویر

                                    </h2>
                                    <section>
                                        <ul id="lightgallery" class="list-unstyled row">
                                            @foreach ($sahm->images as $images )
                                            <li class="col-xs-6 col-sm-4 col-md-3" data-src="{{$images->pic}}" data-sub-html="{{$images->name}}">
                                                <a href="">
                                                    <img class="img-fluid rounded mx-auto d-block" src="{{$images->pic}}">
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </section>
                                </article>
                            </div>
                            <div class="tab-pane fade" id="User-comments" role="tabpanel" aria-labelledby="User-comments-tab">
                                <div class="comments">
                                    <h2 class="params-headline">ویدئو
                                        <span>{{$sahm->name}}</span>
                                    </h2>
                                    <div class="comments-summary">

                                        <video width="100%" height="auto" controls>
                                            <source src="{{$sahm->video}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="question-and-answer" role="tabpanel" aria-labelledby="question-and-answer-tab">
                                <div class="faq">
                                    @if ($sahm->comment)
                                    <article class="post-comments">
                                        <div class="comments-area card widget">
                                            <header class="card-header header-product">
                                                <span class="title-one">نظرات کاربران({{$sahm->comments->where('approved','1')->count()}}
                                                    نظر)</span>
                                                <h3 class="card-title"></h3>
                                            </header>
                                            <p class="count-comment"></p>
                                            <ol class="comment-list card">
                                                @foreach ($sahm->comments()->where('approved','1')->latest()->get() as $comment)
                                                <li class="comment-even">
                                                    <div class="comment-body">
                                                        <header class="comment-meta">
                                                            <div class="comment-author">
                                                                <img src="{{$comment->user->pic}}" class="avator">
                                                                توسط {{$comment->user->nf}} در
                                                                {{jdate($comment->created_at)->format('%A ,%d %B %Y ساعت  %H:i دقیقه')}}
                                                            </div>
                                                        </header>
                                                        <p>{{$comment->comment}}</p>
                                                        {{-- <div class="reply text-left">
                                                                    <a href="#" class="comment-reply-link">پاسخ دادن</a>
                                                                </div> --}}
                                                    </div>
                                                </li>

                                                @endforeach


                                            </ol>
                                            <form action="{{route('send.comment')}}" method="post">
                                                @csrf
                                                <div class="form-comment">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-ui">
                                                            <div class="row">

                                                                <input type="hidden" name="commentable_id" value="{{ $sahm->id }}">
                                                                <input type="hidden" name="commentable_type" value="{{ get_class($sahm) }}">
                                                                <input type="hidden" name="parent_id" value="0">
                                                                <div class="col-12">
                                                                    <div class="form-row-title mb-2"> نام شما</div>
                                                                    <div class="form-row">
                                                                        <input class="input-ui pr-2" type="text"
                        @auth
                        value="{{auth()->user()->nf}}"
                        @endauth name="name" placeholder=" نام خود را بنویسید">
                                                                    </div>
                                                                    <div class="form-row-title mb-2">ایمیل شما</div>
                                                                    <div class="form-row">
                                                                        <input class="input-ui pr-2 text-left" dir="ltr" type="text"
                                                                        @auth
                                                                        value="{{auth()->user()->email}}"
                                                                        @endauth name="email" placeholder="ایمیل خود را بنویسید">
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
                                                                    <button type="submit" class="btn comment-submit-button">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- arshive-product----------------------->
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
