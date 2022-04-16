@extends('Admin.Layouts.master')
@section('css-page')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                                        <h3 class="invoice-to">عنوان تیکت :{{$ticket->name}}</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                </div>
                            </div>
                        </div>
                        @foreach ($tickets as $item)
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <!-- header section -->
                                    <div class="row mx-0">
                                       <div class="alert alert-secondary col-12 row">
                                           <div class="col-6">کاربر</div>
                                           <div class="col-6">{{jdate($item->created_at)}}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        {!!$item->body!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body pb-0 mx-25">
                                    <!-- header section -->
                                    <div class="row mx-0">
                                        <h3 class="invoice-to">پاسخ به تیکت</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.ticket.index')}}" method="post">
                                        @csrf

                                        <input type="hidden" name='parent' value="{{$ticket->id}}" >
                                        <input type="hidden" name='type' value="1" >
                                        <input type="hidden" name='department_id' value="{{$ticket->department_id}}" >
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                        <textarea name="body" class="form-control" id="editor1" cols="30" rows="10"></textarea>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- invoice action  -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card invoice-action-wrapper shadow-none border">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                        <h6 class="text-info">نام کاربر</h6>
                                        <input type="text" readonly class="form-control" value="{{$ticket->user->nf}}">
                                    </div>
                                    <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                        <h6 class="text-info">دپارتمان</h6>
                                        <input type="text" readonly class="form-control" value="{{$ticket->department->name}}">
                                    </div>
                                    <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                        <h6 class="text-info">تاریخ ایجاد تیکت</h6>
                                        <input type="text" readonly class="form-control" value="{{jdate($ticket->created_at)}}">
                                    </div>
                                    {{-- <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                        <h6 class="text-info">مربوط بخ دوره</h6>
                                        <input type="text" readonly class="form-control" value="{{$ticket->terms->title}}">
                                    </div> --}}
                                    <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                        <h6 class="text-info">وضعیت تیکت</h6>
                                        <input type="text" readonly class="form-control" value="{{ticket_status($ticket->status)}}">
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
@section('js-page')
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script src="/admins/assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
<script src="/admins/assets/js/scripts/pages/app-invoice.js"></script>
<script>
     bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
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
