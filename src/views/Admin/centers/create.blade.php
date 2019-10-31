@extends('viewEvents::layouts.app')


@section('titlePage')
    <h1>Center add</h1>
@endsection
@section('content')
    <form id="centerForm" action="{{route('center-create')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="centerName">center name</label>
            <input name="title" type="text" class="form-control" id="centerName" placeholder="">
        </div>
        <div class="form-group">
            <label for="centerAddress">Address </label>
            <input class="form-control" id="centerAddress" name="address" type="text">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="centerPhoneNum"> phone Number  </label>
                <input class="form-control" name="num_phone" id="centerPhoneNum" type="number">
            </div>
            <div class="form-group col-md-6">
                <label for="centerEmail">Email </label>
                <input class="form-control" id="centerEmail" name="email" type="email">
            </div>
            <div class="form-group col-md-6">
                <label for="centerFBurl"> FaceBook url </label>
                <input class="form-control" name="url_fb" id="centerFBurl" type="url">
            </div>
            <div class="form-group col-md-6">
                <label for="centerTwitterUrl"> Twitter url </label>
                <input class="form-control" name="url_twitter" id="centerTwitterUrl" type="url">
            </div>
            <div class="form-group col-md-6">
                <label for="website"> website </label>
                <input class="form-control" name="website" id="website" type="url">
            </div>
            <div class="form-group col-md-6">
                <label for="logo">Logo file</label>
                <input  name="logo" type="file" class="form-control-file" id="logo">
            </div>
                <div class="form-group col-md-6">
                    <label for="num_class_room"> class room number  </label>
                    <input class="form-control" name="num_class_room" id="num_class_room" type="number">
                </div>
                <div class="form-group  col-md-6">
                    <div class="custom-control custom-switch">
                        <input name="Air_conditioned_place" value="1" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Air conditioned</label>
                    </div>
                </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="countries"> Country </label>
                    <select name="countries" id="countries" class="form-control">
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="divisions">city</label>
                    <select name="divisions" id="divisions" class="form-control">

                    </select>
                </div>

            </div>
        </div>
        <input type="submit" value="Add center" class="btn btn-primary">
    </form>
@endsection


@section('customScript')
    <script>

        $.ajax({
            type: 'get',
            url: "{{route('get-countries')}}",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                console.log(data);
                if(data){
                    $('#countries').empty();
                    $('#countries').focus;
                    $('#countries').append('<option value="">-- أختر البلد --</option>');

                    $.each(data, function(key, value){
                        $('select[name="countries"]').append('<option value="'+ data[key]['id'] +'">' + value.name +'</option>');
                    });
                }else{
                    $('#countries').empty();
                }
            },
            error: function(){
                console.log('success');
            }
        });

        $.ajax({
            type: 'get',
            url: "{{route('get-divisions')}}",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                console.log(data);
                if(data){
                    $('#divisions').empty();
                    $('#divisions').focus;
                    $('#divisions').append('<option value="">-- أسم المحافظة --</option>');

                    $.each(data, function(key, value){
                        $('select[name="divisions"]').append('<option value="'+ data[key]['id'] +'">' + value.name + '</option>');
                    });
                }else{
                    $('#divisions').empty();
                }
            },
            error: function(){
                console.log('success');
            }
        });
    </script>
@endsection