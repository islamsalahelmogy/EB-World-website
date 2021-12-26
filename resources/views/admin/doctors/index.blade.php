@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم أعضاء هيئة التدريس</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">أعضاء هيئة التدريس</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">أعضاء هيئة التدريس</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab"> إضافة عضو جديد</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>عضور هيئة التدريس</th>
                                <th >إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $d)
                            <tr id="tr_{{$d->id}}">
                                
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="card-aside-img">
                                            <a href="javascript:void(0)"></a>
                                            @if ($d->image != null)
                                                <img src="{{asset('assets/images/data/doctors/'.$d->id.'/'.$d->image)}}" alt="img">
                                            @else
                                                @if ($d->gender == 'انثى')
                                                    <img src="{{asset('assets/images/data/doctors/female.jpg')}}" alt="img">
                                                @else
                                                    <img src="{{asset('assets/images/data/doctors/male.jpg')}}" alt="img">
                                                @endif
                                            @endif
                                        </div>
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">{{$d->name}}</h4></a>
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">{{$d->department->name}}</h4></a>
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">عدد المواد : {{$d->subjects->count()}}</h4></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="تعديل" href="{{ route('admin.doctors.edit',['id'=>$d->id]) }}"><i class="fe fe-edit-2 fs-16"></i></a>
                                    @if ($d->subjects->count() == 0)
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="حذف" href="{{ route('admin.doctors.delete',['id'=>$d->id]) }}"><i class="fe fe-trash fs-16"></i></a>
                                    @endif
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
                                    <h3 class="card-title">إضافة عضو هيئة تدريس جديد</h3>
                                </div>
                                <div class="card-body">
                                    <form id="create_doctor">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputname"  placeholder="الإسم">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإيميل</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="الإيميل">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputPassword1">الموبايل</label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputnumber" placeholder="الموبايل">
                                        </div>
                                        <div class="form-group ">
                                            <label class="form-label">الجنس</label>
                                        
                                            <div class="form-controls-stacked d-md-flex">
                                                <label class="custom-control custom-radio me-4">
                                                    <input type="radio" class="custom-control-input" name="gender" value="ّذكر" checked>
                                                    <span class="custom-control-label">ذكر</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="gender" value="أنثى">
                                                    <span class="custom-control-label">أنثى</span>
                                                </label>
                                            </div>
                        
                                        </div>
                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="options">التخصص</label>
											<select name="department_id" id="options"  class="form-control form-select select2">
												<option value="0" selected="">إختر التخصص</option>
												@foreach ($departments as $d)
                                                    <option  value="{{$d->id}}" >{{$d->name}}</option>
                                                @endforeach
											</select>
										</div>
                                        <div class="form-group">
                                            <div class="form-label">الصورة الشخصية</div>
                                            <div class="control-group form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text" class="form-control border-end-0 browse-file bg-transparent" placeholder="الصورة الشخصية" readonly="">
                                                    <label class="input-group-btn">
                                                       <span class="btn btn-primary br-bs-0 br-ts-0">
                                                        إرفع <input type="file" name="image" style="display: none;">
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
            //department Create
            $('#create_doctor').submit((e) => {
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
                //console.log(form,file.files[0]);
               // console.log(JSON.parse($(e.target).serialize()));
                axios.post('{{ route('admin.doctors.store') }}',form,{
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
                        if(errors.email){
                            messageError('email',errors.email[0]);
                        }
                        if(errors.image){
                            messageError('image',errors.image[0]);
                        }
                        if(errors.gender){
                            messageError('gender',errors.gender[0]);
                        }
                        if(errors.department_id){
                            messageError('department_id',errors.department_id[0]);
                        }
                        if(errors.phone){
                            messageError('phone',errors.phone[0]);
                        }
                        
                    }
                    else{
                        window.location.replace("{{ route("admin.doctors") }}");
                        }
                })
            })
        })
    </script>
@endpush