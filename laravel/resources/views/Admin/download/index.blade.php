@extends('Admin.Layouts.master')
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
                    <li class="breadcrumb-item"><a href="{{route('admin.term.index')}}">{{$term->title}}</a>
                    </li>
                    <li class="breadcrumb-item active">
                      فایل های دانلودی
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

<hr>
                    <div class="card-body">
                      <!-- Table with outer spacing -->
                      <a href="{{route('admin.term.download.create',($term->id))}}" class="btn btn-light-info curve mb-2"><i class="bx bxs-add-to-queue"></i> افزودن فایل جدید </a>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>تاریخ ایجاد</th>
                            <th>آخرین ویرایش</th>
                            <th >امکانات</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($download as $item)
                                <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{jdate($item->created_at)}}</td>
                                <td>{{jdate($item->updated_at)->ago()}}</td>

                                <td>

                                    <div class="row">
                                        <a href="{{route('admin.term.download.edit',[$term,$item])}}"><i class="bx bx-edit font-large-1 text-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="ویرایش"></i> </a>

                                        <form id="delete-form{{$item->id}}" action="{{ route('admin.term.download.destroy' ,[$term,$item]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a id="{{$item->id}}" class="delete-buttom cursor-pointer"><i class="bx bxs-x-square font-large-1 text-danger"data-toggle="tooltip" data-placement="bottom" title="" data-original-title="حذف اطلاعات"></i></a>
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
                    {{ $download->appends([ 'parent' => request('parent') ])->links() }}
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

