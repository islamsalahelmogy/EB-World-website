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
                            <textarea class="form-control" name="text" id="textInquiry" rows="6" placeholder="إستفسر عن ما تريد"></textarea>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary addInquiry">أضف</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <hr>
    <h1 class="text-center mb-5">جميع الإستفسارات</h1>
    <div class="row inquiries">
            @include('common.inquiries')
    </div>
</div>
@endsection


@push('js')
    <script>
        $(document).ready(() => {
            $('body').on('click','.inq-replies',(e) => {
                let inq_id = $(e.target).attr('id').substr(4);
                $('#rs-'+inq_id).toggle();
            })


            $('textarea[name=text]').on('click',(e) => {
                if( $('textarea[name=text]').hasClass('is-invalid')) {
                    $('textarea[name=text]').removeClass('is-invalid');
                    $('span.invalid-feedback#text').remove();
                }
            })

            $('.addInquiry').click(function(e) {
                e.preventDefault();
                var text = $('#textInquiry').val();
                axios.post('{{route('create_inquiry')}}',{'text':text}) 
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors[0].text){
                            $('#textInquiry').addClass('is-invalid');
                                $('#textInquiry').parent().append(
                                    '<span id="text" class="invalid-feedback d-block px-2" role="alert">'+
                                            '<strong>'+errors[0].text[0]+'</strong>'+
                                    '</span>'
                            );
                        }
                    }else {
                        $('#textInquiry').val('')
                        $('.inquiries').prepend(res.data.html);
                    }
                })
            })

        }) 
    </script>
@endpush




