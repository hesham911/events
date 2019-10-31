@extends('viewEvents::layouts.app')


@section('titlePage')
    <h1>Event Create</h1>
@endsection
@section('content')
    <div class="h-event-form">
        <form id="eventForm" action="{{route('eventCreate')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Workshop name</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dateFrom">date from</label>
                    <input type="datetime-local" name="start_date" class="form-control" id="dateFrom" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="dateTo">date to</label>
                    <input type="datetime-local" name="end_date" class="form-control" id="dateTo" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="center">Center</label>
                    <select id="center" name="center" class="custom-select">
                        {{--<option selected>Open this select menu</option>--}}
                        {{--<option value="1">One</option>--}}
                    </select>
                </div>
                {{--<div class="form-group col-md-2 mt-4">--}}
                    {{--<div class="btn btn-info">+</div>--}}
                    {{--<div class="btn btn-dark">New</div>--}}
                {{--</div>--}}
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="trainer">Trainer</label>
                    <select name="trainer" id="trainer" class="custom-select"></select>
                </div>
                {{--<div class="form-group col-md-2 mt-4">--}}
                    {{--<div class="btn btn-info">+</div>--}}
                    {{--<div class="btn btn-dark">New</div>--}}
                {{--</div>--}}
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
            <div class="form-group">
                <label class="form-check-label" for="description">
                    Description
                </label>
                <textarea rows="5" class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="file">file sheet</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
                <div id="dropzone">
                    <label class="form-check-label" for="image">Workshop photos</label>
                    <div id='m-dropzone-two' action="{{route('dropzone')}}" method="Post" class="dropzone needsclick dz-clickable">
                        <div class="dz-message needsclick">
                            Drop your photos <br>
                            <span class="note needsclick"> Limit is 10 images  </span>
                        </div>
                    </div>
                    <div id="files">
                    </div>
                </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="volunteer">Volunteer</label>
                    <select id="volunteer" class="custom-select">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group col-md-2 mt-4">
                    <div class="btn btn-info">+</div>
                </div>
            </div>
            <input type="submit" name="action" value="Add Event" class="btn btn-primary">
            </div>
        </form>
    </div>

    {{--<div class="h-trainer-form">--}}
        {{--<form id="trainerForm" >--}}
            {{--<div class="form-row">--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="firstName"> First Name </label>--}}
                    {{--<input class="form-control" name="firstName" id="firstName" type="text">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="lastName"> Last Name </label>--}}
                    {{--<input class="form-control" id="lastName" name="firstName" type="text">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label for="address">Address </label>--}}
                {{--<input class="form-control" id="address" name="address" type="text">--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label for="email">Email </label>--}}
                {{--<input class="form-control" id="email" name="email" type="email">--}}
            {{--</div>--}}
            {{--<div class="form-row">--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="phoneNum1"> phone Number 1 </label>--}}
                    {{--<input class="form-control" name="phoneNum[]" id="phoneNum1" type="number">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="phoneNum2"> phone Number 1 </label>--}}
                    {{--<input class="form-control" name="phoneNum[]" id="phoneNum2" type="number">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="FBurl"> FaceBook url </label>--}}
                    {{--<input class="form-control" name="FBurl" id="FBurl" type="url">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="twitterUrl"> Twitter url </label>--}}
                    {{--<input class="form-control" name="twitterUrl" id="twitterUrl" type="url">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="linkedinUrl"> Linkedin url </label>--}}
                    {{--<input class="form-control" name="linkedinUrl" id="linkedinUrl" type="url">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="cv">C.V file</label>--}}
                    {{--<input type="file" class="form-control-file" id="cv">--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<input type="submit" name="action" value="Add Trainer" class="btn btn-primary">--}}
        {{--</form>--}}
    {{--</div>--}}

    {{--<div class="h-workshop-form">--}}
        {{--<form id="workshopForm">--}}
            {{--<div class="form-group">--}}
                {{--<label for="centerName">center name</label>--}}
                {{--<input name="centerName" type="text" class="form-control" id="centerName" placeholder="">--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label for="centerAddress">Address </label>--}}
                {{--<input class="form-control" id="centerAddress" name="address" type="text">--}}
            {{--</div>--}}
            {{--<div class="form-row">--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="centerPhoneNum"> phone Number  </label>--}}
                    {{--<input class="form-control" name="phoneNum" id="centerPhoneNum" type="number">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="centerEmail">Email </label>--}}
                    {{--<input class="form-control" id="centerEmail" name="centerEmail" type="email">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="centerFBurl"> FaceBook url </label>--}}
                    {{--<input class="form-control" name="FBurl" id="centerFBurl" type="url">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="centerTwitterUrl"> Twitter url </label>--}}
                    {{--<input class="form-control" name="twitterUrl" id="centerTwitterUrl" type="url">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="website"> website </label>--}}
                    {{--<input class="form-control" name="website" id="website" type="url">--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label for="logo">Logo file</label>--}}
                    {{--<input type="file" class="form-control-file" id="logo">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<input type="submit" name="action" value="Add center" class="btn btn-primary">--}}
        {{--</form>--}}
    {{--</div>--}}

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
        url: 'get/countries/',
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
        url: 'get/divisions/',
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script>
    var DropzoneDemo = {
        init: function () {
            Dropzone.options.mDropzoneTwo = {
                paramName: "file",
                maxFiles: 10,
                maxFilesize: 10,
                addRemoveLinks: !0,
                removedfile: function(file) {
                    var data = JSON.parse(file.xhr.responseText);


                    $('#files').find('input[name="file[]"][value=' + data.id + ']').remove();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('delete-dropzone')}}",
                        data: "id=" + data.id,
                        dataType: 'html'
                    });
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(file, json){
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'file[]',
                        value: json.id
                    }).appendTo('#files');
                }
            }

//                setTimeout(function () {
//                    Dropzone.options.mDropzoneTwo.removedfile({
//                        'files' : {
//                            xhr : {
//                                responseText : '{"id":304,"success":true}'
//                            }
//                        }
//                    });
//                },2000);

        }
    };
    DropzoneDemo.init(

    );
</script>
@endsection

@section('customCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endsection