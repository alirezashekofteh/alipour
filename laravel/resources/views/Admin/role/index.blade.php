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
                            <li class="breadcrumb-item active">لیست مقالات سایت
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

                                    <div class="col-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="search" value="{{request('search')}}"
                                                class="form-control" id="iconLeft1"
                                                placeholder="عبارت مورد نظر جهت جستجو را وارد نمایید">
                                            <div class="form-control-position">
                                                <i class="bx bx-user"></i>
                                            </div>
                                        </fieldset>

                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-success mr-1 mb-1"><i
                                                class="bx bx-search"></i><span
                                                class="align-middle ml-25">جستجو</span></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="card-content">

                            <hr>
                            <div class="card-body">
                                <a href="{{route('admin.role.create')}}" class="btn btn-light-info curve mb-2"><i
                                        class="bx bxs-add-to-queue"></i> افزودن نقش جدید </a>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                
                                                <th>نام دسترسی</th>
                                                <th>نام دسترسی به انگلیسی</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>امکانات</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $item)
                                            <tr class="success">
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->name_fa}}</td>
                                                <td>{{ $item->name}}</td>
                                                <td>{{ jdate($item->created_at) }}</td>
                                                <td>
                                                    <div class="row">
                                                        <a href="{{route('admin.role.edit',$item->id)}}" data-toggle="tooltip"
                                                            data-placement="bottom" title="" data-original-title="ویرایش">
                                                            <i class="bx bx-edit bx-sm text-info"></i>
                                                        </a>
                                                        <a data-effect="effect-rotate-bottom" data-toggle="modal" title="دسترسی" href="#modal{{$item->id}}"><i data-toggle="tooltip"
                                                            data-placement="bottom" title="" data-original-title="دسترسی ها" class='bx bxs-user-detail bx-sm text-warning'></i></a>
                                                        
        
                                                    </div>
                                                </td>
        
                                            </tr>
                                            <div class="modal" id="modal{{$item->id}}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">دسترسی ها</h6><button aria-label="بستن" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @php
                                                                  $rolePermissions = \Spatie\Permission\Models\Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
                    ->where("role_has_permissions.role_id", $item->id)
                    ->get();
                                                            @endphp
                                                            @if(!empty($rolePermissions))
                                                                @foreach($rolePermissions as $v)
                                                                    <label class="badge badge-primary">{{ $v->name_fa }}</label>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">بستن</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            {{ $roles->appends([ 'parent' => request('parent') ])->links() }}
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
<script>

    $(function() {

      $('.toggle-class').change(function() {

          var status = $(this).prop('checked') == true ? 1 : 0;

          var post_id = $(this).data('id');



          $.ajax({

              type: "GET",

              dataType: "json",

              url: '/admin/changeSardabirPost',

              data: {'status': status, 'post_id': post_id},

              success: function(data){

              alert(data.success);

              }

          });

      })

    })

  </script>
@endsection
