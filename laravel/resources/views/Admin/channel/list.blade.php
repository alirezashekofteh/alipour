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
                            <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">لیست کانال های خریداری شده
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
                        
                        <div class="card-content">
                            <hr>
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><i class="icon-energy"></i></th>
                                                <th>عنوان کانال</th>
                                                <th>خرید توسط</th>
                                                <th>موبایل</th>
                                               
                                                <th>تاریخ انقضا</th>

                                                <th>امکانات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($channels as $item)
                                            <tr class="success">
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->name}}</td>
                                                <td>{{$user->nf}}</td>
                                                <td>{{$user->mobile}}</td>
                                              
                                                <td>{{jdate($item->pivot->expire_at)}}</td>

                                                <td> <form id="delete-form{{$item->pivot->id}}" action="{{ route('admin.channeluser.destroy' , $item->pivot->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a id="{{$item->pivot->id}}" class="delete-buttom cursor-pointer"><i
                                                        class="bx bxs-x-square font-large-1 text-danger" data-toggle="tooltip"
                                                        data-placement="bottom" title="" data-original-title="حذف اطلاعات"></i></a>
                                                  </form> </td>

                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">

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