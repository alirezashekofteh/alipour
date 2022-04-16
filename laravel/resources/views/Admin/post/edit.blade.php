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
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body pb-0 mx-25">
                                    <!-- header section -->
                                    <div class="row mx-0">
                                        <h3 class="invoice-to">افزودن مقاله جدید</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form role="form" action="{{ route('admin.post.update',$post->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">عنوان مقاله</h6>
                                            <input type="text" class="form-control" value="{{old('name',$post->name)}}" name="name" placeholder="نام مقاله">
                                        </div>
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">آدرس صفحه</h6>
                                            <input type="text" class="form-control" value="{{old('slug',$post->slug)}}" name="slug" placeholder="نام مقاله">
                                        </div>
                                        <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">متن ابتدای مقاله</h6>
                                            <textarea  class="form-control rtl" name="content">{{old('content',$post->content)}}</textarea>
                                        </div>
                                        <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                            <h6 class="invoice-to">متن کامل مقاله</h6>
                                            <textarea  class="form-control rtl" id="editor1" name="fullcontent">{{old('fullcontent',$post->fullcontent)}}</textarea>
                                        </div>



                                    </div>
                                    <hr>
                                    <!-- invoice address and contact -->
                                    <div class="col-lg-12 col-md-12 mt-25">
                                        <fieldset class="invoice-address form-group">
                                            <div class="input-group col-sm-12" style="height: 35px">
                                                <input type="text" id="file_label"  value="{{old('video',$post->video)}}" class="form-control image_label ltr" name="video"
                                                       aria-label="File" aria-describedby="button-file">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب ویدئو</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-25">
                                        <fieldset class="invoice-address form-group">
                                            <div class="input-group col-sm-12" style="height: 35px">
                                                <input type="text" id="file_label" class="form-control image_label ltr" name="cover" value="{{old('cover',$post->cover)}}"
                                                       aria-label="File" aria-describedby="button-file">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب کاور</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="row alert alert-info">
                                        گالری تصاویر
                                     </div>
                                     <div class="invoice-product-details ">
                                         <div class="form invoice-item-repeater">
                                           <div data-repeater-list="groupa">
                                               @forelse ($images as $item)
                                               <div data-repeater-item>
                                                 <div class="row mb-50">
                                                   <div class="col-3 invoice-item-title">نام تصویر </div>
                                                   <div class="col-8 invoice-item-title">تصویر</div>
                                                 </div>
                                                 <div class="invoice-item d-flex border rounded mb-1">
                                                     <div class="col-md-3 col-12 form-group">
                                                       <input type="text" name="names" value="{{$item->name}}" class="form-control" placeholder="عنوان">
                                                     </div>
                                                     <div class="col-md-8 col-12 form-group">
                                                       <fieldset class="invoice-address form-group">
                                                           <div class="input-group col-sm-12" style="height: 35px">
                                                               <input type="text" id="file_label" class="form-control image_label ltr" value="{{$item->pic}}" name="pic"
                                                                      aria-label="File" aria-describedby="button-file">
                                                               <div class="input-group-append">
                                                                   <button class="btn btn-info button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                               </div>
                                                           </div>
                                                       </fieldset>
                                                     </div>
                                                   <div class="col-md-1 col-12 form-group">
                                                     <span class="cursor-pointer" data-repeater-delete>
                                                       <i class="bx bxs-x-square font-large-1 text-danger"></i>
                                                     </span>
                                                   </div>
                                                 </div>
                                               </div>
                                               @empty
                                               <div data-repeater-item>
                                                 <div class="row mb-50">
                                                   <div class="col-3 invoice-item-title">نام تصویر </div>
                                                   <div class="col-8 invoice-item-title">تصویر</div>
                                                 </div>
                                                 <div class="invoice-item d-flex border rounded mb-1">
                                                     <div class="col-md-3 col-12 form-group">
                                                       <input type="text" name="names" class="form-control" placeholder="عنوان">
                                                     </div>
                                                     <div class="col-md-8 col-12 form-group">
                                                       <fieldset class="invoice-address form-group">
                                                           <div class="input-group col-sm-12" style="height: 35px">
                                                               <input type="text" id="file_label" class="form-control image_label ltr" name="pic"
                                                                      aria-label="File" aria-describedby="button-file">
                                                               <div class="input-group-append">
                                                                   <button class="btn btn-info button-image " type="button" id="button-file">انتخاب تصویر</button>
                                                               </div>
                                                           </div>
                                                       </fieldset>
                                                     </div>
                                                   <div class="col-md-1 col-12 form-group">
                                                     <span class="cursor-pointer" data-repeater-delete>
                                                       <i class="bx bxs-x-square font-large-1 text-danger"></i>
                                                     </span>
                                                   </div>
                                                 </div>
                                               </div>
                                               @endforelse

                                           </div>
                                           <div class="form-group">
                                             <div class="col p-0">
                                               <button class="btn btn-light-primary btn-sm" data-repeater-create type="button">
                                                 <i class="bx bx-plus"></i>
                                                 <span class="invoice-repeat-btn">افزودن گالری تصویر</span>
                                               </button>
                                             </div>
                                           </div>
                                         </div>
                                     </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- invoice action  -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card invoice-action-wrapper shadow-none border">
                            <div class="card-body">
                                <h6 class="text-info">نمایش برای </h6>
                                <select class="form-control" name="type">
                                    @foreach(config('value.subscription') as $key => $name)
                        <option value="{{ $key }}" {{ old('type') == $key || $post->type==$key  ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                                </select>
                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="در صورتی که بخواهید این دوره بعد دوره مورد نظر گزرانده شود یکی از دوره های زیر را انتخاب کنید" data-trigger="hover" data-placement="right"></i> انتخاب دسته بندی </p>
                                <select class="form-control select2" name="category[]" multiple>

                                        @foreach (\App\Models\Category::where('type','post')->where('parent','0')->get() as
                                        $item)
                                        <option value="{{$item->id}}" {{ in_array($item->id , $post->category->pluck('id')->toArray()) ? 'selected' : '' }} style="font-weight: 800">{{$item->name}}</option>
                                        @if($item->child()->count())
                                        @foreach ($item->child as $items)
                                        <option value="{{$items->id}}" {{ in_array($items->id , $post->category->pluck('id')->toArray()) ? 'selected' : '' }}>  {{$items->name}}</option>
                                        @endforeach
                                        @endif
                                        @endforeach
                                </select>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال سازی این گزینه دریافت نشرات برای این مقاله فعال می شود" data-trigger="hover" data-placement="right"></i> فعال بودن نظرات </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($post->comment)
                                        checked=""
                                        @endif name="comment" id="paymentTerm1">
                                        <label class="custom-control-label" for="paymentTerm1">
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال سازی این گزینه این مقاله در سایت جهت نمایش فعال می شود" data-trigger="hover" data-placement="right"></i>قابل نمایش در وب سایت</span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($post->active)
                                        checked=""
                                        @endif name="active" id="paymentTerm">
                                        <label class="custom-control-label" for="paymentTerm">
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با انتخاب این گزینه اطلاع رسانی مقاله جدید به کاربران انجام خواهد شد" data-trigger="hover" data-placement="right"></i>ارسال پیامک اطلاع رسانی</span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($post->noti)
                                        checked=""
                                        @endif name="noti" id="paymentTerm2">
                                        <label class="custom-control-label" for="paymentTerm2">
                                        </label>
                                    </div>
                                </div>
                                <div class="alert alert-info">تنظیمات سئو</div>
                                <h6 class="text-info">عنوان مرورگر</h6>
                                <textarea name="title" id="" class="form-control">{{old('title',$post->title)}}</textarea>
                                <h6 class="text-info">توضیحات سئو</h6>
                                <textarea name="description" id="txtmsg" class="form-control">{{old('description',$post->description)}}</textarea>
                                <span class='char' id="char" style="color: rgb(255, 255, 255);"></span>

                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a href="{{route('admin.post.index')}}" class="btn btn-light-warning btn-block">
                                            <span class="text-nowrap">بازگشت</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
