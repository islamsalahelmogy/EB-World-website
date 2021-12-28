@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم المواد</h1>
</div>
@endpush

@section('page')

<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">تعديل المواد</h3>
    </div>
    <div class="card-body">
        <div class="settings-tab">
            <ul class="tabs-menu nav">
                <li class="ms-0"><a href="#tab1" class="active ms-0" data-bs-toggle="tab" id="general"><i class="fe fe-settings"></i> معلومات أساسية </a></li>
                <li><a href="#tab2" data-bs-toggle="tab" class="" id="photo"><i class="fe fe-image"></i> الصورة  </a></li>
                <li><a href="#tab3" data-bs-toggle="tab" class="" id="advanced"><i class="fe fe-settings"></i>  معلومات اضافية  </a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active show" id="tab1">
                    <form class="form-horizontal" id="form_basic">
                        <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                <input type="text" name="name" class="form-control" id="exampleInputname"  placeholder="الإسم" value="{{$subject->name}}">
                        </div>
                                
                        <div class="form-group">
                            <label class="col-form-label">الوصف</label>
                            <textarea id="description" class="form-control" name="description" name="example-textarea-input" rows="4" placeholder="اكتب كل ما تريد عن المادة">{{$subject->description}}</textarea>
                        </div>
                        <input type="hidden" name="id" value="{{$subject->id}}">
                        <div class="form-group  select2-lg">
                            <label class="form-label" for="levels">المستوى</label>
                            <select name="level_id" id="levels" class="form-control form-select select2">
                                @foreach ($levels as $lv)
                                    <option value="{{$lv->id}}" @if($subject->level_id == $lv->id) selected @endif >{{$lv->name}}</option>
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
                                    <label class="form-label mb-0">صورة المادة :</label>
                                </div>
                                <input type="hidden" name="id" value="{{$subject->id}}">
                                <div class="col-md-9">
                                    <div class="input-group file-browser">
                                        <input type="text" name="text" class="form-control bg-transparent border-end-0 browse-file valid" placeholder="إرفع الصورة" readonly="" aria-invalid="false" value="{{$subject->cover}}">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary br-ts-0 br-bs-0">إرفع <input type="file" name="cover" style="display: none;">
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
                    <form class="form-horizontal" id="form_advanced">

                        <input type="hidden" name="id" value="{{$subject->id}}">

                        
                        <div class="form-group  select2-lg">
                            <label class="form-label" for="departments">التخصص</label>
                            <select name="department_id" id="departments" class="form-control form-select select2">
                                @foreach ($departments as $d)
                                    <option value="{{$d->id}}" @if($d->id == $subject->department_id) selected @endif >{{$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group  select2-lg">
                            <label class="form-label" for="doctors">دكتور المادة</label>
                            <select name="doctor_id" id="doctors" class="form-control form-select select2" >
                                @foreach ($doctors as $d)
                                    <option value="{{$d->id}}"  @if($d->id == $subject->doctor_id) selected @endif>{{$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pre_requirements">المواد المتطلبة</label>
                            <select name="pre_id[]" class="form-control select2" id="pre_requirements" data-placeholder="اختر المواد المتطلبة" multiple >
                                @foreach ($subjects as $s)
                                <option value="{{$s->id}}"
                                    @foreach ($subject->requirments as $r)
                                       @if($s->id == $r->id)
                                         selected
                                       @endif
                                    @endforeach
                                    >{{$s->name}}</option>
                                @endforeach
                            </select>
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

            $('textarea[name=description]').on('click',(e) => {
                if( $('textarea[name=description]').hasClass('is-invalid')) {
                    $('textarea[name=description]').removeClass('is-invalid');
                    $('span.invalid-feedback#description').remove();
                }
            })

            //Subject edit
            $('#form_basic').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.subjects.updatebasic') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.name){
                            messageError('name',errors.name[0]);
                        }
                        if(errors.description){
                            $('#description').addClass('is-invalid');
                                $('#description').parent().append(
                                    '<span id="description" class="invalid-feedback d-block px-2" role="alert">'+
                                            '<strong>'+errors.description[0]+'</strong>'+
                                    '</span>'
                            );
                        }
                        if(errors.level_id){
                            $('select[name=level_id]').addClass('is-invalid');
                            $('select[name=level_id]').parent().append(
                                '<span id=level_id class="invalid-feedback d-block px-2" role="alert">'+
                                        '<strong>'+errors.level_id[0]+'</strong>'+
                                '</span>'
                            );                          }
                    }
                    else{
                            window.location.replace("{{ route("admin.subjects") }}");
                        }
                })
            })

            $('#form_image').submit((e) => {
                e.preventDefault();
                 var file = $(':file').get(0);
                var form = new FormData();
                form.append('cover',file.files[0]);
                var obj=$(e.target).serializeArray();
               // console.log(obj);
                for(var key in obj)
                {
                    form.append(obj[key].name,obj[key].value);
                }
                axios.post('{{ route('admin.subjects.updateimage') }}',form,{
                    headers: {
                        'Content-Type': 'multipart/form-data; boundary=${form._boundary}'
                    }
                })
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.cover){
                            messageError('text',errors.cover[0]);

                        }
                    }else{
                    window.location.replace("{{ route("admin.subjects") }}");
                    } 
                })
            })

              $('#form_advanced').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.subjects.updateadvanced') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.doctor_id){
                            messageError('doctor_id',errors.doctor_id[0]);
                        }
                        
                        if(errors.department_id){
                            $('select[name=department_id]').addClass('is-invalid');
                            $('select[name=department_id]').parent().append(
                                '<span id=department_id class="invalid-feedback d-block px-2" role="alert">'+
                                        '<strong>'+errors.department_id[0]+'</strong>'+
                                '</span>'
                            );                        
                         }
                    }
                    else{
                            window.location.replace("{{ route("admin.subjects") }}");
                        }
                })
            })

            $('#departments').on('change',(e)=>{
                $('#pre_requirements').attr('disabled',true);
                $('#doctors').attr('disabled',true);
                $('#pre_requirements').html('');
                $('#doctors').html('');
                var dep_id=$(e.target).val();
                if(dep_id != 0){
                    axios.get('{{ route('admin.getDeptResult') }}',{params:{'id':dep_id}})
                    .then((res) => {
                        console.log(res);
                        if(res.data.subjects_html != null){
                            $('#pre_requirements').append(res.data.subjects_html);
                            $('#pre_requirements').removeAttr('disabled');
                        }
                        if(res.data.doctors_html){
                            $('#doctors').removeAttr('disabled');
                            $('#doctors').append(res.data.doctors_html);
                        }
                    
                    })

                }
            })
        })
    </script>
@endpush