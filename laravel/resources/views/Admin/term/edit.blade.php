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
                                        <h3 class="invoice-to">ویرایش دوره</h3>
                                    </div>
                                    <hr>
                                    <!-- logo and title -->
                                    <form role="form" action="{{ route('admin.term.update',$term)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="row my-2 py-50">
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نام دوره</h6>
                                            <input type="text"  value="{{old('title',$term->title)}}" name="title" class="form-control" placeholder="نام دوره">
                                        </div>
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">لینک دوره</h6>
                                            <input type="text" name="slug" value="{{old('slug',$term->slug)}}"  class="form-control" placeholder="لینک دوره">
                                        </div>
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">سطح دوره</h6>
                                            <input type="text"  value="{{old('sath',$term->sath)}}" name="sath" class="form-control" placeholder="سطح دوره">
                                        </div>
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">نحوه ارائه</h6>
                                            <input type="text" name="eraye" value="{{old('eraye',$term->eraye)}}"  class="form-control" placeholder="نحوه ارائه">
                                        </div>
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">پشتیبانی</h6>
                                            <input type="text"  value="{{old('poshtibani',$term->poshtibani)}}" name="poshtibani" class="form-control" placeholder="پشتیبانی">
                                        </div>
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">مدرس</h6>
                                            <input type="text" name="teacher" value="{{old('teacher',$term->teacher)}}"  class="form-control" placeholder=" مدرس">
                                        </div>
                                        <div class="col-sm-6 col-12 order-2 order-sm-1 justify-content-end">
                                            <h6 class="text-info">الگوی پیامگکی کاوه نگار</h6>
                                            <input type="text" name="olgo" value="{{old('olgo',$term->olgo)}}"  class="form-control" placeholder=" الگوی پیامگکی کاوه نگار">
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- invoice address and contact -->
                                    <div class="row invoice-info">
                                        <div class="col-lg-6 col-md-12 mt-25">
                                            <h6 class="invoice-to">مبلغ دوره(تومان)</h6>
                                            <fieldset class=" form-group">
                                                <input type="text" class="form-control" name="price"
                                                    value="{{old('price',$term->Orginalprice())}}" placeholder="مبلغ دوره(تومان)">
                                            </fieldset>
                                            <h6 class="invoice-to">میزان تخفیف دوره (تومان)</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="off"
                                                    value="{{old('off',$term->off)}}" placeholder="میزان تخفیف دوره (تومان)">
                                            </fieldset>
                                            <h6 class="invoice-to">مبلغ هدیه دوره(تومان)</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="gift"
                                                    value="{{old('gift',$term->gift)}}"
                                                    placeholder="مبلغ هدیه دوره(افزوده به کیف پول خواهد شد)">
                                            </fieldset>
                                            <h6 class="invoice-to">  تخفیف خرید نقدی </h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="gift_price"
                                                    value="{{old('gift_price',$term->gift_price)}}"
                                                    placeholer="   ">
                                            </fieldset>
                                            {{-- <h6 class="invoice-to">مبلغ پورسانت به تومان</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="referralcost"
                                                value="{{old('referralcost',$term->referralcost)}}"
                                                    placeholder="مبلغ پورسانت به تومان">
                                            </fieldset> --}}
                                            <h6 class="invoice-to">تعداد اقساط دوره</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="installments"
                                                    value="{{old('installments',$term->installments)}}"
                                                    placeholder="تعداد اقساط دوره">
                                            </fieldset>
                                            <h6 class="invoice-to">مدت زمان پشتیبانی (روز)</h6>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" name="sup_day"
                                                    value="{{old('sup_day',$term->sup_day)}}"
                                                    placeholder="مدت زمان پشتیبانی">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                        <h5 class="text-left">{{route('term.purchase',$term->slug)}}</h5>
                                        <h6 class="invoice-to">لینک خرید دوره</h6>
                                        <input type="text" class="form-control text-left ltr" name="linkkharid"
                                        value="{{old('linkkharid',$term->linkkharid)}}"
                                        placeholder="لینک خرید دوره">
                                    </div>
                                    <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                        <h6 class="invoice-to">توضیح کوتاه</h6>
                                        <textarea  class="form-control rtl" id="editor2" name="content">{{$term->content}}</textarea>
                                    </div>
                                    <div class="col-sm-12 col-12 order-1 order-sm-1 justify-content-end">
                                        <h6 class="invoice-to">توضیحات کامل</h6>
                                        <textarea  class="form-control rtl" id="editor1" name="content_buttom">{{$term->content_buttom}}</textarea>
                                    </div>
                                    <hr>
                                    <div class="row invoice-info">

                                        <div class="col-lg-12 col-md-12 mt-25">
                                            <h6 class="invoice-to">فایل های مورد نیاز دوره</h6>
                                            <div class="col-lg-12 col-md-12">
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label" class="form-control image_label ltr" name="video" value="{{old('video',$term->video)}}" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب فایل ویدئو</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 col-md-12 mt-25">
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label" class="form-control image_label ltr" name="pic"
                                                               aria-label="File" value="{{old('pic',$term->pic)}}" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب تصویر شاخص</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <fieldset class="invoice-address form-group">
                                                    <div class="input-group col-sm-12" style="height: 35px">
                                                        <input type="text" id="file_label" class="form-control image_label ltr" name="picslider" value="{{old('picslider',$term->picslider)}}" aria-describedby="button-file">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-danger button-image " type="button" id="button-file">انتخاب اسلایدر</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                                                        <div class="row alert alert-info">
                                     سوالات متداول
                                      </div>
                                     <div class="invoice-product-details ">
                                         <div class="form invoice-item-repeater">
                                           <div data-repeater-list="groupa">
                                            @forelse ($images as $item)
                                             <div data-repeater-item>
                                               <div class="row mb-50">
                                                 <div class="col-6 invoice-item-title">سوال</div>
                                                 <div class="col-6 invoice-item-title">پاسخ</div>
                                               </div>
                                               <div class="invoice-item d-flex border rounded mb-1">
                                                   <div class="col-md-6 col-12 form-group">
                                                     <input type="text" name="names" value="{{$item->name}}" class="form-control" placeholder="عنوان">
                                                   </div>
                                                   <div class="col-md-5 col-12 form-group">
                                                    <textarea  class="form-control rtl" name="pasokh">{{$item->value}}</textarea>
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
                                                  <div class="col-6 invoice-item-title">سوال</div>
                                                  <div class="col-6 invoice-item-title">پاسخ</div>
                                                </div>
                                                <div class="invoice-item d-flex border rounded mb-1">
                                                    <div class="col-md-6 col-12 form-group">
                                                      <input type="text" name="names" class="form-control" placeholder="عنوان">
                                                    </div>
                                                    <div class="col-md-5 col-12 form-group">
                                                     <textarea  class="form-control rtl" name="pasokh"></textarea>
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
                                                 <span class="invoice-repeat-btn">افزودن</span>
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

                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="در صورتی که بخواهید این دوره بعد دوره مورد نظر گزرانده شود یکی از دوره های زیر را انتخاب کنید" data-trigger="hover" data-placement="right"></i> انتخاب دوره پیش نیاز </p>
                                <select name="pishniaz" id="paymentOption" class="form-control">
                                    <option value="">یک دوره را انتخاب کنید</option>
                                    @foreach($terms as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id== $term->pishniaz) ? 'selected' : '' }}>
                                        {{ $item->title }}</option>
                                    @endforeach
                                </select>
                                <p><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="" data-trigger="hover" data-placement="right"></i> انتخاب کانال مرتبط</p>
                                <select name="channel[]" class="form-control select2 rtl text-right" multiple>
                                    <option value="">یک مورد را انتخاب کنید</option>
                                    @foreach (\App\Models\MembertimeChannel::Orderby('channel_id')->get() as $item)
                                    <option value="{{ $item->id }}"  {{ in_array($item->id , $term->channel->pluck('id')->toArray()) ? 'selected' : '' }}>{{$item->channel->name}}->{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با ویژه کردن این دوره در اسلایدر نمایش داده می شود" data-trigger="hover" data-placement="right"></i> ویژه بودن دوره </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($term->vip)
                                        checked=""
                                        @endif name="vip" id="paymentTerm1">
                                        <label class="custom-control-label" for="paymentTerm1">
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between py-50">
                                    <span class="invoice-terms-title"><i class="bx bx-help-circle text-warning" data-toggle="popover" data-content="با فعال سازی این دوره دوره جهت ثبت نام در پنل دانشجو نمایش داده می شود" data-trigger="hover" data-placement="right"></i> فعال بودن دوره </span>
                                    <div class="custom-control custom-switch custom-switch-glow">
                                        <input type="checkbox" class="custom-control-input" @if ($term->access)
                                        checked=""
                                        @endif name="access" id="paymentTerm">
                                        <label class="custom-control-label" for="paymentTerm">
                                        </label>
                                    </div>
                                </div>
                                <div class="alert alert-info">تنظیمات سئو</div>
                                <h6 class="text-info">عنوان مرورگر</h6>
                                <textarea name="onvan" id="" class="form-control">{{old('onvan',$term->onvan)}}</textarea>
                                <h6 class="text-info">توضیحات سئو</h6>
                                <textarea name="description"id="txtmsg" class="form-control">{{old('description',$term->description)}}</textarea>
                                <span class='char' id="char" style="color: rgb(255, 255, 255);"></span>
                                <div class="invoice-action-btn mb-1 d-flex">
                                    <div class="w-50 mr-50">
                                        <button type="submit" class="btn btn-light-info btn-block">
                                            <span class="text-nowrap">ذخیره</span>
                                        </button>
                                    </div>
                                    <div class="w-50">
                                        <a href="{{route('admin.term.index')}}" class="btn btn-light-warning btn-block">
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
            CKEDITOR.replace('editor2', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
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
