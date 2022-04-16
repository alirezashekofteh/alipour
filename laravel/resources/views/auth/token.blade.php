@extends('auth.Layouts.app')
@section('title','رضا درخشی')
@section('content')
<section class="fxt-template-animation fxt-template-layout23" data-bg-image="/images/11.jpg">
    <div class="fxt-bg-overlay" data-bg-image="/logins/img/elements/overlay.png">
        <div class="fxt-content">
            <div class="fxt-header">
                <a href="/" class="fxt-logo"><img src="/images/logo/logo.png" alt="Logo"></a>
            </div>
            <div class="fxt-form">
                <p> کد پیامک شده را وارد نمایید </p>
                <form method="POST" action="{{route('auth.mobile.token')}}">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                            <input type="text" id="mobile" class="form-control ltr" autofocus style="direction: ltr;" name="token" placeholder="کد پیامک شده را وارد نمایید" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <button type="submit" class="fxt-btn-fill">ورود</button>
                        </div>
                    </form>
                        <form method="post" action="{{route('login')}}">
                    @csrf
                            <input name="mobile"  type="hidden" value="{{session()->get( 'mobile' )}}">
                           
                           <div class="login-meta-data px-4">
                             <p class="mt-3 mb-0" style="font-size: 12px">کد تایید را دریافت نکردید؟<span class="otp-sec ml-1 text-white" id="resendOTP"></span></p>
                           </div>
                         </form>
                    </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
