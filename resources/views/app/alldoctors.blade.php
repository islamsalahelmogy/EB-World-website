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
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>Home</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">All Doctors</li>
    </ol>
@endpush

@section('content')
    <section>
        <hr class="border-0">
        <div class="card bg-transparent border-0 shadow-none mb-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="card text-center shadow-none">
                            <div class="card-body">
                                <img class="brround avatar-xl" src="{{asset('assets/images/users/male/1.jpg')}}" alt="img">
                                <div class="follower-details mt-3">
                                    <h5 class="font-weight-semibold2 mb-1">name</h5>
                                    <p class="text-default">Department</p>
                                </div>
                                <a class="btn btn-outline-light btn-sm w-auto d-inline-block btn-subjects" href="javascript:void(0)">View Subjects</a>
                            </div>
                            <div class="card-footer">
                                total : 5 subject
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
@endsection