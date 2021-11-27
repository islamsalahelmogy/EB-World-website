@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم المسئولين</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">المسئولين</h3>
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <ul class="nav panel-tabs">
                    <li class="me-3"><a href="#tab1" class="active" data-bs-toggle="tab">جميع المسئولين</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab">إضافة مسئول جديد</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                    <table class="data-table-example table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>المسئول</th>
                                <th >إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $d)
                            <tr id="tr_{{$d->id}}">
                                
                                <td>
                                    <div class="media mt-0 mb-0">
                                        <div class="card-aside-img">
                                            <a href="javascript:void(0)"></a>
                                            @if ($d->image != null)
                                                <img src="{{asset('assets/images/data/admins/'.$d->id.'/'.$d->image)}}" alt="img">
                                            @else
                                                <img src="{{asset('assets/images/data/admins/male.jpg')}}" alt="img">
                                            @endif
                                        </div>
                                        <div class="media-body">
                                            <div class="card-item-desc ms-2 p-0 mt-0">
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">{{$d->name}}</h4></a>
                                                <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-bold">{{$d->email}}</h4></a>
                                                <a href="javascript:void(0)" class="text-muted fs-12"><i class="fa fa-clock-o me-1"></i>{{$d->created_at->diffForHumans()}}</a>
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
                                    <h3 class="card-title">إضافة مسئول جديد</h3>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" class="form-control" id="exampleInputname"  placeholder="الإسم">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإيميل</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="الإيميل">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputPassword1">كلمة السر</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="كلمة السر">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputPassword1">أعد كلمة السر</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="أعد كلمة السر">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label">الصورة الشخصية</div>
                                            <div class="control-group form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text" class="form-control border-end-0 browse-file bg-transparent" placeholder="الصورة الشخصية" readonly="">
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