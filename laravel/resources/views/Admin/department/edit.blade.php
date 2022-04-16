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
                                        <h3 class="invoice-to">ویرایش دپارتمان</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.department.update',$department)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام دپارتمان</h6>
                                            <input type="text" name="name" value="{{old('name',$department->name)}}" class="form-control" placeholder="نام دپارتمان">
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
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-departments-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال سازی این دپارتمان به کاربر نمایش داده می شود" data-trigger="hover" data-placement="right"></i> فعال بودن دپارتمان </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($department->active)
                                        checked=""
                                        @endif   name="active" id="paymentdepartment">
                                        <label class="custom-control-label" for="paymentdepartment">
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
                                        <a href="{{route('admin.department.index')}}" class="btn btn-light-warning btn-block">
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
