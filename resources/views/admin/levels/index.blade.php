@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم المواد</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">المستويات</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">جميع المستويات</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة مستوى جديد</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>المستوى</th>
                                <th >إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $lv)
                            <tr id="tr_{{$lv->id}}">
                                
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="card-aside-img">
                                            <a href="javascript:void(0)"></a>
                                                <img src="{{asset('assets/images/media/color/sm-2/4.jpg')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">{{$lv->name}}</h4></a>
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">عدد المواد : {{$lv->subjects->count()}}</h4></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="تعديل" href="{{ route('admin.levels.edit',['id'=>$lv->id]) }}"><i class="fe fe-edit-2 fs-16"></i></a>
                                    @if ($lv->subjects->count() == 0)
                                    <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="حذف"href="{{ route('admin.levels.delete',['id'=>$lv->id]) }}"><i class="fe fe-trash fs-16"></i></a>
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
                                    <h3 class="card-title">إضافة مستوى جديد</h3>
                                </div>
                                <div class="card-body">
                                    <form id="create_level">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputname"  placeholder="الإسم">
                                        </div>
                                        
                                        <div class="form-group mb-0">
                                            <div class="checkbox checkbox-secondary">
                                                <input type="submit" class="btn btn-primary " value="أضف">
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
            //Level Create
            $('#create_level').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.levels.store') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.name){
                            messageError('name',errors.name[0]);
                        }
                    }
                    else{
                            window.location.replace("{{ route("admin.levels") }}");
                        }
                })
            })
        })
    </script>
@endpush