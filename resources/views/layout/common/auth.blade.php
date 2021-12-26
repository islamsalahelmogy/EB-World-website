@push('css')
    <style>
        .notify-img{
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 2px;
        }

        .dropdown-item:hover {
            color:#1352A9 !important;
        }
    </style>


@endpush




<div class="top-bar border-white-transparent">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-bar-end">
                    <ul class="custom">
                        <li class="dropdown header-notification d-flex me-3">
                            <a class="nav-link icon m-0" data-bs-toggle="dropdown">
                                <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg></i>
                                <span class=" nav-unread badge badge-pill notify-count" style=" background: #C2AB2F; ">@auth('admin') {{Auth::guard('admin')->user()->unreadNotification()->count()}} @endif @auth('user') {{Auth::guard('user')->user()->unreadNotification()->count()}} @endif</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow notification">
                                @auth('admin') 
                                    @if(Auth::guard('admin')->user()->notifications->count() > 0) 
                                        <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center mark-all">Mark All As Read </a>
                                        <div class="dropdown-divider"></div>
                                        <div class = "notification-result" style="overflow-y: scroll;height: calc(61px * 5);">
                                            @foreach (Auth::guard('admin')->user()->latestNotification as $notification)
                                                @if($notification->type == 'Inquiry') 

                                                    <a href="{{route('show_inquiry',['inquiry_id'=>json_decode($notification->data)->Inquiry->id,'n_id'=>$notification->id])}}"
                                                        class="dropdown-item d-flex pb-3 align-items-center" style = "@if($notification->read_at == null) color:#1e2125;background-color: #e9ecef; @endif">
                                                        <div class="notify-img">
                                                            <i class="fe fe-help-circle"></i>
                                                        </div>
                                                        <div>
                                                            <strong>{{json_decode($notification->data)->user->name}}</strong> أضاف استفسار جديد
                                                        </div>
                                                    </a>
                                                @endif
                                                @if($notification->type == 'Comment') 

                                                    <a href="{{route('show_inquiry',['inquiry_id'=>json_decode($notification->data)->Reply->inquire_id,'n_id'=>$notification->id])}}"
                                                        class="dropdown-item d-flex pb-3 align-items-center" style = "@if($notification->read_at == null) color:#1e2125;background-color: #e9ecef; @endif">
                                                        <div class="notify-img">
                                                            <i class="fa fa-comment-o"></i>
                                                        </div>
                                                        <div>
                                                            <strong>{{json_decode($notification->data)->user->name}}</strong> أضاف رد جديد
                                                        </div>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(Auth::guard('admin')->user()->notifications->count() == 0) 
                                        <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">not found notification</a>
                                    @endif
                                @endauth
                                @auth('user') 
                                    @if(Auth::guard('user')->user()->notifications->count() > 0) 
                                        <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center mark-all">Mark All As Read </a>
                                        <div class="dropdown-divider"></div>
                                        <div class = "notification-result" style="overflow-y: scroll;height: calc(61px * 5);">
                                            @foreach (Auth::guard('user')->user()->latestNotification as $notification)
                                                @if($notification->type == 'Inquiry') 

                                                    <a href="{{route('show_inquiry',['inquiry_id'=>json_decode($notification->data)->Inquiry->id,'n_id'=>$notification->id])}}"
                                                        class="dropdown-item d-flex pb-3 align-items-center" style = "@if($notification->read_at == null) color:#1e2125;background-color: #e9ecef; @endif">
                                                        <div class="notify-img">
                                                            <i class="fe fe-help-circle"></i>
                                                        </div>
                                                        <div>
                                                            <strong>{{json_decode($notification->data)->user->name}}</strong> أضاف استفسار جديد
                                                        </div>
                                                    </a>
                                                @endif
                                                @if($notification->type == 'Comment') 

                                                    <a href="{{route('show_inquiry',['inquiry_id'=>json_decode($notification->data)->Reply->inquire_id,'n_id'=>$notification->id])}}"
                                                        class="dropdown-item d-flex pb-3 align-items-center" style = "@if($notification->read_at == null) color:#1e2125;background-color: #e9ecef; @endif">
                                                        <div class="notify-img">
                                                            <i class="fa fa-comment-o"></i>
                                                        </div>
                                                        <div>
                                                            <strong>{{json_decode($notification->data)->user->name}}</strong> أضاف رد جديد
                                                        </div>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(Auth::guard('user')->user()->notifications->count() == 0) 
                                        <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">not found notification</a>
                                    @endif
                                @endauth
                            </div>
                        </li>
                        
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="text-dark" data-bs-toggle="dropdown"><i class="fe fe-home me-1"></i><span>@auth('user'){{auth('user')->user()->name}} @endauth @auth('admin'){{auth('admin')->user()->name}} @endauth<i class="fe fe-chevron-down text-white ms-1"></i></span></a>
                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-arrow">
                                {{-- admin or user --}}
                                @auth('admin')
                                    <a href="{{route('admin.dashboard')}}" class="dropdown-item" >
                                        <i class="dropdown-icon icon icon-user"></i>لوحة التحكم
                                    </a>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                                        <i class="dropdown-icon icon icon-power"></i>خروج
                                    </a>
                                @endauth
                                @auth('user')
                                    <a href="{{route('user.profile')}}" class="dropdown-item" >
                                        <i class="dropdown-icon icon icon-user"></i>الصفحة الشخصية
                                    </a>
                                    <a class="dropdown-item" href="{{route('user.logout')}}">
                                        <i class="dropdown-icon icon icon-power"></i>خروج
                                    </a>
                                @endauth
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>

        $('.mark-all').on('click',function() {
			$('.notification-result a').css({'color' : '#5c5776' , 'background-color': 'transparent'});
			$('.notify-count').text(0);
			axios.post('{{route('readAllNotification')}}')
		})
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;
        var pusher = new Pusher('19d1323fc3320259467e', {
        cluster: 'mt1'
        });
        @auth('admin')
            var id = {!!Auth::guard('admin')->user()->id!!}
            var channel = pusher.subscribe('inquiry-notify-'+id);
            channel.bind('inquiryNotify', function(data) {
                console.log(data);
                var count = parseInt($('.notify-count').text(), 10);
                var user = data["user"];
                var url = 'inquiries/show_inquiry?inquiry_id='+data.inquiry_id+'&n_id='+data.n_id;
                if(count == 0) {
                    $('.notification').html('')
                    $('.notification').append(`
                            <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center mark-all">Mark All As Read </a>
                            <div class="dropdown-divider"></div>
                            <div class = "notification-result" style="overflow-y: scroll;height: calc(61px * 5);">
                                <a href="${url}" class="dropdown-item d-flex pb-3 align-items-center" style = "color:#1e2125;background-color: #e9ecef;">
                                    <div class="notify-img">
                                        <i class="fe fe-help-circle"></i>
                                    </div>
                                    <div>
                                        <strong>${user.name}</strong> أضاف استفسار جديد
                                    </div>
                                </a>
                            </div>
                    `)
                } else {
                    $('.notification-result').prepend(`
                        <a href="${url}" class="dropdown-item d-flex pb-3 align-items-center" style = "color:#1e2125;background-color: #e9ecef;">
                            <div class="notify-img">
                                <i class="fe fe-help-circle"></i>
                            </div>
                            <div>
                                <strong>${user.name}</strong> أضاف استفسار جديد
                            </div>
                        </a>
                    `)
                }
                $('.notify-count').text(count+1);

            });

            var channel = pusher.subscribe('admin-inquiry-comment-'+id);
            channel.bind('adminInquiryComment', function(data) {
                console.log(data);
                var count = parseInt($('.notify-count').text(), 10);
                var user = data["user"];
                var url = '/inquiries/show_inquiry?inquiry_id='+data.inquiry_id+'&n_id='+data.n_id;
                if(count == 0) {
                    $('.notification').html('')
                    $('.notification').append(`
                            <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center mark-all">Mark All As Read </a>
                            <div class="dropdown-divider"></div>
                            <div class = "notification-result" style="overflow-y: scroll;height: calc(61px * 5);">
                                <a href="${url}" class="dropdown-item d-flex pb-3 align-items-center" style = "color:#1e2125;background-color: #e9ecef;">
                                    <div class="notify-img">
                                        <i class="fa fa-comment-o"></i>
                                    </div>
                                    <div>
                                        <strong>${user.name}</strong> أضاف رد جديد
                                    </div>
                                </a>
                            </div>
                    `)
                } else {
                    $('.notification-result').prepend(`
                        <a href="${url}" class="dropdown-item d-flex pb-3 align-items-center" style = "color:#1e2125;background-color: #e9ecef;">
                            <div class="notify-img">
                                <i class="fa fa-comment-o"></i>
                            </div>
                            <div>
                                <strong>${user.name}</strong> أضاف رد جديد
                            </div>
                        </a>
                    `)
                }
                $('.notify-count').text(count+1);

            });
        @endauth
        @auth('user')
            var id = {!!Auth::guard('user')->user()->id!!}

            var channel = pusher.subscribe('user-inquiry-comment-'+id);
            channel.bind('userInquiryComment', function(data) {
                console.log(data);
                var count = parseInt($('.notify-count').text(), 10);
                var user = data["user"];
                var url = '/inquiries/show_inquiry?inquiry_id='+data.inquiry_id+'&n_id='+data.n_id;
                if(count == 0) {
                    $('.notification').html('')
                    $('.notification').append(`
                            <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center mark-all">Mark All As Read </a>
                            <div class="dropdown-divider"></div>
                            <div class = "notification-result" style="overflow-y: scroll;height: calc(61px * 5);">
                                <a href="${url}" class="dropdown-item d-flex pb-3 align-items-center" style = "color:#1e2125;background-color: #e9ecef;">
                                    <div class="notify-img">
                                        <i class="fa fa-comment-o"></i>
                                    </div>
                                    <div>
                                        <strong>${user.name}</strong> أضاف رد جديد
                                    </div>
                                </a>
                            </div>
                    `)
                } else {
                    $('.notification-result').prepend(`
                        <a href="${url}" class="dropdown-item d-flex pb-3 align-items-center" style = "color:#1e2125;background-color: #e9ecef;">
                            <div class="notify-img">
                                <i class="fa fa-comment-o"></i>
                            </div>
                            <div>
                                <strong>${user.name}</strong> أضاف رد جديد
                            </div>
                        </a>
                    `)
                }
                $('.notify-count').text(count+1);

            });
        @endauth
        
    </script>
@endpush