@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<div class="container">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('Front.panel.layouts.sidebar')
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="alert alert-success">اطلاع رسانی کانال در صورت بروزرسانی بوسیله پیامک</div>
                        <form action="{{route('panel.setting')}}" method="post">
                            @csrf
                            @foreach ($channels as $item)
                            <?php
$mem=auth()->user()->Channels()->where('channel_id', $item->id)->where('expire_at', '>', Carbon\Carbon::now());
                                        ?>
                            @if (!!$mem->count())
                            <?php
$s=$mem->first();
                            ?>
                             <div class="row">
                            <div class="col-md-4">
                                {{$item->name}}
                            </div>
                            <div class="col-md-8">
                                  <select name="notifacation[{{$s->pivot->id}}]"  class="form-control">
                                      <option value="0" @if ($s->pivot->notifacation==0)
                                          selected=""
                                      @endif>خیر</option>
                                      <option value="1" @if ($s->pivot->notifacation==1)
                                        selected=""
                                    @endif >بله</option>
                                  </select>
                            </div>
                        </div>
                            @endif
                            <hr>
                            @endforeach
                            <button class="btn btn-info" type="submit"> ثبت تغییرات </button>
                        </form>


                            
                       

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection