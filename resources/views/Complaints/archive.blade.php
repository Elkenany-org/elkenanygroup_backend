@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الشكاوي</h1>
    <a type="button" class="btn btn-secondary py-2" href="{{ route('News.index') }}">الشكاوي</a>
  </div>

  <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width:70px">#</th>
            <th scope="col">اسم الشركة</th>
            <th scope="col">الاسم الاول</th>
            <th scope="col">الاسم الثاني</th>
            <th scope="col">التاريخ</th>
            <th scope="col">الخيارات</th>
          </tr>
        </thead>
        <tbody>
            @php
                $counter =1;
            @endphp
          @foreach ($complaints as $complaint)
           <tr>
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td><p class="ms-5" style="inline-size: 17rem; overflow-wrap: break-word">{{$complaint->company_name}}</p></td>
            <td><p class="ms-5" style="inline-size: 9rem; overflow-wrap: break-word">{{$complaint->first_name}}</p></td>
            <td><p class="ms-5" style="inline-size: 9rem; overflow-wrap: break-word">{{$complaint->second_name}}</p></td>
            <td><p class="ms-5" style="inline-size: 7rem; overflow-wrap: break-word">{{($complaint->created_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td>
              <a class="btn btn-primary ms-1 py-1" href="{{ route('complaint.restore', $complaint->id) }}">استرجاع</a>
              <a class="btn btn-danger ms-1 py-1" href="{{ route('complaint.hard_delete', $complaint->id) }}">حذف نهائي</a>  
            </td>
           </tr>
              
          @endforeach
        </tbody>
    </table>
    
</div>
@endsection
