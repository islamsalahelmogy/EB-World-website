@foreach ($inquiries as $inquiry)
    <div class="d-block mx-auto col-lg-8 col-md-12 mb-5 inquiry" id="{{$inquiry->id}}">
        <div class="card blog-detail">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="javascript:void(0)" class="me-3">
                            @if ($inquiry->type == 'admin')
                                @if ($inquiry->admin->image != null)
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/'.$inquiry->admin->id.'/'.$inquiry->admin->image)}}">
                                @else
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/male.jpg')}}">
                                @endif
                            @else
                                @if ($inquiry->user->image != null)
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/'.$inquiry->user->id.'/'.$inquiry->user->image)}}">
                                @else
                                    @if ($inquiry->user->gender == 'ذكر')
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/male.jpg')}}">
                                    @else
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/female.jpg')}}">
                                    @endif
                                @endif
                            @endif
                        </a>
                        <a href="javascript:void(0)" class="text-dark">
                            <h2 class="font-weight-semibold m-0">
                                @if ($inquiry->type == 'admin')
                                    {{$inquiry->admin->name}}
                                @else
                                    {{$inquiry->user->name}}
                                @endif
                            </h2>
                        </a>
                    </div>
                    @if($inquiry->type == 'admin' && Auth::guard('admin')->check())
                        @if (Auth::guard('admin')->user()->id == $inquiry->admin_id)
                            <div class="d-flex align-items-center">
                                <a class="btn btn-outline-light btn-sm waves-effect waves-light me-3 edit_inquiry" id="edit_{{$inquiry->id}}" data-bs-toggle="tooltip" data-bs-original-title="تعديل"><i class="fe fe-edit-2 fs-16"></i></a>
                                <a class="btn btn-outline-light btn-sm waves-effect waves-light delete_inquiry" id="del_{{$inquiry->id}}" data-bs-toggle="tooltip" data-bs-original-title="حذف"><i class="fe fe-trash fs-16"></i></a>
                            </div>
                        @endif
                    @elseif($inquiry->type == 'user' && Auth::guard('user')->check())
                        @if (Auth::guard('user')->user()->id == $inquiry->user_id)
                            <div class="d-flex align-items-center">
                                <a class="btn btn-outline-light btn-sm waves-effect waves-light me-3 edit_inquiry" id="edit_{{$inquiry->id}}" data-bs-toggle="tooltip" data-bs-original-title="تعديل"><i class="fe fe-edit-2 fs-16"></i></a>
                                <a class="btn btn-outline-light btn-sm waves-effect waves-light delete_inquiry" id="del_{{$inquiry->id}}" data-bs-toggle="tooltip" data-bs-original-title="حذف"><i class="fe fe-trash fs-16"></i></a>
                            </div>
                        @endif
                    @endif
                </div>
                
                <div class="item7-card-desc d-md-flex mb-2 mt-3">
                    <a href="javascript:void(0)" class="font-weight-semibold fs-16 ms-0"><i class="fe fe-calendar me-2 text-primary float-start mt-1"></i>{{$inquiry->created_at->diffForHumans()}}</a>
                    <div class="ms-auto">
                        <a href="javascript:void(0)" class="font-weight-semibold fs-16 me-0 inq-replies" id="irs-{{$inquiry->id}}"><i class="fe fe-message-circle me-2 text-primary float-start mt-1"></i><span  id="count-{{$inquiry->id}}">{{$inquiry->replies->count()}}</span> ردود</a>
                    </div>
                </div>
                <p id="content_{{$inquiry->id}}">{!!$inquiry->text!!}</p>
                <div class ="edit_inq" id ="EditInq_{{$inquiry->id}}" style="display:none">
                    <div class="form-group">
                        <textarea class="form-control" name="text" rows= "5" id="textInquiry_{{$inquiry->id}}" placeholder="إستفسر عن ما تريد"></textarea>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary E_Inquiry" id="edI_{{$inquiry->id}}">تعديل</a>
                    <a href="javascript:void(0)" class="btn btn-primary cancelEditInquiry" id="c_edI_{{$inquiry->id}}">إلغاء</a>
                </div>
                

            </div>
        </div>
        <div class="card replies" id="rs-{{$inquiry->id}}" style="display: none">
            <div class="card-header">
                <h3 class="card-title">الردود</h3>
            </div>
            <div class="card-body replies_result">
                @foreach ($inquiry->replies as $reply)
                    @include('common.replies')
                @endforeach
                @if($inquiry->replies->count() == 0) 
                    <h5 class="no-replies" id="nr_{{$inquiry->id}}">لا يوجد أى ردود</h5>
                @endif
            </div>
            
        </div>
        @if(Auth::guard('admin')->check() || Auth::guard('user')->check())
            <div class="card mb-lg-0">
                <div class="card-header">
                    <h3 class="card-title">أضف إجابة</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control" id="addtextreply_{{$inquiry->id}}" name="text" rows="6" placeholder="إكتب إجابتك"></textarea>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary addreply" id="addreply_{{$inquiry->id}}">أضف</a>
                </div>
            </div>
        @endif
    </div>
@endforeach

@push('js')
    <script>
            //del inquiry
            $('body').on('click','.delete_inquiry',(e) => {
                e.preventDefault();
                var id = $(e.currentTarget).attr('id');
                var inquiry_id = id.match(/\d/g).join("");
                axios.post('{{route('delete_inquiry')}}',{'id': inquiry_id})
                .then((res) => {
                    $('.inquiry#'+inquiry_id).remove();
                })
            })

            // del reply
            $('body').on('click','.delete_reply',(e) => {
                e.preventDefault();
                var id = $(e.currentTarget).attr('id');
                var reply_id = id.match(/\d/g).join("");
                axios.post('{{route('delete_reply')}}',{'id': reply_id})
                .then((res) => {
                    $('#rep-'+reply_id).remove();
                    $('#count-'+res.data.inquiry_id).text(res.data.count)
                    if(res.data.count == 0) {
                        $("#rs-"+res.data.inquiry_id+" .replies_result").append(`<h5 class="no-replies" id="nr_`+res.data.inquiry_id+`">لا يوجد أى ردود</h5>`)
                    }
                    //$('.inquiry#'+inquiry_id).remove();
                })
            })

            // show update inquiry
            $('body').on('click','.edit_inquiry',(e) => {
                e.preventDefault();
                var id = $(e.currentTarget).attr('id');
                var inquiry_id = id.match(/\d/g).join("");
                $('#textInquiry_'+inquiry_id).val($('#content_'+inquiry_id).text());
                $('#content_'+inquiry_id).hide()
                $('#EditInq_'+inquiry_id).show()
            })

            // hide update inquiry
            $('body').on('click','.cancelEditInquiry',(e) => {
                e.preventDefault();
                var id = $(e.currentTarget).attr('id');
                var inquiry_id = id.match(/\d/g).join("");
                console.log(id)
                $('#textInquiry_'+inquiry_id).val($('#content_'+inquiry_id).text());
                $('#content_'+inquiry_id).show()
                $('#EditInq_'+inquiry_id).hide()
            })

            // show update reply
            $('body').on('click','.edit_reply',(e) => {
                e.preventDefault();
                var id = $(e.currentTarget).attr('id');
                var reply_id = id.match(/\d/g).join("");
                console.log(reply_id)
                $('#textReply_'+reply_id).val($('#contentR_'+reply_id).text());
                $('#contentR_'+reply_id).hide()
                $('#Editrep_'+reply_id).show()
            })

            // hide update reply 
            $('body').on('click','.cancelEditReply',(e) => {
                e.preventDefault();
                var id = $(e.currentTarget).attr('id');
                var reply_id = id.match(/\d/g).join("");
                console.log(id)
                $('#textReply_'+reply_id).val($('#contentR_'+reply_id).text());
                $('#contentR_'+reply_id).show()
                $('#Editrep_'+reply_id).hide()
            })

            $('body').on('click','textarea[name=text]',(e) => {
                if( $('textarea[name=text]').hasClass('is-invalid')) {
                    $('textarea[name=text]').removeClass('is-invalid');
                    $('span.invalid-feedback#text').remove();
                }
            })

            // edit inquiry
            $('body').on('click','.E_Inquiry',(e) => {
                e.preventDefault();
                var id = $(e.target).attr('id');
                var inquiry_id = id.match(/\d/g).join("");
                console.log(id);
                var text = $('#textInquiry_'+inquiry_id).val();
                axios.post('{{route('update_inquiry')}}',{'id': inquiry_id,'text' : text})
                .then((res) => {
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors[0].text){
                            $('#textInquiry_'+inquiry_id).addClass('is-invalid');
                                $('#textInquiry_'+inquiry_id).parent().append(
                                    '<span id="text" class="invalid-feedback d-block px-2" role="alert">'+
                                            '<strong>'+errors[0].text[0]+'</strong>'+
                                    '</span>'
                            );
                        }
                    }else {
                        $('#textInquiry_'+inquiry_id).val(res.data.text);
                        $('#content_'+inquiry_id).html(res.data.text);
                        $('#content_'+inquiry_id).show()
                        $('#EditInq_'+inquiry_id).hide()
                    }
                })
            })

            //edit reply
            $('body').on('click','.E_reply',(e) => {
                e.preventDefault();
                var id = $(e.target).attr('id');
                var reply_id = id.match(/\d/g).join("");
                console.log(id);
                var text = $('#textReply_'+reply_id).val();
                axios.post('{{route('update_reply')}}',{'id': reply_id,'text' : text})
                .then((res) => {
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors[0].text){
                            $('#textReply_'+reply_id).addClass('is-invalid');
                                $('#textReply_'+reply_id).parent().append(
                                    '<span id="text" class="invalid-feedback d-block px-2" role="alert">'+
                                            '<strong>'+errors[0].text[0]+'</strong>'+
                                    '</span>'
                            );
                        }
                    }else {
                        $('#textReply_'+reply_id).val(res.data.text);
                        $('#contentR_'+reply_id).html(res.data.text);
                        $('#contentR_'+reply_id).show()
                        $('#Editrep_'+reply_id).hide()
                    }
                })
            })

            // add reply
            $('body').on('click','.addreply',(e) => {
                e.preventDefault();
                var id = $(e.target).attr('id');
                var inquiry_id = id.match(/\d/g).join("");
                var text = $('#addtextreply_'+inquiry_id).val();
                axios.post('{{route('create_reply')}}',{'text':text,'id':inquiry_id}) 
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors[0].text){
                            $('#addtextreply_'+inquiry_id).addClass('is-invalid');
                                $('#addtextreply_'+inquiry_id).parent().append(
                                    '<span id="text" class="invalid-feedback d-block px-2" role="alert">'+
                                            '<strong>'+errors[0].text[0]+'</strong>'+
                                    '</span>'
                            );
                        }
                    }else {
                        $('#addtextreply_'+inquiry_id).val('')
                        if(res.data.count == 1)
                            $('#rs-'+inquiry_id+" .replies_result").find('.no-replies').remove();
                        $('#count-'+inquiry_id).text(res.data.count);
                        $('#rs-'+inquiry_id+" .replies_result").append(res.data.html);
                    }
                })
            })
    </script>
@endpush

