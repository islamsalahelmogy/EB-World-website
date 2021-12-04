@extends('user.layout')
@push('css') 
    <style>
        .usertab-list li {
            width: 100%
        }
    </style>
@endpush
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">الصفحة الشخصية</h1>
</div>
@endpush

@section('page')
    <div class="card mb-0">
        <div class="card-body">
            <div class="profile-log-switch">
                <div class="media-heading">
                    <h3 class="card-title mb-3 font-weight-bold">المعلومات الشخصية</h3>
                </div>
                <ul class="usertab-list">
                    <li><a href="javascript:void(0)"><span class="font-weight-bold text-default-dark float-start">الإسم : </span> <span class="user-1 ms-2"> {{auth('user')->user()->name}}</span></a></li>
                    <li><a href="javascript:void(0)"><span class="font-weight-bold text-default-dark float-start">الإيميل : </span> <span class="user-1 ms-2"> {{auth('user')->user()->email}}</span></a></li>
                    <li><a href="javascript:void(0)"><span class="font-weight-bold text-default-dark float-start">التخصص : </span> <span class="user-1 ms-2"> @if(auth('user')->user()->department != null) {{auth('user')->user()->department}} @else لايوجد @endif</span></a></li>
                    <li><a href="javascript:void(0)"><span class="font-weight-bold text-default-dark float-start">السنة الدراسية : </span><span class="user-1 ms-2">@if(auth('user')->user()->level != null) {{auth('user')->user()->level}} @else لايوجد @endif</span></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection