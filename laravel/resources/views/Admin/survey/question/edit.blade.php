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
                                        <h3 class="invoice-to">ویرایش سوال نظر سنجی {{$survey->name}}</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.survey.question.update',[$survey,$question])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">متن سوال</h6>
                                            <input type="text" name="name" value="{{old('name',$question->name)}}" class="form-control" placeholder="متن سوال">
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="invoice-product-details ">
                                        <div class="form invoice-item-repeater">
                                          <div data-repeater-list="groupa">
                                              @foreach ($options as $item)
                                            <div data-repeater-item>
                                              <div class="row mb-50">

                                                <div class="col-3 invoice-item-title">نام گزینه </div>
                                                <div class="col-3 invoice-item-title">مقدار گزینه</div>
                                              </div>
                                              <div class="invoice-item d-flex border rounded mb-1">
                                                  <div class="col-md-3 col-12 form-group">
                                                    <input type="text" name="names" value="{{$item->name}}" class="form-control" placeholder="عنوان">
                                                  </div>
                                                  <div class="col-md-3 col-12 form-group">
                                                    <input type="text" name="value" value="{{$item->value}}" class="form-control" placeholder="0">
                                                  </div>
                                                <div class="col-md-3 col-12 form-group">
                                                  <span class="cursor-pointer" data-repeater-delete>
                                                    <i class="bx bxs-x-square font-large-1 text-danger"></i>
                                                  </span>
                                                </div>
                                              </div>
                                            </div>
                                            @endforeach
                                          </div>
                                          <div class="form-group">
                                            <div class="col p-0">
                                              <button class="btn btn-light-primary btn-sm" data-repeater-create type="button">
                                                <i class="bx bx-plus"></i>
                                                <span class="invoice-repeat-btn">افزودن آیتم</span>
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
                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a href="{{route('admin.survey.question.index',$survey)}}" class="btn btn-light-warning btn-block">
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
