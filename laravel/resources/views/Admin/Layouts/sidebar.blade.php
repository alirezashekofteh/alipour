<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow"
    role="navigation" data-menu="menu-wrapper">
    <div class="navbar-header d-xl-none d-block">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"
                    href="/admins/html/horizontal-menu-template-dark/index.html">
                    <div class="brand-logo"><img class="logo" src="/admins/assets/images/logo/logo.png"></div>
                    <h2 class="brand-text mb-0">طراحان وب ایران</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include /admins/includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            @foreach ($MenuAdmin as $item)
            @php
            $parent = $item->child()->where('view',1)->orderby('tartib')
            ->get();
            $sub='';
            $sub1="";
            if($parent->count())
            {
            $sub="dropdown-toggle";
            $sub1="dropdown";
            }
            @endphp
            <li class="{{$sub1}} nav-item" data-menu="{{$sub1}}"><a class="{{$sub}} nav-link" href="/{{$item->link}}" data-toggle="{{$sub1}}"><span>{{$item->name}}</span></a>
            @if($parent->count())
            <ul class="dropdown-menu dropdown-menu-right">
                @foreach($parent as $pp)
                <li data-menu=""><a class="dropdown-item align-items-center" href="/{{$pp->link}}"
                        ><i class="bx bx-left-arrow-alt"></i>{{$pp->name}}</a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
            @endforeach

        </ul>
    </div>
    <!-- /horizontal menu content-->
</div>
