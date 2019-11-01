@extends('viewEvents::layouts.app')


@section('titlePage')
    <h1>centers index</h1>
@endsection
@section('content')
    <div>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">num</th>
                <th scope="col">اسم المكان</th>
                <th scope="col">العنوان</th>
                <th scope="col">رقم التليفون</th>
                <th scope="col">الأيميل</th>
                <th scope="col">رابط الفيسبوك</th>
                <th scope="col">عدد مقاعد</th>
                <th scope="col">المكان مكيف</th>
                <th scope="col">تعديل</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->title}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->num_phone}}</td>
                <td>{{$item->email}}</td>
                <td><a href="{{$item->url_fb}}" target="_blank">facebook</a></td>
                <td>{{$item->num_class_room}}</td>
                <td>{{$item->Air_conditioned_place == 1 ? 'متاح' : 'غير متاح'}}</td>
                <td><a href="{{route('center-edit',['id'=>$item->id])}}" class="btn btn-info">edit</a></td>
                <td><a href="{{route('center-delete',['id'=>$item->id])}}" class="btn btn-danger">delete</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('customScript')
@endsection