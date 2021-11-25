@extends('layout.app.layout')
@push('css')
    <style>
        .btn-subjects {
            background: #1352A9;
            color: white !important;
            padding: 10px;
        }

        .btn-subjects:hover {
            color: white !important;
            background-color: #C2AB2F !important;
        }
        
    </style>
@endpush
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">جميع الدكاترة</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">الدكاترة</li>
    </ol>
</div>
@endpush

@section('content')
    <section>
        <hr class="border-0">
        <div class="card bg-transparent border-0 shadow-none mb-0">
            <div class="card-body p-0">
                <div class="row">
                    @foreach ($doctors as $doc)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="card text-center shadow-none">
                                <div class="card-body">
                                    @if ($doc->image != null)
                                        <img src="{{asset('assets/images/data/doctors/'.$doc->id.'/'.$doc->image)}}" alt="img" class="brround avatar-xl">
                                    @else
                                        @if ($doc->gender == 'انثى')
                                            <img src="{{asset('assets/images/data/doctors/female.jpg')}}" alt="img" class="brround avatar-xl">
                                        @else
                                            <img src="{{asset('assets/images/data/doctors/male.jpg')}}" alt="img" class="brround avatar-xl">
                                        @endif
                                    @endif
                                    <div class="follower-details mt-3">
                                        <h5 class="font-weight-semibold2 mb-1">{{$doc->name}}</h5>
                                        <p class="text-default"><a href="{{route('department',['id'=>$doc->department->id])}}">{{$doc->department->name}}</a></p>
                                    </div>
                                    <a class="btn btn-outline-light btn-sm w-auto d-inline-block btn-subjects" href="{{route('doctor',['id'=>$doc->id])}}">عرض المواد</a>
                                </div>
                                <div class="card-footer">
                                    عدد المواد : {{$doc->subjects->count()}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
@endsection