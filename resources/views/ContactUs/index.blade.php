@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">الشكاوي</h1>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('contactus.archive') }}">الارشيف</a>
  </div>
  @if ($all_messages->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width: 7rem;">#</th>
              <th scope="col">الاسم الاول</th>
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
            <tr class="search2 " style="border-bottom: 1px double #5d657b">
              <td scope="row" style="color: #2f80ed">{{$counter++}}</td>
              <td style="max-width: 30px;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$message->first_name}}</p></td>
              <td style="max-width: 30px;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$message->second_name}}</p></td>
              <td class=""><p class=" title" style=" overflow-wrap: break-word;max-width: 85px;">{{$message->created_at}}</p></td>
              <td class="">
                <a class="btn btn-secondary  py-1 " href="{{ route('contactus.show', $message->id) }}">عرض</a> 
                <a class="btn btn-danger  py-1 " href="{{ route('contactus.soft_delete', $message->id) }}">حذف</a>  
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
