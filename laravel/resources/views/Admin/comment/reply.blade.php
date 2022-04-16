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
                                        <h3 class="invoice-to">پاسخ به نظر</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('send.comment')}}" method="post">
                                        @csrf
                                    <div class="row my-2 py-50">
                                        <div class="alert alert-success col-md-12">نام و نام خانوادگی : {{$comment->name}}</div>
                                        <div class="alert alert-info col-md-12">متن نظر :{{$comment->comment}}</div>
                                        <div class="alert alert-warning col-md-12">مربوط به : {{ !empty($comment->commentable->name) ? $comment->commentable->name:$comment->commentable->title }}</div>
                                        <input type="hidden" name="commentable_id" value="{{ $comment->commentable_id }}">
                                        <input type="hidden" name="commentable_type" value="{{ $comment->commentable_type }}">
                                        <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                        <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">پاسخ شما</h6>
                                            <textarea  class="form-control rtl" name="comment">{{ !empty($reply) ? $reply->comment : null}}</textarea>
                                        </div>
                                    </div>
                                    <hr>
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
                                        <a href="{{route('admin.comments')}}" class="btn btn-light-warning btn-block">
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
