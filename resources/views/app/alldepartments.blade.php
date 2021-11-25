@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">جميع التخصصات</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">التخصصات</li>
    </ol>
</div>
@endpush

@section('content')
    <section>
        <hr class="border-0 ">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <a href="javascript:void(0)" class="item-card overflow-hidden">
                            <div class="item-card-desc">
                                <div class="card text-center overflow-hidden">
                                    <div class="card-img">
                                        <img src="{{asset('assets/images/media/14.jpg')}}" alt="img" class="cover-image">
                                    </div>
                                    <div class="item-card-text item-card-text-footer">
                                        <h4 class="font-weight-semibold">Software Development</h4>
                                        <span class="text-white-80"><strong class="fs-18 font-weight-bold text-white">عدد المواد : 50</strong></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
@endsection