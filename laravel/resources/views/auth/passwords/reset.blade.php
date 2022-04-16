@extends('Front.Layouts.master')
@section('content')
    <section class="container-fluid pt-5 pb-4 pb-lg-0 intro-section">
        <section class="text-center text-white m-3">
            <h5 class="IRANSansWeb_Bold pb-2">ورود به سایت </h5>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div id="login" class="box text-center border-top-0 p-lg-4 p-3">
                    <img src="/Images/Svg/login.svg" style="width:45px" />
                    <p class="text-dark my-3">جهت ثبت نام اطلاعات خود را وارد نمایید</p>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror ltr text-left" placeholder="ایمیل خود را وارد نمایید" name="email"  value="{{ $email ?? old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror ltr text-left" placeholder="رمز عبور خود را وارد نمایید" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password-confirm" type="password" class="form-control ltr text-left" name="password_confirmation" placeholder="رمز عبور خود را تکرار کنید" required autocomplete="new-password">
                    <button class="btn btn-danger btn-block mb-3 py-3" type="submit">ریست رمز عبور<i class="fa fa-chevron-left mr-2"></i></button>
                </div>
            </form>
        </section>
        <object class="d-none d-xl-block" type="image/svg+xml" data="/Images/Svg/desktop-wave.svg"></object>

    </section>
@endsection
