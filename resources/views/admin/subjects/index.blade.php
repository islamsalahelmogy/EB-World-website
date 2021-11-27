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
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">جميع المواد</a></li>
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
                                    <h3 class="card-title">إضافة قسم جديد</h3>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" class="form-control" id="exampleInputname"  placeholder="الإسم">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="code">كود المادة</label>
                                            <input type="text" class="form-control" id="code"  placeholder="كود المادة">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">الوصف</label>
                                            <textarea class="form-control" name="example-textarea-input" rows="4" placeholder="اكتب كل ما تريد عن المادة"></textarea>
                                        </div>
                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="departments">القسم</label>
											<select name="departments" id="departments" class="form-control form-select select2">
												<option value="0" selected="">إختر القسم</option>
												@foreach ($departments as $d)
                                                    <option value="{{$d->id}}" >{{$d->name}}</option>
                                                @endforeach
											</select>
										</div>
                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="levels">المستوى</label>
											<select name="levels" id="levels" class="form-control form-select select2">
												<option value="0" selected="">إختر المستوى</option>
												@foreach ($levels as $lv)
                                                    <option value="{{$lv->id}}" >{{$lv->name}}</option>
                                                @endforeach
											</select>
										</div>
                                        <div class="form-group  select2-lg">
                                            <label class="form-label" for="doctors">دكتور المادة</label>
											<select name="doctors" id="doctors" class="form-control form-select select2">
												<option value="0" selected="">إختر الدكتور</option>
												@foreach ($doctors as $d)
                                                    <option value="{{$d->id}}" >{{$d->name}}</option>
                                                @endforeach
											</select>
										</div>
                                        <div class="form-group">
											<label class="form-label" for="pre_requirements">المواد المتطلبة</label>
											<select class="form-control select2" id="pre_requirements" data-placeholder="اختر المواد المتطلبة" multiple>
												@foreach ($subjects as $s)
                                                    <option value="{{$s->id}}" >{{$s->name}}</option>
                                                @endforeach
											</select>
										</div>
                                        <div class="form-group">
                                            <div class="form-label">صورة المادة</div>
                                            <div class="control-group form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text" class="form-control border-end-0 browse-file bg-transparent" placeholder="صورة المادة" readonly="">
                                                    <label class="input-group-btn">
                                                       <span class="btn btn-primary br-bs-0 br-ts-0">
                                                        إرفع <input type="file" style="display: none;">
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