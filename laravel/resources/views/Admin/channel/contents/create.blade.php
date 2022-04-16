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
                                        <h3 class="invoice-to">افزودن محتوا</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form role="form" action="{{ route('admin.channel.content.index',$channel)}}"
                                        method="POST">
                                        @csrf
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">نام محتوا</h6>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="نام محتوا">
                                                    <input type="hidden" name="parent" value="{{$parent}}" class="form-control"
                                                    placeholder="نام محتوا">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">نوع محتوا</h6>
                                                <select class="form-control" name="type">
                                                    @foreach(config('value.typefile') as $key => $name)
                                                    <option value="{{ $key }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control rtl" id="editor1" name="content"></textarea>
                                        </div><!-- /.form-group -->

                                        <div class="col-lg-12 col-md-12 mt-25">
                                            <fieldset class="invoice-address form-group">
                                                <div class="input-group col-sm-12" style="height: 35px">
                                                    <input type="text" class="form-control image_label ltr" name="file"
                                                        aria-label="File" aria-describedby="button-file">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-danger button-image " type="button"
                                                            id="button-file">فایل </button>
                                                    </div>
                                                </div>
                                            </fieldset>
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
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning"
                                            data-toggle="popover" data-content="" data-trigger="hover"
                                            data-placement="right"></i>فعال بودن محتوا </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" name="active"
                                            id="paymentTerm">
                                        <label class="custom-control-label" for="paymentTerm">
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning"
                                            data-toggle="popover" data-content="" data-trigger="hover"
                                            data-placement="right"></i>اطلاع رسانی به اعضا </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" name="send"
                                            id="paymentTerm1">
                                        <label class="custom-control-label" for="paymentTerm1">
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
                                        <a href="{{route('admin.channel.content.index',$channel)}}"
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
@endsection
