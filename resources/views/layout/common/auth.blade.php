<div class="top-bar border-white-transparent">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-bar-end">
                    <ul class="custom">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="text-dark" data-bs-toggle="dropdown"><i class="fe fe-bell me-1"></i><span>الإشعارات<i class="fe fe-chevron-down text-white ms-1"></i></span></a>
                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow">
                                <a href="mydash.html" class="dropdown-item" >
                                    <i class="dropdown-icon icon icon-user"></i>إشعار
                                </a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="text-dark" data-bs-toggle="dropdown"><i class="fe fe-home me-1"></i><span>@auth('user'){{auth('user')->user()->name}} @endauth @auth('admin'){{auth('admin')->user()->name}} @endauth<i class="fe fe-chevron-down text-white ms-1"></i></span></a>
                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow">
                                {{-- admin or user --}}
                                @auth('admin')
                                    <a href="{{route('admin.profile')}}" class="dropdown-item" >
                                        <i class="dropdown-icon icon icon-user"></i>الصفحة الشخصية
                                    </a>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                                        <i class="dropdown-icon icon icon-power"></i>خروج
                                    </a>
                                @endauth
                                @auth('user')
                                    <a href="{{route('user.profile')}}" class="dropdown-item" >
                                        <i class="dropdown-icon icon icon-user"></i>الصفحة الشخصية
                                    </a>
                                    <a class="dropdown-item" href="{{route('user.logout')}}">
                                        <i class="dropdown-icon icon icon-power"></i>خروج
                                    </a>
                                @endauth
                                
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Topbar-->