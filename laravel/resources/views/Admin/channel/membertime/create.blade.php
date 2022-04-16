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
                                        <h3 class="invoice-to">افزودن حق عضویت کانال جدید</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.membertimechannel.index')}}" method="post">
                                        @csrf
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">عنوان حق عضویت کانال</h6>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="عنوان حق عضویت کانال">
                                            </div>
                                            <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                                <h6 class="invoice-to">مربوط به کانال</h6>
                                                <select class="form-control select2" name="channel_id">
                                                    <option value="0">شاخه اصلی</option>
                                                    @foreach (\App\Models\Channel::all() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">هزینه عضویت (تومان)</h6>
                                                <input type="text" class="form-control" name="cost"
                                                    placeholder="">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">مدت زمان عضویت(روز)</h6>
                                                <input type="text" class="form-control" name="days"
                                                    placeholder="">
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
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال کردن این گزینه این حق عضویت کانال در اسلایدر وبلاگ نمایش داده می شود" data-trigger="hover" data-placement="right"></i> فعال بودن حق عضویت </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" name="active" id="paymentTerm1">
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
                                        <a href="{{route('admin.membertimechannel.index')}}" class="btn btn-light-warning btn-block">
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
@endsection
