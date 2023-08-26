@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">المتقدمين لوظيفة</h1>  
  </div>

  @if ($newcomers->count() > 0)
    <table class="table" id="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width: 7rem;">#</th>
            <th scope="col">الاسم الاول</th>
            <th scope="col">الاسم التاني</th>
            {{-- <th scope="col">الموبايل</th> --}}
            <th scope="col">تاريخ الانشاء</th>
            <th scope="col">الخيارات</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php
              $counter =1;
          @endphp
          @foreach ($newcomers as $newcomer)
          <tr class="search2 " style="border-bottom: 1px double #5d657b">
            <td scope="row" style="color: #2f80ed">{{$counter++}}</td>
            <td style="max-width: 30px;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$newcomer->firstname}}</p></td>
            <td style="max-width: 30px;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$newcomer->secondname}}</p></td>
            {{-- <td style="max-width: 30px;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$newcomer->phone}}</p></td> --}}
            <td ><p class=" title" style=" overflow-wrap: break-word;max-width: 85px;">{{$newcomer->created_at}}</p></td>
            <td>
              <a class="btn btn-secondary ms-1 py-1" href="{{ route('Newcomers.show', $newcomer->id) }}">عرض</a> 
              <a class="btn btn-danger ms-1 py-1" href="{{ route('Newcomers.destroy', $newcomer->id) }}">حذف</a>  
            </td>
            @if ($newcomer->read == 0)
              <td><i class="fa-solid fa-circle" style="color: #0d6efd;"></i></td>  
            @endif
          </tr>
              
          @endforeach
        </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$newcomers->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد متقدمين لاي وظيفة</div>
    @endif
    
  </div>
  
</div>
@endsection

