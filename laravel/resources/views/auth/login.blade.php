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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <p> وارد اکانت خود شوید </p>
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                            <input type="mobile" id="mobile" class="form-control ltr" autofocus style="direction: ltr;" name="mobile" placeholder="شماره موبایل خود را وارد نمایید" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <div class="fxt-checkbox-area">
                                <div class="checkbox">
                                    <input id="checkbox1" name="remember" type="checkbox" checked>
                                    <label for="checkbox1">مرا به خاطر بسپار </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <button type="submit" class="fxt-btn-fill">ارسال کد تایید</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="fxt-style-line">
                <div class="fxt-transformY-50 fxt-transition-delay-5">
                    <h3>رفتن به صفحه</h3>
                </div>
            </div>

            <ul class="fxt-socials">
                <li class="fxt-google">
                    <div class="fxt-transformY-50 fxt-transition-delay-6">
                       <a href="{{ route('register') }}" title="google"><span>ثبت نام</span></a>
                    </div>
                </li>
                <li class="fxt-twitter"><div class="fxt-transformY-50 fxt-transition-delay-7">
                    <a href="/" title="twitter"><span>صفحه اصلی</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection
