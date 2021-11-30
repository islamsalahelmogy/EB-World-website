@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">تسجيل الدخول</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">تسجيل الدخول</li>
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
                                        <h5 class="fs-25 font-weight-semibold">تسجيل الدخول</h5>
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
                                                    <input type="submit" class="btn btn-primary btn-block fs-16" value="سجل الآن">
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <p class="mb-0"><a href="{{route('show_reset_password',['type'=>'مسئول'])}}" >هل نسيت كلمة السر؟</a></p>
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
                                        <h5 class="fs-25 font-weight-semibold">تسجيل الدخول</h5>
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
                                                    <input type="submit" class="btn btn-primary btn-block fs-16" value="سجل الآن">
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <p class="mb-0"><a href="{{route('show_reset_password',['type'=>'طالب'])}}" >هل نسيت كلمة السر؟</a></p>
                                                    <p class="text-dark mb-0 ms-auto"> ليس لديك حساب<a href="{{route('show_register')}}" class="text-primary ms-1">إنشئ حساب الأن</a></p>

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

@push('js')
    <script>
        $(document).ready(() => {

            $('input').on('focus',(e) => {
                var input = $(e.target)
                if(input.hasClass('is-invalid')) {
                    console.log(input);
                    input.removeClass('is-invalid');
                    $('#'+input.attr('name')).remove();
                }
                if($('span.invalid').length) {
                    $('span.invalid').remove();
                }
            })

            function messageError(errorName,message) {
                $('input[name='+errorName+']').addClass('is-invalid');
                    $('input[name='+errorName+']').parent().append(
                        '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                                '<strong>'+message+'</strong>'+
                        '</span>'
                );
            }
            //user login
            $('#login_user').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('user.login') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.email_user){
                            messageError('email_user',errors.email_user[0]);

                        }
                        if(errors.password_user){
                            messageError('password_user',errors.password_user[0]);

                        }
                        if(errors.invalid_user){
                            $(e.target).find('input[type="password"]').val('');
                            $('#user_login').prepend(
                                '<span class="invalid-feedback d-block px-2 invalid form-group" role="alert">'+
                                        '<strong>'+errors.invalid_user[0]+'</strong>'+
                                '</span>'
                            );
                        }
                    }else{
                        
                        window.location.replace("{{ route("home") }}");
                    
                    }
                })
            })


            $('#login_admin').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.login') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.email_admin){
                            messageError('email_admin',errors.email_admin[0]);

                        }
                        if(errors.password_admin){
                            messageError('password_admin',errors.password_admin[0]);

                        }
                        if(errors.invalid_admin){
                            $(e.target).find('input[type="password"]').val('');
                            $('#admin_login').prepend(
                                '<span class="invalid-feedback d-block px-2 invalid form-group" role="alert">'+
                                        '<strong>'+errors.invalid_admin[0]+'</strong>'+
                                '</span>'
                            );
                        }
                    }else{
                        
                        window.location.replace("{{ route("home") }}");
                    
                    }
                })
            })

        })
    </script>
@endpush