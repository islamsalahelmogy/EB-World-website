@extends('layout.app.layout')
@push('breadcrumb')
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>Home</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">All Subjects</li>
    </ol>
@endpush
@section('content')
    <section>
        <hr class="">
        <h2 class="">Department one</h2>
        <hr>
        {{-- if greater than 3 --}}
        {{-- <div id="myCarousel1" class="owl-carousel owl-carousel-icons">
            <div class="item">
                <div class="card overflow-hidden mb-0">
                    <div class="item-card7-img pt-5 px-5">
                        <div class="item-card7-imgs">
                            <a href="javascript:void(0)"></a>
                            <img src="{{asset('assets/images/media/0-1.jpg')}}" alt="img" class="cover-image br-7 border">
                        </div>
                        <div class="item-card7-overlaytext">
                            <h4 class="mb-0">level</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text mt-1">
                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1">name</h4></a>
                            </div>
                            <p class="mb-0 text-dark">Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt..</p>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
         {{-- else make grid --}}
        <div class="row">
            <div class="col-4">
                <div class="card overflow-hidden mb-0">
                    <div class="item-card7-img pt-5 px-5">
                        <div class="item-card7-imgs">
                            <a href="javascript:void(0)"></a>
                            <img src="{{asset('assets/images/media/0-1.jpg')}}" alt="img" class="cover-image br-7 border">
                        </div>
                        <div class="item-card7-overlaytext">
                            <h4 class="mb-0">level</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="item-card7-desc">
                            <div class="item-card7-text mt-1">
                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1">name</h4></a>
                            </div>
                            <p class="mb-0 text-dark line-clamp">Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt</p>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
@endsection