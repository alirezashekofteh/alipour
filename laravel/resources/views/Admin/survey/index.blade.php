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
                    <li class="breadcrumb-item active">نظر سنجی ها
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
                  <div class="card-header">
                    <h4 class="card-title">نظر سنجی ها</h4>
                  </div>
                  <div class="card-content">
                    <form action="" method="GET">
                      <div class="row col-12">

                        <div class="col-3">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="search" value="{{request('search')}}" class="form-control" id="iconLeft1" placeholder="عبارت مورد نظر جهت جستجو را وارد نمایید">
                                <div class="form-control-position">
                                    <i class="bx bx-user"></i>
                                </div>
                            </fieldset>

                          </div>
                          <div class="col-3">
                            <button type="submit" class="btn btn-success mr-1 mb-1"><i class="bx bx-search"></i><span class="align-middle ml-25">جستجو</span></button>
                          </div>

                      </div>
                    </form>
<hr>
                    <div class="card-body">
                      <!-- Table with outer spacing -->
                      <a href="{{route('admin.survey.create')}}" class="btn btn-light-info curve mb-2"><i class="bx bxs-add-to-queue"></i> افزودن نظر سنجی جدید </a>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="master"></th>
                            <th></th>
                            <th>عنوان نظر سنجی</th>
                            <th>ثبت توسط</th>
                            <th>تاریخ ایجاد</th>
                            <th>آخرین ویرایش</th>
                            <th>امکانات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($survey as $item)
                        <tr class="success">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$item->id}}"></td>
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{$item->user->nf}}</td>
                            <td>{{jdate($item->created_at)}}</td>
                            <td>{{jdate($item->updated_at)->ago()}}</td>

                            <td>
                                <div class="row">
                                <a href="{{route('admin.survey.edit',$item->id)}}"><i class="bx bx-edit font-large-1 text-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="ویرایش"></i> </a>

                                <a href="{{route('admin.survey.question.index',['survey'=>$item->id])}}"><i class="bx bxs-videos font-large-1 text-warning" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="لیست سوالات ({{$item->questions()->count()}})"></i></a>
                                <form id="delete-form{{$item->id}}" action="{{ route('admin.survey.destroy' , $item->id) }}" method="POST">
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
                    <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('admin/surveysDeleteAll') }}">حذف تمام انتخاب شده ها</button>
                    {{ $survey->appends([ 'parent' => request('parent') ])->links() }}
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });

$('.delete_all').on('click', function(e) {
var allVals = [];
$(".sub_chk:checked").each(function() {
    allVals.push($(this).attr('data-id'));
});


if(allVals.length <=0)
{
    alert("Please select row.");
}  else {


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
                    var join_selected_values = allVals.join(",");


$.ajax({
    url: $(this).data('url'),
    type: 'DELETE',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: 'ids='+join_selected_values,
    success: function (data) {
        if (data['success']) {
            $(".sub_chk:checked").each(function() {
                $(this).parents("tr").remove();
            });
            alert(data['success']);
        } else if (data['error']) {
            alert(data['error']);
        } else {
            alert('Whoops Something went wrong!!');
        }
    },
    error: function (data) {
        alert(data.responseText);
    }
});


$.each(allVals, function( index, value ) {
  $('table tr').filter("[data-row-id='" + value + "']").remove();
});
                }
            })
    if(check == true){



    }
}
});
    });
</script>
@endsection
