@extends('Admin.Layouts.master')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- app invoice View Page -->
            <section class="invoice-edit-wrapper">
                <div class="row">
                    <!-- invoice view page -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body pb-0 mx-25">
                                    <!-- header section -->
                                    <div class="row mx-0">
                                        <h3 class="invoice-to">افزودن ارز دیجیتال</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.arzedigital.update',$arzedigital)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">نام ارز دیجیتال</h6>
                                                <input type="text" name="name" class="form-control "
                                                    value="{{old('name',$arzedigital->name)}}">
                                            </div>

                                        </div>
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">نام انگلیسی ارز دیجیتال</h6>
                                                <input type="text" name="name_en"
                                                    value="{{old('name_en',$arzedigital->name_en)}}"
                                                    class="form-control ltr">
                                            </div>

                                        </div>
                                      
                                        <div class="alert alert-info">
                                            تنظیمات نمودار زنده
                                        </div>
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">علامت اختصاری</h6>
                                                <input type="text" name="symbol"  value="{{old('symbol',$real->symbol)}}" class="form-control ltr">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">تم رنگ (light,dark)</h6>
                                                <input type="text" name="theme" value="{{old('theme',$real->theme)}}" class="form-control ltr">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">زبان نمودار (en,fa_IR)</h6>
                                                <input type="text" name="locale" value="{{old('locale',$real->locale)}}" class="form-control ltr">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">اجازه تغییر رمز ارز در نمودار(0,1)</h6>
                                                <input type="text" value="{{old('allow_symbol_change',$real->allow_symbol_change)}}" name="allow_symbol_change" class="form-control ltr">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">مخفی کردن تولبار کناری(0,1)</h6>
                                                <input type="text" name="hide_side_tollbar" value="{{old('hide_side_tollbar',$real->hide_side_tollbar)}}" class="form-control ltr">
                                            </div>

                                        </div>
                                        <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- invoice action  -->
                        <div class="col-xl-3 col-md-4 col-12">
                            <div class="card invoice-action-wrapper shadow-none border">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between py-50">
                                        <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning"
                                                data-toggle="popover"
                                                data-content="با فعال سازی این ارز دیجیتال تمام تحلیل های ارز دیجیتال در سایت نمایش داده میشود"
                                                data-trigger="hover" data-placement="right"></i> فعال بودن ارز
                                            دیجیتال</span>
                                        <div class="custom-control custom-switch custom-switch-glow">
                                            <input type="checkbox" class="custom-control-input" name="active" 
                                            @if($arzedigital->active)
                                            checked=""
                                            @endif id="paymentTerm">
                                            <label class="custom-control-label" for="paymentTerm">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="invoice-action-btn mb-1 d-flex">
                                        <div class="w-50 mr-50">
                                            <button type="submit" class="btn btn-light-info btn-block">
                                                <span class="text-nowrap">ذخیره</span>
                                            </button>
                                        </div>
                                        <div class="w-50">
                                            <a href="{{route('admin.arzedigital.index')}}"
                                                class="btn btn-light-warning btn-block">
                                                <span class="text-nowrap">بازگشت</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
@section('js-page')
<script src="/admins/assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
<script src="/admins/assets/js/scripts/pages/app-invoice.js"></script>
<script src="/admins/assets/ckeditor/ckeditor.js"></script>
<script>
    var image;
            $('body').on('click','.button-image' , (event) => {
                event.preventDefault();

                image = $(event.target).closest('.form-group');

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });

            // set file link
            function fmSetLink($url) {
                image.find('.image_label').first().val($url);
            }
            CKEDITOR.replace('editor1', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>
<script>
    $(document).ready(function(){
    $("#txtmsg").keyup(function(){
        var cha = $("#txtmsg").val().length;
        $(".char").html(cha); 
    });
    $("#txtmsg").keyup();
});  
</script>
@endsection