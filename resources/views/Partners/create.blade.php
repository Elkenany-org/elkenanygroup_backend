@extends('layouts.app')

@section('content')

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            <div class="row">
                <form action="{{route('Partners.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">الاسم</label>
                            <input type="text" class="form-control" name="name" oninput="countCharacters(this,1)"></textarea>
                            <div dir="ltr"><span id="1"></span></div>
                        </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="name">اللوجو</label>
                        <input type="file" class="file" id="file" name="logo">
                      </div>
                    </div>
            
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="اضافة">
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
  

<script>


    function countCharacters(inputField , id) {
        var charCountElement = document.getElementById(id);
        charCountElement.innerText = inputField.value.length;
    }
    
</script>

@endsection