@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<div class="container">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    @include('Front.panel.layouts.sidebar')
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="profile-address">
                                    <div class="middle-container">
                                        <form action="{{route('panel.new.ticket')}}" method="POST" class="form-checkout">
                                            @csrf
                                            <div class="form-checkout-row">
                                                <label for="namefirst">دپارتمان <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <select name="department_id" class="form-control rtl text-right">
                                                    @foreach (\App\Models\Department::where('active','1')->get() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name}}</option>
                                                    @endforeach
                                                </select>

                                                <label for="namelast">دوره مربوطه <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <select name="term_id" class="form-control rtl text-right">
                                                    <option value="">یک مورد را انتخاب کنید</option>
                                                    @foreach (Auth::user()->order()->where('status', 1)->get() as $item)
                                                    <option value="{{$item->term->id }}">{{ $item->term->title}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                <label for="email">اهمیت تیکت <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <select class="form-control" name="priority">
                                                    @foreach(config('value.priority') as $key => $name)
                                                    <option value="{{ $key }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
<hr>
                                                <label for="password">عنوان تیکت <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                                <input type="text" name="name"
                                                     id="password"
                                                    class="input-password-checkout form-control">
                                                    <label for="password">متن تیکت <abbr class="required" title="ضروری"
                                                        style="color:red;">*</abbr></label>
                                               <textarea name="body" id="" class="form-control" cols="30" rows="10"></textarea>
                                                <div class="AR-CR">
                                                    <button class="btn-registrar" type="submit"> ثبت تیکت</button>
                                                    <a href="#" class="cancel-edit-address" data-dismiss="modal"
                                                        aria-label="Close">بازگشت</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection
