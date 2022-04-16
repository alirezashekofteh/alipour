@extends('Admin.Layouts.master')
@section('content')
    <div class="col-12">
        <div class="portlet box border shadow">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h3 class="title">
                        <i class="icon-note"></i>
                        تیتر صفحه
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
                <form id="validate-form" rel="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-success " style="box-shadow: 2px 4px 6px 2px;"  >
                                <h2 class="curve" style="text-align: center;background: #400040;color: white;">مشخصات کلی</h2>
                                <br />
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label class="label  label-default" style="color:  white;font-size:15px;">نام مقاله</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user "></i>
                                                </span>
                                                <input placeholder="نام مقاله" id="name2" class="form-control rtl text-right" name="name" required="" aria-required="true" aria-describedby="name2-error" aria-invalid="true" type="text" style="text-align: right;" />
                                            </div><!-- /.input-group -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label class="label  label-default" style="color:  white;font-size:15px;">نام نویسنده</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user "></i>
                                                </span>
                                                <input placeholder="نام نویسنده" id="name2" class="form-control rtl text-right" name="author" required="" aria-required="true" aria-describedby="name2-error" aria-invalid="true" type="text" style="text-align: right;" />
                                            </div><!-- /.input-group -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <label class="label  label-default" style="color:  white;font-size:15px;">وضعیت</label>
                                        <div class="input-group curve">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-users"></i>
                                                    </span>
                                            <select class="form-control" name="active">
                                                <option value="0">غیرفعال </option>
                                                <option value="1">فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6  ">
                                        <label   class="label  label-default" style="color:  white;font-size:15px;">دسته بندی ها</label>
                                        <div class="input-group curve">
                                                <span class="input-group-addon">
                                                    <i class="icon-note"></i>
                                                </span>
                                            <select class="form-control select2 curve" name="cat" >

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="label  label-default" style="color:  white;font-size:15px;">پیش متن </label>
                                        <div class="input-group curve">
                                               <span class="input-group-addon">
                                                        <i class="icon-note"></i>
                                                    </span>
                                            <textarea   class="form-control" name="tozih" rows="5" placeholder="پیش متن " ></textarea>
                                        </div><!-- /.input-group -->
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label class="label  label-default" style="color:  white;font-size:15px;">تصویر </label>
                                        <div class="input-group curve">
                                                    <span class="input-group-addon">
                                                        <i class="icon-note"></i>
                                                    </span>
                                            <input  class="form-control "   name="pic"  type="file" />
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-sm-9 col-sm-push-1 ">
                                        <label class="label  label-default" style="color:  white;font-size:15px;">توضیحات کامل </label>
                                        <div class="input-group curve">
                                            <textarea cols="100" id="editor1"  class="form-control" name="full_tozih" rows="5" placeholder="عنوان"  minlength="" ></textarea>
                                        </div><!-- /.input-group -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="input-group" style="margin-top: 10px;">
                        <button type="submit" name="save" class="btn btn-info btn-round">
                            <i class="icon-check"></i>
                            ذخیره
                            <div class="paper-ripple"><div class="paper-ripple__background" style="opacity: 0.007648;"></div><div class="paper-ripple__waves"></div></div></button>
                        <a href="post.php"class="btn btn-danger curve" >
                            بازگشت به لیست
                        </a>
                    </div>
                </form>
            </div><!-- /.portlet-body -->
        </div><!-- /.portlet -->
    </div><!-- /.col-12 -->
@endsection
