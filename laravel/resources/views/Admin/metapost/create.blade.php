@extends('Admin.Layouts.master')
@section('content')
<div class="col-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-note"></i>
                    افزودن لیست محتوا {{$post->name}}
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
            @include('Admin.Layouts.errors')
            <form role="form" action="{{ route('admin.post.metapost.store',$post->id)}}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="form-group curve row">
                        <label class="col-sm-3">نام محتوا</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="نام محتوا">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                        <label class="col-sm-3">متن</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control ltr" id="editor1" name="content" >{{old('content')}}</textarea>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                        <label class="col-sm-3">کد برنامه نویسی</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control ltr" name="code"> {{old('code')}} </textarea>
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group curve row">
                        <label class="col-sm-3">نوع محتوا</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="noe">
                                @foreach(config('value.mohtava') as $key => $name)
                    <option value="{{ $key }}" {{ old('noe')==$key  ? 'selected' : '' }} >{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                        <label class="col-sm-3">ترتیب </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tartib" value="{{old('tartib')}}"  placeholder="ترتیب">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group curve row">
                    <label class="col-sm-3">بارگزاری فایل</label>
                    <div class="input-group col-sm-9" style="height: 35px">
                        <input type="text" id="image_label" class="form-control ltr" value="{{old('file')}}"  name="file"
                               aria-label="Image" aria-describedby="button-image">
                        <div class="input-group-append">
                            <button class="btn btn-danger " type="button" id="button-image">انتخاب فایل</button>
                        </div>
                    </div>
                    </div>
                    <hr>
                </div><!-- /.form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-info btn-round">
                        <i class="icon-check"></i>
                        ذخیره
                    <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></button>
                    <a  href="{{route('admin.post.metapost.index',$post)}}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></a>
                </div><!-- /.form-actions -->
            </form>
        </div>
    </div><!-- /.portlet -->
</div><!-- /.col-12 -->
@endsection
@section('js-page')
<script src="/admins/assets/plugins/select2/dist/js/select2.full.min.js"></script>
<script src="/admins/assets/plugins/select2/dist/js/i18n/fa.js"></script>
<script src="/admins/assets/js/pages/select2.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

document.getElementById('button-image').addEventListener('click', (event) => {
  event.preventDefault();

  window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
});
});

// set file link
function fmSetLink($url) {
document.getElementById('image_label').value = $url;
}
CKEDITOR.replace( 'editor1' );
</script>
@endsection
