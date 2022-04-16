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
                            <li class="breadcrumb-item"><a href="#">محتوا</a>
                            </li>
                            <li class="breadcrumb-item active">لیست حق عضویت های سایت
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
                                <a href="{{route('admin.subscription.create')}}" class="btn btn-light-info curve mb-2"><i
                                        class="bx bxs-add-to-queue"></i>افزودن حق عضویت جدید </a>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>عنوان</th>
                                                <th>هزینه حق عضویت</th>
                                                <th>مدت زمان</th>
                                                <th>فعال بودن</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>آخرین ویرایش</th>
                                                <th>امکانات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subscription as $item)
                                            <tr class="success">
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->name}}</td>
                                                <td>{{$item->cost}}</td>
                                                <td>{{$item->time}}</td>
                                                <td>{{yesno($item->active)}}</td>

                                                <td>{{jdate($item->created_at)}}</td>
                                                <td>{{jdate($item->updated_at)->ago()}}</td>

                                                <td>
                                                    <div class="row">
                                                        <a href="{{route('admin.subscription.edit',$item->id)}}"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="ویرایش">
                                                            <i class="bx bx-edit font-large-1 text-info"></i>
                                                        </a>
                                                        <form id="delete-form{{$item->id}}"
                                                            action="{{ route('admin.subscription.destroy' , $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a id="{{$item->id}}" data-toggle="tooltip"
                                                                data-placement="bottom" title=""
                                                                data-original-title="حذف اطلاعات"
                                                                class="delete-buttom cursor-pointer"> <i
                                                                    class="bx bxs-x-square font-large-1 text-danger"></i></a>
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
                            {{ $subscription->appends([ 'parent' => request('parent') ])->links() }}
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
