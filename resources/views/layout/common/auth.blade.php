<div class="top-bar border-white-transparent">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-bar-end">
                    <ul class="custom">
                        <li class="dropdown header-notification d-flex me-3">
                            <a class="nav-link icon m-0" data-bs-toggle="dropdown">
                                <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg></i>
                                <span class=" nav-unread badge badge-pill" style=" background: #C2AB2F; ">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow">
                                <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">You have 4 notification</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                    <div class="notify-img">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div>
                                        <strong>2 new Messages</strong>
                                        <div class="small text-muted">17:50 Pm</div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                    <div class="notify-img">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div>
                                        <strong> 1 Event Soon</strong>
                                        <div class="small text-muted">19-10-2021</div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                    <div class="notify-img">
                                        <i class="fa fa-comment-o"></i>
                                    </div>
                                    <div>
                                        <strong> 3 new Comments</strong>
                                        <div class="small text-muted">05:34 Am</div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                    <div class="notify-img">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div>
                                        <strong> Application Error</strong>
                                        <div class="small text-muted">13:45 Pm</div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item text-center">See all Notification</a>
                            </div>
                        </li>
                        
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="text-dark" data-bs-toggle="dropdown"><i class="fe fe-home me-1"></i><span>@auth('user'){{auth('user')->user()->name}} @endauth @auth('admin'){{auth('admin')->user()->name}} @endauth<i class="fe fe-chevron-down text-white ms-1"></i></span></a>
                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow">
                                {{-- admin or user --}}
                                @auth('admin')
                                    <a href="{{route('admin.dashboard')}}" class="dropdown-item" >
                                        <i class="dropdown-icon icon icon-user"></i>لوحة التحكم
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