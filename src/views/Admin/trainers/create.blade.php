@extends('viewEvents::layouts.app')


@section('titlePage')
    <h1>trainer Add</h1>
@endsection
@section('content')

    <form id="centerForm" action="{{route('trainer-create')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First name</label>
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last name</label>
                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="">
            </div>
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
                <label for="work_phone">Work phone Number  </label>
                <input class="form-control" name="work_num_phone" id="work_phone" type="number">
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
                <label for="url_linked_in"> LinkedIn url </label>
                <input class="form-control" name="url_linked_in" id="url_linked_in" type="url">
            </div>
            <div class="form-group col-md-6">
                <label for="portfolio_link"> Portfolio Link </label>
                <input class="form-control" name="portfolio_link" id="portfolio_link" type="url">
            </div>
            <div class="form-group col-md-6">
                <label for="field">Field</label>
                <input name="field" type="text" class="form-control" id="field" placeholder="">
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
            <div class="form-group col-md-6">
                <label for="cv">C.V</label>
                <input  name="cv" type="file" class="form-control-file" id="cv">
            </div>
        </div>
        <input type="submit" value="Add center" class="btn btn-primary">
    </form>
@endsection


@section('customScript')
    <script>

        $.ajax({
            type: 'get',
            url: 'get/centers/',
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                console.log(data);
                if(data){
                    $('#center').empty();
                    $('#center').focus;
                    $('#center').append('<option value="">-- أسم المركز --</option>');

                    $.each(data, function(key, value){
                        $('select[name="center"]').append('<option value="'+ data[key]['id'] +'">' + value.title+ '</option>');
                    });
                }else{
                    $('#center').empty();
                }
            },
            error: function(){
                console.log('success');
            }
        });

        $.ajax({
            type: 'get',
            url: 'get/trainers/',
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
                console.log(data);
                if(data){
                    $('#trainer').empty();
                    $('#trainer').focus;
                    $('#trainer').append('<option value="">-- أسم المدرب --</option>');

                    $.each(data, function(key, value){
                        $('select[name="trainer"]').append('<option value="'+ data[key]['id'] +'">' + value.first_name + ' ' + value.last_name + '</option>');
                    });
                }else{
                    $('#trainer').empty();
                }
            },
            error: function(){
                console.log('success');
            }
        });

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