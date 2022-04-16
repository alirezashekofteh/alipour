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
                                        <h3 class="invoice-to">   مدیریت کیف پول کاربر {{$user->nf}}</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form role="form" action="{{ route('admin.UserWallet',$user)}}" method="POST">
                                        @csrf
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">مبلغ مورد نظر</h6>
                                            <input type="text" class="form-control" name="amount" value="{{old('amount')}} " placeholder="مبلغ مورد نظر">
                                        </div>
                                        <div class="col-sm-6 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">نوع عملیات</h6>
                                            <select class="form-control" name="noe">
                                                <option value="credit" >افزایش</option>
                                                <option value="debit" >کاهش</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">توضیحات</h6>
                                            <input type="text" class="form-control" name="description" value="{{old('description')}} " placeholder="توضیحات">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                              <thead>
                                <tr>
                                  <th><i class="icon-energy"></i></th>
                                  <th>نوع تراکنش</th>
                                  <th>مقدار</th>
                                  <th>شماره پیگیری</th>
                                  <th>توضیحات</th>
                                  <th>تاریخ ایجاد</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($wallets as $item)
                                <tr class="success">
                                    <td>{{ $item->id}}</td>
                                  <td>{{ $item->type}}</td>
                                  <td>{{number_format($item->amount)}} تومان</td>
                                  <td>{{$item->resnumber}}</td>
                                  <td>{{$item->description}}</td>
                                  <td>{{jdate($item->created_at)}}</td>
                                </tr>
                                @endforeach
          
          
                              </tbody>
                            </table>
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
