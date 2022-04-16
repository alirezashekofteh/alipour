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
                                    <form role="form" action="{{ route('admin.term.update',$term)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام دوره</h6>
                                            <input type="text"  value="{{old('title',$term->title)}}" name="title" class="form-control" placeholder="نام دوره">
                                        </div>
                                        <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">آدرس یکتای دوره</h6>
                                            <input type="text" name="slug" value="{{old('slug',$term->slug)}}"  class="form-control ltr text-left"
                                                placeholder="url-adress">
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- invoice address and contact -->
                                    <div class="row invoice-info">
                                        <div class="col-lg-6 col-md-12 mt-25">
                                            <h6 class="invoice-to">مبلغ دوره(تومان)</h6>
                                            <fieldset class=" form-group">
                                                <input type="text" class="form-control" name="price"
                                                    value="{{old('price',$term->Orginalprice())}}" placeholder="مبلغ دوره(تومان)">
                                            </fieldset>
                                            <h6 class="invoice-to">میزان تخفیف دوره (تومان)</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="off"
                                                    value="{{old('off',$term->off)}}" placeholder="میزان تخفیف دوره (تومان)">
                                            </fieldset>
                                            <h6 class="invoice-to">مبلغ هدیه دوره(تومان)</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="gift"
                                                    value="{{old('gift',$term->gift)}}"
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
                                                    <input type="text" class="form-control ltr text-left" name="video" value="{{old('video',$term->video)}}"
                                                        placeholder="فایل ویدئویی معرفی دوره"
                                                        aria-describedby="button-addon2">

                                                </div>
                                            </fieldset>
                                            <fieldset class="invoice-address form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" id="button-addon2">
                                                        <button class="btn btn-primary" type="button">انتخاب </button>
                                                    </div>
                                                    <input type="text" class="form-control ltr text-left" name="pic" value="{{old('pic',$term->pic)}}"
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
                                        <input type="checkbox" class="custom-control-input" @if ($term->access)
                                        checked=""
                                        @endif name="access" id="paymentTerm">
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





@extends('Admin.Layouts.master')
@section('content')
<div class="col-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-note"></i>
              ویرایش دوره
                </h3>
            </div><!-- /.portlet-title -->
            <div class="buttons-box">
                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                    <i class="icon-size-fullscreen"></i>
                </a>
                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                    <i class="icon-arrow-up"></i>
                </a>
            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <div class="portlet-body">
            <form role="form" action="{{ route('admin.term.update',$term)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="form-group curve row">
                        <label class="col-sm-3">نام دوره</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" value="{{old('title',$term->title)}} " placeholder="نام دوره">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                        <label class="col-sm-3">قیمت دوره</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price"  value="{{old('price',$term->price)}} " placeholder="قیمت دوره">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                        <label class="col-sm-3">متن</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control rtl" id="editor1" name="content"> {{old('content',$term->content)}}</textarea>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                        <label class="col-sm-3">دسترسی دوره(پولی)</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="access">
                                @foreach(config('value.truefalse') as $key => $name)
                                <option value="{{ $key }}" {{ $term->active==$key  ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                    <label class="col-sm-3">بارگزاری تصویر</label>
                    <div class="input-group col-sm-9" style="height: 35px">
                        <input type="text" id="image_label"value="{{old('pic',$term->video)}}" name="pic" class="form-control ltr" name="pic"
                               aria-label="Image" aria-describedby="button-image">
                        <div class="input-group-append">
                            <button class="btn btn-danger " type="button" id="button-image">انتخاب ویدئو</button>
                        </div>
                    </div>
                    </div>
                    <hr>
                </div><!-- /.form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-info btn-round">
                        <i class="icon-check"></i>
                        ذخیره
                    <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></button>
                    <a  href="{{route('admin.term.index')}}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></a>
                </div><!-- /.form-actions -->
            </form>
        </div>
    </div><!-- /.portlet -->
</div><!-- /.col-12 -->
@endsection
@section('js-page')
<script src="/admins/assets/plugins/select2/dist/js/select2.full.min.js"></script>
<script src="/admins/assets/plugins/select2/dist/js/i18n/fa.js"></script>
<script src="/admins/assets/js/pages/select2.js"></script>
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
