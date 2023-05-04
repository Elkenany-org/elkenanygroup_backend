@extends('layouts.app')

@section('content')


<form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <br>
    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">            
                <div class="row">
                    <div class="col-12 d-flex align-items-center three mb-3 justify-content-between">
                        <div class="d-inline-block input-style-1">
                            <div class="d-inline-block input-style-1">
                                <label for="name_ar">الاسم AR</label>
                                <input type="text" class="form-control" name="name_ar"
                                        style="margin-left: 70px;" value="{{$category->name_ar}}">
                            </div>
                            <div class="d-inline-block input-style-1">
                                <label for="name_en" style=" margin-right: 70px;">الاسم EN</label>
                                <input type="text" class="form-control" name="name_en"
                                        style=" margin-right: 70px" value="{{$category->name_en}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                      
    
</form> 

@endsection