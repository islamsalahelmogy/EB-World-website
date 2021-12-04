@extends('user.layout')
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
                                    <input type="text" name="name" class="form-control form-text" value="{{auth('user')->user()->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center">
                                    <label class="form-label mb-0" id="examplenameInputname2">الإيميل :</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control form-text" style="direction: ltr" value="{{auth('user')->user()->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center">
                                    <label class="form-label mb-0">السنة الدراسية :</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-controls-stacked d-md-flex">
                                        <label class="custom-control custom-radio me-4">
                                            <input type="radio" class="custom-control-input" name="level" value="أولى" @if (auth('user')->user()->level == 'أولى') checked @endif>
                                            <span class="custom-control-label">أولى</span>
                                        </label>
                                        <label class="custom-control custom-radio me-4">
                                            <input type="radio" class="custom-control-input" name="level" value="ثانية" @if (auth('user')->user()->level == 'ثانية') checked @endif>
                                            <span class="custom-control-label">ثانية</span>
                                        </label>
                                        <label class="custom-control custom-radio me-4">
                                            <input type="radio" class="custom-control-input" name="level" value="ثالثة" @if (auth('user')->user()->level == 'ثالثة') checked @endif>
                                            <span class="custom-control-label">ثالثة</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="level" value="رابعة" @if (auth('user')->user()->level == 'رابعة') checked @endif>
                                            <span class="custom-control-label">رابعة</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center">
                                    <label class="form-label mb-0" id="examplenameInputname2">التخصص :</label>
                                </div>
                                <div class="col-md-9">
                                    <select data-placeholder="إختار التخصص" class="form-control select2-show-search form-select languages" name="department">
                                    <option value="0">اختر التخصص</option>
                                        @foreach ($departments as $d)
                                            <option value="{{$d->name}}" @if (auth('user')->user()->department == $d->name) checked @endif>{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="حفظ التغييرات"> 
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="tab2">
                    <form class="form-horizontal" id="form_image" enctype="multipart/form-data" >
    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center" >
                                    <label class="form-label mb-0">صورتك الشخصية :</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group file-browser">
                                        <input type="text" name= "text" class="form-control bg-transparent border-end-0 browse-file valid" placeholder="إرفع ألصورة" readonly="" aria-invalid="false"
                                            @if (auth('user')->user()->image != null)
                                            value="{{auth('user')->user()->image}}"
                                            @else
                                                @if (auth('user')->user()->gender == 'أنثى')
                                                    value="female.jpg"
                                                @else
                                                    value="male.jpg"
                                                @endif
                                            @endif
                                        >
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
    {{-- <div class="card-footer">
        <a href="javascript:void(0)" class="btn btn-primary">Save Changes</a>
    </div> --}}
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
                axios.post('{{ route('user.basic.update') }}',$(e.target).serialize())
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

                         if(errors.level){
                            messageError('level',errors.level[0]);

                        }
                         if(errors.department){
                            messageError('department',errors.department[0]);

                        }

                    }else{
                        
                        window.location.replace("{{ route("user.profile") }}");
                    
                    } 
                }) 
            })

            $('#form_image').submit((e) => {
                e.preventDefault();
                var file = $(':file').get(0);
                var image = new FormData();
                image.append('image',file.files[0]);
                console.log(image);
                axios.post('{{ route('user.image.update') }}',image,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.image){
                            messageError('text',errors.image[0]);

                        }
                    }else{
                       window.location.replace("{{ route("user.profile") }}");
                    
                    } 
                })
            })

            $('#pass').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('user.pass.update') }}',$(e.target).serialize())
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