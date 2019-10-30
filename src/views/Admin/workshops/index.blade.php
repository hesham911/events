@extends('viewEvents::layouts.app')


@section('titlePage')
    <h1>Event Create</h1>
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
           <tr>
               <th scope="row">1</th>
               <td>Mark</td>
               <td>Otto</td>
               <td>@mdo</td>
               <td>@mdo</td>
               <td>@mdo</td>
           </tr>

           </tbody>
       </table>
   </div>
@endsection


@section('customScript')
@endsection