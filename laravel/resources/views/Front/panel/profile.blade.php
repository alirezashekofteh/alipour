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
                <div class="profile-content">
                    <div class="profile-stats">
                        <div class="profile-address">
                            <div class="middle-container">
                                <form action="{{route('panel.profile')}}" method="POST" class="form-checkout">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-checkout-row">
                                        <label for="namefirst">نام <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                        <input type="text" id="namefirst" name="name" value="{{old('name',Auth::user()->name)}}" class="input-namefirst-checkout form-control">

                                        <label for="namelast">نام خانوادگی <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                        <input type="text" id="namelast" name="family" value="{{old('family',Auth::user()->family)}}" class="input-namelast-checkout form-control">

                                        <label for="email">ایمیل <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                        <input type="text" name="email"  value="{{old('email',Auth::user()->email)}}" id="email" class="input-email-checkout form-control">

                                        <label for="password">تلفن همراه <abbr class="required" title="ضروری" style="color:red;">*</abbr></label>
                                        <input type="text" name="mobile" readonly value="{{old('mobile',Auth::user()->mobile)}}" id="password" class="input-password-checkout form-control">
                                        <div class="AR-CR">
                                            <button class="btn-registrar" type="submit"> ثبت تغییرات </button>
                                            <a href="#" class="cancel-edit-address" data-dismiss="modal" aria-label="Close">بازگشت</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection
