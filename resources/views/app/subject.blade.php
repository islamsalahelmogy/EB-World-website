@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">المواد</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">المواد</li>
    </ol>
</div>
@endpush
@section('content')
    <hr> 
    <div class="row">
        <div class="col-xl-8  col-lg-8 offset-lg-2 col-md-12">
            {{-- basic info about subject --}}
            <div class="card overflow-hidden">
                <div class="card-body pb-0">
                    <a href="javascript:void(0)" class="text-dark"><h2 class="font-weight-semibold mb-0">{{$subject->name}}</h2></a>
                    <p class="lead-1">كود المادة : {{$subject->code}}</p>
                    <div class="product-slider">
                        <ul class="list-unstyled video-list-thumbs">
                            <li class="mb-0">
                                <a class="class-video p-0" href="javascript:void(0)">
                                    @if ($subject->cover != null)
                                        <img src="{{asset('assets/images/data/subjects/'.$subject->id.'/'.$subject->cover)}}" alt="img" class="img-responsive  border br-7" style="height:432.48px;width:728px">
                                    @else
                                        <img src="{{asset('assets/images/data/subjects/default.jpg')}}" alt="img" class="img-responsive  border br-7">
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="item-card-text-bottom">
                        <h4 class="mb-0">{{$subject->level->name}}</h4>
                    </div>
                </div>
                <div class="row details-1">
                    <div class="col-xl-4 col-lg-4 col-md-4 ">
                        <div class="card mb-0 border-0 shadow-none">
                            <div class="card-body d-flex pb-0 pb-md-5">
                                @if ($subject->doctor->image != null)
                                        <img src="{{asset('assets/images/data/doctors/'.$subject->doctor->id.'/'.$subject->doctor->image)}}" alt="img" class="brround d-none d-md-flex avatar-md me-3">
                                @else
                                    @if ($subject->doctor->gender == 'انثى')
                                        <img src="{{asset('assets/images/data/doctors/female.jpg')}}" alt="img" class="brround d-none d-md-flex avatar-md me-3">
                                    @else
                                        <img src="{{asset('assets/images/data/doctors/male.jpg')}}" alt="img" class="brround d-none d-md-flex avatar-md me-3">
                                    @endif
                                @endif
                                <div>
                                    <span class="icons fs-16 font-weight-semibold text-dark">دكتور المادة</span>
                                    <a href="{{route('doctor',['id'=>$subject->doctor->id])}}" class="icons h4 font-weight-semibold text-dark"><span class=" d-block">{{$subject->doctor->name}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="card mb-0 border-0 shadow-none">
                            <div class="card-body pb-0 pb-md-5">
                                <div>
                                    <span class="icons fs-16 font-weight-semibold text-dark">التخصص</span>
                                    <a href="{{route('department',['id'=>$subject->department->id])}}" class="icons h4 font-weight-semibold text-dark"><span class=" d-block">{{$subject->department->name}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="card mb-0 border-0 shadow-none">
                            <div class="card-body pb-0 pb-md-5">
                                <div>
                                    <span class="icons fs-16 font-weight-semibold text-dark">عدد المواد المتطلبة</span>
                                    <a href="javascript:void(0)" class="icons h4 font-weight-semibold text-dark"><span class=" d-block">{{$subject->requirments->count()}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- details about coures description  --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الوصف</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4 description">
                        <p>{{$subject->description}}</p>
                    </div>
                </div>
            </div>
            {{-- pre_requirements --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">المواد المتطلبة</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <tbody>
                            <thead class="table-dark">
                                <tr>
                                    <th><span class="fs-20 font-weight-bold text-white">إسم المادة</span></th>
                                    <th><span class="fs-20 font-weight-bold text-white">كود المادة</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- foreach for subject --}}
                                @foreach ($subject->requirments as $r)
                                    <tr onclick="window.location='{{route('subject',['id'=>$r->id])}}'" style='cursor: pointer;'>
                                        <td><span class="fs-14 font-weight-bold text-default-dark">{{$r->name}}</span></td>
                                        <td><span class="fs-14 font-weight-bold text-default-dark">{{$r->code}}</span></td>
                                    </tr>
                                @endforeach
                               
                            </tbody>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

