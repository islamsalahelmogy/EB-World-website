@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم المواد</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">المواد</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab"> المواد</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة مادة جديد</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>المادة</th>
                                <th >إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $s)
                            <tr id="tr_{{$s->id}}">
                                
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="card-aside-img">
                                            <a href="javascript:void(0)"></a>
                                            @if ($s->cover != null)
                                                <img src="{{asset('assets/images/data/subjects/'.$s->id.'/'.$s->cover)}}" alt="img">
                                            @else
                                                <img src="{{asset('assets/images/data/subjects/default.jpg')}}" alt="img">
                                            @endif
                                        </div>
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">{{$s->name}}</h4></a>
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">دكتور المادة : {{$s->doctor->name}}</h4></a>
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">المستوى : {{$s->level->name}}</h4></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="تعديل"><i class="fe fe-edit-2 fs-16"></i></a>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="حذف"><i class="fe fe-trash fs-16"></i></a>
                                    {{-- <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="عرض"><i class="fe fe-eye fs-16"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane userprof-tab" id="tab2">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class=" m-b-20">
                                <div class="card-header">
                                    <h3 class="card-title">إضافة مادة جديدة</h3>
                                </div>
                                <div class="card-body">
                                    <form id="create_subject">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputname"  placeholder="الإسم">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="code">كود المادة</label>
                                            <input type="text" name="code" class="form-control" id="code"  placeholder="كود المادة">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">الوصف</label>
                                            <textarea class="form-control" name="description" name="example-textarea-input" rows="4" placeholder="اكتب كل ما تريد عن المادة"></textarea>
                                        </div>

                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="levels">المستوى</label>
											<select name="level_id" id="levels" class="form-control form-select select2">
												<option value="0" selected="">إختر المستوى</option>
												@foreach ($levels as $lv)
                                                    <option value="{{$lv->id}}" >{{$lv->name}}</option>
                                                @endforeach
											</select>
										</div>

                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="departments">التخصص</label>
											<select name="department_id" id="departments" class="form-control form-select select2">
												<option value="0" selected="">إختر التخصص</option>
												@foreach ($departments as $d)
                                                    <option value="{{$d->id}}" >{{$d->name}}</option>
                                                @endforeach
											</select>
										</div>
                                       
                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="doctors">دكتور المادة</label>
											<select name="doctor_id" id="doctors" class="form-control form-select select2" disabled>
												
											</select>
										</div>
                                        <div class="form-group">
											<label class="form-label" for="pre_requirements">المواد المتطلبة</label>
											<select name="pre_id[]" class="form-control select2" id="pre_requirements" data-placeholder="اختر المواد المتطلبة" multiple disabled>
												
											</select>
										</div>
                                        <div class="form-group">
                                            <div class="form-label">صورة المادة</div>
                                            <div class="control-group form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text" class="form-control border-end-0 browse-file bg-transparent" placeholder="صورة المادة" readonly="">
                                                    <label class="input-group-btn">
                                                       <span class="btn btn-primary br-bs-0 br-ts-0">
                                                        إرفع <input name="cover" type="file" style="display: none;">
                                                      </span>
                                                   </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="checkbox checkbox-secondary">
                                                <button type="submit" class="btn btn-primary ">أضف</button>
                                            </div>
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

            //subject Create

            $('#create_subject').submit((e) => {
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
                //console.log(form,file.files[0]);
               // console.log(JSON.parse($(e.target).serialize()));
                axios.post('{{ route('admin.subjects.store') }}',form,{
                    headers: {
                        'Content-Type': 'multipart/form-data; boundary=${form._boundary}'
                    }
                })
                .then((res) => {
                    console.log(res.data);
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.name){
                            messageError('name',errors.name[0]);
                        }
                        if(errors.desciption){
                            messageError('desciption',errors.desciption[0]);
                        }
                        if(errors.code){
                            messageError('code',errors.code[0]);
                        }
                        if(errors.cover){
                            messageError('cover',errors.cover[0]);
                        }
                        if(errors.doctor_id){
                            messageError('doctor_id',errors.doctor_id[0]);
                        }
                        if(errors.department_id){
                            messageError('department_id',errors.department_id[0]);
                        }
                        if(errors.level_id){
                            messageError('level_id',errors.level_id[0]);
                        }
                    }
                    else{
                      //  window.location.replace("{{ route("admin.subjects") }}");
                        }
                })
            })
        })
    </script>
@endpush