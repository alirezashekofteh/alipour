@extends('Admin.Layouts.master')
@section('content')
<div class="col-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-note"></i>
                 لیست محتوا {{$post->name}}
                </h3>
            </div><!-- /.portlet-title -->
            <div class="buttons-box">
                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                    <i class="icon-size-fullscreen"></i>
                </a>
                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                    <i class="icon-arrow-up"></i>
                </a>
            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <div class="portlet-body">
            <a href="{{route('admin.post.metapost.create',($post->id))}}" class="btn btn-sm btn-info curve mb-2">افزودن لیست محتوا</a>
            <a href="{{route('admin.post.index')}}" class="btn btn-sm btn-info curve mb-2">بازگشت به لیست مطالب</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-energy"></i></th>
                            <th>عنوان</th>
                            <th>مربوط به مطلب</th>
                            <th>نوع محتوا</th>
                            <th>ترتیب</th>
                            <th>ویژگی محتوا</th>
                            <th>تاریخ ثبت</th>
                            <th>آخرین ویرایش</th>
                            <th>امکانات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($metapost as $item)
                        <tr class="">
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{$item->post->name}}</td>
                            <td>{{$item->noe}}</td>
                            <td>{{$item->tartib}}</td>
                            <td>{{$item->meta}}</td>
                            <td>{{jdate($item->created_at)}}</td>
                            <td>{{jdate($item->updated_at)->ago()}}</td>

                            <td class="d-flex">
                                <a href="{{route('admin.post.metapost.edit',['post'=>$post->id,'metapost'=>$item->id])}}" class="btn btn-sm btn-info curve">ویرایش </a>
                                <form id="delete-form" action="{{ route('admin.post.metapost.destroy',[$post,$item]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  id="delete-buttom" class="btn btn-sm btn-danger curve ml-1">حذف</button>
                                </form>


                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $metapost->links() }}
        </div>
    </div><!-- /.portlet -->
</div><!-- /.col-12 -->
@endsection
@section('js-page')
<script>
    $('#delete-buttom').on('click', function (e) {
            e.preventDefault();
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
                    $('#delete-form').submit();
                }
            })
        });
</script>
@endsection
