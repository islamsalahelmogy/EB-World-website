@extends('admin.layout')
@push('breadcrumb')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم المواد</h1>
</div>
@endpush

@section('page')


<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">المستويات</h3>
    </div>
    <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class=" m-b-20">
                                <div class="card-header">
                                    <h3 class="card-title">تعديل  المستوي</h3>
                                </div>
                                <div class="card-body">
                                    <form id="edit_level">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputname"  placeholder="الإسم" value="{{$level->name}}">
                                            <input type="hidden" name="id" value="{{$level->id}}">
                                        </div>
                                        
                                        <div class="form-group mb-0">
                                            <div class="checkbox checkbox-secondary">
                                                <input type="submit" class="btn btn-primary " value="أضف">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(() => {

            $('input').on('focus',(e) => {
                var input = $(e.target)
                if(input.hasClass('is-invalid')) {
                    console.log(input);
                    input.removeClass('is-invalid');
                    $('#'+input.attr('name')).remove();
                }
                if($('span.invalid').length) {
                    $('span.invalid').remove();
                }
            })

            function messageError(errorName,message) {
                $('input[name='+errorName+']').addClass('is-invalid');
                    $('input[name='+errorName+']').parent().append(
                        '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                                '<strong>'+message+'</strong>'+
                        '</span>'
                );
            }
            //Level Create
            $('#edit_level').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('admin.levels.update') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;

                    if(errors) {
                        console.log(errors)
                        if(errors.name){
                            messageError('name',errors.name[0]);
                        }
                    }
                    else{
                            window.location.replace("{{ route("admin.levels") }}");
                        }
                })
            })
        })
    </script>
@endpush