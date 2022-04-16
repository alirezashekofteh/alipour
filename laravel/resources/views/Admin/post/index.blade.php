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

                                    <div class="col-5">
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
                                       <select name="sort" class="form-control">
                                        <option value="created_at" @if (request('sort')=='created_at')
                                            selected
                                        @endif>تاریخ ایجاد</option>
                                        <option value="updated_at"@if (request('sort')=='updated_at')
                                            selected
                                        @endif>تاریخ ویرایش</option>

                                       </select>

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
                                <a href="{{route('admin.post.create')}}" class="btn btn-light-info curve mb-2"><i
                                        class="bx bxs-add-to-queue"></i> افزودن مقاله جدید </a>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>عنوان</th>
                                                <th>نویسنده</th>
                                                <th>نمایش در سایت</th>
                                                <th>قابل نمایش برای</th>
                                                <th>فعال بودن نظرات</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>آخرین ویرایش</th>
                                                <th>امکانات</th>
                                                <th>انتخاب سردبیر</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($post as $item)
                                            <tr class="success">
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->name}}</td>
                                                <td>{{$item->user->nf}}</td>
                                                <td>{{yesno($item->active)}}</td>
                                                <td>{{config('value.subscription.'.$item->type)}}</td>
                                                <td>{{yesno($item->comment)}}</td>
                                                <td>{{jdate($item->created_at)}}</td>
                                                <td>{{jdate($item->updated_at)->ago()}}</td>

                                                <td>
                                                    <div class="row">
                                                        <a href="{{route('admin.post.edit',$item->id)}}"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="ویرایش">
                                                            <i class="bx bx-edit font-large-1 text-info"></i>
                                                        </a>
                                                        <form id="delete-form{{$item->id}}"
                                                            action="{{ route('admin.post.destroy' , $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a id="{{$item->id}}" data-toggle="tooltip"
                                                                data-placement="bottom" title=""
                                                                data-original-title="حذف اطلاعات"
                                                                class="delete-buttom cursor-pointer"> <i
                                                                    class="bx bxs-x-square font-large-1 text-danger"></i></a>
                                                        </form>

                                                        <a href="{{route('admin.post.comments.index',['post'=>$item->id])}}"
                                                            data-toggle="tooltip" data-placement="bottom" title=""
                                                            data-original-title="لیست نظرات  ({{$item->comments()->count()}})"><i
                                                                class="bx bx-dialpad font-large-1 text-warning"></i></a>

                                                    </div>
                                                </td>
                                                <td>
                                                    <fieldset>
                                                        <div class="checkbox checkbox-info">
                                                          <input data-id="{{$item->id}}"type="checkbox" {{ $item->sardabir ? 'checked' : '' }} class="toggle-class checkbox__input" id="checkbox{{$item->id}}">
                                                          <label for="checkbox{{$item->id}}"></label>
                                                        </div>
                                                      </fieldset>
                                                </td>

                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            {{ $post->appends([ 'search' => request('search'),'sort' => request('sort') ])->links() }}
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
