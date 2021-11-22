@extends('layout.app.layout')
@push('breadcrumb')
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>Home</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">Specific Subject</li>
    </ol>
@endpush
@section('content')
    <hr> 
    <div class="row">
        <div class="col-xl-8  col-lg-8 offset-lg-2 col-md-12">
            {{-- basic info about subject --}}
            <div class="card overflow-hidden">
                <div class="card-body pb-0">
                    <a href="javascript:void(0)" class="text-dark"><h2 class="font-weight-semibold mb-0">subject name</h2></a>
                    <p class="lead-1">course code</p>
                    <div class="product-slider">
                        <ul class="list-unstyled video-list-thumbs">
                            <li class="mb-0">
                                <a class="class-video p-0" href="javascript:void(0)">
                                    <img src="{{asset('assets/images/media/0-13.jpg')}}" alt="img" class="img-responsive  border br-7">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="item-card-text-bottom">
                        <h4 class="mb-0">level</h4>
                    </div>
                </div>
                <div class="row details-1">
                    <div class="col-xl-4 col-lg-4 col-md-4 ">
                        <div class="card mb-0 border-0 shadow-none">
                            <div class="card-body d-flex pb-0 pb-md-5">
                                <img src="{{asset('assets/images/users/female/20.jpg')}}" class="brround d-none d-md-flex avatar-md me-3" alt="user">
                                <div>
                                    <span class="icons fs-16 font-weight-semibold text-dark">Doctor</span>
                                    <a href="javascript:void(0)" class="icons h4 font-weight-semibold text-dark"><span class=" d-block">Name</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="card mb-0 border-0 shadow-none">
                            <div class="card-body pb-0 pb-md-5">
                                <div>
                                    <span class="icons fs-16 font-weight-semibold text-dark">Department</span>
                                    <a href="javascript:void(0)" class="icons h4 font-weight-semibold text-dark"><span class=" d-block">name</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="card mb-0 border-0 shadow-none">
                            <div class="card-body pb-0 pb-md-5">
                                <div>
                                    <span class="icons fs-16 font-weight-semibold text-dark">Pre_request count</span>
                                    <a href="javascript:void(0)" class="icons h4 font-weight-semibold text-dark"><span class=" d-block">Count</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- details about coures description and pre_requirements --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Description</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4 description">
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atcorrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoraliz the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble thena bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pre_requirement</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <tbody>
                            <thead class="table-dark">
                                <tr>
                                    <th><span class="fs-20 font-weight-bold text-white">Subject name</span></th>
                                    <th><span class="fs-20 font-weight-bold text-white">Subject Code</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- foreach for subject --}}
                                <tr onclick="window.location='{{route('subject')}}'" style='cursor: pointer;'>
                                    <td><span class="fs-14 font-weight-bold text-default-dark">Subject name</span></td>
                                    <td><span class="fs-14 font-weight-bold text-default-dark">Subject Code</span></td>
                                </tr>
                            </tbody>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

