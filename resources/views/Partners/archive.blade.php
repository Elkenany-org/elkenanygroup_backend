@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الشركاء</h1>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('Partners.index') }}">الشركاء</a>
  </div>
  
  @if ($partners->count() > 0)
  
  <table class="table">
      <thead style="border-bottom: #2f80ed 3px solid">
        <tr style="color: #2f80ed">
          <th scope="col" style="width: 5rem;">#</th>
          <th scope="col">اللوجو</th>
          <th scope="col">الاسم</th>
          <th scope="col">تاريخ الانشاء</th>
          <th scope="col">تاريخ التعديل</th>
          <th scope="col">تاريخ الحذف</th>
          <th scope="col" style="padding-left: 76px">الاختيارات</th>
        </tr>
      </thead>
      <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach ($partners as $partner)
         <tr >
          <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
          <td><img src="{{$partner->logo_url}}" alt="error" style="width: 60px"></td>
          <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$partner->name}}</p></td>
          <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($partner->created_at)->format('d/m/Y   h:i:s')}}</p></td>
          <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($partner->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
          <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($partner->deleted_at)->format('d/m/Y   h:i:s')}}</p></td>
          <td>
            <a class="btn btn-secondary ms-1 py-1" href="{{ route('Partners.restore', $partner->id) }}">استرجاع</a> 
            <a class="btn btn-danger ms-1 py-1" href="{{ route('Partners.hard_delete', $partner->id) }}">حذف نهائي</a>  
          </td>
         </tr>
        @endforeach        
  </table>
  <div class="pagination justify-content-center">
    {{$partners->links()}}
  </div>
  @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد شركاء</div>
  @endif
  
  
</div>
@endsection
