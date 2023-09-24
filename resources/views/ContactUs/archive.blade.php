@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الشكاوي</h1>

    <form class="d-f justify-content-center align-items-center" id="search-form" action="{{route('contactus.archive_search')}}" method="get">
      <label>الاسم الاول</label>
      <input class="mySearch w-25" type="text" name="first_name" id="search-input">
      <label>اسم الشركة</label>
      <input class="mySearch w-25" type="text" name="company_name" id="search-input">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('contactus.index') }}">الشكاوي</a>
  </div>
  @if ($all_messages->count() > 0)
  <table class="table" id="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width: 3rem;">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">الشركة</th>
            <th scope="col">تاريخ الارسال</th>
            <th scope="col">تاريخ الحذف</th>
            <th scope="col">الخيارات</th>
          </tr>
        </thead>
        <tbody id="tbody">
            @php
                $counter =1;
            @endphp
          @foreach ($all_messages as $message)
          <tr style="border-bottom: 1px double #5d657b">
            <td scope="row" style="color: #2f80ed">{{$counter++}}</td>
            <td>{{$message->name}}</td>
            <td>{{$message->company}}</td>
            <td>{{$message->created_at}}</td>
            <td>{{$message->deleted_at}}</td>
            <td>
              <a class="btn btn-secondary ms-1 py-1" href="{{ route('contactus.restore', $message->id) }}">استرجاع</a>  
              <a class="btn btn-danger ms-1 py-1" href="{{ route('contactus.hard_delete', $message->id) }}">حذف نهائي</a> 
            </td>
            @if ($message->read == 0)
              <td><i class="fa-solid fa-circle" style="color: #0d6efd;"></i></td>  
            @endif
          </tr>
              
          @endforeach
        </tbody>
  </table>  
  <div class="pagination justify-content-center">
    {{$all_messages->links()}}
  </div>
  @else
  <div class="alert alert-danger fw-bold" role="alert">لا يوجد شكاوي</div>
  @endif
  
</div>

</div>
@endsection
 
