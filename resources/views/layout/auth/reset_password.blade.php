@extends('layout.app.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">تغيير كلمة السر</h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 text-white font-weight-bold fs-3"><a href="{{route('show_login')}}" class="text-white font-weight-bold fs-2">الدخول</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">تغيير كلمة السر</li>
    </ol>
</div>
@endpush

@section('content')
    <hr>
    <div class="row">
        <div class="col-lg-5 col-xl-5 col-md-6 d-block mx-auto">
            <div class="card">
                <div class="card-body p-6">
                    <div class="mb-6">
                        <h5 class="fs-25 font-weight-semibold">تغيير كلمة السر لل{{$type}}</h5>
                    </div>
                    <div class="single-page customerpage">
                        <div class="wrapper wrapper2 box-shadow-0">
                            <form id="change_password" class="" tabindex="500">
                                <div class="type">
                                    <input type="hidden" name="type" class="border-dark" value="{{$type}}">
                                </div>
                                <div class="mail">
                                    <label>الإيميل</label>
                                    <input type="email" name="email" class="border-dark" style="direction: ltr">
                                </div>
                                <div class="passwd">
                                    <label> كلمة السر الجديدة</label>
                                    <input type="password" name="password" class="border-dark" style="direction: ltr">
                                </div>
                                <div class="passwd">
                                    <label>أعد كتابة كلمة السر</label>
                                    <input type="password" name="confirm_password" class="border-dark" style="direction: ltr">
                                </div>

                                <div class="submit">
                                    <input type="submit" class="btn btn-primary btn-block" value="تغيير">
                                </div>
                            </form>
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
            $('#change_password').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('change_password') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.email){
                            messageError('email',errors.email[0]);

                        }
                        if(errors.password){
                            messageError('password',errors.password[0]);

                        }
                        if(errors.confirm_password){
                            messageError('confirm_password',errors.confirm_password[0]);

                        }
                    }else{
                        window.location.replace("{{ route("show_login") }}");
                    } 
                }) 
            })

        })
    </script>
@endpush