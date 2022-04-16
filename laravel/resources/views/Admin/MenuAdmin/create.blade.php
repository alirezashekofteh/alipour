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
                                        <h3 class="invoice-to">ویرایش کاربر</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form role="form" action="{{ route('admin.menuadmin.index')}}" method="POST">
                                        @csrf
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام منو</h6>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="نام منو">
                                        </div>
                                        <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">نام روت</h6>
                                            <input type="text" class="form-control ltr" name="route" value="{{ old('route') }}" placeholder="نام روت">
                                        </div>
                                    </div>
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">مسیر منو</h6>
                                            <input type="text" class="form-control ltr" name="link" value="{{ old('link')}}" placeholder="مسیر منو">
                                        </div>
                                        <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">نام دسترسی</h6>
                                            <input type="text" class="form-control ltr" name="gate"  value="{{ old('gate')}}" placeholder="نام دسترسی">
                                        </div>
                                    </div>

                                    <hr>
                                    <!-- invoice address and contact -->
                                    <div class="row invoice-info">
                                        <div class="col-lg-6 col-md-12 mt-25">
                                            <h6 class="invoice-to">ترتیب منو</h6>
                                            <fieldset class=" form-group">
                                                <input type="text" class="form-control" name="tartib" value="{{ old('tartib')}}"  placeholder="ترتیب منو">
                                            </fieldset>
                                            <h6 class="invoice-to">نمایش منو</h6>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="view">
                                                    @foreach(config('value.truefalse') as $key => $name)
                                        <option value="{{ $key }}">{{ $name }}</option>
                                    @endforeach
                                                </select>
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
                                <p><i class="bx bx-help-circle text-warning"></i> نوع کاربری </p>
                                <div class="mb-1">
                                    <select class="form-control" name="panel">
                                        @foreach(config('value.panel') as $key => $name)
                            <option value="{{ $key }}" >{{ $name }}</option>
                        @endforeach
                                    </select>
                            </div>
                                <p><i class="bx bx-help-circle text-warning"></i> زیر شاخه </p>
                                <div class="mb-1">
                                    <select class="form-control" name="parent">
                                        <option value="0">شاخه اصلی</option>
                                        @foreach (\App\Models\MenuAdmin::where('panel','admin')->where('parent','0')->where('view','1')->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a href="{{route('admin.user.index')}}" class="btn btn-light-warning btn-block">
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
<script src="/admins/assets/vendors/js/forms/select/select2.min.js"></script>
<script src="/admins/assets/js/scripts/forms/select/form-select2.js"></script>
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
