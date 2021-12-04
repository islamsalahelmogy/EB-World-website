@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">الإعدادات</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">الإعدادات</h3>
    </div>
    <div class="card-body">
        <div class="settings-tab">
            <ul class="tabs-menu nav">
                <li class="ms-0"><a href="#tab1" class="active ms-0" data-bs-toggle="tab" id="general"><i class="fe fe-settings"></i> معلومات أساسية </a></li>
                <li><a href="#tab2" data-bs-toggle="tab" class="" id="photo"><i class="fe fe-image"></i> الصورة الشخصية </a></li>
                <li><a href="#tab3" data-bs-toggle="tab" class="" id="password"><i class="fe fe-lock"></i> كلمة السر </a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab1">
                    <form class="form-horizontal" id="basic">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center">
                                    <label class="form-label mb-0" id="examplenameInputname2">الإسم :</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control form-text" value="{{auth('admin')->user()->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center">
                                    <label class="form-label mb-0" id="examplenameInputname2">الإيميل :</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control form-text" style="direction: ltr" value="{{auth('admin')->user()->email}}">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="حفظ التغييرات"> 
                        </div>

                    </form>
                </div>
                <div class="tab-pane" id="tab2">
                    <form class="form-horizontal" id="form_image">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center" >
                                    <label class="form-label mb-0">صورتك الشخصية :</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group file-browser">
                                        <input type="text" class="form-control bg-transparent border-end-0 browse-file valid" placeholder="إرفع ألصورة" readonly="" aria-invalid="false" value="@if(auth('admin')->user()->image != null) {{auth('admin')->user()->image}} @else male.jpg @endif">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary br-ts-0 br-bs-0">إرفع <input type="file" name="image" style="display: none;">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="حفظ التغييرات"> 
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="tab3">
                    <form class="form-horizontal" id="pass">
                       <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3 d-flex align-items-center">
                                    <label class="form-label mb-0" id="examplenameInputname2">كلمة السر الجديدة :</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="new_password" class="form-control form-text" style="direction: ltr">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3 d-flex align-items-center">
                                    <label class="form-label mb-0" id="examplenameInputname2">أعد كتابة كلمة السر الجديدة :</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="confirm_password" class="form-control form-text" style="direction: ltr">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="حفظ التغييرات"> 
                        </div>
                    </form>
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
            $('#basic').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.basic.update') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.name){
                            messageError('name',errors.name[0]);

                        }
                        if(errors.email){
                            messageError('email',errors.email[0]);

                        }
                    }else{
                        
                        window.location.replace("{{ route("admin.profile") }}");
                    
                    } 
                }) 
            })
            $('#form_image').submit((e) => {
                e.preventDefault();
                console.log($(':file').val());
                axios.post('{{ route('admin.image.update') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.name){
                            messageError('image',errors.image[0]);

                        }
                    }else{
                       // window.location.replace("{{ route("user.profile") }}");
                    
                    } 
                })
            })

            $('#pass').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.pass.update') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
            
                        if(errors.new_password){
                            messageError('new_password',errors.new_password[0]);

                        }

                        if(errors.confirm_password){
                            messageError('confirm_password',errors.confirm_password[0]);

                        }
                    }else{
                        
                        window.location.replace("{{ route("user.profile") }}");
                    
                    } 
                }) 
            })

        })
    </script>
@endpush