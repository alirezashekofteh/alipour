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
                                        <h3 class="invoice-to">افزودن دسته بندی جدید</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form enctype="multipart/form-data" action="{{ route('admin.term.termcat.update',[$term,$termcat])}}" rel="form" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">عنوان</h6>
                                                <input type="text" class="form-control" value="{{old('name',$termcat->name)}}" name="name" placeholder="عنوان">
                                            </div>
                                            <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                                <h6 class="text-info">ترتیب</h6>
                                                <input type="text" class="form-control" value="{{old('name',$termcat->tartib)}}" name="tartib" placeholder="ترتیب">
                                            </div>

                                        </div>
                                        <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- invoice action  -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card invoice-action-wrapper shadow-none border">
                            <div class="card-body">
                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="" data-trigger="hover" data-placement="right"></i>دسته بندی مربوط به قسط</p>
                                <select class="form-control" name="installments">
                                    <option value="0">هیچ کدام</option>
                                    @for ($i=1 ; $i<$term->installments+1; $i++)
                                    <option value="{{ $i }}">{{$i}}</option>
                                    @endfor
                                   
                                </select>
                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a href="{{route('admin.term.termcat.index',$term)}}" class="btn btn-light-warning btn-block">
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
@endsection
