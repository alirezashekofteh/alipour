@extends('Front.Layouts.master')
@section('content')
    <section class="container-fluid pt-5 pb-4 pb-lg-0 intro-section">
        <section class="text-center text-white m-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h5 class="IRANSansWeb_Bold pb-2">بازیابی کلمه عبور</h5>
                <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div id="login" class="box text-center border-top-0 p-lg-4 p-3">
                    <img src="/Images/Svg/login.svg" style="width:45px" />
                    <p class="text-dark my-3">ایمیل خود را جهت بازیابی رمز عبور وارد نمایید</p>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror ltr text-left" placeholder="ایمیل خود را وارد نمایید" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-primary">
                        {{ __('ارسال لینک بازیابی') }}
                    </button>
                </div>
            </form>
        </section>
        <object class="d-none d-xl-block" type="image/svg+xml" data="/Images/Svg/desktop-wave.svg"></object>
    </section>
@endsection
