@extends('Admin.Layouts.master')
@section('css-page')
<link rel="stylesheet" type="text/css" href="/admins/assets/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- app invoice View Page -->
            <section class="invoice-edit-wrapper">
                <div class="row">
                    <!-- invoice view page -->
                    <div class="col-xl-12 col-md-8 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body pb-0 mx-25">
                                    <!-- header section -->
                                   
                                    <hr>
                                    <form role="form" action="{{$action}}" method="POST">
                                        @csrf
                                        @if (isset($role->id))
                                            @method('PUT')
                                        @endif
                                    <div class="pd-30 pd-sm-40 bg-gray-200">
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">نام نقش کاربری به فارسی :</label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control dir-rtl" placeholder="" value="{{old('name_fa',$role->name_fa)}}" name="name_fa" type="text">
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">نام نقش کاربری به انگلیسی :</label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control dir-ltr" placeholder="" value="{{old('name',$role->name)}}" name="name" type="text">
                                            </div>
                                        </div>
                                        @foreach($permission as $item)
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-2">
                                                <label class="form-label mg-b-0">{{$item->name_fa}}</label>
                                            </div>
                                            <div class="col-md-10 row">
                                                @foreach(\Spatie\Permission\Models\Permission::where('parent',$item->id)->get() as $value)
                                           
                                                <div class="col-md-3">
                                                <label class="btn btn-info btn-block"><input type="checkbox" name="permission[]" 
                                                    @if (in_array($value->id, $rolePermissions))
                                                    checked=''
                                                @endif value="{{$value->id}}">
                                                {{ $value->name_fa }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                        <button class="btn btn-primary" type="submit">ثبت و ذخیره</button>
                                        <a href="/admin/role" class="btn btn-dark pd-x-30 mg-t-5">بازگشت</a>
                                    </div>
                                </form>
                                      
                                       
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- invoice action  -->
                   
                    </form>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
@section('js-page')
<script src="/admins/assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
<script src="/admins/assets/js/scripts/pages/app-invoice.js"></script>
<script src="/admins/assets/vendors/js/forms/select/select2.min.js"></script>
<script src="/admins/assets/js/scripts/forms/select/form-select2.js"></script>
<script src="/admins/assets/ckeditor/ckeditor.js"></script>
<script>
    var image;
            $('body').on('click','.button-image' , (event) => {
                event.preventDefault();

                image = $(event.target).closest('.form-group');

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });

            // set file link
            function fmSetLink($url) {
                image.find('.image_label').first().val($url);
            }
            CKEDITOR.replace('editor1', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>
<script>
    $(document).ready(function(){
    $("#txtmsg").keyup(function(){
        var cha = $("#txtmsg").val().length;
        $(".char").html(cha); 
    });
    $("#txtmsg").keyup();
});  
</script>
@endsection