<header class="nav-container">
    <nav class="sina-nav mobile-sidebar navbar-fixed" data-top="60">
        <div class="container">

            <div class="extension-nav">
                @if (Route::has('login'))
                <ul class="pt-2">

                        @auth
                            <li>
                                <a id="loginbtn" href="{{ url('/panel') }}" class="btn btn-link p-1 ml-2">
                                    <img src="/Images/Svg/login.svg" />پروفایل من
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-link p-1 ml-2" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    خروج
                                </a>
                            </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
@if (auth()->user()->superuser())
<li>
    <a id="loginbtn" href="{{ url('/admin') }}" class="btn btn-link p-1 ml-2">
        <img src="/Images/Svg/chart.svg" />پنل مدیریت
    </a>
</li>
@endif

                        @else
                            <li>
                                <a id="loginbtn" href="{{route('login')}}" class="btn btn-link p-1 ml-2">
                                    <img src="/Images/Svg/login.svg" /> ورود
                                </a>
                            </li>

                            @if (Route::has('register'))
                                <li>
                                    <a id="loginbtn" href="{{ route('register') }}" class="btn btn-link p-1 ml-2">
                                        <img src="/Images/Svg/user.svg" />ثبت نام
                                    </a>
                                </li>
                @endif
                @endauth


            </ul>
            </div>
            @endif

            </div>
            <div class="sina-nav-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="sina-brand pl-4" href="Index.html">
                    <img src="/Images/logo.png" class="img-fluid" />
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="sina-menu sina-menu-center IRANSansWeb">
                    <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                    @php
                        $items =

->wher\App\Models\Menu::where('parent','0')e('view','1')
->orderby('tartib')
->get();
                    @endphp
                    @foreach ($items as $item)
                    <li><a href="{{route($item->route,$item->value)}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
