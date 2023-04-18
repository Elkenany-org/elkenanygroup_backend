@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">الشكاوي</h1>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('News.archive') }}">الارشيف</a>
  </div>
  @if ($complaints->count() > 0)
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
            @foreach ($complaints as $complaint)
            <tr class="search2" style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
              <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$complaint->first_name}}</p></td>
              <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$complaint->second_name}}</p></td>
              <td><p class="ms-5 title" style="inline-size: 17rem; overflow-wrap: break-word">{{$complaint->created_at}}</p></td>
              <td>
                <a class="btn btn-secondary ms-1 py-1" href="{{ route('complaint.show', $complaint->id) }}">عرض</a> 
                <a class="btn btn-danger ms-1 py-1" href="{{ route('complaint.soft_delete', $complaint->id) }}">حذف</a>  
              </td>
            </tr>
                
            @endforeach
          </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$news->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد شكاوي</div>
    @endif
    
  </div>
  
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // function search2 (input2) 
  // {
  //     input2 = input2.toLowerCase()
  //     let links2 = document.querySelectorAll(".search2")
      
  //     for (let index = 0; index < links2.length; index++) {
  //         if (links2[index].textContent.toLowerCase().includes(input2)) {
  //           links2[index].style.display = "table-row"
  //           }   else {
  //             links2[index].style.display = "none"
  //         }
  //     }
  // }


  
  //   $(document).on('keyup',function(e){
  //   e.preventDefault();
  //   let search_string = $('#mySearch').val();

  //   $.ajax({
  //     url:"{{route('News.search')}}",
  //     method:'GET',
  //     data:{search_string:search_string},
  //     success:function(res)
  //     {
  //       $('.search2').html(res);
  //     }
  //     // success: function(){
  //     //                alert( "Data Saved: " + 'ssssssssss' );
  //     //             }
  //   });
    
  //   console.log(search_string);
  // })
  $(document).ready(function() {
  $('#mySearch').on('keyup', function() {
    var query = $(this).val();
    $.ajax({
      url: '{{ route("News.search") }}',
      method: 'GET',
      data: {
        query: query
      },
      success: function(response) {
        $('#tbody').html(response);
      }
    });
  });
  console.log($(this).val());
});

  
</script>
