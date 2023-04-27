@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">البيانات</h1>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('info.archive') }}">الارشيف</a>
  </div>
  @if ($all_info->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width:70px">#</th>
              <th style="width: 7rem" scope="col">النوع</th>
              <th scope="col">الوصف</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">الخيارات</th>
            </tr>
          </thead>
          <tbody id="tbody">
              @php
                  $counter =1;
              @endphp
            @foreach ($all_info as $info)
            <tr class="search2" style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
              <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$info->type}}</p></td>
              <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$info->description}}</p></td>
              <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$info->created_at}}</p></td>
              <td>
                <a class="btn btn-secondary ms-1 py-1" href="{{ route('info.edit', $info->id) }}">تعديل</a> 
                <a class="btn btn-danger ms-1 py-1" href="{{ route('info.soft_delete', $info->id) }}">حذف</a>  
              </td>
            </tr>
                
            @endforeach
          </tbody>
    </table>  
    
    <div class="pagination justify-content-center">
      {{$all_info->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد بيانات</div>
    @endif
    
  </div>
  
</div>
@endsection

