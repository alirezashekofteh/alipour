@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<!-- adplacement------------------------------->
<div class="container">
    <h4 class="thead">با ما در ارتباط باشید </h4>
    <p class="des">ما پیام های شما را می خوانیم </p>

    <section class="blog-home">
        <div class="">
            <div class="col-md-12">
                <article class="post-item p-md-5 mt-3">
                    <div class="alert alert-info">
                        کاربر گرامی
                        لطفا نظر خود را در قالب یک ویدیو کوتاه در تلگرام به این آی دی  @bourse_invest_support  و با به شماره تلگرام 09908608023 ارسال کنید                    </div>
                        <div class="alert alert-info">
                           شماره تماس تهران :02128111330                  </div>
                        <div class="alert alert-warning">
                            لینک تلگرام   :   <a href="https://t.me/bourse_invest_support">https://t.me/bourse_invest_support</a>
                                      </div>
                    <form id="contactForm" novalidate="true">
                        <div class="">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required=""
                                        data-error="لطفا نام خود را وارد کنید" placeholder="نام شما">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required=""
                                        data-error="ایمیل خود را وارد کنید" placeholder="ایمیل شما">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" id="phone_number" required=""
                                        data-error="تلفن خود را وارد کنید" class="form-control" placeholder="تلفن">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                        required="" data-error="موضوع پیام خود را بنویسید" placeholder="موضوع شما">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5"
                                        required="" data-error="پیام خود را وارد کنید"
                                        placeholder="پیام شما"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn btn-warning">ارسال پیام</button>

                            </div>
                        </div>
                    </form>
                </article>

            </div>
        </div>
    </section>
</div>
@include('Front.Layouts.footermenu')
@endsection
