@extends('layout.common.layout')
@section('background')
    <div class="cover-image bg-background-1" data-bs-image-src="{{asset('assets/images/banners/banner4.jpg')}}">
@endsection

@section('body')
    {{-- header --}}
    @hasSection ('landing')
        @yield('landing')
    @else
        @include('layout.common.header_included')
    @endif
    <div class="relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#f5f4f9"></path>
            </svg>
        </div>
    </div>
    {{-- content --}}
    
        @yield('content')
    
    {{-- footer --}}
    @include('layout.common.footer')
@endsection