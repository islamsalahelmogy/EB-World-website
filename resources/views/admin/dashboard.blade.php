@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم</h1>
</div>
@endpush

@section('page')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">الإحصائيات</h4>
        </div>
        <div class="row item-all-cat">
            <div class="col-xl-4 col-md-6">
                <div class="item-all-card bg-primary">
                    <a href="javascript:void(0)"></a>
                    <h5 class="text-white">عدد المواد</h5>
                    <div class="d-flex">
                        <div class="iteam-all-icon">
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V9l-7-7z" fill="none"/><path d="M13 3v6h6" fill="none"/></svg></i>
                        </div>
                        <div class="item-all-text ms-auto">
                            <h1 class="mb-0 counter font-weight-bold text-white">{{$subjects->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="item-all-card bg-success">
                    <a href="javascript:void(0)"></a>
                    <h5 class="text-white">عدد الدكاترة</h5>
                    <div class="d-flex">
                        <div class="iteam-all-icon">
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" fill="none"/><circle cx="12" cy="10" r="3" fill="none"/><circle cx="12" cy="12" r="10" fill="none"/></svg></i>
                        </div>
                        <div class="item-all-text ms-auto">
                            <h1 class="mb-0 counter font-weight-bold text-white">{{$doctors->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="item-all-card bg-danger">
                    <a href="javascript:void(0)"></a>
                    <h5 class="text-white">عدد الأقسام</h5>
                    <div class="d-flex">
                        <div class="iteam-all-icon">
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" fill="none"></rect><rect x="14" y="3" width="7" height="7" fill="none"></rect><rect x="14" y="14" width="7" height="7" fill="none"></rect><rect x="3" y="14" width="7" height="7" fill="none"></rect></svg></i>
                        </div>
                        <div class="item-all-text ms-auto">
                            <h1 class="mb-0 counter font-weight-bold text-white">{{$departments->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="item-all-card bg-purple">
                    <a href="javascript:void(0)"></a>
                    <h5 class="text-white">عدد الطلاب</h5>
                    <div class="d-flex">
                        <div class="iteam-all-icon">
                            <i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 8c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H9zm-3-3v-3h3v-2H6V7H4v3H1v2h3v3z"/></svg></i>
                        </div>
                        <div class="item-all-text ms-auto">
                            <h1 class="mb-0 counter font-weight-bold text-white">{{$users->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="item-all-card bg-warning">
                    <a href="javascript:void(0)"></a>
                    <h5 class="text-white">عدد الإستفسارات</h5>
                    <div class="d-flex">
                        <div class="iteam-all-icon">
                            <i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg></i>
                        </div>
                        <div class="item-all-text ms-auto">
                            <h1 class="mb-0 counter font-weight-bold text-white">{{$inqs->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="item-all-card bg-primary">
                    <a href="javascript:void(0)"></a>
                    <h5 class="text-white">عدد الردود</h5>
                    <div class="d-flex">
                        <div class="iteam-all-icon">
                            <i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM20 4v13.17L18.83 16H4V4h16zM6 12h12v2H6zm0-3h12v2H6zm0-3h12v2H6z"/></svg></i>
                        </div>
                        <div class="item-all-text ms-auto">
                            <h1 class="mb-0 counter font-weight-bold text-white">{{$replies->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card detial-table">
                    <div class="card-header">
                        <h3 class="card-title">جميع المواد</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="data-table-example dashboard table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المادة</th>
                                        <th>القسم</th>
                                        <th>المستوى</th>
                                        <th>الدكتور</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $s)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="d-xl-flex">
                                                <div class="table_img">
                                                    @if ($s->cover != null)
                                                        <img src="{{asset('assets/images/data/subjects/'.$s->id.'/'.$s->cover)}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                    @else
                                                        <img src="{{asset('assets/images/data/subjects/default.jpg')}}" alt="img" class="w-7 h-7 br-7 me-3">
                                                    @endif
                                                    
                                                </div>
                                                <div class="my-auto">
                                                    <h6 class="fs-13 font-weight-normal">{{$s->name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$s->department->name}}</td>
                                        <td>{{$s->level->name}}</td>
                                        <td>{{$s->doctor->name}}</td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection