@if ($type == "doctors")
 <option value="0" selected="">إختر الدكتور</option>
    @foreach ($doctors as $d)
        <option value="{{$d->id}}" >{{$d->name}}</option>
    @endforeach
@endif
@if ($type == "subjects")
    @foreach ($subjects as $s)
        <option value="{{$s->id}}" >{{$s->name}}</option>
    @endforeach
@endif
