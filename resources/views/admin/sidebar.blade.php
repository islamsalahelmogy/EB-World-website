
<div class="card">
    <div class="card-body pattern-2">
        <div class="wideget-user">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="wideget-user-desc text-center">
                        <div class="wideget-user-img">
                            @if (auth('admin')->user()->image != null)
                                <img class="brround" src="{{asset('assets/images/data/admins/'.auth('admin')->user()->id.'/'.auth('admin')->user()->image)}}" alt="img">
                            @else
                                <img class="brround" src="{{asset('assets/images/data/admins/male.jpg')}}" alt="img">
                            @endif
                        </div>
                        <div class="user-wrap wideget-user-info">
                            <a href="javascript:void(0)"><h4 class="font-weight-semibold text-white">{{auth('admin')->user()->name}}</h4></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="card">
        <aside class="app-sidebar doc-sidebar my-dash">
            <div class="app-sidebar__user clearfix">
                <ul class="side-menu">
                    <li>
                        <a class="side-menu__item @if(Request::is('*dashboard')) active @endif" href=""><i class="side-menu__icon fe fe-bar-chart-2"></i><span class="side-menu__label">لوحة التحكم</span></a>
                    </li>
                    {{-- not show in admin who name is not master --}}
                    @if (auth('admin')->user()->id == 1)
                        <li>
                            <a class="side-menu__item @if(Request::is('*admins*')) active @endif" href="{{route('admin.admins')}}"><i class="side-menu__icon fe fe-shield"></i><span class="side-menu__label">المسئولين</span></a>
                        </li>
                    @endif
                    <li>
                        <a class="side-menu__item @if(Request::is('*doctors*')) active @endif" href="{{route('admin.doctors')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">الدكاترة</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item @if(Request::is('*departments*')) active @endif" href="{{route('admin.departments')}}"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">الأقسام / التخصصات</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item @if(Request::is('*subjects*')) active @endif" href="{{route('admin.subjects')}}"><i class="side-menu__icon fe fe-book-open"></i><span class="side-menu__label">المواد</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item @if(Request::is('*levels*')) active @endif" href="{{route('admin.levels')}}"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">المستويات</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item @if(Request::is('*profile*')) active @endif" href="{{route('admin.profile')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">الصفحة الشخصية</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item @if(Request::is('*settings*')) active @endif" href="{{route('admin.settings')}}"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">الإعدادات</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item" href="{{route('admin.logout')}}"><i class="side-menu__icon fe fe-power"></i><span class="side-menu__label">خروج</span></a>
                    </li>
                </ul>
            </div>
        </aside>
</div>