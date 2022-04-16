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
                                        <h3 class="invoice-to">افزودن دسته بندی جدید</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.category.update',$category->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">عنوان دسته بندی</h6>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="عنوان دسته بندی" value="{{old('name',$category->name)}}">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">لینک دسته بندی</h6>
                                                <input type="text" class="form-control" name="slug"
                                                    placeholder="لینک دسته بندی" value="{{old('slug',$category->slug)}}">
                                            </div>
                                            <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                                <h6 class="invoice-to">زیر مجموعه گروه</h6>
                                                <select class="form-control select2" name="parent">
                                                    <option value="0">شاخه اصلی</option>
                                                    @foreach (\App\Models\Category::where('parent','0')->where('type','post')->get() as $item)
                                                    <option value="{{ $item->id }}" {{ $category->parent==$item->id  ? 'selected' : '' }}>{{ $item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                                <h6 class="invoice-to">محتوا صفحه</h6>
                                                <textarea class="form-control rtl" id="editor1"
                                                    name="content">{{$category->content}}</textarea>
                                            </div>

                                        </div>
                                        <hr>

                                        <div class="row invoice-info">

                                            <div class="col-lg-12 col-md-12 mt-25">
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label"
                                                            class="form-control image_label ltr" value="{{old('pic',$category->pic)}}" name="pic"
                                                            aria-label="File" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button"
                                                                id="button-file">انتخاب تصویر شاخص</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 col-md-12 mt-25">
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label"
                                                            class="form-control image_label ltr" name="picslide" value="{{old('picslide',$category->picslide)}}"
                                                            aria-label="File" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button"
                                                                id="button-file">انتخاب اسلاید</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- invoice action  -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card invoice-action-wrapper shadow-none border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال کردن این گزینه این دسته بندی در اسلایدر وبلاگ نمایش داده می شود" data-trigger="hover" data-placement="right"></i> نمایش در اسلایدر وبلاگ </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input"
                                        @if ($category->vip)
                                        checked=""
                                        @endif name="vip" id="paymentTerm1">
                                        <label class="custom-control-label" for="paymentTerm1">
                                        </label>
                                    </div>
                                </div>
                                <div class="alert alert-info">تنظیمات سئو</div>
                                <h6 class="text-info">عنوان مرورگر</h6>
                                <textarea name="title" id="" class="form-control">{{old('title',$category->title)}}</textarea>
                                <h6 class="text-info">توضیحات سئو</h6>
                                <textarea name="description" id="txtmsg" class="form-control">{{old('description',$category->description)}}</textarea>
                                <span class='char' id="char" style="color: rgb(255, 255, 255);"></span>
                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a href="{{route('admin.category.index')}}" class="btn btn-light-warning btn-block">
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
