@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('css-page')
<link type="text/css" href="/assets/buttom/css/ionicons.min.css" rel="stylesheet" />
<link type="text/css" href="/assets/buttom/css/style.css" rel="stylesheet" />
<link type="text/css" href="/land3/css/flipclock.css" rel="stylesheet" />
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
                <li class="breadcrumb-item active open" aria-current="page"></li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 col-xs-12  offset-md-2">
                <div class="post-item">
                    @foreach ($term->termcats->first()->videos as $item )
                    <div class="alert alert-info">{{$item->title}}</div>
                    <div class="col-12 text-justify">
                        <script src="https://stream.rezaderakhshi.com/{{$item->kavimo}}/embed"></script>
                    </div>
                    <br>
                    @endforeach




                </div>

            </div>
        </div>
        <div class="col-md-8 col-xs-12  offset-md-2 mb-2">
            <div class="col-md-8 offset-md-2">
                <div class="clock details-clock" data-countdown="{{$diff}}"></div>
            </div>
            <div class="text-center post-item">
                
                <div class="col-12">
                    <div class="red-border"><del class="text-danger">{{number_format($term->Orginalprice())}}
                            <small>تومان</small></del></div>
                </div>
                <div class="col-12">
                    <div class="text-dark" style="font-size: 2rem">
                        <div>{{number_format($term->Orginalprice()- $term->off)}} <small>تومان</small></div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-md-8 col-xs-12  offset-md-2 mb-4">
            <button class="snip0040 green btn-block btn col-md-12 pr"><span><a href="{{$term->linkkharid}}"
                        class="text-white">خرید دوره</a></span><i class="ion-ios-cart"></i></button>
            </button>
        </div>
        <div class="col-md-12 mb-4">
            <div class="col-md-8 col-xs-12  offset-md-2">
                <div class="post-item">

                    {!!$term->content_buttom!!}

                </div>
                <button class="snip0040 green btn-block btn col-md-12 pr"><span><a href="{{$term->linkkharid}}"
                            class="text-white">خرید دوره</a></span><i class="ion-ios-cart"></i></button>
                </button>


            </div>
        </div>
    </div>
</div>
@endsection
@section('js-page')
<script src="/land3/js/jquery.min.js "></script>
<script src="/land3/js/flipclock.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var clocks = [];
    $(".clock").each(function() {
        var clock = $(this);

        clock.FlipClock(clock.data("countdown"), {
            clockFace: "DailyCounter",
            language: "Persian",
            countdown: true
        });
        clocks.push(clock);
    });		//Start countdown
    });
</script>
@endsection