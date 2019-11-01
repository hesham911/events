@extends('viewEvents::layouts.app')


@section('titlePage')
    <h1>Events index</h1>
@endsection
@section('content')
    <div>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">num</th>
                <th scope="col">اسم المدرب</th>
                <th scope="col">العنوان</th>
                <th scope="col">الإيميل</th>
                <th scope="col">رقم التليفون</th>
                <th scope="col">رقم التليفون العمل</th>
                <th scope="col">رابط الفيس بوك</th>
                <th scope="col">المجال</th>
                <th scope="col">تعديل</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->first_name.' '.$item->last_name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->num_phone}}</td>
                    <td>{{$item->work_num_phone}}</td>
                    <td><a href="{{$item->url_fb}}" target="_blank">facebook</a></td>
                    <td>{{$item->field}}</td>
                    <td><a href="{{route('trainer-edit',['id'=>$item->id])}}" class="btn btn-info">edit</a></td>
                    <td><a href="{{route('trainer-delete',['id'=>$item->id])}}" class="btn btn-danger">delete</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection


@section('customScript')
@endsection