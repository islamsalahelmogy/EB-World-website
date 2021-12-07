    
            <div class="media mt-0 p-5 border br-7 review-media mb-3" id="rep-{{$reply->id}}">
                <div class="d-flex me-3">
                    <div class="d-flex">
                        <a href="javascript:void(0)">
                            @if ($reply->type == 'admin')
                                @if ($reply->admin->image != null)
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/'.$reply->admin->id.'/'.$reply->admin->image)}}">
                                @else
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/admins/male.jpg')}}">
                                @endif
                            @else
                                @if ($reply->user->image != null)
                                    <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/'.$reply->user->id.'/'.$reply->user->image)}}">
                                @else
                                    @if ($reply->user->gender == 'ذكر')
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/male.jpg')}}">
                                    @else
                                        <img class="media-object brround avatar-lg" alt="64x64" src="{{asset('assets/images/data/users/female.jpg')}}">
                                    @endif
                                @endif
                            @endif
                        </a>
                    </div>
                </div>
                <div class="media-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center flex-column">
                            <h4 class="mt-0 mb-1 font-weight-semibold">
                                @if ($reply->type == 'admin')
                                    {{$reply->admin->name}}
                                @else
                                    {{$reply->user->name}}
                                @endif
                            </h4>
                            <small class="text-muted fs-14">
                                <i class="fa fa-clock-o"></i>  {{$reply->created_at->diffForHumans()}}
                            </small>
                        </div>
                        <div class="d-flex align-items-center">
                            @if($reply->type == 'admin' && Auth::guard('admin')->check())
                                @if (Auth::guard('admin')->user()->id == $reply->admin_id)
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-outline-light btn-sm waves-effect waves-light me-3 edit_reply" id="editR_{{$reply->id}}" data-bs-toggle="tooltip" data-bs-original-title="تعديل"><i class="fe fe-edit-2 fs-16"></i></a>
                                        <a class="btn btn-outline-light btn-sm waves-effect waves-light delete_reply" id="delR_{{$reply->id}}" data-bs-toggle="tooltip" data-bs-original-title="حذف"><i class="fe fe-trash fs-16"></i></a>
                                    </div>
                                @endif
                            @elseif($reply->type == 'user' && Auth::guard('user')->check())
                                @if (Auth::guard('user')->user()->id == $reply->user_id)
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-outline-light btn-sm waves-effect waves-light me-3 edit_reply" id="editR_{{$reply->id}}" data-bs-toggle="tooltip" data-bs-original-title="تعديل"><i class="fe fe-edit-2 fs-16"></i></a>
                                        <a class="btn btn-outline-light btn-sm waves-effect waves-light delete_reply" id="delR_{{$reply->id}}" data-bs-toggle="tooltip" data-bs-original-title="حذف"><i class="fe fe-trash fs-16"></i></a>
                                     </div>
                                @endif
                            @endif
                        </div>
                    </div>
                   
                    <p class="font-13 fs-15 mb-2 mt-2" id="contentR_{{$reply->id}}">{!!$reply->text!!}</p>
                    <div class ="edit_rep" id ="Editrep_{{$reply->id}}" style="display:none">
                        <div class="form-group">
                            <textarea class="form-control" name="text" rows= "5" id="textReply_{{$reply->id}}" placeholder="إستفسر عن ما تريد"></textarea>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary E_reply" id="edR_{{$reply->id}}">تعديل</a>
                        <a href="javascript:void(0)" class="btn btn-primary cancelEditReply" id="c_edR_{{$reply->id}}">إلغاء</a>
                    </div>
                </div>
            </div>
       