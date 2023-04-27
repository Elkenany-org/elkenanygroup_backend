@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الوظائف</h1>
    <a type="button" class="btn btn-secondary py-2" href="{{ route('job.index') }}">الوظائف</a>
  </div>
  
  @if ($jobs->count() > 0)
  
  <table class="table">
      <thead style="border-bottom: #2f80ed 3px solid">
        <tr style="color: #2f80ed">
          <th scope="col" style="width: 70px">#</th>
          <th scope="col" style="padding-right: 40px;">الوظيفة</th>
          <th scope="col">المكان</th>
          <th scope="col">تاريخ الانشاء</th>
          <th scope="col">تاريخ التعديل</th>
          <th scope="col" style="padding-left: 76px">الاختيارات</th>
        </tr>
      </thead>
      <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach ($jobs as $job)
         <tr >
          <th scope="row" style="color: #2f80ed; width: 70px">{{$counter++}}</th>
          <td><p class="ms-5" style="inline-size: 17rem; overflow-wrap: break-word;padding-right: 40px;">{{$job->title}}</p></td>
          <td><p class="ms-5" style="inline-size: 9rem; overflow-wrap: break-word">{{$job->address}}</p></td>
          <td><p class="ms-5" style="inline-size: 7rem; overflow-wrap: break-word">{{($job->created_at)->format('d/m/Y   h:i:s')}}</p></td>
          <td><p class="ms-5" style="inline-size: 7rem; overflow-wrap: break-word">{{($job->updated_at)->format('d/m/Y   h:i:s')}}</p></td>  
          <td>
            <a class="btn btn-secondary ms-1 py-1" href="{{ route('job.restore', $job->id) }}">استرجاع</a> 
            <a class="btn btn-danger ms-1 py-1" href="{{ route('job.soft_delete', $job->id) }}">حذف نهائي</a>  
          </td>
         </tr>
        @endforeach        
  </table>
  <div class="pagination justify-content-center">
    {{$jobs->links()}}
  </div>
  @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد وظائف</div>
  @endif
  
  
</div>
@endsection
