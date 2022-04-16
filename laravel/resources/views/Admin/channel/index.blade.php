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
                    <li class="breadcrumb-item active">کانال
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
      <div class="content-body"><!-- Dashboard Ecommerce Starts -->
        <section class="row">
            <!-- create invoice button-->
            <!-- Options and filter dropdown button-->
            <div class="col-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                        <a href="{{route('admin.channel.create')}}" class="btn btn-light-info curve mb-2"><i
                            class="bx bxs-add-to-queue"></i> افزودن کانال جدید </a>
                      <!-- Table with outer spacing -->
                      <div class="table-responsive">
                        <table class="table table-hover table-striped" id="data-table">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>تاریخ ایجاد</th>
                                <th>آخرین ویرایش</th>
                                <th>امکانات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($channel as $key=>$value)
                                <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{jdate($value->created_at)}}</td>
                                <td>{{jdate($value->updated_at)->ago()}}</td>
                                <td>
                                    <div class="row">
                                      <a href="{{route('admin.channel.edit',$value->id)}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="ویرایش" class="invoice-action-edit cursor-pointer">
                                        <i class="bx bx-edit font-large-1 text-info"></i>
                                      </a>
                                      <a href="{{route('admin.channel.content.index',['channel'=>$value->id])}}"><i class="bx bxs-videos font-large-1 text-warning" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="لیست محتوا ({{$value->contents()->count()}})"></i></a>
                                      <a href="{{route('admin.channel.export',['channel'=>$value->id])}}"><i class="bx bxs-add-to-queue font-large-1 text-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="خروجی اکسل اعضا ({{$value->users()->wherePivot('expire_at','>',now())->count()}})"></i></a>
                                      <form id="delete-form{{$value->id}}" action="{{ route('admin.channel.destroy',$value->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a id="{{$value->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="حذف اطلاعات" class="delete-buttom cursor-pointer"> <i class="bx bxs-x-square font-large-1 text-danger"></i></a>
                                    </form>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    </div>

                  </div>
                  <div class="card-footer">
                    {{ $channel->appends([ 'parent' => request('parent') ])->links() }}
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

