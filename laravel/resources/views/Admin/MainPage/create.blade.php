@extends('Admin.Layouts.master')
@section('css-page')
<link rel="stylesheet" type="text/css" href="/admins/assets/vendors/css/forms/select/select2.min.css">
@endsection
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
                                        <h3 class="invoice-to">ویرایش اطلاعات صفحه اصلی</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.mainpage.index')}}" method="post">
                                        @csrf
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">انتخاب تصویر کنار اسلایدشو برای کامپیوتر</h6>
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label" class="form-control image_label ltr" value="{{old('picdesk',$mainpage->picdesk)}}" name="picdesk"
                                                               aria-label="File" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                        </div>
                                        <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">انتخاب تصویر کنار اسلادیشو برای موبایل</h6>
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label" class="form-control image_label ltr" value="{{old('picmobile',$mainpage->picmobile)}}" name="picmobile"
                                                               aria-label="File" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                        </div>
                                        <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">تصویر بنر زیر دوره ها</h6>
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label" class="form-control image_label ltr" value="{{old('banner1',$mainpage->banner1)}}" name="banner1"
                                                               aria-label="File" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                        </div>
                                        <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">تصویر بنر زیر تحلیل سهم ها</h6>
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label" class="form-control image_label ltr" value="{{old('banner2',$mainpage->banner2)}}" name="banner2"
                                                               aria-label="File" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                        </div>

                                        <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">متن سئو صفحه اصلی</h6>
                                            <textarea  class="form-control rtl" id="editor1" name="seotext">{{old('seotext',$mainpage->seotext)}}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">متن سئو صفحه وبلاگ</h6>
                                            <textarea  class="form-control rtl" id="editor2" name="blogtext">{{old('blogtext',$mainpage->blogtext)}}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">عنوان وب سایت</h6>
                                            <textarea  class="form-control rtl" id="editor1" name="title">{{old('title',$mainpage->title)}}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">توضیحات وب سایت</h6>
                                            <textarea  class="form-control rtl" id="editor2" name="description">{{old('description',$mainpage->description)}}</textarea>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- invoice action  -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card invoice-action-wrapper shadow-none border">
                            <div class="card-body">
                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a href="{{route('admin.post.index')}}" class="btn btn-light-warning btn-block">
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
<script src="/admins/assets/vendors/js/forms/select/select2.min.js"></script>
<script src="/admins/assets/js/scripts/forms/select/form-select2.js"></script>
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
            CKEDITOR.replace('editor2', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>
@endsection
