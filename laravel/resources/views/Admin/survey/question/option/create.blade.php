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
                                        <h3 class="invoice-to">افزودن دوره</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.term.index')}}" method="post">
                                        @csrf
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام دوره</h6>
                                            <input type="text" name="title" class="form-control" placeholder="نام دوره">
                                        </div>
                                        <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">آدرس یکتای دوره</h6>
                                            <input type="text" name="slug" class="form-control ltr text-left"
                                                placeholder="url-adress">
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- invoice address and contact -->
                                    <div class="row invoice-info">
                                        <div class="col-lg-6 col-md-12 mt-25">
                                            <h6 class="invoice-to">امور مالی دوره</h6>
                                            <fieldset class=" form-group">
                                                <input type="text" class="form-control" name="price"
                                                    value="{{old('cost')}}" placeholder="مبلغ دوره(تومان)">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="off"
                                                    value="{{old('off')}}" placeholder="میزان تخفیف دوره (تومان)">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="gift"
                                                    value="{{old('gift')}}"
                                                    placeholder="مبلغ هدیه دوره(افزوده به کیف پول خواهد شد)">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row invoice-info">

                                        <div class="col-lg-12 col-md-12 mt-25">
                                            <h6 class="invoice-to">فایل های مورد نیاز دوره</h6>
                                            <fieldset class="invoice-address form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" id="button-addon2">
                                                        <button class="btn btn-primary" type="button">انتخاب </button>
                                                    </div>
                                                    <input type="text" class="form-control text-left" name="video"
                                                        placeholder="فایل ویدئویی معرفی دوره"
                                                        aria-describedby="button-addon2">

                                                </div>
                                            </fieldset>
                                            <fieldset class="invoice-address form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" id="button-addon2">
                                                        <button class="btn btn-primary" type="button">انتخاب </button>
                                                    </div>
                                                    <input type="text" class="form-control text-left" name="pic"
                                                        placeholder="تصویر شاخص دوره" aria-describedby="button-addon2">
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

                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="در صورتی که بخواهید این دوره بعد دوره مورد نظر گزرانده شود یکی از دوره های زیر را انتخاب کنید" data-trigger="hover" data-placement="right"></i> انتخاب دوره پیش نیاز </p>
                                <select name="pishniaz" id="paymentOption" class="form-control">
                                    <option value="">یک دوره را انتخاب کنید</option>
                                    @foreach($terms as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->title }}</option>
                                    @endforeach
                                </select>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال سازی این دوره دوره جهت ثبت نام در پنل دانشجو نمایش داده می شود" data-trigger="hover" data-placement="right"></i> فعال بودن دوره </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" name="access" id="paymentTerm">
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
                                        <a href="{{route('admin.term.index')}}" class="btn btn-light-warning btn-block">
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
<script>
    document.addEventListener("DOMContentLoaded", function() {

document.getElementById('button-image').addEventListener('click', (event) => {
  event.preventDefault();

  window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
});
});

// set file link
function fmSetLink($url) {
document.getElementById('image_label').value = $url;
}
CKEDITOR.replace( 'editor1' );
</script>
@endsection
