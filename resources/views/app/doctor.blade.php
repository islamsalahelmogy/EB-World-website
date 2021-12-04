@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">عضو هيئة التدريس</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">عضو هيئة التدريس</li>
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
                                    <div class="wideget-user-desc">
                                        <div class="wideget-user-img">
                                            @if ($doctor->image != null)
                                                <img src="{{asset('assets/images/data/doctors/'.$doctor->id.'/'.$doctor->image)}}" alt="img">
                                            @else
                                                @if ($doctor->gender == 'انثى')
                                                    <img src="{{asset('assets/images/data/doctors/female.jpg')}}" alt="img">
                                                @else
                                                    <img src="{{asset('assets/images/data/doctors/male.jpg')}}" alt="img">
                                                @endif
                                            @endif
                                        </div>
                                        <div class="user-wrap">
                                            <h3>{{$doctor->name}}</h3>
                                            <h5 class="text-default mb-3">القسم : {{$doctor->department->name}}</h5>
                                            <h5 class="text-default mb-3">عدد المواد : {{$doctor->subjects->count()}}</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    {{-- foreach subject  --}}
                    @foreach ($doctor->subjects as $s)
                        <div class="col-lg-3 col-md-6 item-all-cat  ">
                            <div class="item-all-card text-dark text-center card mb-5">
                                <div class="iteam-all-icon">
                                    @if ($s->cover != null)
                                        <img src="{{asset('assets/images/data/subjects/'.$s->id.'/'.$s->cover)}}" alt="img" class="imag-service">
                                    @else
                                        <img src="{{asset('assets/images/data/subjects/default.jpg')}}" alt="img" class="imag-service">
                                    @endif
                                    <h3 class="text-body font-weight-bold mb-2 mt-5">{{$s->name}}</h3>
                                    <h5 class="text-body font-weight-bold mb-2 mt-5">{{$s->level->name}}</h5>
                                </div>
                            </div>
                            <div class="item-all-text mt-2">
                                <a class="btn btn-primary btn-pill px-6 fs-20" href="{{route('subject',['id'=>$s->id])}}">عرض المادة</a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
@endsection