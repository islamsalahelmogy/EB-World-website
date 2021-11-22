@extends('layout.app.layout')
@push('breadcrumb')
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>Home</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">Specific Doctor</li>
    </ol>
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
                                            <img class="" src="{{asset('assets/images/users/male/23.jpg')}}" alt="img">
                                        </div>
                                        <div class="user-wrap">
                                            <h3>Robert	McLean</h3>
                                            <h5 class="text-default mb-3">Department name</h5>
                                            <h5 class="text-default mb-3">total subjects</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    {{-- foreach subject  --}}
                    <div class="col-lg-3 col-md-6 item-all-cat  ">
                        <div class="item-all-card text-dark text-center card mb-5">
                            <div class="iteam-all-icon">
                                <img src="{{asset('assets/images/png/programmer.png')}}" class="imag-service" alt="Sales">
                                <h3 class="text-body font-weight-bold mb-2 mt-5">Subject Name</h3>
                                <h5 class="text-body font-weight-bold mb-2 mt-5">level</h5>
                            </div>
                        </div>
                        <div class="item-all-text mt-2">
                            <a class="btn btn-primary btn-pill px-6 fs-20" href="{{route('subject')}}">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection