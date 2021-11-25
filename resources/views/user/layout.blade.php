@extends('layout.app.dashboard')
@section('content')
<section class="sptb my-dash-1">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-12 col-md-12">
                @include('admin.sidebar')
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12">
                @yield('page')
            </div>
        </div>
    </div>
</section>
@endsection