@extends('layout.common.layout')
@section('body')
    {{-- header --}}
    <div class="banner1 relative banner-top">
        <!-- Carousel -->
        <div class="owl-carousel bannner-owl-carousel slider slider-header ">
            <div class="item cover-image" data-bs-image-src="" style="width: 100vw">
                <img  alt="first slide" src="{{asset('assets/images/banners/slide-1.jpg')}}" >
            </div>
            <div class="item" style="width: 100vw">
                <img  alt="first slide" src="{{asset('assets/images/banners/silde-2.jpg')}}" >
            </div>
            <div class="item" style="width: 100vw">
                <img  alt="first slide" src="{{asset('assets/images/banners/slide-3.jpg')}}" >
            </div>
        </div>
        <!--Topbar-->
        <div class="header-main">
            @auth
                @include('layout.common.auth')
            @endauth
            @include('layout.common.header')
            
        </div>
        <!--/Horizontal-main -->
        <!--Section-->
        <section>
            <div class="slider-images">
                <div class="container-fuild">
                    <div class="header-text slide-header-text mt-0 mb-0">
                        <div class="col-xl-7 col-lg-8 col-md-8 d-block mx-auto">
                            <div class="search-background bg-transparent input-field">
                                <div class="text-center text-white mb-7">
                                    <h1 class="mb-1 font-weight-semibold fs-50">Build Your Future Classes</h1>
                                    <p class="d-none d-md-block fs-18 text-white-80">many variations of passages of Lorem Ipsum available, but the majority have suffered alteration <br> in some form, by injected humour, or randomised words</p>
                                </div>
                                {{-- search in website --}}
                                <div class="search-background bg-transparent">
                                    <div class="form row g-0 ">
                                        <div class="form-group  col-xl-6 col-lg-6 col-md-12 mb-0 bg-white">
                                            <input type="text" class="form-control input-lg br-te-md-0 br-be-md-0" id="text4" placeholder="Search your Course type">
                                        </div>
                                        <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                            <select class="form-control select2 border-bottom-0 select2-hidden-accessible" data-placeholder="Select Type" tabindex="-1" aria-hidden="true">
                                                <optgroup>
                                                    <option value="1">Subject</option>
                                                    <option value="2">Doctor</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 mb-0">
                                            <a href="javascript:void(0)" class="btn btn-lg btn-block btn-primary br-ts-md-0 br-bs-md-0">Search Here</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- categories for website --}}
                                @stack('categories')
                                @stack('breadcrumb')

                            </div>
                        </div>
                    </div><!-- /header-text -->
                </div>
            </div>
        </section>
        <!--/Section-->


    </div>
    <div class="relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#f5f4f9"></path>
            </svg>
        </div>
    </div>
    {{-- content --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- footer --}}
    @include('layout.common.footer')
@endsection