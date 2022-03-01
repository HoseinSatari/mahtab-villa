<nav class="main-menu clearfix">
    <div class="main-menu-wrapper clearfix">
        <div class="container clearfix">
            <div class="main-menu-wrapper-inner clearfix">
                <div class="main-menu-wrapper__left clearfix">
                    <div class="main-menu-wrapper__logo">
                        <a href="{{route('home')}}"><img src="{{option()->image}}" alt="{{option()->sitename}}" style="width: 160px;width: 70px;transform: scale(3)"></a>
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li>
                                <a href="{{route('home')}}">خانه</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">مقالات</a>
                                <ul>
                                    @foreach(\App\Category::where('is_active' , '1')->where('parent' , '0')->get() as $cat)
                                        <li><a href="{{route('articles'  , ['c' => $cat->slug])}}">{{$cat->name}}</a>
                                            @if($cat->child()->count())
                                            <ul>
                                                @foreach($cat->child()->where('is_active','1')->get() as $child)
                                                    <li><a href="{{route('articles'  , ['c' => $child->slug])}}">{{$child->name}}</a></li>

                                            @endforeach
                                            </ul>
                                        @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{request()->url() == route('contact') ? 'current' : '' }}"><a href="{{route('contact')}}">تماس با ما</a></li>
                            <li class="{{request()->url() == route('about') ? 'current' : '' }}"><a href="{{route('about')}}"> درباره ما </a></li>
                            @if(auth()->check())
                                @if(auth()->user()->is_staff or auth()->user()->is_superuser)
                                    <li class="{{request()->url() == route('admin.panel') ? 'current' : '' }}"><a
                                            href="{{route('admin.panel')}}"> پنل مدیریت </a></li>
                                @else
                                    <li class="{{request()->url() == route('user') ? 'current' : '' }}"><a
                                            href="{{route('user')}}"> پنل کاربری </a></li>
                                @endif
                            @else
                                <li class="{{request()->url() == route('login') ? 'current' : '' }}"><a
                                        href="{{route('login')}}"> ورود | ثبت نام </a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="main-menu-wrapper__right">
                    <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                </div>
            </div>
        </div>
    </div>
</nav>


