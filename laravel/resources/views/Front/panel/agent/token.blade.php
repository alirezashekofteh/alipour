@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<div class="container">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                  
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="row post-cat">
                                    
                                    <div class="col-md-6 col-12 mb-3 mt-3">
                                        <form action="{{route('panel.agent.token')}}" method="post">
                                            @csrf
                                        <label for="">کد اعتبار سنجی</label>
                                        <input type="number" min="" name="token" placeholder="کد اعتبار سنجی را وارد نمایید " class="form-control text-left" style="direction: ltr" required>
                                        <button type="submit" class="btn btn-success btn-block mb-3 mt-3">
                                            <span class="text-nowrap">ثبت</span>
                                        </button>
                                    </form>
                                    <form method="post" action="{{route('panel.agent.termsalemobile')}}">
                                        @csrf
                                                <input name="mobile"  type="hidden" value="{{session()->get( 'mobile' )}}">
                                               
                                                <div class="login-meta-data px-4 alert alert-secondary" >
                                                 <p class="mt-3 mb-0" style="font-size: 12px">کد تایید را دریافت نکردید؟<span class="otp-sec ml-1 text-white" id="resendOTP"></span></p>
                                               </div>
                                             </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('Front.panel.layouts.sidebar')
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection