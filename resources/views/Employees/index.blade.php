@extends('layouts.app')

@section('content')
<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">الموظفين</h1>
    
  </div>
  
  @if ($employees->count() > 0)
  
    <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width: 5rem;">#</th>
            <th scope="col">الصورة</th>
            <th scope="col">الاسم</th>
            <th scope="col">الوظيفة</th>
            <th scope="col">تاريخ الانشاء</th>
            <th scope="col">تاريخ التعديل</th>
            <th scope="col">الاختيارات</th>
          </tr>
        </thead>
        <tbody>
          @php
              $counter = 1;
          @endphp
          @foreach ($employees as $employee)
          <tr style="border-bottom: 1px double #5d657b">
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td><img src="{{$employee->image_url}}" alt="error" style="width: 60px"></td>
            <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$employee->name}}</p></td>
            <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$employee->position}}</p></td>
            <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word;max-width:  5rem;">{{($employee->created_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word;max-width:  5rem;">{{($employee->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td>
              <a class="btn btn-secondary ms-1 py-1" href="{{ route('Employees.edit', $employee->id) }}">تعديل</a> 
              <a class="btn btn-danger ms-1 py-1" href="{{ route('Employees.delete', $employee->id) }}">حذف</a>  
            </td>
         
          @endforeach        
    </table>
    <div class="pagination justify-content-center">
      {{$employees->links()}}
    </div>
    @else
      <div class="alert alert-danger fw-bold" role="alert">لا يوجد موظفين</div>
    @endif
    
    
</div>
@endsection
