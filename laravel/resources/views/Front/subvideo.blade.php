<div class="col-lg">
    <div class="tabs-content">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade @if ($tab=='content')active show @endif" id="Review" role="tabpanel"
                aria-labelledby="Review-tab">
                <section class="content-expert-summary">
                    <div class="content-blog mt-3">
                        <p> {!!$term->content_buttom!!}</p>
                    </div>
                </section>


            </div>
            <div class="tab-pane fade @if ($tab=='video') active show @endif" id="Specifications" role="tabpanel"
                aria-labelledby="Specifications-tab">
                <article>
                    <h2 class="params-headline">ویدئو های دوره

                    </h2>
                    <section>
                        <ul class="courses-lessons">
                            @foreach ($term->termcats as $item)
                            <a>
                                <li class="single-lessons-title" data-url="#">
                                    <div class="lessons-title ">{{$item->name}}</div>
                                </li>
                            </a>

                            @foreach ($item->videos as $item1)

                            <li class="single-lessons" data-url="{{route('course.video',[$term,$item1])}}">
                                <div class="d-md-flex d-lg-flex align-items-center">
                                    <span class="number">{{$loop->iteration	}}</span>
                                    <a href="{{route('course.video',[$term,$item1])}}" data-type="video" data-url=""
                                        class="lessons-title play_rayan"
                                        dideo-checked="true">{{$item1->title}}</a>
                                </div>

                                <div class="lessons-info">
                                   @if($item1->free)
                                   <span class="duration text-danger"><i
                                    class="fa fa-info-circle"></i>نیازبه خرید</span>
                                   @else
                                   <span class="duration text-success"><i
                                    class="fa fa-info-circle"></i>اریگان</span>
                                   @endif
                                    <span class="duration"><i class="fa fa-time"></i>{{$item1->time_video}}</span>
                                    <a href="{{route('course.video',[$term,$item1])}}"
                                        class="attrachment-video duration "><i
                                            class="fa fa-play-circle"></i> مشاهده</a>
                                </div>
                            </li>
                            @endforeach

                            @endforeach
                        </ul>
                    </section>

                </article>
            </div>
            <div class="tab-pane fade" id="User-comments" role="tabpanel"
                aria-labelledby="User-comments-tab">
                <div class="comments">
                    <h2 class="params-headline">نظرات کاربران

                    </h2>
                    <div class="comments-summary">

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="question-and-answer" role="tabpanel"
                aria-labelledby="question-and-answer-tab">
                <div class="faq">
                    <h2 class="params-headline">پرسش و پاسخ

                    </h2>
                    @if($term->questions->count()>1)
                    <article class="post-item widget card p-md-5 mt-3 tabs">
                        <header class="card-header header-product">
                            <span class="title-one">سوالات متداول</span>
                            <h3 class="card-title"></h3>
                        </header>
                        <div id="container">
                            <!-- start accordion -->
                            <ul class="accordion">
                                @foreach ($term->questions as $item)
                                <li class="first">
                                    <span class="termcat"><i class="fa fa-laptop text-dark ml-1"></i>
                                        {{$item->name}}</span>
                                    <p>
                                        {{$item->value}}
                                    </p>
                                </li>
                                @endforeach
                            </ul>
                            <!-- end accordion -->
                        </div>
                    </article>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>