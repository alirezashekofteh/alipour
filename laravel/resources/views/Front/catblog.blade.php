@extends('Front.Layouts.master')
@section('title' , 'وب سایت رضا درخشی')
@section('content')
<div class="nav-categories-overlay"></div>
<!-- header-------------------------------->
<!-- adplacement------------------------------->
<div class="main-row">
    <div id="breadcrumb">
        <i class="mdi mdi-home"></i>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">خانه</a></li>
                <li class="breadcrumb-item"><a href="/blog">وبلاگ</a></li>
                <li class="breadcrumb-item active open" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="">
        <div class="adplacement-container-row">
            <div class="col-12">
                <form method="get" class="blogcat-search mt-3" data-aos="flip-up">
                    <div class="p-3">
                        <div class="col-lg-5 col-md-6 pr">
                            <div class="form-group">
                                <label for="search"><i class="bx bx-search"></i>جستجو</label>
                                <input name="s" type="text" value="" class="form-control" id="search"
                                    placeholder="دنبال چی میگردی؟">

                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pr">
                            <div class="form-group">
                                <label for="category"><i class="bx bx-list-check"></i>دسته بندی مطالب</label>
                                <select name="category" class="form-control" id="category">
                                    <option value="" style="font-weight: 800">همه</option>
                                    @foreach (\App\Models\Category::where('type','post')->where('parent','0')->get() as
                                    $item)
                                    <option value="{{$item->id}}" style="font-weight: 800">{{$item->name}}</option>
                                    @if($item->child()->count())
                                    @foreach ($item->child as $items)
                                    <option value="{{$items->id}}">  {{$items->name}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 pr">
                            <div class="form-group">
                                <label for="level"><i class="bx bx-check"></i>سطح مطالب </label>
                                <select name="level" class="form-control" id="level">
                                    <option value="">همه</option>
                                    <option value="10">مقدماتی</option>
                                    <option value="11">متوسط</option>
                                    <option value="12">پیشرفته</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-6 pr">
                            <div class="form-group mt-4">
                                <button id="submit" type="button" class="btn btn-success btn-block">اعمال</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
            <ul class="list-unstyled related-topics">
                @foreach ($cats as $item )
                <div class="col-md-3 col-6 pr">
                    <div class="saham-box">
                        <a href="{{route('catblog',$item->slug)}}" title="{{$item->name}}">
                            <img src="{{$item->pic}}" alt="{{$item->name}}">
                            <h2 class="title">{{$item->name}}</h2>
                        </a>
                    </div>
                </div>
                @endforeach
            </ul>
    </div>
</div>
<div class="container">
    <div class="col-md-12 pr">
    <article class="widget card ">
        <header class="card-header header-product">
            <span class="title-one text-dark" style="font-size: 20px">مطالب مربوط به {{$category->name}}</span>
            <h3 class="card-title"></h3>
        </header>
    </article>
    </div>
</div>


<!-- slider-product-------------------------------->
<div class="container">
        <div class="col-md-12 pr">
            <div class="row post-cat">
                @foreach ($posts as $post)
                <div class="col-md-3 col-6 mb-3 mb-3">
                    <div class="tab-item col-md-12">
                        <a href="{{route('singleblog',$post->slug)}}" class="d-block hover-img-link">
                            <img src="{{$post->images->first()->pic}}" class="img-fluid rounded" alt="">
                        </a>
                        <a href="{{route('singleblog',$post->slug)}}">
                            <h5 class="post-title text-dark p-2"><i class="fa fa-list-alt icontitle"></i>
                                </i>{{$post->name}}</h5>
                        </a>
                        <hr>
                        <div class="price text-center pl text-dark p-2">
                            <i class="fa fa-calendar text-info"></i>
                            :{{jdate($post->created_at)->format('%d %B %Y')}}
                        </div>
                        <div class="p-2">
                            <a href="{{route('singleblog',$post->slug)}}" class="btn btn-success"><i
                                    class="fa fa-eye ml-1" aria-hidden="true"></i>مشاهده</a>
                        </div>

                    </div>
                </div>
                @endforeach
                <div class="pagination-product pr-3 pl-3 pr">
                    {{ $posts->links() }}
                    </div>
            </div>
        </div>
</div>
<div class="container">
    <div class="tabs">
        <div class="col-lg">
            <div class="tabs-content">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Review" role="tabpanel" aria-labelledby="Review-tab">
                        <section class="content-expert-summary">
                            <div class="mask pm-3">
                                <div class="mask-text" style="text-align: justify;">
                                    {!!$category->content!!}
                                </div>
                                <a href="#" class="mask-handler">
                                    <span class="show-more">+ ادامه مطلب</span>
                                    <span class="show-less">- بستن</span>
                                </a>
                                <div class="shadow-box"></div>
                            </div>
                        </section>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@include('Front.Layouts.footermenu')
@endsection
