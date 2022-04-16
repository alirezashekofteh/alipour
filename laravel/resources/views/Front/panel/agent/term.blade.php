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
                        <div class="alert alert-success"> قسط بندی ترم برای کاربر {{$user->nf}}</div>
                        <form action="{{route('panel.agent.term.installments')}}" method="post">
                            @csrf
                             <div class="row">
                           
                            <div class="col-md-8">
                                  <select name="term"  class="form-control" required>
                                      <option value="">یه ترم جهت قسط بندی را انتخاب نمایید</option>
                                      @foreach ($terms as $item)
                                      <option value="{{$item->id}}" >{{$item->title}} --تعداد اقساط ({{$item->installments}})</option>
                                      @endforeach
                                  </select>
                            </div>
                        </div>
                           
                        
                            <button class="btn btn-info" type="submit"> ایجاد فاکتور </button>
                            <label for="">پس از ایجاد فاکتور لینک قسط اول برای کاربر پیامک می شود</label>
                        </form>


                            
                       

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection