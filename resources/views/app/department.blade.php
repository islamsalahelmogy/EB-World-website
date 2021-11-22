@extends('layout.app.layout')
@push('breadcrumb')
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>Home</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">Specific Department</li>
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
                                    <div class="row">
                                        <div class="wideget-user-desc col-lg-4 offset-lg-4 col-md-12">
                                            <div class="">
                                                <img src="{{asset('assets/images/media/2.jpg')}}" alt="img" class="cover-image">
                                            </div>
                                            <div class="user-wrap ">
                                                <h3>Department name</h3>
                                                <h6>Total : 5 subjects</h6>
                                                <div class="mb-4 description line-clamp">
                                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atcorrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoraliz the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble thena bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
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
                                        <li class=""><a href="#tab-51" class="active" data-bs-toggle="tab">Doctors</a></li>
                                        <li><a href="#tab-61" data-bs-toggle="tab" class="">Subjects</a></li>
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
                                        <div class="media m-0 mt-0 ">
                                            <img class="avatar brround avatar-md me-3" src="{{asset('assets/images/users/male/18.jpg')}}" alt="avatar-img">
                                            <div class="media-body">
                                                <a href="" class="font-weight-bold text-default-dark">John Paige</a>
                                                <p class="text-muted ">johan@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="media mt-2 ">
                                            <img class="avatar brround avatar-md me-3" src="{{asset('assets/images/users/male/18.jpg')}}" alt="avatar-img">
                                            <div class="media-body">
                                                <a href="" class="font-weight-bold text-default-dark">John Paige</a>
                                                <p class="text-muted ">johan@gmail.com</p>
                                            </div>
                                        </div>
                                        
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
                                                        <li class=""><a href="#tab-71" class="active" data-bs-toggle="tab">level</a></li>
                                                        <li><a href="#tab-72" data-bs-toggle="tab" class="">level</a></li>
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
                                                    <div class="tab-pane active" id="tab-71">
                                                        <div class="row">
                                                            {{-- foreach for subject --}}
                                                            <div class="col-4">
                                                                <div class="card">
                                                                    <div class="item-all-card item-all-card2 text-dark item-hover-card p-5 d-flex">
                                                                        <a href="javascript:void(0)" class="absolute-link"></a>
                                                                        <div class="iteam-all-icon">
                                                                            <i class="fe fe-book-open fs-25"></i>
                                                                        </div>
                                                                        <div class="item-all-text mt-1 ms-3">
                                                                            <h5 class="mb-0 fs-18 font-weight-semibold">Language</h5>
                                                                            <p class="mt-2 mb-0 fs-16">Code : 45</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="tab-pane" id="tab-72">
                                                        <div class="row">
                                                            {{-- foreach for subject --}}
                                                            <div class="col-4">
                                                                <div class="card">
                                                                    <div class="item-all-card item-all-card2 text-dark item-hover-card p-5 d-flex">
                                                                        <a href="javascript:void(0)" class="absolute-link"></a>
                                                                        <div class="iteam-all-icon">
                                                                            <i class="fe fe-book-open fs-25"></i>
                                                                        </div>
                                                                        <div class="item-all-text mt-1 ms-3">
                                                                            <h5 class="mb-0 fs-18 font-weight-semibold">Language</h5>
                                                                            <p class="mt-2 mb-0 fs-16">Code : 55</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection