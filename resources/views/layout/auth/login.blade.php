@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">دخول</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">دخول</li>
    </ol>
</div>
@endpush

@section('content')
    <hr>
    <div class="row">
        <div class="col-lg-5 col-xl-5 col-md-6 d-block mx-auto">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-md-12 register-right">
                    <ul class="nav nav-tabs nav-justified mb-5 p-2 border" id="myTab" role="tablist">
                        <li class="nav-item me-3">
                            <a class="nav-link m-1 border fs-20 font-weight-bold" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">المسئول</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link m-1 border active fs-20 font-weight-bold" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">الطالب</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show " id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body p-6">
                                    <div class="mb-6">
                                        <h5 class="fs-25 font-weight-semibold">دخول</h5>
                                    </div>
                                    <div class="single-page customerpage">
                                        <div class="wrapper wrapper2 box-shadow-0">
                                            <form id="login_admin" class="" tabindex="500">
                                                <div class="mail">
                                                    <label>الإيميل</label>
                                                    <input type="email" name="email_admin" class="border-dark" style="direction: ltr">
                                                </div>
                                                <div class="passwd">
                                                    <label>كلمة السر</label>
                                                    <input type="password" name="password_admin" class="border-dark" style="direction: ltr">
                                                </div>
                                                <div class="submit">
                                                    <a class="btn btn-primary btn-block fs-16" href="">أدخل الآن</a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <p class="mb-0"><a href="" >هل نسيت كلمة السر؟</a></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body p-6">
                                    <div class="mb-6">
                                        <h5 class="fs-25 font-weight-semibold">دخول</h5>
                                    </div>
                                    <div class="single-page customerpage">
                                        <div class="wrapper wrapper2 box-shadow-0">
                                            <form id="login_user" class="" tabindex="500">
                                                <div class="mail">
                                                    <label>الإيميل</label>
                                                    <input type="email" name="email_user" class="border-dark" style="direction: ltr">
                                                </div>
                                                <div class="passwd">
                                                    <label>كلمة السر</label>
                                                    <input type="password" name="password_user" class="border-dark" style="direction: ltr">
                                                </div>
                                                <div class="submit">
                                                    <a class="btn btn-primary btn-block fs-16" href="">أدخل الآن</a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <p class="mb-0"><a href="" >هل نسيت كلمة السر؟</a></p>
                                                    <p class="text-dark mb-0 ms-auto"> ليس لديك حساب<a href="login.html" class="text-primary ms-1">سجل الآن</a></p>

                                                </div>
                                            </form>
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
@endsection