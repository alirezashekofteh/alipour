@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<!-- adplacement------------------------------->
<div class="container mt-5">
    <div class="row">

        <div id="rezederakhshi-realtime-widget"></div>
        <div id="rezaderakhshi-realtime-chart" class="col-md-2">
            @foreach ($arzes as $item)
            <div class="technical-chart">
                <a title="{{$item->name}}" href="{{route('arzedigital',$item->name_en)}}"
                    @if (url()->current()==route('arzedigital',$item->name_en))
                    style="background: black;color: chartreuse;"
                    @endif >
                    <span>{{$item->name_en}}</span> </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('Front.Layouts.footermenu')
@endsection
@section('js-page')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script language="javascript" src="https://s3.tradingview.com/tv.js"></script>
<script>
    options = {
            "symbol": "binance:{{$real->symbol}}",
            "autosize": true,
            "timezone": "Asia/Tehran",
            "theme": "{{$real->theme}}",
            "style": "1",
            "locale": "{{$real->locale}}",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "withdateranges": true,
            "hide_side_toolbar": false,
            "hide_legend": false,
            "range": "ytd",
            "allow_symbol_change": true,
            "container_id": "rezederakhshi-realtime-widget",
            "studies": [
                "RSI@tv-basicstudies"
            ],
        };
    var tradingview = new TradingView.widget(options);
  


</script>

@endsection