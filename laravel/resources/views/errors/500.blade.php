@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<div class="container">
    <div class="col-12">
        <div id="content">
            <div class="d-404">
                <div class="d-404-title">
                 <h2>{{ $exception->getMessage() }}</h2>
                </div>
                <div class="d-404-actions">
                    <a href="/" class="d-404-action-primary">صفحه اصلی</a>
                </div>
                <h1>
                  500
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection
