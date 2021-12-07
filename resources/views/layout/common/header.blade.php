<!-- Mobile Header -->
<div class="sticky">
    <div class="horizontal-header clearfix ">
        <div class="container">
            <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
            <span class="smllogo"><img src="{{asset('assets/images/brand/logo1.png')}}" width="120" alt="img"/></span>
            <span class="smllogo-white"><img src="{{asset('assets/images/brand/logo.png')}}" width="120" alt="img"/></span>
        </div>
    </div>
</div>
<!-- /Mobile Header -->

<!--Horizontal-main -->
<div class="horizontal-main header-style1  bg-dark-transparent clearfix p-0">
    <div class="horizontal-mainwrapper container clearfix">
        <div class="desktoplogo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo1.png')}}" alt="img">
                <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img header-white" alt="logo">
            </a>
        </div>
        <div class="desktoplogo-1">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo.png')}}" alt="img"></a>
        </div>
        <nav class="horizontalMenu clearfix d-md-flex">
            <ul class="horizontalMenu-list">
                <li aria-haspopup="true" ><a class="@if(Request::is('home/*') || Request::is('/')) active @endif" href="{{route('home')}}">الصفحة الرئيسية</a></li>
                <li aria-haspopup="true"><a class="@if(Request::is('inquiries')) active @endif" href="{{route('inquiries')}}">الإستفسارات</a></li>
                <li aria-haspopup="true" class="d-none"><a class="@if(Request::is('about_us')) active @endif" href="about.html">من نحن</a></li>
                @unless(Auth::guard('admin')->check() || Auth::guard('user')->check())
                        <li aria-haspopup="true" class="p-0 mt-1">
                            <span><a class="btn btn-primary" href="{{route('show_login')}}"><i class="fe fe-log-in me-1"></i>سجل الأن</a></span>
                        </li>
                        <li aria-haspopup="true" class="p-0 mt-1 ms-3">
                            <span><a class="btn btn-primary" href="{{route('show_register')}}"> <i class="fe fe-user me-1"></i>حساب جديد</a></span>
                        </li>
                @endunless
                
            </ul>
        </nav>
    </div>
</div>