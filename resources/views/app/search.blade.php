@extends('layout.app.layout')
@push('css')
    <style>
        .btn-subjects {
            background: #1352A9;
            color: white !important;
            padding: 10px;
        }

        .btn-subjects:hover {
            color: white !important;
            background-color: #C2AB2F !important;
        }
        
    </style>
@endpush
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">نتيجة البحث </h1>
    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1"><a href="{{route('home')}}" class="text-white font-weight-bold fs-2"><i class="fe fe-home me-2 float-start mt-1"></i>الرئيسية</a></li>
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3">بحث</li>
    </ol>
</div>
@endpush

@section('content')
   @if($type == 'doctor')
        @if($doctors->count() > 0)
            @include('common.doctors')
        @endif
   @else
        @if($subjects->count() > 0)
            @include('common.subjects')
        @endif
   @endif
@endsection