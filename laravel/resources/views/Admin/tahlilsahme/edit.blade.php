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
                                        <h3 class="invoice-to">ویرایش تحلیل</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form role="form" action="{{ route('admin.saham.tahlilsahme.update',[$saham,$tahlilsahme])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-4 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام تحلیل </h6>
                                            <input type="text" name="name" value="{{old('name',$tahlilsahme->name)}}" class="form-control" placeholder="نام و عنوان تحلیل">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                            <textarea  class="form-control rtl" id="editor1" name="content">
                                                {{old('content',$tahlilsahme->content)}}
                                            </textarea>

                                    </div><!-- /.form-group -->
                                    <div class="col-lg-12 col-md-12 mt-25">
                                        <fieldset class="invoice-address form-group">
                                            <div class="input-group col-sm-12" style="height: 35px">
                                                <input type="text" id="file_label"  value="{{old('video',$tahlilsahme->video)}}" class="form-control image_label ltr" name="video"
                                                       aria-label="File" aria-describedby="button-file">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب ویدئو</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="row alert alert-info">
                                       گالری تصاویر
                                    </div>
                                    <div class="invoice-product-details ">
                                        <div class="form invoice-item-repeater">
                                          <div data-repeater-list="groupa">
                                              @forelse ($images as $item)
                                              <div data-repeater-item>
                                                <div class="row mb-50">
                                                  <div class="col-3 invoice-item-title">نام تصویر </div>
                                                  <div class="col-8 invoice-item-title">تصویر</div>
                                                </div>
                                                <div class="invoice-item d-flex border rounded mb-1">
                                                    <div class="col-md-3 col-12 form-group">
                                                      <input type="text" name="names" value="{{$item->name}}" class="form-control" placeholder="عنوان">
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group">
                                                      <fieldset class="invoice-address form-group">
                                                          <div class="input-group col-sm-12" style="height: 35px">
                                                              <input type="text" id="file_label" class="form-control image_label ltr" value="{{$item->pic}}" name="pic"
                                                                     aria-label="File" aria-describedby="button-file">
                                                              <div class="input-group-append">
                                                                  <button class="btn btn-info button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                              </div>
                                                          </div>
                                                      </fieldset>
                                                    </div>
                                                  <div class="col-md-1 col-12 form-group">
                                                    <span class="cursor-pointer" data-repeater-delete>
                                                      <i class="bx bxs-x-square font-large-1 text-danger"></i>
                                                    </span>
                                                  </div>
                                                </div>
                                              </div>
                                              @empty
                                              <div data-repeater-item>
                                                <div class="row mb-50">
                                                  <div class="col-3 invoice-item-title">نام تصویر </div>
                                                  <div class="col-8 invoice-item-title">تصویر</div>
                                                </div>
                                                <div class="invoice-item d-flex border rounded mb-1">
                                                    <div class="col-md-3 col-12 form-group">
                                                      <input type="text" name="names" class="form-control" placeholder="عنوان">
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group">
                                                      <fieldset class="invoice-address form-group">
                                                          <div class="input-group col-sm-12" style="height: 35px">
                                                              <input type="text" id="file_label" class="form-control image_label ltr" name="pic"
                                                                     aria-label="File" aria-describedby="button-file">
                                                              <div class="input-group-append">
                                                                  <button class="btn btn-info button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                              </div>
                                                          </div>
                                                      </fieldset>
                                                    </div>
                                                  <div class="col-md-1 col-12 form-group">
                                                    <span class="cursor-pointer" data-repeater-delete>
                                                      <i class="bx bxs-x-square font-large-1 text-danger"></i>
                                                    </span>
                                                  </div>
                                                </div>
                                              </div>
                                              @endforelse

                                          </div>
                                          <div class="form-group">
                                            <div class="col p-0">
                                              <button class="btn btn-light-primary btn-sm" data-repeater-create type="button">
                                                <i class="bx bx-plus"></i>
                                                <span class="invoice-repeat-btn">افزودن گالری تصویر</span>
                                              </button>
                                            </div>
                                          </div>
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
                                <select class="form-control" name="type">
                                    @foreach(config('value.subscription') as $key => $name)
                        <option value="{{ $key }}" {{ old('type') == $key || $tahlilsahme->type==$key  ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                                </select>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="" data-trigger="hover" data-placement="right"></i> فعال بودن تحلیل </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input"  @if ($tahlilsahme->active)
                                        checked=""
                                        @endif name="active" id="paymentTerm">
                                        <label class="custom-control-label" for="paymentTerm">
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="" data-trigger="hover" data-placement="right"></i> فعال بودن نظرات </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input"
                                        @if ($tahlilsahme->comment)
                                        checked=""
                                        @endif name="comment" id="paymentTerm1">
                                        <label class="custom-control-label" for="paymentTerm1">
                                        </label>
                                    </div>
                                </div>
                                <div class="alert alert-info">تنظیمات سئو</div>
                                <h6 class="text-info">عنوان مرورگر</h6>
                                <textarea name="title" id="" class="form-control">{{old('title',$tahlilsahme->title)}}</textarea>
                                <h6 class="text-info">توضیحات سئو</h6>
                                <textarea name="description" id="txtmsg" class="form-control">{{old('description',$tahlilsahme->description)}}</textarea>
                                <span class='char' id="char" style="color: rgb(255, 255, 255);"></span>


                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a  href="{{route('admin.saham.tahlilsahme.index',$saham)}}" class="btn btn-light-warning btn-block">
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
