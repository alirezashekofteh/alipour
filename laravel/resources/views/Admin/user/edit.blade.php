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
                                    <form role="form" action="{{ route('admin.user.update',$user)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام</h6>
                                            <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}} " placeholder="نام">
                                        </div>
                                        <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">نام خانوادگی</h6>
                                            <input type="text" class="form-control" name="family"  value="{{old('family',$user->family)}} " placeholder="نام خانوادگی">
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- invoice address and contact -->
                                    <div class="row invoice-info">
                                        <div class="col-lg-6 col-md-12 mt-25">
                                            <h6 class="invoice-to">تلفن همراه</h6>
                                            <fieldset class=" form-group">
                                                <input type="text" class="form-control" name="mobile"  value="{{old('mobile',$user->mobile)}} " placeholder="تلفن همراه">
                                            </fieldset>
                                            <h6 class="invoice-to">ایمیل</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="email"  value="{{old('email',$user->email)}} " placeholder="ایمیل">
                                            </fieldset>

                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">نقش کاربری :</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <select class="form-control select2" multiple name="roles[]">
                                                @foreach($roles as $item)
                                                <option value="{{ $item->name }}"{{ in_array($item->name , $userRole) ? 'selected' : '' }}>{{  $item->name_fa }}</option>
                                                @endforeach
                                            </select>
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
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال سازی این گزینه کاربر به مدیریت کل تبدیل می شود" data-trigger="hover" data-placement="right"></i> مدیریت کل </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($user->superuser)
                                        checked=""
                                        @endif name="superuser" id="paymentTerm1">
                                        <label class="custom-control-label" for="paymentTerm1">
                                        </label>
                                    </div>

                                </div>
                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="در صورتی که بخواهید این دوره بعد دوره مورد نظر گزرانده شود یکی از دوره های زیر را انتخاب کنید" data-trigger="hover" data-placement="right"></i> دسترسی مدیریت کانال </p>
                                <select class="form-control select2" name="channels[]" multiple>

                                        @foreach (\App\Models\Channel::where('active','1')->get() as
                                        $item)
                                        <option value="{{$item->id}}" {{ in_array($item->id , $user->channelmanag->pluck('id')->toArray()) ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                </select>
                               
                                <p><i class="bx bx-help-circle text-warning"></i>نوع کاربر </p>
                                <select class="form-control" name="type">
                                    @foreach(config('value.typeuser') as $key => $name)
                                    <option value="{{ $key }}"
                                        {{ old('type') == $key || $user->type==$key  ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                    @endforeach
                                </select>
                                <p><i class="bx bx-help-circle text-warning"></i>درصد بازاریابی </p>
                                <input type="text" class="form-control" name="percent"  value="{{old('percent',$user->percent)}} " placeholder="درصد بازاریابی ">
                                <div class="invoice-action-btn mb-1 mt-2 d-flex">
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
