@extends('layout.app.layout')
@push('categories')
    <div class="recent-classes text-center mt-5">
        <a class="recent-course" href="{{route('alldepartments')}}">
            <i class="fa fa-university"></i>
            <small>التخصصات</small>
        </a>
        <a class="recent-course" href="{{route('alldoctors')}}">
            <i class="fa fa-users"></i>
            <small>الدكاترة</small>
        </a>
        <a class="recent-course" href="{{route('allsubjects')}}">
            <i class="fa fa-book"></i>
            <small>المواد</small>
        </a>
    </div>
@endpush
@section('landing')
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
        @include('layout.common.header_content')

        <!--/Section-->


    </div>
@endsection
    
@section('content')
    {{-- all department --}}
    <section>
        <hr class="border-0">
        <h2 class="">جميع التخصصات</h2>
        <hr>
        <div class="row task-widget">
            @foreach ($departments as $d)
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="item-card">
                            <div class="item-card-desc">
                                <a href="{{route('department',['id'=>$d->id])}}"></a>
                                <div class="item-card-img">
                                    @if ($d->cover != null)
                                        <img src="{{asset('assets/images/data/departments/'.$d->id.'/'.$d->cover)}}" alt="img" class="">
                                    @else
                                        <img src="{{asset('assets/images/data/departments/default.jpg')}}" alt="img" class="">
                                    @endif
                                </div>
                            </div>
                            <div class="item-card-btn data-1">
                                <a href="{{route('department',['id'=>$d->id])}}" class="h4 mb-0 text-white text-center">{{$d->name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
        <hr>
    </section>
    {{-- all Doctors --}}
    <section>
        <h2 class="">جميع الدكاترة</h2>
        <hr>
        <div class="row">
            <div class="col-lg-12">
				{{-- if not greater than 4   --}}
                @if ($doctors->count() <= 4)
                    <div class="row">
                        @foreach ($doctors as $doc)
                        <div class="item text-center col-3">
                            <a href="{{route('doctor',['id'=>$doc->id])}}">
                                <div class="card overflow-hidden">
                                    @if ($doc->image != null)
                                            <img src="{{asset('assets/images/data/doctors/'.$doc->id.'/'.$d->image)}}" alt="img" class="w-100">
                                    @else
                                        @if ($doc->gender == 'انثى')
                                            <img src="{{asset('assets/images/data/doctors/female.jpg')}}" alt="img" class="w-100">
                                        @else
                                            <img src="{{asset('assets/images/data/doctors/male.jpg')}}" alt="img" class="w-100">
                                        @endif
                                    @endif
                                    <div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
                                        <h4 class="fs-16 mt-0 mb-1 font-weight-semibold">{{$doc->name}}</h4>
                                        <p class="mb-1"><a href="{{route('department',['id'=>$doc->department->id])}}">{{$doc->department->name}}</a></p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="">
                                            عدد المواد : {{$doc->subjects->count()}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                   
                   
                @else
                {{-- if  greater than 4 --}}
                <div class="">
                    <div class="owl-carousel classes-carousel-1">
                    @foreach ($doctors as $doc)
                        <div class="item text-center">
                            <a href="{{route('doctor',['id'=>$doc->id])}}">
                                <div class="card overflow-hidden">
                                    @if ($doc->image != null)
                                            <img src="{{asset('assets/images/data/doctors/'.$doc->id.'/'.$d->image)}}" alt="img" class="w-100">
                                    @else
                                        @if ($doc->gender == 'انثى')
                                            <img src="{{asset('assets/images/data/doctors/female.jpg')}}" alt="img" class="w-100">
                                        @else
                                            <img src="{{asset('assets/images/data/doctors/male.jpg')}}" alt="img" class="w-100">
                                        @endif
                                    @endif
                                    <div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
                                        <h4 class="fs-16 mt-0 mb-1 font-weight-semibold">{{$doc->name}}</h4>
                                        <p class="mb-1"><a href="{{route('department',['id'=>$doc->department->id])}}">{{$doc->department->name}}</a></p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="">
                                            عدد المواد : {{$doc->subjects->count()}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
		<hr>
    </section>
	<section class="bg-transparent">
			<h2>الإستفسارت المضافة حديثاً</h2>
            <hr>
			<div class="row">
                @foreach ($inquiries as $inq)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="card overflow-hidden">
                            <div class="card-status card-status-left bg-second br-bs-7 br-ts-7"></div>
                            <div class="card-body">
                                <h3 class="font-weight-semibold fs-20">@if($inq->type == 'admin'){{$inq->admin->name}}@else{{$inq->user->name}} @endif</h3>
                                <div class="item7-card-desc d-flex mb-1 mt-3">
                                    <span><i class="fe fe-message-circle me-1 float-start mt-1"></i>{{$inq->replies->count()}} ردود </span>
                                    <span class="ms-3"><i class="fe fe-calendar me-1 float-start mt-1"></i>{{$inq->created_at->diffForHumans()}}</span>
                                </div>
                                <p class="line-clamp">{{$inq->text}}</p>
                                <a class="btn btn-primary btn-sm py-2 px-4" href="javascript:void(0)">للمزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
				
				
			</div>

	</section>

@endsection