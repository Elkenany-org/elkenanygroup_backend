@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الشكاوي</h1>
    <a type="button" class="btn btn-secondary py-2" href="{{ route('contactus.index') }}">الشكاوي</a>
  </div>
  @if ($all_messages->count() > 0)
  <table class="table" id="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width:70px">#</th>
            <th style="width: 7rem" scope="col">الاسم الاول</th>
            <th scope="col">الاسم الثاني</th>
            <th scope="col">تاريخ الانشاء</th>
            <th scope="col">الخيارات</th>
          </tr>
        </thead>
        <tbody id="tbody">
            @php
                $counter =1;
            @endphp
          @foreach ($all_messages as $message)
          <tr class="search2" style="border-bottom: 1px double #5d657b">
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$message->first_name}}</p></td>
            <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$message->second_name}}</p></td>
            <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$message->created_at}}</p></td>
            <td>
              <a class="btn btn-secondary ms-1 py-1" href="{{ route('contactus.show', $message->id) }}">عرض</a> 
              <a class="btn btn-danger ms-1 py-1" href="{{ route('contactus.soft_delete', $message->id) }}">حذف</a>  
            </td>
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
 