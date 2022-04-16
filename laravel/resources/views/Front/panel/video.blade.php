@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<div class="container">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    <div class="col-lg-9 col-md-9 col-xs-12 pr">
                        <div class="profile-content">
                            <div class="alert alert-info">{{$video->title}}</div>
                            <div class="col-12">
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
                            <div class="col-12 ">
                                <a class="btn btn-danger mt-3 mb-3"
                                    href="{{route('panel.order',$video->term->slug)}}">بازگشت به لیست</a>
                            </div>
                            <div class="row">
                                @if ($previous)
                                <div class="col-md-6 col-12 mt-3">
                                    <a class="btn btn-sm btn-success btn-block"
                                        href="{{route('panel.course.video',[$video->term->slug,$previous->part])}}"
                                        class="prev-post">
                                        <span class="arrow flaticon-left-arrow-1"></span>
                                        قبلی
                                        <br>
                                        (({{$previous->title}}))
                                    </a>
                                </div>
                                @endif

                                @if ($next)
                                <div class="col-md-6 col-12 mt-3">
                                    <a class="btn btn-sm btn-success btn-block"
                                        href="{{route('panel.course.video',[$video->term->slug,$next->part])}}"
                                        class="next-post">
                                        <span class="arrow flaticon-right-arrow-1"></span>

                                        بعدی
                                        <br>
                                        (({{$next->title}}))
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="blog-home">
                            <article class="post-comments">
                                <div class="comments-area card widget">
                                    <header class="card-header header-product">
                                        <span class="title-one">نظرات
                                            کاربران({{$video->comments->where('approved','1')->count()}}
                                            نظر)</span>
                                        <h3 class="card-title"></h3>
                                    </header>
                                    <p class="count-comment"></p>
                                    @auth
                                    <form action="{{route('send.comment')}}" method="post">
                                        @csrf
                                        <div class="form-comment">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-ui">
                                                    <div class="row">

                                                        <input type="hidden" name="commentable_id"
                                                            value="{{ $video->id }}">
                                                        <input type="hidden" name="commentable_type"
                                                            value="{{ get_class($video) }}">
                                                        <input type="hidden" name="parent_id" value="0">

                                                        <div class="col-12 mt-2">
                                                            <div class="form-row-title mb-2">متن نظر شما (اجباری)</div>
                                                            <div class="form-row">
                                                                <textarea class="input-ui pr-2 pt-2" name="comment"
                                                                    rows="5" placeholder="متن خود را بنویسید"
                                                                    style="height:120px;"></textarea>
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
                                    @endauth
                                    @guest
                                    <div class="alert alert-warning">برای ثبت نظر لطفا وارد سایت شوید.</div>
                                    @endguest
                                    <ol class="comment-list card">
                                        @foreach ($video->comments()->where('approved','1')->latest()->get() as
                                        $comment)
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

                                </div>

                            </article>
                        </div>

                    </div>
                    @include('Front.panel.layouts.list-order')
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection
