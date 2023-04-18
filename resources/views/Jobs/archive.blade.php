@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الوظائف</h1>
    <a type="button" class="btn btn-secondary py-2" href="{{ route('Jobs.index') }}">الوظائف</a>
  </div>

  <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width:70px">#</th>
            <th scope="col">العنوان</th>
            <th scope="col">تاريخ الحذف</th>
            <th scope="col">الخيارات</th>
          </tr>
        </thead>
        <tbody>
            @php
                $counter =1;
            @endphp
          @foreach ($jobs as $job)
           <tr>
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td><p class="ms-5" style="inline-size: 17rem; overflow-wrap: break-word">{{$job->title}}</p></td>
            <td><p class="ms-5" style="inline-size: 7rem; overflow-wrap: break-word">{{$job->deleted_at}}</p></td>
            
            <td>
              <a class="btn btn-primary ms-1 py-1" href="{{ route('Jobs.restore', $job->id) }}">استرجاع</a>
              <a class="btn btn-danger ms-1 py-1" href="{{ route('Jobs.hard_delete', $job->id) }}">حذف نهائي</a>  
            </td>
           </tr>
              
          @endforeach
        </tbody>
    </table>
    
</div>
@endsection

{{-- @foreach ($jobs as $job)
    <p>{{$job->id}}</p>
    <p>{{$job->title}}</p>
    <p>{{$job->address}}</p>
    <p>{{$job->description}}</p>
    <p>{{$job->details}}</p>
    <p>{{$job->features}}</p>

    <a class="btn btn-warning"  href="{{route('Jobs.edit' , $job->id)}}" >edit</a>
    &nbsp;
    <a class="btn btn-danger"   href="{{route('Jobs.hard_delete', $job->id)}}" >delete</a>
    <hr>

@endforeach --}}