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
                <p> جهت ثبت نام اطلاعات خود را وارد نمایید </p>
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                            <input type="hidden" id="name" class="form-control" value="نام" autofocus  name="name" placeholder="نام خود را وارد نمایید" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                            <input type="hidden" id="family" class="form-control" value="نام خانوادگی" name="family" placeholder="نام خانوادگی خود را وارد نمایید" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                            <input type="mobile" id="mobile" class="form-control ltr" name="mobile" placeholder="شماره موبایل خود را وارد نمایید" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <div class="fxt-checkbox-area">
                                <div class="checkbox">
                                    <input id="checkbox1" name="ghavanin" required type="checkbox">
                                    <label for="checkbox1" class="remember-me mr-0">من به عنوان «کاربر» <a href="/blog/agreement">توافقنامه</a> را به دقت مطالعه کردم و با تمام موارد آن کاملا موافقت می نمایم</label>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <button type="submit" id="id_complete" disabled="disabled" class="fxt-btn-fill">ثبت نام و ارسال کد تایید</button>
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
                       <a href="{{route('login')}}" title="google"><span>ورود </span></a>
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
@section('js-page')
<script>
    $('#checkbox1').click(function () {
  if ($('#checkbox1:checked').length == 1)
    $('#id_complete').removeAttr('disabled');
  else
    $('#id_complete').attr('disabled','disabled');
});
</script>
@endsection
