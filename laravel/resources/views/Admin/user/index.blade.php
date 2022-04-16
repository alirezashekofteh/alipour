@extends('Admin.Layouts.master')
@section('css-page')
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
              <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active">لیست کاربران سایت
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
              <form action="" method="GET">
                <div class="row col-12">

                  <div class="col-3">
                    <fieldset class="form-group position-relative has-icon-left">
                      <input type="text" name="search" value="{{request('search')}}" class="form-control" id="iconLeft1"
                        placeholder="عبارت مورد نظر جهت جستجو را وارد نمایید">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                    </fieldset>

                  </div>
                  <div class="col-3">
                    <button type="submit" class="btn btn-success mr-1 mb-1"><i class="bx bx-search"></i><span
                        class="align-middle ml-25">جستجو</span></button>
                  </div>
                  <div class="col-3">
                    <a href="{{route('admin.user.export')}}" target="_blank" class="btn btn-light-success curve mb-2"><i
                        class="bx bxs-add-to-queue"></i> خروجی اکسل کاربران </a>
                  </div>

                </div>
              </form>
            </div>
            <div class="card-content">
              <hr>
              <div class="card-body">
                <!-- Table with outer spacing -->
                <a href="{{route('admin.user.create')}}" class="btn btn-light-info curve mb-2"><i
                    class="bx bxs-add-to-queue"></i> افزودن کاربر جدید </a>
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th><i class="icon-energy"></i></th>
                        <th>نام و نام خانوادگی</th>
                        <th>موبایل</th>
                        <th>کیف پول</th>
                        <th>نوع کاربر </th>
                        <th>لینک بازاریابی</th>
                        <th>تاریخ ایجاد</th>
                        <th>آخرین ویرایش</th>
                        <th>امکانات</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $item)
                      <tr class="success">
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->nf}}</td>
                        <td>{{$item->mobile}}</td>
                        <td>{{number_format($item->balance())}} تومان</td>
                        <td>{{config('value.typeuser.'.$item->type)}}</td>
                        <td>@if ($item->type=='agent' and $item->refcode!=null)
                          <a href="{{Request::root().'?ref='.$item->refcode}}" class="btn btn-success">لینک بازاریابی</a>
                        @endif</td>
                        <td>{{jdate($item->created_at)}}</td>
                        <td>{{jdate($item->updated_at)->ago()}}</td>

                        <td>
                          <div class="row">
                            <a href="{{route('admin.user.edit',$item->id)}}"><i
                                class="bx bx-edit font-large-1 text-info" data-toggle="tooltip" data-placement="bottom"
                                title="" data-original-title="ویرایش"></i> </a>

                            <a href="{{route('admin.userwalletform',$item->id)}}"><i
                                class="bx bxs-wallet font-large-1 text-success" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="مدیریت کیف پول"></i></a>
                                @if ($item->type=='agent' and $item->refcode!=null)
                                <a href="{{route('admin.referral.term',$item->id)}}"><i class="bx bxs-cloud-download font-large-1 text-warning" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="مدیریت لینک بازاریابی دوره ها"></i></a>
                                <a href="{{route('admin.referral.channel',$item->id)}}"><i class="bx bxs-cloud-download font-large-1 text-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title=" لینک بازاریابی کانال"></i></a>
                              @endif
                                

                            @if (!!$item->order()->where('status',1)->count())
                            <a href="{{route('admin.UserOrder',$item->id)}}"><i
                                class=" bx bx-dialpad font-large-1 text-warning" data-toggle="tooltip"
                                data-placement="bottom" title=""
                                data-original-title="دوره ها  ({{$item->validorder()->count()}})"></i></a>

                            @endif
                            
                            @if (!!$item->channels()->count())
                            <a href="{{route('admin.UserChannels',$item->id)}}"><i
                                class=" bx bxs-chat font-large-1 text-success" data-toggle="tooltip"
                                data-placement="bottom" title=""
                                data-original-title="کانال   ({{$item->channels()->count()}})"></i></a>

                            @endif
                         
                            <a href="{{route('admin.logintopanel',$item->loginid)}}"><i class="bx bx-log-in-circle font-large-1 text-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title=" ورود به پنل کاربر"></i></a>
                            <form id="delete-form{{$item->id}}" action="{{ route('admin.user.destroy' , $item->id) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')
                              <a id="{{$item->id}}" class="delete-buttom cursor-pointer"><i
                                  class="bx bxs-x-square font-large-1 text-danger" data-toggle="tooltip"
                                  data-placement="bottom" title="" data-original-title="حذف اطلاعات"></i></a>
                            </form>
                          </div>
                        </td>

                      </tr>
                      @endforeach


                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <div class="card-footer">
              {{ $users->appends([ 'search' => request('search') ])->links() }}
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
<script>
  $('.delete-buttom').on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            var id =$(this).attr("id");
            Swal.fire({
                title: 'آیا اطمینان دارید؟',
                text: "این عملیات برگشت پذیر نیست...",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله ،حذف شود!',
                cancelButtonText:'لغو عملیات'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form'+id).submit();
                }
            })
        });
</script>
@endsection