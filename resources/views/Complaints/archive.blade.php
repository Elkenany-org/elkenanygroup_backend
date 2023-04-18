@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الاخبار</h1>
    <a type="button" class="btn btn-secondary py-2" href="{{ route('News.index') }}">الاخبار</a>
  </div>

  <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width:70px">#</th>
            {{-- <th style="width: 7rem" scope="col">الصورة</th> --}}
            <th scope="col">العنوان</th>
            <th scope="col">التاريخ</th>
            <th scope="col">الخيارات</th>
          </tr>
        </thead>
        <tbody>
            @php
                $counter =1;
            @endphp
          @foreach ($news as $event)
           <tr>
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            {{-- <td><img src="images/news/{{$event->image}}" alt="error" style="width: 60px"></td> --}}
            <td><p class="ms-5" style="inline-size: 17rem; overflow-wrap: break-word">{{$event->title}}</p></td>
            <td><p class="ms-5" style="inline-size: 9rem; overflow-wrap: break-word">{{$event->created_at}}</p></td>
            <td>
              <a class="btn btn-primary ms-1 py-1" href="{{ route('News.restore', $event->id) }}">استرجاع</a>
              <a class="btn btn-danger ms-1 py-1" href="{{ route('News.hard_delete', $event->id) }}">حذف نهائي</a>  
            </td>
           </tr>
              
          @endforeach
        </tbody>
    </table>
    
</div>
@endsection
