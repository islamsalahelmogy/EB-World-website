
<div class="card">
    <div class="card-body pattern-2">
        <div class="wideget-user">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="wideget-user-desc text-center">
                        <div class="wideget-user-img">
                            @if (auth('user')->user()->image != null)
                                <img class="brround" src="{{asset('assets/images/data/users/'.auth('user')->user()->id.'/'.auth('user')->user()->image)}}" alt="img">
                            @else
                                @if (auth('user')->user()->gender == 'انثي')
                                    <img class="brround" src="{{asset('assets/images/data/users/female.jpg')}}" alt="img">
                                @else
                                    <img class="brround" src="{{asset('assets/images/data/users/male.jpg')}}" alt="img">
                                @endif
                            @endif                        
                        </div>
                        <div class="user-wrap wideget-user-info">
                            <a href="javascript:void(0)"><h4 class="font-weight-semibold text-white">{{auth('user')->user()->name}}</h4></a>
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
                        <a class="side-menu__item @if(Request::is('*profile')) active @endif" href="{{route('user.profile')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">الصفحة الشخصية</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item @if(Request::is('*settings')) active @endif" href="{{route('user.settings')}}"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">الإعدادات</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item" href="{{route('user.logout')}}"><i class="side-menu__icon fe fe-power"></i><span class="side-menu__label">خروج</span></a>
                    </li>
                </ul>
            </div>
        </aside>
</div>