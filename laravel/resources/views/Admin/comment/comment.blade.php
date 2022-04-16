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
                            <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="">محتوا</a>
                            </li>
                            <li class="breadcrumb-item active">لیست کامنت ها
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
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>متن نظر</th>
                                                <th>کاربر</th>
                                                <th>نوع کامنت</th>
                                                <th>مربوط</th>
                                                <th>تاریخ ثبت</th>
                                                <th>تایید نمایش </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comment as $item)
                                            <tr class="success">
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->comment}}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->commentable_type}}</td>
                                                <td>{{ !empty($item->commentable->name) ? $item->commentable->name:$item->commentable->title }}</td>

                                                <td>{{jdate($item->created_at)}}</td>

                                                <td>
                                                    <fieldset>
                                                        <a href="{{route('admin.comment.reply',$item->id)}}"><i class="bx bxs-chat font-large-1 text-@if($item->parent()->count())success @else warning @endif " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="پاسخ به نظر"></i></a>
                                                        <div class="checkbox checkbox-info">
                                                          <input data-id="{{$item->id}}"type="checkbox" {{ $item->approved ? 'checked' : '' }} class="toggle-class checkbox__input" id="checkbox{{$item->id}}">
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
                            {{ $comment->appends([ 'parent' => request('parent') ])->links() }}
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
