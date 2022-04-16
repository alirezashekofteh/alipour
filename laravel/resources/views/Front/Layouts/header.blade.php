<header class="header-main">
    <div class="container-main">
        {{-- <section class="h-main-row">
            <div class="col-lg-9 col-md-9 col-xs-12 pr">
                <div class="header-right">
                    <div class="col-lg-3 pr">
                        <div class="header-logo row text-right">
                            <a href="/">
                                <img src="https://train.rezaderakhshi.com/Images/rezaderakhshilogo.png" alt="رضا درخشی"
                                    style="width: 100%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-md-none pr">
                        <div class="header-search row text-right">
                            <div class="header-search-box">
                                <form action="#" class="form-search">
                                    <input type="search" class="header-search-input" name="search-input"
                                        placeholder="جستجو در محتوای وب سایت">
                                    <div class="action-btns">
                                        <button class="btn btn-search" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <div class="search-filter">
                                            <div class="form-ui">
                                                <div class="custom-select-ui">
                                                    <select class="right">
                                                        <option>همه دسته ها</option>
                                                        <option>تحلیل ها</option>
                                                        <option>مقالات</option>
                                                        <option>دوره ها</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Route::has('login'))
            <div class="col-lg-3 col-md-3 col-xs-12 pl">
                <div class="header-left">
                    <div class="header-account text-left">
                        <div class="d-block">
                            <div class="account-box account-box-home-2">
                                @auth
                                <div class="nav-account d-block pl">
                                    <span class="icon-account">
                                        <img src="{{auth()->user()->pic}}" class="avator">
                                    </span>
                                    <span class="title-account">{{auth()->user()->nf}}</span>
                                    <div class="dropdown-menu">
                                        <ul class="account-uls mb-0">
                                            <li class="account-item">
                                                <a href="{{ url('/panel') }}" class="account-link">پنل کاربری</a>
                                            </li>

                                            @if (auth()->user()->superuser())
                                            <li class="account-item">
                                                <a href="{{ url('/admin') }}" class="account-link">پنل مدیریت</a>
                                            </li>
                                            @endif
                                            <li class="account-item">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"
                                                    class="account-link">
                                                    خروج
                                                </a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                @else
                                <div class="nav-account d-block pl">
                                    <span class="icon-account">
                                        <img src="assets/images/man.png" class="avator">
                                    </span>
                                    <span class="title-account">حساب کاربری</span>
                                    <div class="dropdown-menu">
                                        <ul class="account-uls mb-0">
                                            <li class="account-item">
                                                <a href="{{route('login')}}" class="account-link">ورود </a>
                                            </li>
                                            <li class="account-item">
                                                <a href="{{ route('register') }}" class="account-link">ثبت نام</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </section> --}}
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-md-9 col-xs-12 pr">
                        <div class="col-lg-3 pr">
                            <div class="header-logo row text-right">
                                <a href="/">
                                    <img src="/images/logo/logo.png"
                                        alt="رضا درخشی" style="width: 100%;">
                                </a>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 d-md-none pr">
                            <div class="header-search text-right">
                                <div class="header-search-box">
                                    <form action="#" class="form-search">
                                        <input type="search" class="header-search-input" name="search-input"
                                            placeholder="جستجو در محتوای وب سایت">
                                        <div class="action-btns">
                                            <button class="btn btn-search" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <div class="search-filter">
                                                <div class="form-ui">
                                                    <div class="custom-select-ui">
                                                        <select class="right">
                                                            <option>همه دسته ها</option>
                                                            <option>تحلیل ها</option>
                                                            <option>مقالات</option>
                                                            <option>دوره ها</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @if (Route::has('login'))
            <div class="col-lg-3 col-md-3 col-xs-12 pl">

                <div class="header-left">
                    <div class="header-account text-left">

                        <div class="d-block">
                            <li class="menu-sosial d-none d-md-block" style="position: absolute;right: 80px ; top: 10px;">
                                                        <a href="https://www.instagram.com/bourse_invest/" dideo-checked="true">
                                                            <img src="/images/sosial/insta.png" style="width: 32px" alt="اینستگرام">
                                                        </a>
                                                    </li>
                            <div class="account-box account-box-home-2">
                                <li class="menu-sosial d-md-none">
                                    <a href="https://www.instagram.com/bourse_invest/">
                                        <img src="/images/sosial/insta.png" style="width: 32px" alt="اینستگرام">
                                    </a>
                                </li>
                                @auth
                                <div class="nav-account d-block pl">
                                    <span class="icon-account">
                                        <img src="{{auth()->user()->pic}}" class="avator">
                                    </span>
                                    <span class="title-account">{{auth()->user()->nf}}</span>
                                    <div class="dropdown-menu">
                                        <ul class="account-uls mb-0">
                                            <li class="account-item">
                                                <a href="{{ url('/panel') }}" class="account-link">پنل کاربری</a>
                                            </li>

                                            @if (auth()->user()->superuser())
                                            <li class="account-item">
                                                <a href="{{ url('/admin') }}" class="account-link">پنل مدیریت</a>
                                            </li>
                                            @endif
                                            <li class="account-item">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"
                                                    class="account-link">
                                                    خروج
                                                </a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                @else
                                <div class="nav-account d-block pl">
                                    <span class="icon-account">
                                        <img src="/assets/images/man.png" class="avator">
                                    </span>
                                    <span class="title-account">حساب کاربری</span>
                                    <div class="dropdown-menu">
                                        <ul class="account-uls mb-0">
                                            <li class="account-item">
                                                <a href="{{route('login')}}" class="account-link">ورود </a>
                                            </li>
                                            <li class="account-item">
                                                <a href="{{ route('register') }}" class="account-link">ثبت نام</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif


                </div>
            </div>
        </div>
        <div>
            <nav class="header-main-nav container">
                <div class="d-block">
                    <div class="align-items-center">
                        <ul class="menu-ul mega-menu-level-one">
                            @foreach ($Menu as $item)
            @php
            $parent = $item->child()->where('view',1)->orderby('tartib')
            ->get();
            @endphp
                            <li class="menu-item nav-overlay" id="nav-menu-item"><a class="current-link-menu" href="{{$item->link}}">{{$item->name}}</a>
                                @if($parent->count())
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <ul class="sub-menu is-mega-menu-small">
                                    @foreach($parent as $pp)
                                    <li class="menu-mega-item menu-item-type-mega-menu item-small"><a class="mega-menu-link" href="{{$pp->link}}">{{$pp->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!--    responsive-megamenu-mobile----------------->
        <nav class="sidebar">
            <div class="nav-header">
                <!--              <img class="pic-header" src="images/header-pic.jpg" alt="jsj">-->
                <div class="header-cover"></div>
                <div class="logo-wrap">
                    <a class="logo-icon" href="/"><img alt="logo-icon"
                            src="https://train.rezaderakhshi.com/Images/rezaderakhshilogo.png" width="40"></a>
                </div>
            </div>
            <ul class="nav-categories ul-base">
                @foreach ($Menu as $item)
                @php
                $parent = $item->child()->where('view',1)->orderby('tartib')
                ->get();
                @endphp
                                <li class="menu-item nav-overlay" id="nav-menu-item"><a class="collapsed" type="button"@if($parent->count()) data-toggle="collapse" @endif data-target="#collapse{{$item->id}}"
                                    aria-expanded="false" aria-controls="collapse{{$item->id}}" href="{{$item->link}}">
                                    @if($parent->count())
                                    <i class="mdi mdi-chevron-down"></i>
                                    {{$item->name}}</a>
                                    <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="heading{{$item->id}}" data-parent="#accordionExample"
                                    style="">
                                    <ul>
                                        @foreach($parent as $pp)
                                        <li><a class="category-level-2" href="{{$pp->link}}">{{$pp->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>

                                    @else
                                    {{$item->name}}</a>

                                    @endif
                                </li>
                                @endforeach
            </ul>
        </nav>
        <div class="nav-btn nav-slider nav-btn-home-3">
            <span class="linee1"></span>
            <span class="linee2"></span>
            <span class="linee3"></span>
            <span class="menumahsolat">فهرست</span>
        </div>
        <div class="overlay"></div>
        <!--    responsive-megamenu-mobile----------------->
    </div>
</header>
