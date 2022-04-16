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
                                        <h3 class="invoice-to">افزودن ویدئو</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form role="form" action="{{ route('admin.term.video.update',[$term,$video])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-4 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام ویدئو</h6>
                                            <input type="text" name="title" value="{{old('title',$video->title)}}" class="form-control" placeholder="نام ویدئو">
                                        </div>
                                        <div class="col-sm-4 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">قسمت</h6>
                                            <input type="number" name="part" value="{{old('part',$video->part)}}" class="form-control ltr text-left"
                                                placeholder="">
                                        </div>
                                        <div class="col-sm-4 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">آی دی کاویمو</h6>
                                            <input type="text" name="kavimo" value="{{old('kavimo',$video->kavimo)}}"class="form-control ltr text-left">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                            <textarea  class="form-control rtl" id="editor1" name="content">

                                               {{old('content',$video->content)}}
                                            </textarea>

                                    </div><!-- /.form-group -->

                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- invoice action  -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card invoice-action-wrapper shadow-none border">
                            <div class="card-body">
                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="در صورتی که بخواهید این دوره بعد دوره مورد نظر گزرانده شود یکی از دوره های زیر را انتخاب کنید" data-trigger="hover" data-placement="right"></i> انتخاب دسته بندی  </p>
                                <select class="form-control" name="termcat_id">
                                    @foreach ($term->termcats()->get() as $item)
                                    <option value="{{ $item->id }}" {{ $video->termcat_id == $item->id  ? 'selected' : '' }}>{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="" data-trigger="hover" data-placement="right"></i>ویدئو مربوط به قسط</p>
                                <select class="form-control" name="installments">
                                    <option value="0" {{ $video->installments == 0  ? 'selected' : '' }}>هیچ کدام</option>
                                    @for ($i=1 ; $i<$term->installments+1; $i++)
                                    <option value="{{ $i }}" {{ $video->installments == $i  ? 'selected' : '' }}>{{$i}}</option>
                                    @endfor
                                   
                                </select>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="" data-trigger="hover" data-placement="right"></i> ویدئو پولی است </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($video->free)
                                        checked=""
                                        @endif name="free" id="paymentTerm">
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
                                        <a  href="{{route('admin.term.video.index',$term)}}" class="btn btn-light-warning btn-block">
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
CKEDITOR.replace('editor1', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>
@endsection
