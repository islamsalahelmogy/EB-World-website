<section>
    @foreach ($departments as $d)
        <hr class="">
        <h2 class="">{{$d->name}}</h2>
        <hr>
            <div class="row">
                @foreach ($subjects as $s)
                    @if ($s->department->id == $d->id)
                        <div class="col-4">
                            <div class="card overflow-hidden mb-0">
                                <div class="item-card7-img pt-5 px-5">
                                    <div class="item-card7-imgs">
                                        <a href="{{route('subject',['id'=>$s->id])}}"></a>
                                        @if ($s->cover != null)
                                            <img src="{{asset('assets/images/data/subjects/'.$s->id.'/'.$s->cover)}}" alt="img" class="cover-image br-7 border">
                                        @else
                                            <img src="{{asset('assets/images/data/subjects/default.jpg')}}" alt="img" class="cover-image br-7 border">
                                        @endif
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <h4 class="mb-0">{{$s->level->name}}</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc">
                                        <div class="item-card7-text mt-1">
                                            <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1">{{$s->name}}</h4></a>
                                        </div> 
                                        <div class="item-card7-text mt-1">
                                            <a href="javascript:void(0)" class="text-dark"><h6 class="font-weight-semibold mb-1">دكتور المادة : {{$s->doctor->name}}</h6></a>
                                        </div>             
                                        <p class="mb-0 text-dark line-clamp">{{$s->description}}</p>
                                    </div>
                                </div>
                
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
    @endforeach
    
</section>