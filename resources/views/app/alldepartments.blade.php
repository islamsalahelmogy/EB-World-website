@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class=""> التخصصات</h1>
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
                    @foreach ($departments as $d)
                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <a href="{{route('department',['id'=>$d->id])}}" class="item-card overflow-hidden">
                                <div class="item-card-desc">
                                    <div class="card text-center overflow-hidden">
                                        <div class="card-img">
                                            @if ($d->cover != null)
                                                <img src="{{asset('assets/images/data/departments/'.$d->id.'/'.$d->cover)}}" alt="img" class="">
                                            @else
                                                <img src="{{asset('assets/images/data/departments/default.jpg')}}" alt="img" class="">
                                            @endif                                        
                                        </div>
                                        <div class="item-card-text item-card-text-footer">
                                            <h4 class="font-weight-semibold">{{$d->name}}</h4>
                                            <span class="text-white-80"><strong class="fs-18 font-weight-bold text-white">عدد المواد : {{$d->subjects->count()}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    
@endsection