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
               <th scope="col">اسم الورشة</th>
               <th scope="col">المكان</th>
               <th scope="col">المدرب</th>
               <th scope="col">تعديل</th>
               <th scope="col">حذف</th>
           </tr>
           </thead>
           <tbody>
           @foreach($items as $item)
               <tr>
               <th scope="row">{{$item->id}}</th>
               <td>{{$item->title}}</td>
               <td>
                   @foreach($item->centers as $key => $center)
                        <span>{{$center->title}}</span>
                   @endforeach
               </td>
               <td>
                   @foreach($item->trainers as $key => $trainer)
                       <span>{{$trainer->first_name.' '.$trainer->last_name}}</span>
                   @endforeach
               </td>
               <td><a href="{{route('workshop-edit',['id'=>$item->id])}}" class="btn btn-info">edit</a></td>
               <td><a href="{{route('workshop-delete',['id'=>$item->id])}}" class="btn btn-danger">delete</a></td>
           </tr>
            @endforeach
           </tbody>
       </table>
   </div>
@endsection


@section('customScript')
@endsection