@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<div class="container">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                  
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">
                                <div class="row post-cat">
                                    
                                    <div class="col-md-6 col-12 mb-3 mt-3">
                                        <form action="{{route('panel.chargewallet')}}" method="post">
                                            @csrf
                                        <label for="">شارژ کیف پول(تومان)</label>
                                        <input type="number" min="500000" value="0" name="cost" placeholder="مبلغ مورد نظر را وارد نمایید" class="form-control text-left" style="direction: ltr" max="20000000" required>

                                        <div class="form-auth-row mb-3">
                                          
                                                <input type="checkbox" value="1" required name="ghavanin" value="1" >
                                               
                                         
                                            <label for="remember" class="remember-me mr-0"><a href="#">حریم خصوصی</a> و <a href="#">شرایط قوانین </a></label>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-block">
                                            <span class="text-nowrap">پرداخت</span>
                                        </button>
                                       
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('Front.panel.layouts.sidebar')
                </div>
            </div>
        </section>
    </div>
</div>
<!-- profile------------------------------->
@include('Front.panel.layouts.footermenu')
@endsection