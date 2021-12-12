@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم اعضاء هيئة التدريس</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">تعديل عضو هيئة التدريس</h3>
    </div>
    <div class="card-body">
        <div class="settings-tab">
            <ul class="tabs-menu nav">
                <li class="ms-0"><a href="#tab1" class="active ms-0" data-bs-toggle="tab" id="general"><i class="fe fe-settings"></i> معلومات أساسية </a></li>
                <li><a href="#tab2" data-bs-toggle="tab" class="" id="photo"><i class="fe fe-image"></i> الصورة  </a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab1">
                    <form class="form-horizontal" id="form_basic">
                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputname"  placeholder="الإسم" value="{{$doctor->name}}" >
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإيميل</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="الإيميل" value="{{$doctor->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputPassword1">الموبايل</label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputnumber" placeholder="الموبايل" value="{{$doctor->phone}}">
                                        </div>

                                         <input type="hidden" name="id" value="{{$doctor->id}}">
                                        <div class="form-group ">
                                           
                                            <label class="form-label">الجنس</label>
                                        
                                            <div class="form-controls-stacked d-md-flex">
                                                <label class="custom-control custom-radio me-4">      
                                                    <input type="radio" class="custom-control-input" name="gender" value="ذكر" @if ($doctor->gender == 'ذكر') checked @endif >
                                                    <span class="custom-control-label">ذكر</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="gender" value="أنثى" @if ($doctor->gender == 'أنثى') checked @endif>
                                                    <span class="custom-control-label">أنثى</span>
                                                </label>
                                            </div>
                        
                                        </div>
                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="options">التخصص</label>
											<select name="department_id" id="options"  class="form-control form-select select2">
												@foreach ($departments as $dep)
                                                    <option  @if($dep->id == $doctor->department_id) selected @endif value="{{$dep->id}}" >{{$dep->name}}</option>
                                                @endforeach
											</select>
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
                                <input type="hidden" name="id" value="{{$doctor->id}}">
                                <div class="col-md-9">
                                    <div class="input-group file-browser">
                                        <input type="text" name="text" class="form-control bg-transparent border-end-0 browse-file valid" placeholder="إرفع الصورة" readonly="" aria-invalid="false" value="{{$doctor->image}}">
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
            //Level Create
            $('#form_basic').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.doctors.updatebasic') }}',$(e.target).serialize())
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
                        if(errors.phone){
                            messageError('phone',errors.phone[0]);
                        }
                        if(errors.gender){
                            messageError('gender',errors.gender[0]);
                        }
                        if(errors.department_id){
                            messageError('department_id',errors.department_id[0]);
                        }
                    }
                    else{
                            window.location.replace("{{ route("admin.doctors") }}");
                        }
                })
            })

            $('#form_image').submit((e) => {
                e.preventDefault();
                 var file = $(':file').get(0);
                var form = new FormData();
                form.append('image',file.files[0]);
                var obj=$(e.target).serializeArray();
               // console.log(obj);
                for(var key in obj)
                {
                    form.append(obj[key].name,obj[key].value);
                }
                axios.post('{{ route('admin.doctors.updateimage') }}',form,{
                    headers: {
                        'Content-Type': 'multipart/form-data; boundary=${form._boundary}'
                    }
                })
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.image){
                            messageError('image',errors.image[0]);

                        }
                    }else{
                    window.location.replace("{{ route("admin.doctors") }}");
                    } 
                })
            })
        })
    </script>
@endpush