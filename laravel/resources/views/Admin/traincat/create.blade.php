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
                                        <h3 class="invoice-to">افزودن دسته آموزشی جدید</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form action="{{ route('admin.traincat.index')}}" method="post">
                                        @csrf
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">عنوان دسته بندی</h6>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="عنوان دسته بندی">
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
                                        <a href="{{route('admin.traincat.index')}}" class="btn btn-light-warning btn-block">
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
 CKEDITOR.replace('editor1', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>
@endsection
