@extends('layout.app.layout')
@push('css')
    <style>
        .inquire{
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
    @if(Auth::guard('admin')->check() || Auth::guard('user')->check())
        <hr>
        <div class="row">
            <div class="d-block mx-auto col-lg-8 col-md-12">
                <div class="card mb-lg-0">
                    <div class="card-header">
                        <h3 class="card-title">أضف إستفسارك</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="إستفسر عن ما تريد"></textarea>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary">أضف</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <hr>
    <h1 class="text-center mb-5">جميع الإستفسارات</h1>
    <div class="row inquiries">
        @foreach ($inquiries as $inq)
        <div class="d-block mx-auto col-lg-8 col-md-12 mb-5 inquire">
            <div class="card blog-detail">
                <div class="card-body">
                    <div class="d-flex me-3 align-items-center">
                        <a href="javascript:void(0)" class="me-3">
                            @if ($inq->type == 'admin')
                                @if ($inq->admin->image != null)
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/'.$inq->admin->id.'/'.$inq->admin->image)}}">
                                @else
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/male.jpg')}}">
                                @endif
                            @else
                                @if ($inq->user->image != null)
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/'.$inq->user->id.'/'.$inq->user->image)}}">
                                @else
                                    @if ($inq->user->gender == 'ذكر')
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/male.jpg')}}">
                                    @else
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/female.jpg')}}">
                                    @endif
                                @endif
                            @endif
                        </a>
                        <a href="javascript:void(0)" class="text-dark">
                            <h2 class="font-weight-semibold m-0">
                                @if ($inq->type == 'admin')
                                    {{$inq->admin->name}}
                                @else
                                    {{$inq->user->name}}
                                @endif
                            </h2>
                        </a>
                    </div>
                   
                    <div class="item7-card-desc d-md-flex mb-2 mt-3">
                        <a href="javascript:void(0)" class="font-weight-semibold fs-16 ms-0"><i class="fe fe-calendar me-2 text-primary float-start mt-1"></i>{{$inq->created_at->diffForHumans()}}</a>
                        <div class="ms-auto">
                            <a href="javascript:void(0)" class="font-weight-semibold fs-16 me-0"><i class="fe fe-message-circle me-2 text-primary float-start mt-1"></i>{{$inq->replies->count()}} ردود</a>
                        </div>
                    </div>
                    <p>{{$inq->text}}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الردود</h3>
                </div>
                <div class="card-body">
                    @foreach ($inq->replies as $r)
                        <div class="media mt-0 p-5 border br-7 review-media">
                            <div class="d-flex me-3">
                                <a href="javascript:void(0)">
                                    @if ($r->type == 'admin')
                                        @if ($r->admin->image != null)
                                            <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/'.$inq->r->id.'/'.$inq->r->image)}}">
                                        @else
                                            <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/male.jpg')}}">
                                        @endif
                                    @else
                                        @if ($r->user->image != null)
                                            <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/'.$r->user->id.'/'.$inq->r->image)}}">
                                        @else
                                            @if ($r->user->gender == 'ذكر')
                                                <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/male.jpg')}}">
                                            @else
                                                <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/female.jpg')}}">
                                            @endif
                                        @endif
                                    @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="mt-0 mb-1 font-weight-semibold">@if ($r->type == 'admin')
                                    {{$r->admin->name}}
                                @else
                                    {{$r->user->name}}
                                @endif</h4>
                                <small class="text-muted fs-14">
                                    <i class="fa fa-clock-o"></i>  {{$inq->created_at->diffForHumans()}}
                                </small>
                                <p class="font-13 fs-15 mb-2 mt-2">
                                    {{$r->text}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            @if(Auth::guard('admin')->check() || Auth::guard('user')->check())
                <div class="card mb-lg-0">
                    <div class="card-header">
                        <h3 class="card-title">أضف إجابة</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="إكتب إجابتك"></textarea>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary">أضف</a>
                    </div>
                </div>
            @endif
        </div>
        @endforeach
        
    </div>
</div>
@endsection




