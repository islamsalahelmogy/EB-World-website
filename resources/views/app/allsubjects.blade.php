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
    <section>
        @foreach ($departments as $d)
            <hr class="">
            <h2 class="">{{$d->name}}</h2>
            <hr>
            @if ($d->subjects->count() > 3)
                {{-- if greater than 3 --}}
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons">
                    @foreach ($d->subjects as $s)
                        <div class="item">
                            <div class="card overflow-hidden mb-0">
                                <div class="item-card7-img pt-5 px-5">
                                    <div class="item-card7-imgs">
                                        <a href="{{route('subject',['id'=>$s->id])}}"></a>
                                        @if ($s->cover != null)
                                            <img src="{{asset('assets/images/data/subjects/'.$s->id.'/'.$s->cover)}}" alt="img" class="cover-image br-7 border"style="height:186px;width:312px">
                                        @else
                                            <img src="{{asset('assets/images/data/subjects/default.jpg')}}" alt="img" class="cover-image br-7 border">
                                        @endif
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <h4 class="mb-0">{{$s->level->name}}</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc">
                                        <div class="item-card7-text mt-1">
                                            <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1">{{$s->name}}</h4></a>
                                        </div> 
                                        <div class="item-card7-text mt-1">
                                            <a href="javascript:void(0)" class="text-dark"><h6 class="font-weight-semibold mb-1">دكتور المادة : {{$s->doctor->name}}</h6></a>
                                        </div>             
                                        <p class="mb-0 text-dark line-clamp">{{$s->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- else make grid --}}
                <div class="row">
                    @foreach ($d->subjects as $s)
                    <div class="col-4">
                        <div class="card overflow-hidden mb-0">
                            <div class="item-card7-img pt-5 px-5">
                                <div class="item-card7-imgs">
                                    <a href="{{route('subject',['id'=>$s->id])}}"></a>
                                    @if ($s->cover != null)
                                        <img src="{{asset('assets/images/data/subjects/'.$s->id.'/'.$s->cover)}}" alt="img" class="cover-image br-7 border" >
                                    @else
                                        <img src="{{asset('assets/images/data/subjects/default.jpg')}}" alt="img" class="cover-image br-7 border">
                                    @endif
                                </div>
                                <div class="item-card7-overlaytext">
                                    <h4 class="mb-0">{{$s->level->name}}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="item-card7-desc">
                                    <div class="item-card7-text mt-1">
                                        <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1">{{$s->name}}</h4></a>
                                    </div> 
                                    <div class="item-card7-text mt-1">
                                        <a href="javascript:void(0)" class="text-dark"><h6 class="font-weight-semibold mb-1">دكتور المادة : {{$s->doctor->name}}</h6></a>
                                    </div>             
                                    <p class="mb-0 text-dark line-clamp">{{$s->description}}</p>
                                </div>
                            </div>
            
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        @endforeach
        
    </section>
@endsection