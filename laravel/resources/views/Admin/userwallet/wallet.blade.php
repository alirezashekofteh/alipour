@extends('Admin.Layouts.master')
@section('css-page')
    <link href="/admins/assets/css/jquery.md.bootstrap.datetimepicker.style.css" rel="stylesheet" />
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="">لیست مالی</a>
                            </li>
                            <li class="breadcrumb-item active">لیست پرداخت موفق
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section class="row">
                <!-- create invoice button-->
                <!-- Options and filter dropdown button-->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-content">

                            <hr>
                            <div class="card-body">
                                <form action="" method="get">
                                    <div class="row col-md-12">
                                        <div class="form-group col-lg-3">
                                            <label for="name2">تاریخ شروع</label>
                                            <div class="input-group">

                                                <input id="time_start" class="form-control ltr text-left" name="time_start"
                                                    value="{{ old('time_start') }}" type="text" />
                                                <input id="date_start" name="date_start" required=""
                                                    value="{{ request('date_start') }}" type="hidden" />
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text btn btn-primary" style="cursor: pointer;"
                                                        id="date1">تقویم</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label for="name2">تاریخ پایان</label>
                                            <div class="input-group">

                                                <input id="time_end" class="form-control ltr text-left" name="time_end"
                                                    value="{{ old('time_end') }}" type="text" />
                                                <input id="date_end" value="{{ request('date_end') }}" name="date_end"
                                                    required="" value="" type="hidden" />
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text btn btn-primary" style="cursor: pointer;"
                                                        id="date2">تقویم</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="name2">بازاریاب </label>
                                            <select class="form-control" name="agent">
                                                <option value="0"> ----</option>
                                                @foreach (\App\Models\User::where('type','agent')->get() as $item)
                                                <option value="{{ $item->id }}" @if (request('agent')==$item->id)
                                                    selected="";
                                                @endif>{{ $item->nf}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label for="name2">جستجو</label>
                                            <div class="input-group">
                                                <button class="btn btn-sm btn-danger btn-curve" type="submit">جستجو</button>
                                            </div>

                                        </div>
                                        <div class="col-3">
                                            <a href="{{route('admin.wallet.export',request()->query->all())}}" target="_blank" class="btn btn-light-success curve mb-2"><i
                                                class="bx bxs-add-to-queue"></i> خروجی اکسل  </a>
                                          </div>




                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>مبلغ</th>
                                                <th>کاربر</th>
                                                <th>نوع</th>
                                                <th>توضیحات </th>
                                               
                                                <th>کد پیگیری</th>
                                                <th>تاریخ ثبت</th>
                                                <th> بازاریاب</th>
                                                <th> شماره قسط</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wallet as $item)
                                            <tr class="success">
                                                <td>{{ $item->id}}</td>
                                                <td>{{ number_format($item->amount)}}</td>
                                                <td>{{ $item->user->nf }}</td>
                                                <td>{{ $item->type}}</td>
                                                <td>{{ $item->description}}</td>
                                                <td>{{$item->resnumber}}</td>
                                                <td>{{jdate($item->updated_at)}}</td>
                                                <td>{{!empty($item->agents->nf) ? $item->agents->nf:'---'}}</td>
                                                <td>{{ $item->installments}}</td>
                                              

                                              

                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            {{ $wallet->appends([ 'parent' => request('parent') ])->links() }}
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
@endsection
@section('js-page')
  <script src="/admins/assets/js/jquery.md.bootstrap.datetimepicker.js"></script>
    <script type="text/javascript">
        $('#date1').MdPersianDateTimePicker({
            targetTextSelector: '#time_start',
            targetDateSelector: '#date_start',
            fromDate: true,
            groupId: 'rangeSelector1',
            textFormat: 'yyyy-MM-dd HH:mm:ss',
            dateFormat: 'yyyy-MM-dd HH:mm:ss',
            enableTimePicker: true,
            englishNumber: true
        });
        $('#date2').MdPersianDateTimePicker({
            targetTextSelector: '#time_end',
            targetDateSelector: '#date_end',
            toDate: true,
            groupId: 'rangeSelector1',
            textFormat: 'yyyy-MM-dd HH:mm:ss',
            dateFormat: 'yyyy-MM-dd HH:mm:ss',
            enableTimePicker: true,
            englishNumber: true
        });
    </script>
<script>

    $(function() {

      $('.toggle-class').change(function() {

          var status = $(this).prop('checked') == true ? 1 : 0;

          var comment_id = $(this).data('id');



          $.ajax({

              type: "GET",

              dataType: "json",

              url: '/admin/changeStatuscomment',

              data: {'status': status, 'comment_id': comment_id},

              success: function(data){

              alert(data.success);

              }

          });

      })

    })

  </script>
@endsection
