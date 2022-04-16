@extends('Admin.Layouts.master')
@section('css-page')
<link rel="stylesheet" type="text/css" href="/admins/assets/vendors/css/forms/select/select2.min.css">
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
                    <li class="breadcrumb-item active">لیست مطالب دسته بندی
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
                      <form action="{{route('admin.tarain.post',$traincat)}}" method="POST">
                        @csrf
                        <div class="row col-12">
                          <div class="col-6">
                              <fieldset class="form-group position-relative has-icon-left">
                              
                                <select name="post_id" class="form-control select2 rtl text-right">
                                    <option value="">یک مورد را انتخاب کنید</option>
                                    @foreach (\App\Models\Post::all() as $item)
                                    <option value="{{ $item->id }} ">{{ $item->id.'-'.$item->name}}</option>
                                    @endforeach
                                </select>
                              </fieldset>
  
                          </div>
                          <div class="col-2">
                           
                                <input type="text" name="tartib" required value="{{request('search')}}" class="form-control" id="iconLeft1" placeholder="ترتیب مقاله" >
                              

                          </div>
                            <div class="col-3">
                              <button type="submit" class="btn btn-success mr-1 mb-1"><i class="bx bx-search"></i><span class="align-middle ml-25">افزودن مقاله</span></button>
                            </div>
  
                        </div>
                      </form>
  
                      <!-- Table with outer spacing -->
                      <div class="table-responsive">
                        <table class="table table-hover table-striped" id="data-table">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام مطالب</th>
                                <th>نام دسته بندی</th>
                                <th>ترتیب</th>
                                <th>تاریخ ایجاد</th>
                            
                                <th>امکانات</th>

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($trainpost as $key=>$value)
                                <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$traincat->name}}</td>
                                <td><input type="text" name="tartibs[{{$value->pivot->id}}]" id="{{$value->pivot->id}}"  value="{{$value->pivot->tartib}}" class="form-control toggle-class"></td>
                                <td>{{jdate($value->pivot->created_at)}}</td>
                             
                                <td>
                                    <div class="row">
                                     
                              
                                      <form id="delete-form{{$value->pivot->id}}" action="{{ route('admin.trainpost.destroy',$value->pivot->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a id="{{$value->pivot->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="حذف اطلاعات" class="delete-buttom cursor-pointer"> <i class="bx bxs-x-square font-large-1 text-danger"></i></a>
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
<script src="/admins/assets/vendors/js/forms/select/select2.min.js"></script>
<script src="/admins/assets/js/scripts/forms/select/form-select2.js"></script>
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
        $(function() {

$('.toggle-class').change(function() {

    var status = $(this).prop('checked') == true ? 1 : 0;

    var tartib = this.value;
    var id = this.id;
    $.ajax({

        type: "GET",

        dataType: "json",

        url: '/admin/changetartibtrainpost/',

        data: {'id': id, 'tartib': tartib},

        success: function(data){
        }

    });

})

})
</script>
@endsection

