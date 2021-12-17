@extends('layout.app.layout')
@push('css')
    <style>
        .inquiry{
            box-shadow: 0px 0px 15px grey;
            padding: 15px;
            border-radius: 16px;
        }
        
    </style>
@endpush
@push('breadcrumb')

    <ol class="breadcrumb1 justify-content-center mt-5">
        <li class="breadcrumb-item1 active text-white font-weight-bold fs-3"><i class="fe fe-help-circle me-2 float-start mt-2"></i>الإستفسارات</li>
    </ol>

@endpush
@section('content')
    <div class="container">
        <hr>
        <div class="row inquiries">
            @include('common.inquiries')
        </div>
    </div>
@endsection