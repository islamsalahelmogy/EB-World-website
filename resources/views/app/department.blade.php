@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">التخصص</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">التخصص</li>
    </ol>
</div>
@endpush
@section('content')
    <section>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="wideget-user ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="wideget-user-desc col-lg-4 offset-lg-4 col-md-12">
                                            <div class="">
                                                @if ($department->cover != null)
                                                    <img src="{{asset('assets/images/data/departments/'.$department->id.'/'.$department->cover)}}" alt="img" class="cover-image">
                                                @else
                                                    <img src="{{asset('assets/images/data/departments/default.jpg')}}" alt="img" class="cover-image">
                                                @endif
                                            </div>
                                            <div class="user-wrap ">
                                                <h3>{{$department->name}}</h3>
                                                <h6>عدد المواد : {{$department->subjects->count()}}</h6>
                                                <div class="mb-4 description line-clamp">
                                                    {{$department->description}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer user-widget">
                        <div class="wideget-user-tab">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">
                                    <ul class="nav">
                                        <li class=""><a href="#tab-51" class="active" data-bs-toggle="tab">الدكاترة</a></li>
                                        <li><a href="#tab-61" data-bs-toggle="tab" class="">المواد</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="border-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-51">
                                    <div class="wideget-user-followers">
                                        {{-- tab for doctors --}}
                                        @foreach ($department->doctors as $doc)
                                            <div class="media m-0 mt-0 ">
                                                @if ($doc->image != null)
                                                    <img src="{{asset('assets/images/data/doctors/'.$doc->id.'/'.$doc->image)}}" alt="img" class="avatar brround avatar-md me-3">
                                                @else
                                                    @if ($doc->gender == 'انثى')
                                                        <img src="{{asset('assets/images/data/doctors/female.jpg')}}" alt="img" class="avatar brround avatar-md me-3">
                                                    @else
                                                        <img src="{{asset('assets/images/data/doctors/male.jpg')}}" alt="img" class="avatar brround avatar-md me-3">
                                                    @endif
                                                @endif
                                                <div class="media-body">
                                                    <a href="{{route('doctor',['id'=>$doc->id])}}" class="font-weight-bold text-default-dark">{{$doc->name}}</a>
                                                    <p class="text-muted ">{{$doc->email}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                
                                    </div>
                                </div>
                                {{-- tab for levels with subjects --}}
                                <div class="tab-pane" id="tab-61">
                                    <div class="user-widget mb-5">
                                        <div class="wideget-user-tab">
                                            <div class="tab-menu-heading">
                                                <div class="tabs-menu1">
                                                    <ul class="nav">
                                                        {{-- foreach levels --}}
                                                        @foreach ($levels as $lv)
                                                            <li class=""><a href="#tab-{{$lv->id}}" class="@if($loop->iteration == 1)active @endif" data-bs-toggle="tab">{{$lv->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="border-0">
                                                <div class="tab-content">
                                                    {{-- foreach for tabs levels --}}
                                                    @foreach ($levels as $lv)
                                                        <div class="tab-pane @if($loop->iteration == 1) active @endif" id="tab-{{$lv->id}}">
                                                            <div class="row">
                                                                {{-- foreach for subject --}}
                                                                @foreach ($department->subjects as $s)
                                                                    @if($lv->id == $s->level->id)
                                                                        <div class="col-4">
                                                                            <div class="card">
                                                                            <a href="{{route('subject',['id'=>$s->id])}}" class="absolute-link">

                                                                                <div class="item-all-card item-all-card2 text-dark item-hover-card p-5 d-flex">
                                                                                        <div class="iteam-all-icon">
                                                                                            <i class="fe fe-book-open fs-25"></i>
                                                                                        </div>
                                                                                        <div class="item-all-text mt-1 ms-3">
                                                                                            <h5 class="mb-0 fs-18 font-weight-semibold">{{$s->name}}</h5>
                                                                                            <p class="mt-2 mb-0 fs-16">كود المادة : {{$s->code}}</p>
                                                                                        </div>
                                                                                </div>
                                                                            </a>

                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection