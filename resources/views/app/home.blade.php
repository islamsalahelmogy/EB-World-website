@extends('layout.app.layout')
@push('categories')
    <div class="recent-classes text-center mt-5">
        <a class="recent-course" href="{{route('alldepartments')}}">
            <i class="fa fa-university"></i>
            <small>Departments</small>
        </a>
        <a class="recent-course" href="{{route('alldoctors')}}">
            <i class="fa fa-users"></i>
            <small>Doctors</small>
        </a>
        <a class="recent-course" href="{{route('allsubjects')}}">
            <i class="fa fa-book"></i>
            <small>Subjects</small>
        </a>
    </div>
@endpush
@section('content')
    {{-- all department --}}
    <section>
        <hr class="border-0">
        <h2 class="">Department</h2>
        <hr>
        <div class="row task-widget">
            <div class="col-xl-3 col-md-12">
                <div class="card">
                    <div class="item-card">
                        <div class="item-card-desc">
                            <a href="javascript:void(0)"></a>
                            <div class="item-card-img">
                                <img src="{{asset('assets/images/media/21.jpg')}}" alt="img" class="">
                            </div>
                        </div>
                        <div class="item-card-btn data-1">
                            <a href="javascript:void(0)" class="h4 mb-0 text-white text-center">Business Manegement</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3  col-md-12">
                <div class="card">
                    <div class="item-card">
                        <div class="item-card-desc">
                            <a href="javascript:void(0)"></a>
                            <div class="item-card-img">
                                <img src="{{asset('assets/images/media/22.jpg')}}" alt="img" class="">
                            </div>
                        </div>
                        <div class="item-card-btn data-1">
                            <a href="javascript:void(0)" class="h4 mb-0 text-white text-center">Networking Classes </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3  col-md-12">
                <div class="card">
                    <div class="item-card">
                        <div class="item-card-desc">
                            <a href="javascript:void(0)"></a>
                            <div class="item-card-img">
                                <img src="{{asset('assets/images/media/25.jpg')}}" alt="img" class="">
                            </div>
                        </div>
                        <div class="item-card-btn data-1">
                            <a href="javascript:void(0)" class="h4 mb-0 text-white text-center">Security Hacking</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3  col-md-12">
                <div class="card">
                    <div class="item-card">
                        <div class="item-card-desc">
                            <a href="javascript:void(0)"></a>
                            <div class="item-card-img">
                                <img src="{{asset('assets/images/media/19.jpg')}}" alt="img" class="">
                            </div>
                        </div>
                        <div class="item-card-btn data-1">
                            <a href="javascript:void(0)" class="h4 mb-0 text-white text-center">Beautician</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>
    {{-- all Doctors --}}
    <section>
        <h2 class="">Doctors</h2>
        <hr>
        <div class="row">
            <div class="col-lg-12">
				{{-- if not greater than 5 --}}
				<div class="row">
					<div class="item text-center col-3">
						<div class="card overflow-hidden">
							<img src="{{asset('assets/images/trainers/6.jpg')}}" class="w-100" alt="img">
							<div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
								<h4 class="fs-16 mt-0 mb-1 font-weight-semibold">name</h4>
								<p class="mb-1">Department</p>
							</div>
							<div class="card-footer">
								<div class="">
									total : 5 subjects
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- if  greater than 5 --}}
                {{-- <div class="">
                    <div class="owl-carousel classes-carousel-1">
						<div class="item text-center">
							<a href="">
								<div class="card overflow-hidden">
								
									<img src="{{asset('assets/images/trainers/6.jpg')}}" class="w-100" alt="img">
									<div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
										<h4 class="fs-16 mt-0 mb-1 font-weight-semibold">name</h4>
										<p class="mb-1">Department</p>
									</div>
									<div class="card-footer">
										<div class="">
											total : 5 subjects
										</div>
									</div>
								</div>
							</a>
							
						</div>
						<div class="item text-center">
							<a href="">
								<div class="card overflow-hidden">
								
									<img src="{{asset('assets/images/trainers/6.jpg')}}" class="w-100" alt="img">
									<div class="card-body text-center pt-5 pb-3 pe-5 ps-5">
										<h4 class="fs-16 mt-0 mb-1 font-weight-semibold">name</h4>
										<p class="mb-1">Department</p>
									</div>
									<div class="card-footer">
										<div class="">
											total : 5 subjects
										</div>
									</div>
								</div>
							</a>
						</div>
						

					</div>
                </div> --}}
            </div>
        </div>
		<hr>
    </section>
	<section class="bg-transparent">
			<div class="section-title">
				<h2>Inquires</h2>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<div class="card overflow-hidden">
						<div class="card-status card-status-left bg-second br-bs-7 br-ts-7"></div>
						<div class="card-body">
							<a href="blog-details.html" class="text-dark mt-1"><h3 class="font-weight-semibold fs-20">On other hand denounce</h3></a>
							<div class="item7-card-desc d-flex mb-1 mt-3">
								<a href="javascript:void(0)"><i class="fe fe-message-circle me-1 float-start mt-1"></i>4 comments</a>
								<a href="javascript:void(0)" class="ms-3"><i class="fe fe-calendar me-1 float-start mt-1"></i>Dec-03-2018</a>
							</div>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat </p>
							<a class="btn btn-primary btn-sm py-2 px-4" href="javascript:void(0)">Read More</a>
						</div>
					</div>
				</div>
				
			</div>

	</section>

@endsection